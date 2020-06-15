<?php

namespace App\Filters;

class UserFilter extends FilterBase
{
    public function searchByName($query, $search)
    {
        return $query->where('name', 'like', "%$search%")->orWhere('email', 'like', "%$search%");
    }
}
