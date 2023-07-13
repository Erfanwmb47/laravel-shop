<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class AdminLog extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function InsertLog($user, $controller, $func, $id = '')
    {

        AdminLog::query()->create([
            'user_id' => $user->id,
            'detail' => $user->username . ' ' . $func . ' ' . $controller . ' ' . $id,
            'created_at' => Jalalian::now(),
            'updated_at' => Jalalian::now()
        ]);
    }

}
