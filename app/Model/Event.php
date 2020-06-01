<?php

namespace App;

use App\Model\RegistrationEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
<<<<<<< Updated upstream
    protected $fillable = ['*'];
=======
    protected $table = 'events';
    protected $guarded = ['*'];


    const STATUS_PUBLIC = 0;
    const STATUS_PRIVATE = 1;

    protected $statusno = [
        0 => [
            'name' => 'Sắp diễn ra',
            'class' => 'label-info'
        ],

        1 => [
            'name' => 'Đang diễn ra',
            'class' => 'label-danger'
        ]

    ];
>>>>>>> Stashed changes

    public function getStatus(){
        return array_get($this->statusno, $this->status,'[N\A]');
    }

    public function registrationEvents(){
        return $this->hasOne(RegistrationEvent::class);
    }
}
