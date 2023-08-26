<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AddressOrder extends Model
{
    use HasFactory;
    protected $table='address_order';
    protected $guarded = [];

    public function county(){
        return $this->belongsTo(County::class);
    }
    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }

}
