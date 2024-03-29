<?php

namespace App\Http\Controllers\Admin\Order\PaymentHistory;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Payment;
use Illuminate\Http\Request;

class PayementHistoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Admin.Orders.Payments.index',[
            'payments' => $this->PaginatePagez(Payment::query(),$request,['id','res_number'],[''])
        ]);
    }

    public function successIndex(Request $request)
    {
        return view('Admin.Orders.Payments.index',[
            'payments' => $this->PaginatePagez(Payment::whereStatus('1'),$request,['id','res_number'],[''])
        ]);
    }
    public function failedIndex(Request $request)
    {
        return view('Admin.Orders.Payments.index',[
            'payments' => $this->PaginatePagez(Payment::whereStatus('0'),$request,['id','res_number'],[''])
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
