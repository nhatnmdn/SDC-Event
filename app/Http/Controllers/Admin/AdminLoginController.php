<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required|min:3|max:32',
        ],
            [
                'email.required'    => 'Bạn chưa nhập Email',
                'password.required' => 'Mật khẩu không đúng',
                'password.min'      => 'Mật khẩu nhỏ hơn 3 kí tự',
                'password.max'      => 'Mật khẩu lớn hơn 32 kí tự',
            ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.home')->with('login', 'Đăng nhập thành công !');

        } else {

            return redirect()->route('admin.auth');
        }
    }

    public function LogoutAdmin()
    {
        Auth::logout();

        return redirect()->route('admin.auth');
    }
}
