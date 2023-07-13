<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function county(){
        return $this->belongsTo(County::class);
    }
    public function province(){
       return $this->belongsTo(Province::class,'province_id');
    }
    //**//
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
