<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\RegistrationEvent;
use Illuminate\Http\Request;

class ListRegisterEventController extends Controller
{
    protected $registrationEvent;

    public function __construct()
    {
        $this->registrationEvent = app(RegistrationEvent::class);
    }

    public function index(Request $request)
    {
        $limits    = $request->get('limits', 10);
        $search    = $request->get('search', '');
        $searchKey = $request->get('searchBy', '');

        $lists = $this->registrationEvent->getRegistrationEvents($limits, $search, $searchKey);

        return view('admin.registration.index', compact('lists'));
    }

    public function showDetailRegistration($id)
    {
        $registration = RegistrationEvent::with('events')->find($id);

        return view('admin.registration.detail', compact('registration'));
    }
}
