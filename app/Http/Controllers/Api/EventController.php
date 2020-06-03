<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Model\RegistrationEvent;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;


class EventController extends Controller
{
    public function list_happen(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $list_done = Event::select('id','name','intro','chairman','image','place','start_time','end_time')
        ->where('start_time','<',$now)->where('end_time','>',$now)
        ->where('status',0)->get();

        return response()->json($list_done);
    }
    public function list_event(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $list = Event::select('id','name','intro','chairman','start_time','end_time','image','place')->where('start_time','>',$now)->where('status',0)->get();

        return response()->json($list);
    }

    public function detail_event(Request $request, $id)
    {
        $detail = Event::find($id);
        return response()->json($detail);
    }

    public function regis_event(Request $request,$id)
    {
        $event = Event::find($id);
        $list_regis = RegistrationEvent::where([
            'event_id'  => $id,
            'status'    => 0
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
                return response()->json([
                    'message' => 'Mỗi người chỉ được phép đăng ký 1 lần thôi nhé!',
                ]);
            }else
            {
                if($event->max_register > $list_regis)
                {
                    $register->save();
                    return response()->json([
                        'messsage' => 'Đăng ký thành công!',
                        'event' => $register,
                    ]);
                }
                return response()->json([
                    'messsage' => 'Số lượng người đăng ký đã đủ. Mời bạn quay lại vào sự kiện sau!',
                ]);
            }
        }
        return response()->json([
            'message' => 'Bạn cần đăng nhập để có thể đăng ký tham gia sự kiện. Xin cảm ơn!',
        ]);
    }

    public function cancel_event(Request $request, $id)
    {
        $user = $request->user();
        $regis = RegistrationEvent::where([
            'user_id'   => $user->id,
            'event_id'  => $id,
            'status'    => 0
        ])->first();
        if($regis)
        {
            $regis->status = 1;
            $regis->save();
            return response()->json([
                'message' => 'Bạn đã hủy sự kiện thành công',
            ]);
        }
        return response()->json([
            'message' => 'Bạn chưa đăng ký sự kiện này',
        ]);
    }

    public function history_register_event(Request $request)
    {
        $now = date('Y-m-d H:i:s');
        $user = $request->user();
        // $list = RegistrationEvent::where('user_id',$user->id)->get();
        $list = \DB::table('registration')
        ->join('events', 'registration.event_id', '=', 'events.id')
        ->where([
            'user_id' => $user->id,
            'registration.status'  => 0,
        ])
        ->select('registration.id','registration.user_id','registration.status','registration.checkin','events.name','events.chairman','events.start_time','events.end_time')
        ->get();

        return response()->json($list);
    }
}
