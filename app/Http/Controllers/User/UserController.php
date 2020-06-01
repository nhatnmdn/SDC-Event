<?php


namespace App\Http\Controllers\User;


use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordProfileRequest;
use App\Http\Requests\EditUserRequest;
use App\Model\User;
use Auth;

class UserController extends Controller
{
    protected $message;
    protected $user;

    public function __construct()
    {
        $this->message = GlobalHelper::$message;
        $this->user    = new User();
    }

    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        $userProfile = Auth::user();

        return view('user.profile', compact('userProfile'));
    }

    public function changePasswordUser()
    {
        $user = Auth::user();

        return view('user.profile_edit_password', compact('user'));
    }

    public function updatePasswordUser(ChangePasswordProfileRequest $request)
    {
        $params = $request->except('_token', 'password_confirmation');

        $status = $this->user->updatePasswordUser($params);

        if (!$status) {
            return back()->withErrors(['Current Password' => 'Wrong Current Password. Please try again!']);
        }

        return redirect(route('profile'))->with($this->message['change_password_success']);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    public function update(EditUserRequest $request)
    {
        $params = $request->except('_token', 'avatar');
        $avatar = $request->file('avatar');

        $status = $this->user->updateUser($params, $avatar);

        if (!$status) {
            return redirect(route('profile.update'))->withErrors('Update Failed. Please try again!');
        }

        return redirect(route('profile'))->with($this->message['update_success']);
    }
}
