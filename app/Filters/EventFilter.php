<?php

namespace App\Filters;

class EventFilter extends FilterBase
{
    public function searchByName($query, $search)
    {
        return $query->where('name', 'like', "%$search%");
    }

    public function searchByIntro($query, $search)
    {
        return $query->where('intro', 'like', "%$search%");
    }

    public function searchByPlace($query, $search)
    {
        return $query->where('place', 'like', "%$search%");
    }
}
