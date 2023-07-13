<?php

namespace Modules\Cart\Http\Controllers\Client;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Helpers\Cart\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
//        dd(Cart::all());
        return view('cart::Client.Cart.Cart',[
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
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
            $productTotalPrice=(Cart::all()->where('id',$data['id'])->pluck('product')->pluck('price')[0])*(Cart::get($data['id'])['quantity']);
//            dd($this->totalprice());
            return response(['status'=> 'success','totalPrice'=>$this->totalprice(),'newPriceProduct'=>$productTotalPrice]);
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
