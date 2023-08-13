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

        $products=Product::all();
        return view('Client.Shop.index',
            compact('products','user_wishlist'));
    }
}
