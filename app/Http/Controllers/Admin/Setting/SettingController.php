<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Metakey;
use Illuminate\Http\Request;

class SettingController extends AdminController
{
    public function index()
    {

        $shop_name=json_decode(Metakey::where('key','shop_name')->first()->setting->object);

        $shop_phone=json_decode(Metakey::where('key','shop_phone')->first()->setting->object);
        $shop_phone->value=str_replace('+98','',$shop_phone->value);

        $shop_tel=json_decode(Metakey::where('key','shop_tel')->first()->setting->object);
        $shop_tel->value=str_replace('+98','',$shop_tel->value);

        $shop_email=json_decode(Metakey::where('key','shop_email')->first()->setting->object);
        $shop_address=json_decode(Metakey::where('key','shop_address')->first()->setting->object);
        return view('Admin.Settings.index',compact(
           'shop_name',
          'shop_phone',
                    'shop_tel',
                    'shop_email',
                    'shop_address'

        ));
    }

    public function update(Request $request)
    {
        $this->update_name($request->shop_persian_name,$request->shop_english_name);
        $this->update_phone($request->shop_phone);
        $this->update_tel($request->shop_tel);
        $this->update_address($request->shop_address);
        $this->update_email($request->shop_email);
            return back();
    }

    public function update_name(string $persian_name, string $english_name )
    {
        $shop_name=['Persian_name'=>$persian_name,'English_name'=>$english_name];
        $shop_name=json_encode($shop_name);
        Metakey::where('key','shop_name')->first()->setting->update([
            'object'=>$shop_name
        ]);
    }
    public function update_phone(string $phone)
    {
        $shop_phone=['title'=>'شماره تلفن همراه','value'=>'+98'.$phone];
        $shop_phone=json_encode($shop_phone);
        Metakey::where('key','shop_phone')->first()->setting->update([
            'object'=>$shop_phone
        ]);
    }
    public function update_tel(string $tel)
    {
        $shop_tel=['title'=>'شماره تماس ثابت','value'=>'+98'.$tel];
        $shop_tel=json_encode($shop_tel);
        Metakey::where('key','shop_tel')->first()->setting->update([
            'object'=>$shop_tel
        ]);
    }

    public function update_address(string $address)
    {
        $shop_address=['title'=>'آدرس فروشگاه','value'=>$address];
        $shop_address=json_encode($shop_address);
        Metakey::where('key','shop_address')->first()->setting->update([
            'object'=>$shop_address
        ]);
    }
    public function update_email(string $email)
    {
        $shop_email=['title'=>'ایمیل فروشگاه','value'=>$email];
        $shop_email=json_encode($shop_email);
        Metakey::where('key','shop_email')->first()->setting->update([
            'object'=>$shop_email
        ]);
    }
}
