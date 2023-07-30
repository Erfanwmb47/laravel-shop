<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Metakey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function __construct()
    {
        //its just a dummy data object.
        $categories = Category::all();
        $brands = Brand::all();
        // Sharing is caring
        View::share('categories', $categories);
        View::share('brands', $brands);
        View::share('shop_address',json_decode(Metakey::where('key','shop_address')->first()->Setting->object));
        View::share('shop_description',json_decode(Metakey::where('key','shop_description')->first()->Setting->object));
        View::share('shop_tel',json_decode(Metakey::where('key','shop_tel')->first()->Setting->object));
        View::share('shop_email',json_decode(Metakey::where('key','shop_email')->first()->Setting->object));
    }
}
