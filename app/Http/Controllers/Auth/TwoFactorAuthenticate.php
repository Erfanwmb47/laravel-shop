<?php

namespace App\Http\Controllers\Auth;

use App\Models\ActiveCode;
use App\Models\User;
use App\Notifications\ActiveCodeNotification;
use App\Notifications\LoginToWebsiteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;


trait TwoFactorAuthenticate
{
    public function loggendin(Request $request, $user){
        if($user->hasTwoFactoryAuthenticaredEnabaled())
        {
          return  $this->logoutAndRedirectToTokenEntry($request,$user);
        }

        $user->notify( new LoginToWebsiteNotification());
        return false;
    }
    public function logoutAndRedirectToTokenEntry(Request $request,$user){
       // auth()->logout();
        $request->session()->flash('auth',[
            'user_id' => $user->id,
            'using_sms' => false,
            'remember' => $request->session()->get('auth.remember')
        ]);

        if($user->isTwoFactorTypeSMS()){
            $code=ActiveCode::GenerateCode($request->user());
            try {
                //dd('hi');
                $user->notify(new ActiveCodeNotification($code,$user->phone));
            }catch (\Exception $e){
                //dd('hi');
                Alert::error( 'ورود با موفقیت انجام نشد','error');
                Auth::logout();
                return redirect('/login');
            }

            $request->session()->put('auth.using_sms' ,true);
            Auth::logout();
            return redirect(route('2fa.token'));

        }
        return false;
        //TODO route return
    }
}

