<?php

namespace App\Http\Controllers\Admin;

use App\Models\Metakey;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    public function index()
    {

        $this->seo()
            ->setTitle('پنل مدیریت سینویا')
            ->setDescription('سایت سینویا')
        ;
        $this->seo()->opengraph()->setTitle('پنل مدیریت سینویا');

        return view('Admin.Dashboard');
    }
}
