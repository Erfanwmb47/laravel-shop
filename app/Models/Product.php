<?php

namespace App\Models;

use App\ProductAttributeValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
//    use searchable;
    use HasFactory;

    protected $fillable=[
        'name',
        'nickName',
        'price',
        'isbn',
        'volume' ,
        'weight' ,
        'quantity' ,
        'maxOrder'  ,
        'offer' ,
        'averageRate',
        'abstract',
        'description' ,
        'property' ,
        'meta' ,
        'sales',
        'brand_id',
        'view_count' ,
        'gallery_id' ,
        'user_id',
        'UPC'
    ];
    public function galleries(){
        return $this->belongsToMany(Gallery::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);

    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class)->using(ProductAttributeValue::class)->withPivot('value_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }
}
