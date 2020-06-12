<?php

namespace App\Filters;

class RegistrationEventFilter extends FilterBase
{
    public function searchByEvent($query, $search)
    {
        return $query->select()->with('events')->whereExists(function ($query) use ($search) {
            $query->select('*')->from("events")->whereRaw("registration.event_id = events.id AND name like '%$search%'");
        });
    }

    public function searchByName($query, $search)
    {
        return $query->select()->with('users')->whereExists(function ($query) use ($search) {
            $query->select('*')->from("users")->whereRaw("registration.user_id = users.id AND name like '%$search%'");
        });
    }


}
