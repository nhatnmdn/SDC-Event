<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\RegistrationEvent;

class ListRegisterEventController extends Controller
{
    public function index()
    {
        $query = RegistrationEvent::query();

        $lists = $query->with('users', 'events')->orderByDesc('created_at')->paginate( 5);

        return view('admin.registration.index', compact('lists'));
    }

    public function showDetailRegistration($id)
    {
        $registration = RegistrationEvent::with('events')->find($id);

        return view('admin.registration.detail', compact('registration'));
    }
}
