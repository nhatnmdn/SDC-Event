<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests\AdminCreateEventRequest;

use Illuminate\Http\Response;

class CreateEventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::orderBy('id','DESC')->paginate(5);

        if($request->e_name) $events->where('name','like','%'.$request->e_name.'%');

        $viewData = [
            'events' => $events
        ];

        return view('admin.event.index',$viewData);
    }

    public function create()
    {
        return view('admin.event.create',compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit',compact('event'));
    }

    public function update(AdminCreateEventRequest $requestCreateEvent,$id){
        $this->insertOrUpdate($requestCreateEvent,$id);

        return redirect()->route('admin.get.list.event')->with('success',"Cập nhật thành công");
    }

    public  function store(AdminCreateEventRequest $requestEvent){

        $this->insertOrUpdate($requestEvent);

//        session()->flash('noti','Thêm mới thành công');

        return redirect()->route('admin.get.list.event')->with('success',"Thêm thành công");

    }

    public function insertOrUpdate($requestEvent,$id=''){
        $event = new  Event();

        if($id) $event = Event::find($id);

        $event->name = $requestEvent->name;
        $event->place = $requestEvent->place;
        $event->intro = $requestEvent->intro;
        $event->detail = $requestEvent->detail;
        $event->start_time = $requestEvent->time_start;
        $event->end_time = $requestEvent->time_end;
        $event->max_register = $requestEvent->max_register;
        $event->chairman = $requestEvent->chairman;

        if($requestEvent->hasFile('avatar'))
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
                     return redirect()->back();
                     break;

                 case 'active':
                     $event->status = $event->status ? 0 : 1;
                     $event->save();
                     break;

             }
         }

         return redirect()->back();
     }

}
