<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SignupActivate extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url('/api/signup/activate/'.$notifiable->activation_token);

        return (new MailMessage)
        ->subject('Xác thực tài khoản')
        ->line('Cảm ơn bạn đã đăng ký! Vui lòng trước khi bạn bắt đầu, bạn phải xác nhận tài khoản của bạn.')
        ->action('Confirm Account', url($url))
        ->line('Cảm ơn bạn đã sử dụng ứng dụng của chúng tôi!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
