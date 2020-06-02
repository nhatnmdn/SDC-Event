<?php

namespace App;

use App\Model\RegistrationEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $guarded = ['*'];

    public function getStatus(){
        return array_get($this->statusno, $this->status,'[N\A]');
    }

    public function registrationEvents(){
        return $this->hasOne(RegistrationEvent::class);
    }
}
