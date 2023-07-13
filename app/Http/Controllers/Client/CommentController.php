<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CommentRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function comment(CommentRequest $request)
    {
        //CommentRequest

        auth()->user()->comments()->create($request->all());
        Alert::toast('کامنت شما پس از تایید ثبت میشود ','success');


        // return back();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
