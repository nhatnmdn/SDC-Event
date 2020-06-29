<?php

namespace App\Model;

use App\Filters\UserFilter;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Helpers\GlobalHelper;
use App\Mail\ResetPasswordMail;
use Auth;
use Exception;
use Hash;
use Log;
use Mail;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'status',
        'avatar',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function registrationEvents()
    {
        return $this->hasMany(RegistrationEvent::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
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

    public function getUsers(UserFilter $userFilter, $limits, $search, $searchKey)
    {
        $query = User::query();

        if (!empty($searchKey) && !empty($search)) {
            $query = $userFilter->search($query, $search, $searchKey);
        }

        return $query->orderByDesc('created_at')->paginate($limits);
    }
}
