<?php

namespace App\Http\Controllers\Client\Product;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shop\ReactionComment;
use App\ProductAttributeValue;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ProductController extends ClientController
{
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(20);
        return view('Client.Products.Index',[
            'products' => $products
        ]);
    }

    public function single(Request $request,Product $product)
    {
        $array=[];
        $comment_reaction=[];
        $commentUser=new Collection();
        foreach ($product->attributes as $pa){
            if(array_key_exists($pa->name,$array))
                array_push($array[$pa->name],$pa->pivot->value->value);

            else
                $array[$pa->name]=[$pa->pivot->value->value];

        }

            $this->seo()
                ->setTitle($product->name)
                ->setDescription($product->description)
            ;
            $this->seo()->opengraph()->setTitle($product->name);
           // OpenGraph::setTitle('سایت ما هستش');
            if(Auth::check())
            {
                $commentUser=$product->comments->where('user_id','=',Auth::id());
                $t=Auth::user()->reaction()->whereHas('shop_comment',function ($query)use ($product){
                    return $query->where('product_id',$product->id);
                });
                foreach ($t->get() as $k){
                    $comment_reaction[$k->shop_comment_id]=$k->reaction;
                }
            }



//            dd($comment_reaction[2]);
//dd($commentUser->);
        $comments = $product->comments()->paginate(1)->where('status','=','1')->diff($commentUser);
        $comm =  $comments->map(function ($item){
            $item->user_image = str_replace('public','/storage',$item->user->gallery->path);
            return $item ;
        });
        $data = [];
        $react = '';
        if ($request->ajax()) {
            foreach ($comm as $comment) {
                if(array_key_exists($comment->id,$comment_reaction)){
                    $react = $comment_reaction[$comment->id];
                };
                array_push($data,['comment' => $comment,'reaction'=>$react]);
                $react = '';
            }
//            dd($data);
            return ['data'=>$data,'authCheck'=>Auth::check()];
        }
            return view('Client.Products.Single',[
                'product' => $product,
                'attributes' => $array,
                'comments'=> $comments,
                'commentUser'=> $commentUser->count()==1 ? $commentUser->first() : [],
                'commentReaction' => $comment_reaction
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
