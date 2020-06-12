<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestCreateEvent;
use Illuminate\Http\Request;

class CreateEventController extends Controller
{
    protected $event;

    public function __construct()
    {
        $this->event = app(Event::class);
    }

    public function index(Request $request)
    {
        $limits    = $request->get('limits', 10);
        $search    = $request->get('search', '');
        $searchKey = $request->get('searchBy', '');
        $listEvent = Event::all();

        $events = $this->event->getEvents($limits, $search, $searchKey);

        return view('admin.event.index', compact('events', 'listEvent'));
    }

    public function create()
    {
        return view('admin.event.create', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('admin.event.edit', compact('event'));
    }

    public function update(AdminRequestCreateEvent $requestCreateEvent, $id)
    {
        $this->insertOrUpdate($requestCreateEvent, $id);

        return redirect()->route('admin.get.list.event')->with('succes', 'Cập nhập thành công !');
    }

    public function store(AdminRequestCreateEvent $requestCreateEvent)
    {
        $this->insertOrUpdate($requestCreateEvent);

        return redirect()->route('admin.get.list.event')->with('noti', 'Thêm thành công');
    }

    public function insertOrUpdate($requestCreateEvent, $id = '')
    {
        $event = new Event();

        if ($id) {
            $event = Event::find($id);
        }

        $event->name         = $requestCreateEvent->name;
        $event->place        = $requestCreateEvent->place;
        $event->intro        = $requestCreateEvent->intro;
        $event->detail       = $requestCreateEvent->detail;
        $event->start_time   = $requestCreateEvent->time_start;
        $event->end_time     = $requestCreateEvent->time_end;
        $event->max_register = $requestCreateEvent->max_register;
        $event->chairman     = $requestCreateEvent->chairman;

        if ($requestCreateEvent->hasFile('avatar')) {
            $file = upload_image('avatar');

            if (isset($file['name'])) {
                $event->image = $file['name'];
            }
        }

        $event->save();
    }

    public function action($action, $id)
    {
        if ($action) {
            $event = Event::find($id);

            switch ($action) {
                case 'delete':
                    $event->delete();

                    break;
            }
        }

        return redirect()->back();
    }

    public function cancel_event($id)
    {
        $cancel = Event::find($id);

        $cancel->status = Event::Public;

        $cancel->save();

        return redirect()->back();
    }

}

