<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Filters\EventFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestCreateEvent;
use App\Model\RegistrationEvent;
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
        $limits      = $request->get('limits', 10);
        $search      = $request->get('search', '');
        $searchKey   = $request->get('searchBy', '');
        $listEvent   = Event::all();
        $eventFilter = new EventFilter();

        $events = $this->event->getEvents($eventFilter, $limits, $search, $searchKey);

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

    public function viewEvent($id)
    {
        $detail = Event::find($id);

        return view('admin.event.detail_event', compact('detail'));
    }

    public function detailRegistrationEvent($id)
    {
        $detailRegistrations = RegistrationEvent::with('users', 'events')->where('event_id', $id)->orderByDesc('created_at')->paginate(10);

        return view('admin.event.detail_registration', compact('detailRegistrations'));
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

    public function cancel_event(Request $request)
    {
        $params           = $request->except('__token');
        $params['status'] = Event::Public;

        $event = Event::where('id', $params['id'])->first();

        if ($event->status == 0) {
            $event->status = 1;

            $event->save();
        }

        return redirect(route('admin.get.list.event'));
    }

}

