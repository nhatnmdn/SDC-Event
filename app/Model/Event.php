<?php

namespace App;

use App\Model\RegisterEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';
    protected $guarded = ['*'];

    public function registerEvents(){
        return $this->hasMany(RegisterEvent::class, 'event_id');
    }
}
