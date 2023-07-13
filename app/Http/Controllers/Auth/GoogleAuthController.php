<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Morilog\Jalali\Jalalian;
use RealRashid\SweetAlert\Facades\Alert;


class GoogleAuthController extends AuthController
{
    use TwoFactorAuthenticate;

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try{


            $googleUser = Socialite::driver('google')->user();
           // dd($googleUser);
            //dd($googleUser);
            $user = User::where('email',$googleUser->email)->first();
            $username = str_replace('@gmail.com','',$googleUser->email);

            if(!$user){
                $mime='';
                $header=get_headers($googleUser->avatar);

                if(in_array('Content-Type: image/jpeg',$header)){
                    $mime='JPEG';
                }
                elseif (in_array('Content-Type: image/png',$header)){
                    $mime='PNG';
                }
                $path='storage/Image/Users/'.$username .'.'. $mime;
                $size=file_put_contents(public_path($path), file_get_contents($googleUser->avatar));


                $newgallery= Gallery::create([
                    'title' => $username ,
                    'alt'  => $googleUser->name,
                    'size' => $size,
                    'mime' => $mime,
                    'path'=> str_replace('storage','public',$path),
                    'flag'=> 'users',
                    'created_at'=> Jalalian::now(),
                    'updated_at' => Jalalian::now()
                ]);

                $us=$newgallery->id;
                $user = User::create([
                    'username' =>$username ,
                    'email' => $googleUser->email,
                    'password' => bcrypt(\Str::random(16)),
                    'gallery_id' => $us,
                    'two_factor_type' =>'off',
                    'created_at'=> Jalalian::now(),
                    'updated_at' => Jalalian::now()
                ]);
            }
            if($user){

                if (!$user->gallery_id ||$user->gallery_id=='1' || $user->gallery_id=='2' ){
                    $mime='';
                    $header=get_headers($googleUser->avatar);
                    if(in_array('Content-Type: image/jpeg',$header)){
                        $mime='JPEG';
                    }
                    elseif (in_array('Content-Type: image/png',$header)){
                        $mime='PNG';
                    }
                    $path='storage/Image/Users/'.$username .'.'. $mime;
                    $size=file_put_contents(public_path($path), file_get_contents($googleUser->avatar));

                    $newgallery= Gallery::create([
                        'title' => $username ,
                        'alt'  => $googleUser->name,
                        'size' => $size,
                        'mime' => $mime,
                        'path'=> str_replace('storage','public',$path),
                        'flag'=> 'users',
                        'created_at'=> Jalalian::now(),
                        'updated_at' => Jalalian::now()
                    ]);
                    $user->update([
                        'gallery_id' => $newgallery->id
                    ]);
                }
            }
            if(!$user->hasVerifiedEmail()){
                $user->markEmailAsVerified();
            }
            auth()->loginUsingId($user->id);

            return$this->loggendin($request , $user) ?: redirect()->intended(RouteServiceProvider::HOME);

        }
        catch (\Exeption $e){

            Alert::error( 'ورود با گوگل با موفقیت انجام نشد','error');
            return redirect('/login');
        }

    }
}
