<?php
namespace App\Channels;
use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;
class SMSchannel
{
    public function send($notifiable ,Notification $notification )
    {
        $number = $notifiable->cellphone;
        $temp = "hamtakeshtsepahanlogin";
        $param = $notification->code;
        $api = new GhasedakApi(env('GHASEDAK_API_KEY'));
        $api->Verify($number , $temp , $param);
        return 'done';
    }
}
