<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Client\ClientController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends ClientController
{
    public function index(Request $request)

    {
        $user_wishlist=[];
        if(Auth::check()){
            $user_wishlist=Auth::user()->wishlists->pluck('product_id')->toArray();
        }
        $this->seo()->setTitle('فروشگاه اینترنتی');
        return view('Client.Home.home',[
            'user_wishlist'=>$user_wishlist,

            'home_header_left'=>Slider::whereFlag('home_header_left')->whereStatus(1)->first(),
            'home_header_right'=>Slider::whereFlag('home_header_right')->whereStatus(1)->first(),
            'home_main_top'=>Slider::whereFlag('home_main_top')->whereStatus(1)->first(),
            'home_offer_1'=>Slider::whereFlag('home_offer_1')->whereStatus(1)->first(),
            'home_offer_2'=>Slider::whereFlag('home_offer_2')->whereStatus(1)->first(),
            'home_offer_3'=>Slider::whereFlag('home_offer_3')->whereStatus(1)->first(),
            'home_offer_4'=>Slider::whereFlag('home_offer_4')->whereStatus(1)->first(),
            'home_sticky_top'=>Slider::whereFlag('home_sticky_top')->whereStatus(1)->first(),
            'home_sticky_bottom'=>Slider::whereFlag('home_sticky_bottom')->whereStatus(1)->first(),
            'home_body_middle'=>Slider::whereFlag('home_body_middle')->whereStatus(1)->first(),
            'home_body_bottom'=>Slider::whereFlag('home_body_bottom')->whereStatus(1)->first(),

            'offerProducts' => Product::latest()->take(8)->get()
        ]);
    }
}
