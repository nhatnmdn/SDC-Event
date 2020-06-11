<?php


namespace App\Helpers;

use App\Model\Role;
use Auth;

class GlobalHelper
{
    public static function checkUserRole()
    {
        $user = Auth::user();

        return $user->role_id === Role::$role['User'];
    }

    public static function checkAdminRole()
    {
        $user = Auth::user();

        return $user->role_id === Role::$role['Admin'];
    }

    public static $message = [
        'register_success'        => [[
            'en' => 'Register success. Please login!',
            'vi' => 'Đăng ký thành công. Xin vui lòng đăng nhập!'
        ]],
        'login_success'        => [[
            'en' => 'Register success. Please login!',
            'vi' => 'Đăng ký thành công. Xin vui lòng đăng nhập!'
        ]],
        'send_mail_success'       => ['messages' => 'Send mail success. Please check your email!'],
        'reset_password_success'  => ['messages' => 'Reset password success. Please login!'],
        'change_password_success' => ['messages' => 'Change password success!'],
        'update_success'          => ['messages' => 'Update Information success!'],
    ];
}
