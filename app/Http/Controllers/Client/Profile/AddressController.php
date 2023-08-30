<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends ClientController
{
    public function index()
    {
        return view('Client.Profile.addresses',[
            'provinces' => Province::all(),
            'addresses' => Auth::user()->addresses,
        ]);
    }

    public function store(Request $request)
    {
        dd($request->get('postalCode'));
    }
}
