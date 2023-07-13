<?php

namespace App\Notifications\Channels;

use Ghasedak\Exceptions\ApiException;

use Ghasedak\Exceptions\HttpException;
use Illuminate\Notifications\Notification;
use function PHPUnit\Framework\throwException;


class GhasedakSmsChannel
{
    public function send($notifible, Notification $notification){

        if(! method_exists($notification , 'toGhasedakSms')){

            throw new  \Exception('toGhasedakSms not found');
        }

        $data=$notification->toGhasedakSms($notifible);
        $message = $data['text'];
        $receptor= $data['phonenumber'];
        $apikey=config('services.ghasedak.key');
       // dd(config('services.ghasedak.key'));
        try
        {
            $lineNumber = "";

            $api = new \Ghasedak\GhasedakApi($apikey);
            $api->SendSimple($receptor,$message,$lineNumber);
        }
        catch(ApiException $e){
            throw $e;
        }
        catch(HttpException $e){
            throw $e;
        }

    }
}
