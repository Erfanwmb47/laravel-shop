<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'eng_name',
        'gallery_id',
        'description',
        'factor_weight',
        'factor_volume',
        'const_distance',
        'cost'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }
}


