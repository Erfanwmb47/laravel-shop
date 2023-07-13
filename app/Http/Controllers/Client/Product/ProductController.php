<?php

namespace App\Http\Controllers\Client\Product;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Artesaos\SEOTools\Facades\OpenGraph;

class ProductController extends ClientController
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
            $this->seo()
                ->setTitle($product->name)
                ->setDescription($product->description)
            ;
            $this->seo()->opengraph()->setTitle($product->name);
           // OpenGraph::setTitle('سایت ما هستش');

          //  dd($product->attributes->first()->values);

            return view('Client.Products.Single',[
                'product' => $product
            ]);
    }
}
