<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class UsersReportController extends AdminController
{
    public function index()
    {
        return view('Admin.Reports.Users',[

        ]);
    }

    public function userReport(Date $start=null,Date $end=null,$sex=null)
    {
        $status='man';
        $status='woman';

        if (!isset($start)) $start=new Carbon('2020-01-01');
        if (!isset($end)) $end=now();

        if(isset($type)) {
            return User::where('status', $type)
                ->whereBetween('created_at',[$start,$end])
                ->get();

        }
        else {
            return User::whereBetween('created_at',[$start,$end])
                ->get();
        }
    }
    //
}
