<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Client\ClientController;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends ClientController
{
    public function index(Request $request)

    {
//        dd(session('cart.discount'));
        $this->seo()->setTitle('فروشگاه اینترنتی');
       // dd()
        return view('Client.Home.home',[
            'home_header_left'=>Slider::whereFlag('home_header_left')->whereStatus(1)->first(),
            'home_header_right'=>Slider::whereFlag('home_header_right')->whereStatus(1)->first(),
            'home_body_top'=>Slider::whereFlag('home_body_top')->whereStatus(1)->first(),
            'home_body_middle'=>Slider::whereFlag('home_body_middle')->whereStatus(1)->first(),
            'home_body_bottom'=>Slider::whereFlag('home_body_bottom')->whereStatus(1)->first(),
            'home_body_left_top'=>Slider::whereFlag('home_body_left_top')->whereStatus(1)->first(),
        ]);
    }
}
