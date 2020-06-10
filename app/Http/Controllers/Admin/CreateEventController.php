<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestCreateEvent;
use Illuminate\Http\Request;

class CreateEventController extends Controller
{
    public function index(Request $request){
        $events = Event::orderBy('created_at','DESC')->paginate(5);

        $viewData = [
            'events' => $events
        ];

        return view('admin.event.index',$viewData);
    }

    public function create(){
        return view('admin.event.create',compact('event'));
    }

    public function edit($id){

        $event = Event::find($id);
        return view('admin.event.edit',compact('event'));
    }

    public function update(AdminRequestCreateEvent $requestCreateEvent,$id){
        $this->insertOrUpdate($requestCreateEvent,$id);

        return redirect()->route('admin.get.list.event')->with('succes','Cập nhập thành công !');
    }

    public function store(AdminRequestCreateEvent $requestCreateEvent){

        $this->insertOrUpdate($requestCreateEvent);


        return redirect()->route('admin.get.list.event')->with('noti','Thêm thành công');
    }



    public function insertOrUpdate($requestCreateEvent,$id=''){
        $event = new Event();

        if($id) $event = Event::find($id);

        $event->name = $requestCreateEvent->name;
        $event->place = $requestCreateEvent->place;
        $event->intro = $requestCreateEvent->intro;
        $event->detail = $requestCreateEvent->detail;
        $event->start_time = $requestCreateEvent->time_start;
        $event->end_time = $requestCreateEvent->time_end;
        $event->max_register = $requestCreateEvent->max_register;
        $event->chairman = $requestCreateEvent->chairman;

        if($requestCreateEvent->hasFile('avatar'))
        {
            $file = upload_image('avatar');

            if(isset($file['name']))
            {
                $event->image = $file['name'];

            }
        }

        $event->save();
    }

    public function action(Request $request,$action,$id)
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
}

