<?php

namespace App\Http\Controllers\Admin\User\Address;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Address;
use Illuminate\Http\Request;


class AddressController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Address::query()->create([
            'province_id' => $request->get('province'),
            'county_id' => $request->get('county'),
            'tel' => $request->get('tel'),
            'postalCode' => $request->get('postalCode'),
            'detail' => $request->get('detail'),
            'user_id'=>$request->get('userId'),
        ]);
        return redirect(route('users.edit',$request->get('userId')));
//        return redirect()->intended(RouteServiceProvider::selfEdit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request)
    {
        dd($request);
        $user = Address::query()->select('user_id')->where('id',$request->get('addressId'))->first();

        if ($request->get('setDefault') && $request->get('setDefault') == 1){
            Address::query()->whereIn('user_id',$user)->where('default','=','1')->update([
                'default' => '0',
            ]);
            Address::query()->where('id',$request->get('addressId'))->update(['default' => $request->get('setDefault')]);
        }
//        dd($user)
        Address::query()->where('id',$request->get('addressId'))->update([
            'province_id' => $request->get('province'),
            'county_id'=>$request->get('county'),
            'postalCode'=>$request->get('postalCode'),
            'tel'=>$request->get('tel'),
            'detail'=>$request->get('detail')
        ]);
        return redirect(route('users.edit',$user->user_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $user = $address->user_id;
        $def = $address->default;
        $address->delete();
        $temp = Address::query()->where('user_id', $user)->first();
        if ( $def == 1 && $temp) {
            Address::query()->where('user_id', $user)->first()->update([
                'default' => '1'
            ]);
//            $temp->default = 1;
        }
    }

    public static function addressToString(Address $address)
    {
        return [$address->province->name,$address->county->name,$address->postalCode,$address->detail];
    }
}
