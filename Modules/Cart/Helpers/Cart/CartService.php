<?php

namespace Modules\Cart\Helpers\Cart;

use App\Models\Discount;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;
use function Symfony\Component\Translation\t;

class CartService
{
    protected $cart;
    protected $totalPrice=0;
    protected $sumDiscount=0;
    protected $totalPriceDiscount=0;

    public function __construct()
    {
        $cart = collect(session()->get('cart'));
        $this->cart= $cart->count() ? $cart : collect([
           'items' => [],
           'discount' => null,
        ]);
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        if ($key instanceof Model){
            return ! is_null(
                collect($this->cart['items'])->where('subject_id',$key->id)->where('subject_type',get_class($key))->first()
            );
        }
        return ! is_null(
            collect($this->cart['items'])->firstWhere('id',$key)
            );
    }

    /**
     * @param array $value
     * @param $object
     * @return $this
     */
    public function put(array $value , $object = null)
    {
        if(!is_null($object) && $object instanceof Model){
            $value = array_merge($value,[
               'id' => Str::random(10),
                'subject_id' => $object->id,
                'subject_type' => get_class($object),
                'discount' => 0
            ]);
        }
        elseif(!isset($value['id'])){
            $value = array_merge($value,[
                'id' => Str::random(10),
            ]);
        }
        $this->cart['items']=collect($this->cart['items'])->put($value['id'],$value)->toArray();

        session()->put('cart',$this->cart);
        return $this;
    }

    public function get($key,$withRelationShip = false)
    {
        $item = $key instanceof Model
            ? collect($this->cart['items'])->where('subject_id',$key->id)->where('subject_type',get_class($key))->first()
            :             collect($this->cart['items'])->firstWhere('id',$key);
        return $withRelationShip ? $this->withRelathionshipIfExists($item) : $item;
    }


    public function totalPrice()
    {
        return $this->totalPrice;
    }

    public function sumDiscount()
    {
        return $this->sumDiscount;
    }
    public function totalPriceDiscount()
    {
        return $this->totalPriceDiscount;
    }

    public function all()
    {
        $cart =$this->cart;
//        dd(Discount::whereCode($this->cart['discount'])->first()->transportations);
        if( !! $this->cart['discount'] &&  Discount::whereCode($this->cart['discount'])->first()->transportations->count())
        {
            $cart= collect($this->cart['items'])->map(function ($item) use ($cart){
                $item= $this->withRelathionshipIfExists($item);
                return $item;
            });
            $this->totalPrice=$cart->sum(function ($cart) {
                return $cart['product']->price * $cart['quantity'];
            });
        }
else{


       $cart= collect($this->cart['items'])->map(function ($item) use ($cart){
           $item= $this->withRelathionshipIfExists($item);
           $item=$this->checkDiscountValidate($item,$cart['discount']);
           return $item;
        });
        $this->totalPrice=$cart->sum(function ($cart) {
            return $cart['product']->price * $cart['quantity'];
        });

        if($this->cart['discount']) {
            $this->sumDiscount = $cart->sum(function ($cart) {
                return $cart['discount'];
            });

            $this->totalPriceDiscount = $cart->sum(function ($cart) {
                if ($cart['discount']) {
                    return $cart['product']->price * $cart['quantity'];
                }
            });
            if (isset(Discount::whereCode($this->cart['discount'])->first()->maxCost)){
                if ($this->sumDiscount > $maxCostDiscount = Discount::whereCode($this->cart['discount'])->first()->maxCost) {


                    $this->sumDiscount = $maxCostDiscount;
                    // dd($this->sumDiscount);
                    $discount=Discount::whereCode($this->cart['discount'])->first();
                    $cart = collect($cart)->map(function ($item) use ($cart, $maxCostDiscount,$discount) {

                        if (
                                (
                                       !$discount->products->count()
                                    && !$discount->categories->count()
                                    && !$discount->brands->count()
                                )
                                ||

                            in_array($item['product']->id,
                                $discount->products->pluck('id')->toArray()) ||

                                in_array($item['product']->brand_id,
                                $discount->brands->pluck('id')->toArray()) ||

                            array_intersect($item['product']->categories->pluck('id')->toArray(),
                                $discount->categories->pluck('id')->toArray())
                        ) {

                            $item['discount'] = round((($item['quantity'] * $item['product']->price) / $this->totalPriceDiscount) * $this->sumDiscount, '0');
                        }
                        return $item;
                    });

                }
                }
        }
    }
    return $cart;
    }


    /**
     * @param $key
     * @param $options
     * @return $this
     */
    public function update($key, $options)
    {
        $item = collect($this->get($key));

        if (is_numeric($options)) {
            $item = $item->merge([
                'quantity' => $options
            ]);
        }

        if(is_array($options)) {
            if (is_numeric($options['quantity'])) {
                $item = $item->merge([
                    'quantity' => $options['quantity']
                ]);
            }
        }
        $this->put($item->toArray());
        return $this;
    }

    public function count($key)
    {
        if(! $this->has($key) ) return 0;

        return $this->get($key)['quantity'];
    }

    protected function withRelathionshipIfExists($item)
    {
        /*dd($item);*/
        if (isset($item['subject_id']) && isset($item['subject_type']))
        {
            $class =    $item['subject_type'];
            $subject = (new $class())->find($item['subject_id']);
            $item[strtolower(class_basename($class))]= $subject;

            unset($item['subject_id']);
            unset($item['subject_type']);

            $this->totalPrice+=$item['quantity']*$item['product']->price;
            //dd($this->totalPrice);
            return $item;
        }
    return $item;
    }

    public function delete($key)
    {
        if($this->has($key)){
            $this->cart['items'] = collect($this->cart['items'])->filter(function ($item) use ($key){
                if ($key instanceof Model){
                    return ($item['subject_id'] != $key->id && ($item['subject_type']) != get_class($key));
                }
                return $key != $item['id'];
            });

            session()->put('cart',$this->cart);
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    public function flush()
    {
        $this->cart = collect([
            'items' => [],
            'discount' => null
        ]);
        session()->put('cart',$this->cart);
        return $this;
    }

    public function addDiscount($discount)
    {
        if (is_null($discount)){
            $this->cart['discount']=$discount;
            session()->put('cart',$this->cart);
        }
        else{
            $this->cart['discount']=$discount->code;
            session()->put('cart',$this->cart);
        }

    }

    public function getDiscount()
    {
        return Discount::whereCode($this->cart['discount'])->first();
    }

    protected function checkDiscountValidate($item,$discount){
        //dd($item['product']->price);
        $discount=Discount::whereCode($discount)->first();
        if ($discount && $discount->expired_at > now()){
            if(
                (
                    !$discount->products->count() &&
                    !$discount->categories->count() &&
                    !$discount->brands->count()
                ) ||

                in_array($item['product']->id , $discount->products->pluck('id')->toArray()) ||
                in_array($item['product']->brand_id,$discount->brands->pluck('id')->toArray()) ||
                array_intersect($item['product']->categories->pluck('id')->toArray(),
                    $discount->categories->pluck('id')->toArray())

            )
            {

                $item['discount']=($item['quantity'])*($item['product']->price)*($discount->percent/100);

            }
        }
        return $item;
    }


}
