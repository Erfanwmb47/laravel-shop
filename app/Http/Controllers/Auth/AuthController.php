<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
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
    }
}
