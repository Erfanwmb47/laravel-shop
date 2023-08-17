<?php

namespace App\Models;

use App\Models\order\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[

        'address',
      'price',
      'amount',
      'status',
      'tracking_serial',
      'cardNumber',
      'transportation_id' ,
      'transportation_cost'  ,
        'final_cost',
        'recipient_name',
        'recipient_phone',
        'paymentGateway_id',
        'cart_cost',
        'score',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity','price','PriceWithDiscount');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }
    public function paymentGateway()
    {
        return $this->hasOne(Transportation::class);
    }

    public function address()
    {
        return $this->hasOne(AddressOrder::class);
    }

    public function discount()
    {
        return $this->belongsToMany(Discount::class);
    }

    public function status_history()
    {
     return $this->hasMany(OrderStatus::class);
    }

}
