<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReactionComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'comment_id',
        'user_id',
        'reaction',
    ];

    public function comment()
    {
        return $this->belongsTo(ShopComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
