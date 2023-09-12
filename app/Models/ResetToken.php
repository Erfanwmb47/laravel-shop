<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class ResetToken extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable=[

        'user_id',
        'code',
        'expired_at'
    ];
    public $timestamps=false;



    public function user(){

        return $this->belongsTo(User::class);
    }

    public function scopeVerifyCode($query,$token,$user){
        return !! $user->resetToken()->whereCode($token)->where('expired_at','>',Jalalian::now())->first();
    }



    public function scopeGenerateCode($query,$user){
        //dd($user);
        if($code = $this->getAliveCodeForUser($user)){
            $code=$code->code;
        }
        else{
            do{
                $code=mt_rand(100000,999999);
            }while($this->CheckCodeIsUnique($user,$code));

            $user->resetToken()->create([
                'code' => $code,
                'expired_at'=> Jalalian::now()->addMinutes(10)
            ]);
        }
        return $code;
    }

    private function CheckCodeIsUnique($user, int $code)
    {
        return !! $user->resetToken()->whereCode($code)->first();
    }

    private function getAliveCodeForUser($user)
    {
        return $user->resetToken()->where('expired_at','>',Jalalian::now())->first();
    }
}
