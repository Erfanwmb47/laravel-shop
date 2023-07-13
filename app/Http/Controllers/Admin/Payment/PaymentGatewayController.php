<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Gallery;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentGatewayController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Admin.PaymentGateway.Index',[
            'paymentGateways' => $this->PaginatePagez(PaymentGateway::query(),$request,['name','description'],[''])
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
     * @param  \App\Models\PaymentGateway  $paymentgateway
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentGateway $paymentgateway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentGateway  $paymentgateway
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentGateway $paymentgateway)
    {
        return view('Admin.PaymentGateway.Edit',[
            'paymentGateway' => $paymentgateway,
            'galleries' => Gallery::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentGateway  $paymentgateway
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentGateway $paymentgateway)
    {
        $paymentgateway->update($request->all());
        $paymentgateway->update([
            'gallery_id' => $request->selectedImage
        ]);
        toast('درگاه مورد نظر با موفقیت ویرایش شد','success');
        return  redirect(route('paymentgateways.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentGateway  $paymentgateway
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentGateway $paymentgateway)
    {
        $paymentgateway->delete();
        toast('درگاه مورد نظر با موفقیت حذف شد','success');
        return  redirect(route('paymentgateways.index'));
    }
}
