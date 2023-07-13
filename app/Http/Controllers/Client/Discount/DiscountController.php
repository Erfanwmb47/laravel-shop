<?php

namespace App\Http\Controllers\Client\Discount;

use App\Helpers\Cart\Cart;
use App\Http\Controllers\Client\ClientController;
use App\Models\Discount;
use http\Exception;
use Illuminate\Http\Request;

class DiscountController extends ClientController
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        Cart::addDiscount(null);
        toast('کد تخفیف با موفقیت حذف شد','success');
        return back();
    }

    public function check(Request $request)
    {
    if (!auth()->user()) return back()->withErrors(['discount'=> 'برای استفاده از کد تخفیف وارد سایت شوید']);

    $validated_data=$request->validate([
                'discount'=> 'required|exists:discounts,code',
            ]);

            $discount=Discount::whereCode($validated_data['discount'])->first();

        if ($discount->expired_at < now()) return back()->withErrors(['discount'=>'مهلت استفاده از کد تخفیف به پایان رسیده است.']);

        if ($discount->users()->count()){
            if (! in_array(auth()->user()->id,$discount->users->pluck('id')->toArray())){
                return back()->withErrors([
                    'discount'=> 'شما قادر به استفاده از این کد تخفیف نیستید.'
                ]);
            }
        }


       // dd($cart);
        Cart::addDiscount($discount);
        //dd(session('cart'),Cart::all());
        return back();
    }

}
