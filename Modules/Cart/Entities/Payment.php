<?php

namespace Modules\Cart\Entities;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;protected $fillable=[
    'resNumber',
    'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /*public function payments()
    {
        return $this->hasMany(Payment::class);
    }*/
}
