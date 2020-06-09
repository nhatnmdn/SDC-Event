<?php


namespace App\Http\Controllers\Auth;


use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Model\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    protected $message;
    protected $user;

    public function __construct()
    {
        $this->message = GlobalHelper::$message;
        $this->user    = new User();
    }

    public function showForgotForm()
    {
        return view('user.auth.forgot');
    }

    public function sendPasswordMail(ForgotPasswordRequest $request)
    {
        $email = $request->get('email');

        $status = $this->user->sendPasswordMail($email);

        if ($status) {
            return redirect(route('login.form'))->with($this->message['send_mail_success']);
        }

        return back()->withErrors(__('Send mail failed. Please send mail again'))->withInput();
    }

    public function passwordResetForm(Request $request)
    {
        $email = $request->get('email');

        $userID = User::where('email', $email)->first()->id;

        return view('user.auth.reset_password', compact('userID'));
    }

    public function passwordReset(ResetPasswordRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        $params['password'] = bcrypt($params['password']);

        User::find($params['id'])->update($params);

        return redirect(route('login.form'))->with($this->message['reset_password_success']);

    }
}
