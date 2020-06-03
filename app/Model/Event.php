<?php

namespace App;

use App\Model\RegistrationEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';
    protected $guarded = ['*'];

    public function registrationEvents(){
        return $this->hasOne(RegistrationEvent::class);
    }
}
