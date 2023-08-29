<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ContactUsController extends ClientController
{
    public function index()
    {
        return view('Client.StaticPages.contactUs');
    }

    public function send(Request $request)
    {
        ContactUs::create($request->all());
        Alert::success('ارسال', 'پیام شما دریافت شد و در اسرع وقت به شما پاسخ داده خواهد شد ');
        return back();
    }
}
