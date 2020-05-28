<?php

namespace App;

use App\Model\RegistrationEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [

    ];

    public function registrationEvents(){
        return $this->hasOne(RegistrationEvent::class);
    }
}
