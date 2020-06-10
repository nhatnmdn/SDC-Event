<?php

namespace App;

use App\Model\RegistrationEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    const Public = 1;
    const Private = 0;

    protected $table = 'events';
    protected $guarded = ['*'];

    public function registrationEvents(){
        return $this->hasMany(RegistrationEvent::class);
    }
}
