<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetSuccess extends Notification
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
        return (new MailMessage)
            ->line('Bạn đã thay đổi mật khẩu thành công.')
            ->line('Nếu bạn đã thay đổi mật khẩu, không cần thực hiện thêm hành động nào.')
            ->line('Nếu bạn không thay đổi mật khẩu, hãy bảo vệ tài khoản của bạn.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
