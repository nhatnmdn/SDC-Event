<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequest extends Notification
{
    use Queueable;

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url('/api/find/'.$this->token);
        return (new MailMessage)
            // ->line('Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.')
            // ->action('Reset Password', url($url))
            ->line('Mã thay đổi mật khẩu của bạn là: '.$this->token)
            ->line('Nếu bạn không yêu cầu đặt lại mật khẩu, không cần thực hiện thêm hành động nào.');
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
