<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Client\Cart\PaymentController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\s;

class OrderController extends Controller
{
    public function index(Request $request)
    {
//        dd($request);
        return view('Client.Profile.Orders.index',[
            'orders' => Auth::user()->order
        ]);
    }

    public function showDetails(Order $order)
    {
   // dd($order->user);
        $this->authorize('view',$order);
//        /$order=$order->latest('created_at');
        return view('Client.Profile.Orders.detail',compact('order'));
    }

    public function payment(Order $order)
    {   //TODO taghire gheymat bad az dargah
        $this->authorize('view',$order);
        $gatewayurl=PaymentController::payping(1123,$order);
        return redirect($gatewayurl);

    }
}
