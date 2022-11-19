<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\Gallery;
use App\Models\Province;
use App\Models\Role;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('Admin.Users.Index',[
            'users'=>$users
        ]);
    }
    public function indexpaginate(Request $request)
    {
        // dd($request->pagezz);
        $users = User::paginate($request->pagez);
        return view('Admin.users.Index',[

            'users'=> $users

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd(Role::all()->except('1'));
        return view('Admin.Users.Create',[
        'roles'=>Role::all()->except('1'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagePath = null;
        if (!$request->file('image')){
//            dd('first if');
            if ($request->get('sex') == '1'){
//                dd('man');
                $imagePath  = 'public/Image/Users/Avatar/default_man_avatar01.png';
            }
            elseif ($request->get('sex') == '0'){
//                dd('woman');
                $imagePath  = 'public/Image/Users/Avatar/default_woman_avatar01.png';
            }
        }
        else{
//            dd('else');
            $imagePath = $request->file('image')->storeAs('public/Image/Users',$request->file('image')->getClientOriginalName());

        }
//        dd($imagePath);
//        dd($request);

        User::query()->create([
            'firstName' => $request->get('firstName'),
            'lastName' =>$request->get('lastName'),
            'image' =>$imagePath,
            'description' =>$request->get('description'),
            'username' =>$request->get('username'),
            'email' =>$request->get('email'),
            'sex' =>$request->get('sex'),
            'role_id' =>$request->get('role'),
            'password' =>Hash::make($request->get('password')),
            'phone' =>$request->get('phone'),
//            'verifyPassword' =>$request->get('verifyPassword'),
            'birthDay' =>$request->get('birthDay')
        ]);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
//        dd(Address::query()->orderByDesc('default')->where('user_id',$user->id)->get());
//       $user = User::findOrFail($users);
       $addresses = Address::query()->orderByDesc('default')->where('user_id',$user->id)->get();
//       dd($addresses);
//       dd($addresses->isEmpty());
//       dd($addresses->default);
        if($user->role->id == 1) {
            return view('Admin.Users.Edit', [
                'user' => $user,
                'addresses' => $addresses,
                'province' => Province::all(),
                'county' => County::all(),
                'roles' => '1',
            ]);
        }
        else
            {
                return view('Admin.Users.Edit', [
                    'user' => $user,
                    'addresses' => $addresses,
                    'province' => Province::all(),
                    'county' => County::all(),
                    'roles' => Role::all()->except('1'),
                ]);
            }
        }

    public function selfEdit()
    {
        $user = Auth::user();
        $addresses = address::query()->where('user_id',$user->id)->get();

//        dd($user);
        return view('Admin.Users.Edit',[
            'province'=> Province::all(),
            'county'=> County::all(),
            'user'=> $user,
            'addresses' => $addresses,
            'roles' => '1'
         ]);
        //TODO تغییر نقش صفحه سلف ادیت
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $users)
    {
        $user = User::findOrFail($users);

//        dd($request->get('confirmPassword'));
        if (!$request->get('password')) {
            User::query()->where('id', $users)->update([
                'firstName' => $request->get('firstName'),
                'lastName' => $request->get('lastName'),
//            'image' =>$imagePath,
                'description' => $request->get('description'),
//            'username' =>$request->get('username'),
                'email' => $request->get('email'),
                'sex' => $request->get('sex'),
                'role_id' => $request->get('role'),

//            'password' =>$request->get('password'),
                'phone' => $request->get('phone'),
//            'verifyPassword' =>$request->get('verifyPassword'),
                'birthDay' => $request->get('birthDay')
            ]);
        }
        elseif ($request->get('password')){
            User::query()->where('id', $users)->update([
                'firstName' => $request->get('firstName'),
                'lastName' => $request->get('lastName'),
//            'image' =>$imagePath,
                'description' => $request->get('description'),
//            'username' =>$request->get('username'),
                'email' => $request->get('email'),
                'sex' => $request->get('sex'),
                'role_id' => $request->get('role'),

                'password' =>Hash::make($request->get('password')),
                'phone' => $request->get('phone'),
//            'verifyPassword' =>$request->get('verifyPassword'),
                'birthDay' => $request->get('birthDay')
            ]);
        }
        return redirect(route('users.edit',$user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        address::query()->orderByDesc('default')->where('user_id',$user->id)->delete();
        $user->delete();
        return redirect(route('users.index'));
    }
    public function multiDestroy(Request $request)
    {
        $data=$request->except('_token','_method','deleteAll');
//        dd($request);
        foreach($data as $key=>$value)
        {
            address::query()->orderByDesc('default')->where('user_id',$key)->delete();
            User::query()->where('username',$value)->delete();
        }
        return redirect(route('users.index'));
    }

}
