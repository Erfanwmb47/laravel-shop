<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class RegisterWithSms extends Model
{
        protected $table='register_with_sms';
    use HasFactory;

    protected $fillable=[

        'phone',
        'code',
        'expired_at'
    ];
    public $timestamps=false;




    public function scopeVerifyCode($query,$token,$phone){
       // dd($this->wherePhone($phone));
        //return !! $phone->RegisterWithSms()->whereCode($token)->where('expired_at','>',Jalalian::now())->first();

        return !! $this->wherePhone($phone)->whereCode($token)->where('expired_at','>',Jalalian::now())->first();
    }

    public function scopeGenerateCode($query,$phone){
        //dd($phone);
        if($code = $this->getAliveCodeForPhone($phone)){
            $code=$code->code;
        }
        else{
            do{
                $code=mt_rand(100000,999999);
            }while($this->CheckCodeIsUnique($phone,$code));

            $this->create([
                'phone' => $phone,
                'code' => $code,
                'expired_at'=> Jalalian::now()->addMinutes(10)
            ]);
        }
        return $code;
    }

    private function CheckCodeIsUnique($phone, int $code)
    {
        return !! $this->wherePhone($phone)->whereCode($code)->first();
    }

    private function getAliveCodeForPhone($phone)
    {
        return $this->where('phone',$phone)->where('expired_at','>',Jalalian::now())->first();
    }
}
