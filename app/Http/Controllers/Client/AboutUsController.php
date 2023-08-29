<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends ClientController
{
    public function index()
    {
        return view('Client.StaticPages.aboutUs');
    }
}
