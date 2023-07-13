<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use App\Notifications\LoginToWebsiteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthTokenController extends AuthController
{
    public function getToken(Request $request)
    {
        if (!request()->session()->has('auth')) {
            return redirect(route('login'));
        }

        $request->session()->reflash();
        //Alert::toast('پیامک کد تایید برای شما ارسال شد','success');
        return view('auth.token');
    }

    public function postToken(Request $request)
    {
        //dd($request->session()->get('auth.remember'));
        $request->validate([
            'token' => 'required'
        ]);

        if (!request()->session()->has('auth')) {
            return redirect(route('login'));
        }

        $user_verify=User::findorfail($request->session()->get('auth.user_id'));
        $code_verify = implode($request->token);

        //$user_verify=$request->session()->pull('auth.user_id');
        //$is_user=ActiveCode::query()->whereUser_id($user_verify)->whereCode($code_verify)->first();
        $status=ActiveCode::VerifyCode($code_verify,$user_verify);
        //dd($status);

        if(! $status){
            $request->session()->reflash();
            Alert::toast('کد تایید وارد شده صحیح نمی باشد.','error');
            return redirect(route('2fa.token'));
        }

        if($status){

            Auth::login($user_verify,$request->session()->get('auth.remember'));
            $user_verify->notify( new LoginToWebsiteNotification());
            $user_verify->activeCode()->delete();
            Alert::toast( $user_verify->username.' خوش آمدید ','success');
            return redirect(route('home'));
        }

    }
}
