<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metakey extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['key','setting_id'];


    public function Setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
