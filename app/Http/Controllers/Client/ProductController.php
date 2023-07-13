<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('Client.Products.Index',[
            'products' => $products
        ]);
    }

    public function single(Product $product)
    {

    }
}
