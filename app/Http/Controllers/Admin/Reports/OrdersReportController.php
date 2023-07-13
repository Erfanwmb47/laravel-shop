<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Psr\Log\NullLogger;

class OrdersReportController extends AdminController
{
    public function orderReport(Date $start=null,Date $end=null,$type=null)
    {
       // modify bara kam kardane time o date
       // new carbon baraye set kardane date
        //Route xx in dashboard/xx hastesh
        //TODO inja bayad view begire

        //$start=now()->modify('-1years');

       // $type='paid';
        //$start=new Carbon('2023-04-01');
        if (!isset($start)) $start=new Carbon('2020-01-01');
        if (!isset($end)) $end=now();

        if(isset($type)) {
            return Order::where('status', $type)
                ->whereBetween('created_at',[$start,$end])
                ->get();

        }
        else {
            return Order::whereBetween('created_at',[$start,$end])
                ->get();
        }


    }
}

