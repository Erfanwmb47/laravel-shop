<?php

namespace App\Models\order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public $timestamps=false;
    use HasFactory;

    protected $fillable=[
        'order_id',
        'before_status',
        'after_status',
        'created_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
