<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ActiveCode;
use App\Models\RegisterWithSms;
use App\Models\User;
use App\Notifications\ActiveCodeNotification;
use App\Notifications\LoginToWebsiteNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AuthenticatedSessionController extends AuthController
{
    use TwoFactorAuthenticate;
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        session()->forget(['register-sms','sms.user_id']);
        $this->seo()
            ->setTitle('ورود')
            ->setDescription('ورود به سایت سینویا')
        ;
        $this->seo()->opengraph()->setTitle('ورود کاربر سایت سینویا');

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request,$user ){
         return $this->loggendin($request,$user);
    }

    public function store(LoginRequest $request)
    {

        try {
            if(!$request->email && !!session()->get('email')){
                $request->request->add(['email' => session()->get('email')]);
            }
            elseif (!$request->user && !!session()->get('sms.user_id')){
                $request->request->add(['user' => session()->get('sms.user_id')]);
            }
//            dd($request->email);
//            dd($request->all());
//            dd(session()->all());
            //return redirect(route('2fa.token'));
            $request->authenticate();
//        dd(Auth::user()->username == 'mstf76');
            // if (Auth::user()->role == 'admin') {
            // Authentication was successful....
            $request->session()->regenerate();

            $request->session()->flash('auth',[
                'remember' => !! $request->remember
            ]);

            $this->authenticated($request,$request->user());

           // dd($request->session());
            //TODO جاش اینجاس
           // dd($request->session()->pull('auth.using_sms'));
            if($request->session()->pull('auth.using_sms')){

                Auth::logout();
                //dd($request->session());
                return redirect(route('2fa.token'));
            }

            else{
                toast('ورود با موفقیت انجام شد','success');
                session()->forget('sms.user_id');
                return redirect()->intended(RouteServiceProvider::HOME);
                //return redirect()->intended(RouteServiceProvider::HOME);
            }

        }

        catch (\Exeption $e){

                Alert::error( 'ورود با گوگل با موفقیت انجام نشد','error');
                return redirect('/login');

        }



       /* }
        else{
            Auth::logout();
            abort('403');
        }*/


    }




    public function storePhone(Request $request)
    {
        $data=$request->validate([
        'phone'=> ['required','regex:/^09(1[0-9]|3[0-9]|2[0-9])-?[0-9]{3}-?[0-9]{4}$/']
        ]);
        //dd($data['phone']);
        if($user=User::query()->wherePhone($data['phone'])->first())
        {
            $code=ActiveCode::GenerateCode($user);
            try {
               // $user->notify(new ActiveCodeNotification($code,$user->phone));
                $request->session()->flash('sms',[
                    'user_id' => $user->id
                ]);
                return redirect(route('SMS.token'));
            }catch (\Exception $e){
                $request->session()->flush();
                Alert::error( 'ورود با موفقیت انجام نشد','error');
                return redirect('/login');
            }
        }

        else{
//            dd($data);
            //TODO register user ba sms
            $code =   RegisterWithSms::GenerateCode($data['phone']);
            //$user->otify(new ActiveCodeNotification($code,$request->phone));

            $request->session()->put([
                'register-sms' => $data['phone']
            ]);
            return redirect(route('SMS.token'));
        }
    }

    public function SmsTokenCreate()
    {
        if (!!session()->get('register-sms') || !!session()->get('sms.user_id')){

            if (!!session()->get('register-sms')){
                session()->forget('sms.user_id');
            }
            if (!!session()->get('sms.user_id'))
            {
                session()->forget('register-sms');
            }

            session()->reflash();
            return view('Auth.SMS.token');
        }
        else{
            return redirect('/login');
        }
    }

    public function SmsVerifyToken(Request $request)
    {
        if(!!session()->get('register-sms')){
            $code_verify = implode($request->token);
            $phone=RegisterWithSms::wherePhone($request->session()->get('register-sms'))->firstOrFail();
            $status=RegisterWithSms::VerifyCode($code_verify,$phone->phone);
            if($status){
                $user=User::query()->create([
                    'phone'=> $phone->phone
                ]);
                //TODO remember me baraye login
                $phone->delete();
//                $this->setFirstNameAndLastName($user);
//                return redirect()->route('setInformation',$user);
                return redirect(route('setInformation',$user));
            }
            else{
                $request->session()->reflash();
                Alert::toast('کد تایید وارد شده صحیح نمی باشد.','error');
                return back();
            }
        }
        if (!!session()->get('sms.user_id')) {
            $code_verify = implode($request->token);
            $user_verify=User::findorFail($request->session()->get('sms.user_id'));
            $status=ActiveCode::VerifyCode($code_verify,$user_verify);

            if(! $status){
                $request->session()->reflash();
                Alert::toast('کد تایید وارد شده صحیح نمی باشد.','error');
                return back();
            }

            if($status){
                Auth::login($user_verify);
                $user_verify->notify( new LoginToWebsiteNotification());
                $user_verify->activeCode()->delete();
                session()->forget('register-sms');
                Alert::toast( $user_verify->username.' خوش آمدید ','success');
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
    }

    public function setInformation(User $user)
    {
        return view('auth.setInformation',[
            'user' => $user
        ]);
    }
    public function setInformationAfterRegister(Request $request , User $user)
    {
        $user->update($request->all());
        Auth::login($user);
        Alert::toast('ثبت نام شما با موفقیت انجام شد.','success');

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function checkInputIsEmailOrPhone(Request $request)
    {
        if(filter_var($request->phone, FILTER_VALIDATE_EMAIL)){
             $request->validate([
                'phone' => 'required'
             ]);
            $user=User::where('email',$request->phone)->first();
            if(!!$user){
                $request->session()->flash('email',$request->phone);
                return redirect(route('enterPassword'));
            }
            else{
                toast('چناچه در سایت ثبت نام نکرده اید ابتدا با شماره همراه خود ثبت نام کنید.','error');
                return back()->withErrors([
                    'email' => 'کاربری با این مشخصات وجود ندارد'
                ]);
            }

        }
        else if (preg_match('/^[0-9]{11}+$/', $request->phone)){
          return $this->storePhone($request);
        }
        else{
            return  back()->withErrors([
               'email' => 'اطلاعات به درستی وارد نشده است'
            ]);
        }
    }

    public function enterPassword()
    {
        session()->reflash();
        return view('auth.enter-password');
    }
}
