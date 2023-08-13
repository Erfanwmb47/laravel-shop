<?php

namespace App\Http\Controllers\Client\Product;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\ProductAttributeValue;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Http\Request;

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
                ->setTitle($product->name . 'محصول ')
                ->setDescription($product->description)
            ;
            $this->seo()->opengraph()->setTitle($product->name);
           // OpenGraph::setTitle('سایت ما هستش');

          //  dd($product->attributes->first()->values);

            return view('Client.Products.Single',[
                'product' => $product
            ]);
    }

    public function summery(Request $request)
    {
        //dd(ProductAttributeValue::all());
        //TODO validation
        $id=$request->id;
        $product=Product::find($id);
        $array=[];
        foreach ($product->attributes as $pa){
            if(array_key_exists($pa->name,$array))
                array_push($array[$pa->name],$pa->pivot->value->value);

            else
                $array[$pa->name]=[$pa->pivot->value->value];

        }
        return response(['success'=> true,
            'product'=>$product,
            'attribute'=>$array,
            'image'=>str_replace('public','/storage',$product->gallery->path)
        ]);

    }
}
