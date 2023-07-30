<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Address;
use App\Models\AdminLog;
use App\Models\County;
use App\Models\Gallery;
use App\Models\Metakey;
use App\Models\Province;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Morilog\Jalali\Jalalian;


class UserController extends AdminController
{

        public function __construct()
        {
            View::share('shop_name',json_decode(Metakey::where('key','shop_name')->first()->Setting->object));

            $this->middleware('can:show-users')->only(['index']);
            $this->middleware('can:edit-user')->only(['edit','update']);
            $this->middleware('can:create-user')->only(['create','store']);
            $this->middleware('can:delete-user')->only(['destroy']);
        }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        return view('Admin.Users.Index',[
            'users'=>$this->PaginatePagez(User::query(),$request,['email','username','firstName','lastName'],['gallery','title']),
        ]);

    }
/*    public function indexpaginate(Request $request)
    {
        // dd($request->pagezz);
        $users = User::paginate($request->pagez);
        return view('Admin.users.Index',[

            'users'=> $users

        ]);
    }*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $gallery_id = null;
        if (!$request->file('image')){
            if($request->get('sex') == 'man') $gallery_id=1;
            else if($request->get('sex') == 'woman') $gallery_id=2;
        }
        else{
            $imagePath = $request->file('image')->storeAs('public/Image/Users',$request->file('image')->getClientOriginalName());
            $object= explode("/",$request->file('image')->getClientMimeType());

            $gallerynew=Gallery::query()->create([
                'title' => $request->file('image')->getClientOriginalName(),
                'alt' =>$request->file('image')->getClientOriginalName(),
                'mime' => $object[1],
                'flag' => 'users',
                'path' => $imagePath,
                'size' => $request->file('image')->getSize()/1024,
                'created_at'=> Jalalian::now(),
             'updated_at'=> Jalalian::now()
            ]);
            if(!$gallery_id) $gallery_id=$gallerynew->id;
        }
       $user= User::query()->create([
            'firstName' => $request->get('firstName'),
            'lastName' =>$request->get('lastName'),
            'gallery_id' =>$gallery_id,
            'description' =>$request->get('description'),
            'username' =>$request->get('username'),
            'email' =>$request->get('email'),
            'sex' =>$request->get('sex'),
            'role_id' =>$request->get('role'),
            'password' =>Hash::make($request->get('password')),
            'phone' =>$request->get('phone'),
            'birthDay' =>$request->get('birthDay')
        ]);
        if($request->has('verifyEmail')){
            $user->markEmailAsVerified();

        }
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //dd($user->gallery->path);
            $comments  = $user->comments->take(5)->sortDesc();
//            $orders = $user->orders();

           return view('Admin.Users.Edit', [
               'user' => $user,
               'addresses' => $user->addresses->sortBy('default')->reverse(),
               'comments' =>$comments,
               'province' => Province::all(),
               'county' => County::all(),
               'roles' => '1',
               'galleries' => Gallery::all(),
           ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $data=$request->validate([
            'email' => ['required','email','string','max:255',Rule::unique('users')->ignore($user->id)]
        ]);

        if(! is_null($request->password)){

            $request->validate([
                'password'=>['required','string','min:8','confirmed']
            ]);

            $data['password']=$request->password;
        }

        $user->update($data);

        if($request->has('verifyEmail')){
            $user->markEmailAsVerified();}


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
        foreach($data as $key=>$value)
        {
            address::query()->orderByDesc('default')->where('user_id',$key)->delete();
            User::query()->where('username',$value)->delete();
        }
        return redirect(route('users.index'));
    }

    public function imageUpdate( Request $request,User $user)
    {
        if ($request->get('selectedImage') == 'uploadedImage')
        {        $object= explode("/",$request->file('image')->getClientMimeType());
            $imagePath = $request->file('image')->storeAs('public/Image/Users',$request->get('title') . '.'. $object[1]);
            $h=Gallery::query()->create([
                'title' => $request->get('title'),
                'alt' =>$request->get('alt'),
                'mime' => $object[1],
                'path' => $imagePath,
                'flag' => 'Brands',
                'size' => $request->file('image')->getSize()/1024,
                'updated_at' => Jalalian::now()
            ]);
            $imagePath=$h->id;
            AdminLog::InsertLog(Auth::user(),'gallery','create',$h->id);
        }
        else
        {
            $imagePath= $request->get('selectedImage');

        }
        $user->update([
            'gallery_id'=> $imagePath,
            'updated_at' => now()
        ]);
        return back();
    }

}
