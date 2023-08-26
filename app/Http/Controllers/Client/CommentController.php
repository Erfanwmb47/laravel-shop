<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CommentRequest;
use App\Models\Product;
use App\Models\Shop\ShopComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends ClientController
{
    public function send(Request $request)
    {
//        dd('hi');
        $positive=json_encode($request->positive);
        $negative=json_encode($request->negative);

            ShopComment::create([
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->product_id,
                'title'=>$request->title,
                'rate'=>$request->rating,
                'positive'=>$positive,
                'negative'=>$negative,
                'text'=>$request->text,
            ]);
            $product = Product::find($request->product_id);
            $product->update([
               'sumRate' => $product->sumRate+$request->rating,
                'countRate' => $product->countRate+1
            ]);
        return response(['success'=> true,
            'userImage'=>str_replace('public','/storage',Auth::user()->gallery->path)
        ]);
    }
}
