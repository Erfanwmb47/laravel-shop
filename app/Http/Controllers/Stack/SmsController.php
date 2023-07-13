<?php

namespace App\Http\Controllers\Stack;

use App\Http\Controllers\Controller;
use App\Models\AdminLog;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function callback(Request $request){
        dd($request);
        AdminLog::query()->create([
           'user_id' => '2',
           'detail' => $request
        ]);

    }

}
