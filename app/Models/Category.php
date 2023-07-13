<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function parent(){

            return $this->belongsTo(Category::class,'category_id');
    }
    public function children(){

        return $this->hasMany(Category::class,'category_id');
    }
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }

}
