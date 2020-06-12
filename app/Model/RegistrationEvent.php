<?php

namespace App\Model;

use App\Event;
use App\Filters\RegistrationEventFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RegistrationEvent extends Model
{
    protected $table    = 'registration';
    protected $fillable = ['checkin', 'code', 'user_id', 'event_id', 'status'];
    protected $registrationEventFilter;

    public function __construct()
    {
        $this->registrationEventFilter = app(RegistrationEventFilter::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'registration', 'id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'registration', 'id');
    }

    public function getRegistrationEvents($limits, $search, $searchKey)
    {
        $query = RegistrationEvent::query();

        if (!empty($searchKey) && !empty($search)) {
            $query = $this->registrationEventFilter->search($query, $search, $searchKey);
        }

        $query = $query->with('events', 'users')->orderByDesc('created_at')->paginate($limits);

        return $query;
    }
}
