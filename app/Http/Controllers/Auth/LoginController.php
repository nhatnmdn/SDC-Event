<?php


namespace App\Http\Controllers\Auth;

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

        $status = $this->user->login($params);

        if ($status) {
            return redirect(route('index'));
        }

        return back()->withErrors('Wrong Username or Password')->withInput();
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
