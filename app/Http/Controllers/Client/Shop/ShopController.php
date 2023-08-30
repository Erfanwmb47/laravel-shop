<?php

namespace App\Http\Controllers\Client\Shop;

use App\Http\Controllers\Client\ClientController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends ClientController
{
    public function index(Request $request)
    {
        $user_wishlist=[];
        if(Auth::check()){
            $user_wishlist=Auth::user()->wishlists->pluck('product_id')->toArray();
        }

        $products=Product::paginate(5);
        $pro =  $products->map(function ($item){
            $item->brand_name = $item->brand->name;
            $item->image = str_replace('public','/storage',$item->gallery->path);
            return $item ;
        });
        $data = [];
        $productInCart =[];
        if ($request->ajax()) {
            foreach ($pro as $product) {
                if (\Modules\Cart\Helpers\Cart\Cart::has($product)){
                    $productInCart = \Modules\Cart\Helpers\Cart\Cart::get($product);
                }
                array_push($data,['product' => $product ,
                    'inWishlist'=>in_array($product->id,$user_wishlist),
                    'productInCart'=> $productInCart]);
                $productInCart =[];
			}
            return $data;
        }
        return view('Client.Shop.index',
            compact('products','user_wishlist'));
    }
}
