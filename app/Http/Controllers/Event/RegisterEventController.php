<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Model\RegistrationEvent;
use Auth;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Str;

class RegisterEventController extends Controller
{
    public function index()
    {
        $events = Event::whereRaw(1)->orderByDesc('created_at')->limit(3)->get();

        $viewData = [
            'events' => $events,
        ];

        return view('user.index', $viewData);
    }

    public function detailEvent($id)
    {
        $detail = Event::find($id);

        if (Auth::user()) {
            $list = RegistrationEvent::where([
                'status'   => 0,
                'user_id'  => Auth::user()->id,
                'event_id' => $id,
            ])->count();
        }

        return view('user.detail_event', compact('detail', 'list'));

    }

    public function registerEvent(Request $request, $id)
    {
        $event         = Event::find($id);
        $list_register = RegistrationEvent::where([
            'event_id' => $id,
            'status'   => 0,
        ])->count();
        $user          = $request->user();
        $register      = new RegistrationEvent();

        if ($user) {
            $list = RegistrationEvent::where([
                'user_id'  => $user->id,
                'event_id' => $event->id,
                'status'   => 0,
            ])->first();

            $register->user_id  = $user->id;
            $register->event_id = $event->id;
            $register->code     = Str::random(60);

            if (isset($list)) {

                return redirect()->back()->with('warning', __('You are already subscribed to this event'));

            } else {

                if ($event->max_register > $list_register) {

                    $register->save();

                    return redirect()->back()->with('success', __('Register success'));
                }

                return redirect()->back()->with('danger', __('The number of subscribers is full'));
            }
        }

        return redirect()->route('login.form')->withErrors(__('You need to be logged in to register for the event'));

    }

    public function cancelEvent($id)
    {
        if (Auth::user()) {

            $cancel = RegistrationEvent::where([
                'event_id' => $id,
                'user_id'  => Auth::user()->id,
                'status'   => 0,
            ])->first();
        }

        $cancel->status = 1;

        $cancel->save();

        return redirect()->back()->with('success', __('You have canceled this event'));
    }
}
