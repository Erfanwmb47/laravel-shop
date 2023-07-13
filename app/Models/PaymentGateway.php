<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
