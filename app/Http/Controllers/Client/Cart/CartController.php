<?php

namespace App\Http\Controllers\Client\Cart;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index(Request $request)
    {
//        dd(Cart::all());
        return view('Client.Cart.Cart');
    }

    public function addToCart(Request $request)
    {

        $product=Product::query()->find($request->id);

        $tt='max:'.$product->maxOrder;
       $validate=$request->validate([
           'quantity' => ['numeric',$tt],

        ]);


        if (Cart::has($product)){
            if(Cart::count($product) < $product->quantity) {
                //shate mojozdi anbar
                if ($request->plus == false) {
                    Cart::update($product, Cart::count($product) + 1);
                }
                else if ($request->plus == true){
                    Cart::update($product, $validate['quantity']);
                }
            }
        }
        else{
            $Cart_id=Cart::put([
                'quantity' => $validate['quantity'],
            ],$product);
            //dd(Cart::all());
        }
//        dd($Cart_id);
//            dd(Cart::get($product)['quantity']);
             return response(['success'=> true,'id'=>$product->id,
                 'name'=>$product->name,
                 'price'=>$product->price,
                 'image'=>str_replace('public','/storage',optional($product->gallery)->path),
                 'cart_id'=>Cart::get($product)['id'],
                 'quantity' =>Cart::get($product)['quantity'],
                 'maxOrder' =>$product->maxOrder,

             ]);



    }

    public function quantityChange(Request $request)
    {  // $tt='max:'.$product->maxOrder;
        $data=$request->validate([

        'quantity' => ['required'],
        'id' => ['required'],
        //'cart' => ['required'],
        ]);

        if(Cart::has($data['id'])){
            Cart::update($data['id'],[
              'quantity' => $data['quantity']

            ]);
            //$prouct_quantity=Cart::get($data['id'])['quantity'];
            $prouct_quantity=(Cart::all()->where('id',$data['id'])->pluck('product')->pluck('price')[0])*(Cart::get($data['id'])['quantity']);

           return response(['status'=> 'success','totalPrice'=>$this->totalprice(),'newPriceProduct'=>$prouct_quantity]);
        }
        return response(['status' => 'error'],404 );

    }

    public function deleteFromCart(Request $request)
    {
//        dd($request->id);
            Cart::delete($request->id);
        return response(['success' => 'true', 'totalPrice' => $this->totalprice()] );
    }

    public function totalprice()
    {
       return Cart::all()->sum(function ($cart){
            return $cart['product']->price * $cart['quantity'];
        });
    }

}
