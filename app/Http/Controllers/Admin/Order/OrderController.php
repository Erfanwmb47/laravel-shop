<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Admin\AdminController;
use App\Models\County;
use App\Models\Order;
use App\Models\order\OrderStatus;
use App\Models\Payment;
use App\Models\Province;
use App\Models\Transportation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use mysql_xdevapi\Exception;

class OrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if (isset($request->status)){
                return view('Admin.Orders.index', [
                    'orders' => $this->PaginatePagez(Order::where('status','=',$request->status,'and'), $request,
                        ['status', 'tracking_serial', 'recipient_name', 'recipient_phone'],
                        ['user', 'username', 'email', 'phone'])
                ]);
            }

            else{
        return view('Admin.Orders.index', [
            'orders' => $this->PaginatePagez(Order::query(), $request, ['tracking_serial', 'status', 'recipient_name', 'recipient_phone'], ['user', 'username', 'email', 'phone'])
        ]);
    }

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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
       // dd($order->payments);
        $transportations=Transportation::all();
        $provinces=Province::all();
        $counties=County::all();
        $address=json_decode($order->address);

        return view('Admin.Orders.edit',
            compact('order',
            'transportations',
            'provinces',
            'counties',
            'address',
        ));
    }

    public function detail(Order $order)
    {
        $payments=$order->payments;
        $address=json_decode($order->address);
        return view('Admin.Orders.detail',compact('order','address','payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {//dd($request);

        $validate_data=$request->validate([
           // 'status'=> ['required',Rule::in(['unpaid','paid','preparation','posted','received','canceled'])],
            'score'=>['numeric','required'],
            'final_cost'=>['numeric','required'],
            'transportation'=>['numeric','required'],
            'transportation_cost'=> ['numeric','required'],
            'recipient_name'=>['string','required'],
            'recipient_phone'=>['numeric','required'],
            'description'=>['max:1000'],
            'tracking_serial'=>['numeric'],
            'province_id' =>['string','required'],
            'county_id' =>['string','required'],
            'postalCode'=>['numeric'],
            'detail' => ['string'],
            'note' => ['max:1000']
        ]);
           // dd($validate_data);
        $order->update([
                'address' => json_encode([$validate_data['province_id'],
                    $validate_data['county_id'],
                    $validate_data['postalCode'],
                    $validate_data['detail']]),
            'final_cost' => $validate_data['final_cost'],
            'transportation_id'=>$validate_data['transportation'],
            'transportation_cost'=>$validate_data['transportation_cost'],
            'recipient_name'=>$validate_data['recipient_name'],
            'recipient_phone'=>$validate_data['recipient_phone'],
            'description'=>$validate_data['description'],
            'note'=>$validate_data['note'],
            'tracking_serial' => $validate_data['tracking_serial']
        ]);
        toast('ویرایش سفارش با موفقیت انجام شد','success');
        return redirect(route('orders.index')."?status=$order->status");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        toast('حذف سفارش با موفقیت انجام شد','success');
        return redirect(route('orders.index'));

    }

    public function changeStatusPaymentAdmin(Request $request)
    {
        try {
            $order=Order::find($request->order_id);
            OrderStatus::create([
                'order_id'=>$order->id,
                'before_status'=> $order->status,
                'after_status'=>$request->status,
                'created_at'=>now()
            ]);

            $order->update(['status' => $request->status]);
            return response(['status'=> 'success','order'=>$request->order_id,'payment_status'=>$request->status]);
        }catch (\Exception $exception){
            return response(['status' => $exception],404 );

        }
       // dd($request);
    }

    public function changeTrackingSerial(Request $request)
    {
        $validate_data=$request->validate([

            'tracking_serial'=>['numeric'],
        ]);
        $order=Order::find($request->order_id);
        $order->update([
            'tracking_serial' => $validate_data['tracking_serial']
        ]);
        return response(['status'=> 'success']);

    }

    public function invoice(Order $order)
    {
        return view('Admin.Orders.invoice',[
            'order' => $order
        ]);
    }

}
