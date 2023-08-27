<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Shop\ReactionComment;
use App\Models\Shop\ShopComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionCommentController extends ClientController
{
    public function like(Request $request)
    {
        $action='';
        $comment=ShopComment::find($request->comment_id);
        $user_id=Auth::id();
        $reaction=ReactionComment::where('user_id',$user_id)
                                 ->where('shop_comment_id',$comment->id)->first();
        if(!$reaction){
            ReactionComment::create([
                'shop_comment_id'=>$comment->id,
                'user_id' => $user_id,
                'reaction'=> 'like'
            ]);
            $comment->like++;
            $action='like';

        }else{
            if($reaction->reaction == 'like'){
                $reaction->delete();
                $comment->like--;
                $action='none';
            }
            else
            {
                $reaction->update(['reaction'=>'like']);
                $comment->dislike--;
                $comment->like++;
                $action='dislike to like';

            }
        }
        $comment->update();
        return response(['success'=> true,
            'like'=>$comment->like,
            'dislike'=>$comment->dislike,
            'action'=>$action
        ]);
    }

    public function dislike(Request $request)
    {   $action='';
        $comment=ShopComment::find($request->comment_id);
        $user_id=Auth::id();
        $reaction=ReactionComment::where('user_id',$user_id)
            ->where('shop_comment_id',$comment->id)->first();
        if(!$reaction){
            ReactionComment::create([
                'shop_comment_id'=>$comment->id,
                'user_id' => $user_id,
                'reaction'=> 'dislike'
            ]);
            $comment->dislike++;
            $action='dislike';

        }else{
            if($reaction->reaction == 'dislike'){
                $reaction->delete();
                $comment->dislike--;
                $action='none';
            }
            else
            {
                $reaction->update(['reaction'=>'dislike']);
                $comment->dislike++;
                $comment->like--;
                $action='like to dislike';
            }
        }
        $comment->update();
        return response(['success'=> true,
            'like'=>$comment->like,
            'dislike'=>$comment->dislike,
            'action'=>$action
        ]);
    }

}
