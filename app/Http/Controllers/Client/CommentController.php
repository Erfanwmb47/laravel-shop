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
            ShopComment::create([
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->product_id,
                'title'=>$request->title,
                'rate'=>$request->rate,
                //'positive'=>$request->positive,
                //'negative'=>$request->negative,
                'text'=>$request->text,

            ]);
        return response(['success'=> true,
            'userImage'=>str_replace('public','/storage',Auth::user()->gallery->path)
        ]);
    }
}
