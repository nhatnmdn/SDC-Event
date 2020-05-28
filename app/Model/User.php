<?php

namespace App\Model;

use App\Helpers\GlobalHelper;
use App\Mail\ResetPasswordMail;
use Auth;
use Exception;
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
}
