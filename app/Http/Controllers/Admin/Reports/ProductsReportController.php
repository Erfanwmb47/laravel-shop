<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class ProductsReportController extends AdminController
{
    public function productsCount()
    {

    }

    public function productReport(Date $start=null,Date $end=null,$status=null)
    {
        $status='active';
        $status='deActive';

        if (!isset($start)) $start=new Carbon('2020-01-01');
        if (!isset($end)) $end=now();

        if(isset($type)) {
            return Product::where('status', $type)
                ->whereBetween('created_at',[$start,$end])
                ->get();

        }
        else {
            return Product::whereBetween('created_at',[$start,$end])
                ->get();
        }



    }


}
