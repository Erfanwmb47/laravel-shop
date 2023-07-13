<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Client\ClientController;
use App\Models\Product;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends ClientController
{
    public function index()
    {   //dd(Auth::user()->wishlists());
        return view('Client.Profile.Wishlist',[
            'user' => Auth::user(),
            'wishlists' => Auth::user()->wishlists
        ]);
    }

    public function store(Request $request)
    {
    //dd($request);
    /*Wishlist::query()->create([
        'user_id' => Auth::user()->id,
        'product_id' => $request->id
    ]);*/
        auth()->user()->wishlists()->create([
            'product_id'=>$request->id
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function destroy(Request $request)
    {
        //dd($request->id);
       Wishlist::where('user_id',Auth::user()->id)->where('product_id',$request->id)->delete();

       //Wishlist::destroy()->
    }

}
