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

    public function banner(string $title)
    {
        $tmp=Slider::whereFlag($title)->whereStatus(1)->first();
      return  ['path'=> !!$tmp ? $tmp->gallery->path : '/Client/assets/images/banner/default/'.$title.'.jpg','title'=>!! $tmp ? $tmp->title : $title.'_default','description'=>!!$tmp ? $tmp->description : ''];
    }
    public function index(Request $request)
    {
        $this->seo()->setTitle('فروشگاه اینترنتی سینویا');
        return view('Client.Home.home',[
            'user_wishlist'         =>Auth::check() ? Auth::user()->wishlists->pluck('product_id')->toArray() : [] ,
            'home_header_left'      =>$this->banner('home_header_left'),
            'home_header_right'     =>$this->banner('home_header_right'),
            'home_main_top'         =>$this->banner('home_main_top'),
            'home_offer_1'          =>$this->banner('home_offer_1'),
            'home_offer_2'          =>$this->banner('home_offer_2'),
            'home_offer_3'          =>$this->banner('home_offer_3'),
            'home_offer_4'          =>$this->banner('home_offer_4'),
            'home_sticky_top'       =>$this->banner('home_sticky_top'),
            'home_sticky_bottom'    =>$this->banner('home_sticky_bottom'),
            'home_body_middle'      =>$this->banner('home_body_middle'),
            'home_body_bottom'      =>$this->banner('home_body_bottom'),
            'offerProducts'         => Product::latest()->take(8)->get()
        ]);
    }
}
