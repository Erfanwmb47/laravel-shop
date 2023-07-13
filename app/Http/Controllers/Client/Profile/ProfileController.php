<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Client\ClientController;
use App\Models\ActiveCode;
use App\Models\Address;
use App\Models\County;
use App\Models\Profile;
use App\Models\Province;
use App\Notifications\ActiveCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //dd($user);
        $addresses = address::query()->where('user_id',$user->id)->get();
       // dd($user);

           return view('Client.Profile.Index',[
               'user' => $user,
               'addresses' => $addresses,
               'province'=> Province::all(),
               'county'=> County::all(),
               'roles' => $user->role_id,
           ]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        dd('hi');
    }

    public function TwofactorAuth()
    {
        $user = Auth::user();
        return view('Client.Profile.TwoFactorAuth',[
            'user' => $user
        ]);
    }
    public function TwofactorAuthpost(Request $request){
                /*    return $request->all();*/
        $data=$request->validate([
           'type' => 'required | in:off,SMS',
            'phone'=>['required_unless:type,off', Rule::unique('users','phone')->ignore($request->user()->id)]

        ]);

        if ($data['type'] === 'SMS'){
            //TODO farda
            if($request->user()->phone !== $data['phone']){
                //create new code send to user
                $code=ActiveCode::GenerateCode(Auth::user());
                $request->session()->flash('phone',$data['phone']);
               //TODO send SMS
                //return $code;
                $request->user()->notify( new ActiveCodeNotification($code,$data['phone']));
                Alert::toast('کد با موفقیت پیامک شد', 'success');

                return redirect(route('profile.2fa.phone'));
            }
            else{
                $request->user()->update([
                    'two_factor_type' => 'SMS'
                ]);
            }
        }
        elseif ($data['type'] === 'off'){
            $request->user()->update([
               'two_factor_type' => 'off'

            ]);

        }

        return back();
    }

    public function getPhoneVerify(Request $request)
    {
        if(! $request->session()->has('phone')){
            return redirect(route('profile.twoFactorAuth'));
        }
        $request->session()->reflash();


        $user = Auth::user();
        return view('Client.Profile.Phone-Verify',[
            'user' => $user
        ]);
    }
    public function postPhoneVerify(Request $request)
    {
        if(! $request->session()->has('phone')){
            return redirect(route('profile.twoFactorAuth'));
        }
        $request->validate([
           'token' => 'required'
        ]);
        //v inja vasl sode input hastesh
        $v=implode($request->token);
      $status=  ActiveCode::VerifyCode($v,$request->user());

      if($status){
        Auth::user()->activeCode()->delete();
        Auth::user()->update([
            'two_factor_type' => 'SMS',
            'phone' => $request->session()->get('phone')
        ]);
                  Alert::success('عملیات موفقیت آمیز بود', 'تایید دو مرحله ای فعال شد');
      }
          else{
            Alert::error('عملیات ناموفقی بود', 'اشتباهی پیش اومده لطفا دوباره امتحان کنید');
          }
        return redirect(route('profile.twoFactorAuth'));
    }
}
