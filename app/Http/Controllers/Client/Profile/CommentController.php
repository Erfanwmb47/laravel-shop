<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Controller;
use App\Models\Shop\ShopComment;
use Illuminate\Http\Request;

class CommentController extends ClientController
{
    public function index()
    {
        return view('Client.Profile.comments',[
            'comments' => auth()->user()->shop_comments
        ]);
    }

    public function getCommentDetails(Request $request)
    {
//        dd($request);
        $comment = ShopComment::find($request->id);
        if ($comment->user == auth()->user())
        return response(['success' => 'true','comment'=> $comment]);
    }

    public function editComment(Request $request,ShopComment $shopComment)
    {

        dd($request->all());
//        dd($shopComment);
        $shopComment->update($request->all());
    }
}
