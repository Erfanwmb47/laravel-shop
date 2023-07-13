<?php

namespace Modules\Cart\Http\Controllers\Client;


use App\Http\Controllers\Admin\User\Address\AddressController;
use App\Http\Controllers\Client\Cart\Exception;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Brand;
use App\Models\Category;
use App\Models\County;
use App\Models\Discount;
use App\Models\PaymentGateway;
use App\Models\Province;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Cart\Entities\Payment;
use Modules\Cart\Helpers\Cart\Cart;
use function PHPUnit\Framework\isNull;

class PaymentController extends Controller
{
    public function computePriceTransportation(Request $request)
    {
//        dd($request);
        $distance = County::query()->find($request->county_id)->distance;
        $sumWeight=$this->sumWeightCart();
        $transportations = Transportation::all();
//        dd($transportations);
        $transportations->map(function ($item) use ($distance , $sumWeight){

            $item->totalPrice = $item->cost + ($item->const_distance * $distance) + ($item->factor_weight * $sumWeight) ;
//            dd($discount=Cart::getDiscount());
            if(isset(($discount=Cart::getDiscount())->transportations) &&
            in_array($item->id,$discount->transportations->pluck('id')->toArray())
            ){

                 if($item->totalPrice*$discount->percent/100 < $discount->maxCost){
                    $item->discountPrice=$item->totalPrice*$discount->percent/100;
                }else{
                     $item->discountPrice=$discount->maxCost;

                }
            }

            $item->image = str_replace('public','/storage',optional($item->gallery)->path) ;
        });
//        dd($transportations);
        return response(['success'=> true, 'transportations' => $transportations]);

    }

    public function checkout()
    {
        //dd(Auth::user()->addresses->first());
        return view('cart::Client.Cart.Checkout',[
            'addresses' => Auth::user()->addresses,
            'addresses_count' =>Auth::user()->addresses->count(),
            'transportations' => Transportation::all(),
            'paymentGateways' => PaymentGateway::all(),
            'provinces' => Province::all(),
            'categories' => Category::all(),
            'brands' => Brand::all()

        ]);
    }
    private function checkAddress(Request $request){
        if ($request->address == 'newAddres'){
            return $this->createNewAddress($request);

        }
        else{
            return Address::query()->find($request->address);
        }
    }

    private function computePriceTransportationServer (Address $address,Transportation $transportation){

        $distance=$address->county->distance;
        $sumWeight=$this->sumWeightCart();
         return $transportation->cost + ($transportation->const_distance * $distance) + ($transportation->factor_weight * $sumWeight) ;

    }

    public function payment(Request $request)
    {
        //$cart=Cart;
        /*dd($this->sumAmountCart());*/
        //TODO hesab pole ajax ba sabte order fuction beshe ke darde sar nashe

        $address=$this->checkAddress($request);
        $transportation=Transportation::query()->find($request->transportation);
        $PriceTransportation= $this->computePriceTransportationServer($address,$transportation);
        //TODO func hesab kardane cart all
        $cartItems=Cart::all();
        //dd($cartItems->first()['product']->price);
        $orderIteams=$cartItems->mapWithKeys(function ($cart){
            return[$cart['product']->id =>['quantity' =>$cart['quantity'],'price'=> $cart['product']->price,
                'priceWithDiscount'=>$cart['product']->price - ($cart['discount']/$cart['quantity'])],
                    ];
        });
//sdsd
        $address_string=AddressController::addressToString($address);


        //dd(json_encode($address_string));
        $order=auth()->user()->order()->create([
           'address'=>json_encode($address_string),
           'transportation_id'=> $request->transportation,
           'transportation_cost' => $PriceTransportation,
           'final_cost'=>$this->TotalCartCost()+$PriceTransportation,
           'amount'=> $this->sumAmountCart(),
           'status' => 'unpaid',
           'recipient_name' => $request->recipient_name,
           'recipient_phone' => $request->recipient_phone,
           'paymentGateway_id' => $request->paymentGateway,
           'cart_cost'=>$c1=$this->TotalCartCost(),
            //TODO masale score user
            'score'=>$c1/100,

        ]);
        $order->products()->attach($orderIteams);
        $order->discount()->attach(Discount::whereCode(session('cart.discount'))->first());
        Cart::flush();
        $gatewayurl=$this->payping(1780,$order);

        return redirect($gatewayurl);
        //TODO ke bayad az function createNewAddress baraye sakhte address jadid estefade konim ya address ro darim dige
       // $this->createNewAddress();
        //address" => "newAddres" age bod yani address jadide o ba modal sakhte shode
        //age "address" => "18" adad bod yani address mojode

       /* toast('سبد خرید شما خالی است','error');
        return 'ok';*/
    }

    public function createNewAddress(Request $request)
    {

        $province_id=$request->province_id;
        $county_id=$request->county_id;
        $postalCode=$request->postalCode;
        $tel=$request->tel;
        $detail=$request->detail;

        $address=Province::find($request->province_id)->name;
       // dd($address);
        $id=Address::query()->create([
            'county_id'=> $county_id,
            'province_id'=>  $province_id,
            'detail'=> $detail,
            'tel'=> $tel,
            'postalCode'=> $postalCode,
            'user_id'=> Auth::user()->id,
        ]);
        return $id;

    }

    private function sumWeightCart()
    {
        $sum=0;
        foreach ( Cart::all() as $ca){
            $sum+= $ca['product']->weight;
        }
        return $sum;
    }

    private function sumAmountCart(){
        return Cart::all()->sum(function ($cart){
         return $cart['quantity'];
        });

    }
    private function TotalCartCost(){

       return Cart::totalPrice()- Cart::sumDiscount();


    }

    public static function payping($Price,$order)
    {
        $token = config('services.payping.token');
        $res_number=Str::random();
        $order->payments()->create([
            'resNumber'=> $res_number,
            'price' =>$Price
        ]);
       // dd(route('payment.payping.callback'));
        $args = [
            "amount" => $Price,
            "payerName" => Auth::user()->username,
            "description" => "",
            "payerIdentity" =>isset(Auth::user()->phone) ? Auth::user()->phone : Auth::user()->email,
            "returnUrl" => route('payment.payping.callback'),
            "clientRefId" => $res_number
                ];

            $payment = new \PayPing\Payment($token);
            try {
                $payment->pay($args);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }

        return $payment->getPayUrl();
    }

    public function paypingCallback(Request $request)
    {
        //refid movafagh ya namovafagh
        //client refid hamon shomare factore

        $paymentRecord=Payment::where('resnumber',$request->clientrefid)->first();
        $amount=$paymentRecord->order->final_cost;

        if(isNull($paymentRecord)){

            //TODO vojod nadashtane factore morede nazar
        }

        $token = config('services.payping.token');

        $payment = new \PayPing\Payment($token);

        try {//inja mabalghe
            $amount=$paymentRecord->order->final_cost;
            if($payment->verify($request->refid ,1040)){
                $paymentRecord->update(['status'=>1]);
                $paymentRecord->order()->update(['status'=> 'paid']);
                toast('خرید شما با موفقیت انجام شد','success');
                //TODO redirect be safhe paradkht bara kharid movafagh

                return redirect(route('home'));

            }else{
                return redirect(route('home'));
                //TODO redirect be safhe paradkht bara kharid na movafagh
                toast('خرید شما با موفقیت انجام نشد','error');
            }

        }
        catch (\PayPingException $e) {
            //TODO inja payam ro migirim o bad bayad neshon bedim
            $errors=collect(json_decode($e->getMessage(),true));
            toast($errors->first(),'error');
            return redirect(route('home'));



        }

    }



}
