<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CommentRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;


class ClientController extends Controller
{
    public function __construct()
    {
        //its just a dummy data object.
        $categories = Category::all();
        $brands = Brand::all();
        // Sharing is caring
        View::share('categories', $categories);
        View::share('brands', $brands);
    }
}
