<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakSmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActiveCodeNotification extends Notification
{
    use Queueable;
    public $code ;
    public $phonenumber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($code,$phonenumber)
    {
        $this->code = $code;
        $this->phonenumber=$phonenumber;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        //delivery channel
        return [GhasedakSmsChannel::class];
    }
    public function toGhasedakSms($notifibale){
        return [
            'text' => "کد احراز هویت شما {{$this->code}} \n وب سایت ما",
            'phonenumber'=> $this->phonenumber
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

}
