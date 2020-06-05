<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Model\RegistrationEvent;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Str;

class RegisterEventController extends Controller
{
    public function index()
    {
        $events = Event::whereRaw(1)->orderByDesc('created_at')->limit(3)->get();

        $viewData = [
            'events' => $events
        ];

        return view('user.index', $viewData);
    }

    public function detailEvent($id)
    {
        $detail = Event::find($id);
        return view('user.detail_event', compact('detail'));
    }

    public function registerEvent(Request $request,$id)
    {
        $event = Event::find($id);
        $list_register = RegistrationEvent::where([
           'event_id' => $id,
           'status'   => 0
        ])->count();
        $user = $request->user();
        $register = new RegistrationEvent();
        if($user)
        {
            $list = RegistrationEvent::where([
                'user_id'   => $user->id,
                'event_id'  => $event->id,
                'status'    => 0
            ])->first();
            $register->user_id = $user->id;
            $register->event_id = $event->id;
            $register->code = Str::random(60);
            if(isset($list))
            {
                return redirect()->back()->with('warning','Mỗi người chỉ được đăng kí một lần !');
            }else
            {
                if($event->max_register > $list_register)
                {
                    $register->save();
                    return redirect()->back()->with('success','Đăng kí thành công !');
                }
                return redirect()->back()->with('danger','Số lượng người đăng kí đã dủ !');
            }
        }
        return redirect()->route('login.form')->withErrors('Bạn cần đăng nhập để để tham gia đăng kí sự kiện');
    }
}
