<?php


namespace App\Http\Controllers\Auth;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Model\User;
use Auth;

class LoginController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $params = $request->except('_token');

        if (Auth::attempt($params)) {
            if (GlobalHelper::checkUserRole()) {

                return redirect(route('index'));
            }

            return redirect(route('admin.home'))->with('messages',__('login_success'));
        }

        return back()->withErrors(__('Wrong Username or Password'))->withInput();

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();

            return redirect(route('index'));
        }

        return abort(401);
    }
}
