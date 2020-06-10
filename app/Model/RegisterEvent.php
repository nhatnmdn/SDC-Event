<?php

namespace App\Model;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class RegisterEvent extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'register_events', 'id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'register_events', 'id');
    }
}

