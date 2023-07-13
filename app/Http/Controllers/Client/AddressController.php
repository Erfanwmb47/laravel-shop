<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class AddressController extends ClientController
{
    public function getProvince_setCounties(Request $request){
        $h=Province::query()->find($request->id)->county->all();

        return response()->json(array('success' => true,'counties' => $h));
    }

}
