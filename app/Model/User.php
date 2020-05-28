<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [

    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function registrationEvents()
    {
        return $this->belongsToMany(RegistrationEvent::class);
    }
}
