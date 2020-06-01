<?php

namespace App\Model;

use App\Event;
use Illuminate\Database\Eloquent\Model;

class RegistrationEvent extends Model
{
    protected $table = 'registration';
    protected $fillable = ['*'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function events(){
        return $this->hasOne(Event::class);
    }
}