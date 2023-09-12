<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\passwordResetsModel;
use App\Models\RegisterWithSms;
use App\Models\ResetToken;
use App\Models\User;
use App\Notifications\LoginToWebsiteNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordResetLinkController extends AuthController
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function storePhone(Request $request)
    {
        $data = $request->validate([
            'phone' => ['required','regex:/^09(1[0-9]|3[0-9]|2[0-9])-?[0-9]{3}-?[0-9]{4}$/'],
        ]);
        if($user=User::query()->wherePhone($data['phone'])->first())
        {
            $code=ResetToken::GenerateCode($user);
            try {
                // $user->notify(new ActiveCodeNotification($code,$user->phone));
                $request->session()->flash('sms',[
                    'user_id' => $user->id
                ]);
                return redirect(route('resetPassword.token'));
            }catch (\Exception $e){
                $request->session()->flush();
                Alert::error( 'شماره نادرست است','error');
                return redirect('/login');
            }
        }
        return redirect()->back()->withErrors([
            'phone' => 'شماره نامعتبر است یا موجود نمی باشد'
        ]);
    }
    public function SmsTokenCreate()
    {
        if (!!session()->get('sms.user_id')){
            if (!!session()->get('sms.user_id'))
            {
                session()->forget('register-sms');
            }

            session()->reflash();
            return view('Auth.reset-password.token');
        }
        else{
            return back()->withErrors([
                'phone' => 'شماره اشتباه وارد شده است'
            ]);
        }
    }

    public function smsVerifyToken(Request $request)
    {
        $code_verify = implode($request->token);
        $user_verify=User::findorFail($request->session()->get('sms.user_id'));
        $status=ResetToken::VerifyCode($code_verify,$user_verify);

        if(! $status){
            $request->session()->reflash();
            Alert::toast('کد تایید وارد شده صحیح نمی باشد.','error');
            return back();
        }

        if($status){
//            dd(session()->all());
            $user_verify->resetToken()->delete();
            session()->forget('register-sms');
            session()->reflash();
//            Alert::toast( $user_verify->username.' خوش آمدید ','success');
            return redirect()->route('resetPasswordWithPhone');
        }
    }
}
