<?php

namespace App\Models\Shop;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopComment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'user_id',
        'product_id',
        'text',
        'status',
        'positive',
        'negative'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reaction()
    {
        return $this->hasMany(ReactionComment::class);
    }

    public function like()
    {
        return $this->hasMany(ReactionComment::class)->where('reaction','=','like')->count();
    }
    public function dislike()
    {
        return $this->hasMany(ReactionComment::class)->where('reaction','=','like')->count();
    }
}
