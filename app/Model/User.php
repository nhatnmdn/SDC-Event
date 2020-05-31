<?php

namespace App\Model;

use App\Helpers\GlobalHelper;
use App\Mail\ResetPasswordMail;
use Auth;
use Exception;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Log;
use Mail;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        "name",
        "password",
        "email",
        "address",
        "phone",
        "avatar",
        "status",
        "role_id",
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function registrationEvents()
    {
        return $this->belongsToMany(RegistrationEvent::class);
    }

    public function login($params)
    {
        if (Auth::attempt($params)) {
            if (GlobalHelper::checkUserRole()) {
                return true;
            }

            //Return view Admin site;
        }
    }

    public function store($params)
    {
        $params['password'] = bcrypt($params['password']);

        return User::create($params);
    }

    public function sendPasswordMail($email)
    {

        $user = User::where('email', $email)->first();

        try {
            Mail::to($user->email)->send(new ResetPasswordMail($user));

            return true;

        } catch (Exception $exception) {
            Log::error($exception);

            return false;
        }
    }

    public function updatePasswordUser($params)
    {
        $user = Auth::user();

        if (Hash::check($params['current_password'], $user->getAuthPassword())) {
            $new_password = [
                'password' => bcrypt($params['new_password']),
            ];

            $user->update($new_password);

            return true;
        }

        return false;
    }

    public function updateUser($params, $avatar)
    {
        $userId = User::where('email', $params['email'])->first()->id;

        if (!empty($avatar)) {
            $this->updateAvatar($avatar, $userId);
        }

        return User::find($userId)->update($params);
    }

    public function updateAvatar($avatar, $userId)
    {
        $avatarName = $avatar->getClientOriginalName();
        $path       = 'avatar/' . $userId . '/';
        $data       = ['avatar' => $path . $avatarName];

        $avatar->move(public_path($path), $avatarName);

        $user = User::where('id', $userId)->first();

        return $user->update($data);
    }
}
