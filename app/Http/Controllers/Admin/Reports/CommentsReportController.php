<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class CommentsReportController extends AdminController
{
    public function commentReport(Date $start=null,Date $end=null,$approved=null)
    {
        $approved='allow';
        $approved='deny';

        if (!isset($start)) $start=new Carbon('2020-01-01');
        if (!isset($end)) $end=now();

        if(isset($type)) {
            return Comment::where('approved', $type)
                ->whereBetween('created_at',[$start,$end])
                ->get();

        }
        else {
            return Comment::whereBetween('created_at',[$start,$end])
                ->get();
        }
    }
}
