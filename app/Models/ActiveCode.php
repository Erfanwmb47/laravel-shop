<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class ActiveCode extends Model
{
/*    protected $table='active_code';*/
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
        return !! $user->activeCode()->whereCode($token)->where('expired_at','>',Jalalian::now())->first();
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

            $user->activeCode()->create([
               'code' => $code,
               'expired_at'=> Jalalian::now()->addMinutes(10)
            ]);
        }
        return $code;
    }

    private function CheckCodeIsUnique($user, int $code)
    {
        return !! $user->activecode()->whereCode($code)->first();
    }

    private function getAliveCodeForUser($user)
    {
        return $user->activeCode()->where('expired_at','>',Jalalian::now())->first();
    }
}

