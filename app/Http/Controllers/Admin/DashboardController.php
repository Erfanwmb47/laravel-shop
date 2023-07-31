<?php

namespace App\Http\Controllers\Admin;

use App\Models\Metakey;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    public function index()
    {

        return view('Admin.Dashboard');
    }
}
