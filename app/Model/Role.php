<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static $role = [
        'Admin'   => 1,
        'Manager' => 2,
        'User'    => 3,
    ];

    protected $fillable = [

    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
