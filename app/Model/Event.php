<?php

namespace App;

use App\Filters\EventFilter;
use App\Model\RegistrationEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    const Public  = 1;
    const Private = 0;

    protected $table   = 'events';
    protected $guarded = ['*'];

    public function registrationEvents()
    {
        return $this->hasMany(RegistrationEvent::class);
    }

    public function getEvents(EventFilter $eventFilter, $limits, $search, $searchKey)
    {
        $query = Event::query();

        if (!empty($searchKey) && !empty($search)) {
            $query = $eventFilter->search($query, $search, $searchKey);
        }

        return $query->orderByDesc('created_at')->paginate($limits);
    }
}
