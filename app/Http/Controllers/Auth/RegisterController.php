<?php


namespace App\Http\Controllers\Auth;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Model\User;

class RegisterController extends Controller
{
    protected $message;
    protected $user;

    public function __construct()
    {
        $this->message = GlobalHelper::$message;
        $this->user    = new User();
    }

    public function showRegisterForm()
    {
        return view('user.auth.register');
    }

    public function store(CreateUserRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        $status = $this->user->store($params);

        if ($status) {
            return redirect(route('login.form'))->with($this->message['register_success']);
        }

        return back()->withErrors(__('Register Failed. Please check again'));

    }
}
