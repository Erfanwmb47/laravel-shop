<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable=[
      'name','code','percent','price','maxUse','maxUserUsage','maxCost','expired_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function transportations()
    {
        return $this->belongsToMany(Transportation::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
