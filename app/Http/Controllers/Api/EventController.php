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
        $list_done = Event::select('id', 'name', 'intro', 'chairman', 'image', 'place', 'start_time', 'end_time')
            ->where('start_time', '<', $now)->where('end_time', '>', $now)
            ->where('status', 0)->get();

        return response()->json($list_done);
    }

    public function list_event(Request $request)
    {
        $user = $request->user();
        $now = date('Y-m-d H:i:s');
        $regis = RegistrationEvent::where('user_id',$user->id)->get();
        foreach ($regis as $item)
            echo $item;
//        $demo = Event::where('start_time','>',$now)->where('status', 0)->select('name')->get();
//        dd($demo);

//        if ($user) {
//            $list = Event::where('start_time', '>', $now)->where('status', 0)->get();
//
//            return response()->json($list);
//        }

    }

    public function list_happened(Request $request)
    {
        $user = $request->user();
        $now = date('Y-m-d H:i:s');
        if ($user) {
            $list_happened = Event::where('end_time', '<', $now)->where('status', 0)->get();
            return response()->json($list_happened);
        }
    }

    public function detail_event(Request $request, $id)
    {
        $detail = Event::find($id);
        $number_register = RegistrationEvent::where('event_id', $id)->count();
        return response()->json([
            'detail' => $detail,
            'number_register' => $number_register,
        ]);
    }

    public function regis_event(Request $request, $id)
    {
        $event = Event::find($id);
        $list_regis = RegistrationEvent::where([
            'event_id' => $id,
            'status' => 0
        ])->count();
        $user = $request->user();
        $register = new RegistrationEvent();
        if ($user) {
            $list = RegistrationEvent::where([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'status' => 0
            ])->first();
            $register->user_id = $user->id;
            $register->event_id = $event->id;
            $register->code = Str::random(60);
            if (isset($list)) {
                return response()->json([
                    'message' => 'Mỗi người chỉ được phép đăng ký 1 lần thôi nhé!',
                ]);
            } else {
                if ($event->max_register > $list_regis) {
                    $register->save();
                    return response()->json([
                        'message' => 'Đăng ký thành công!',
                        'event' => $register,
                    ]);
                }
                return response()->json([
                    'message' => 'Số lượng người đăng ký đã đủ. Mời bạn quay lại vào sự kiện sau!',
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
            'user_id' => $user->id,
            'event_id' => $id,
            'status' => 0
        ])->first();
        if ($regis) {
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
                'registration.status' => 0,
            ])
            ->select('registration.id', 'registration.user_id', 'registration.event_id', 'registration.status', 'registration.checkin', 'events.name', 'events.chairman', 'events.start_time', 'events.end_time', 'events.image')
            ->get();

        return response()->json($list);
    }

    public function search(Request $request)
    {
        if ($request->key)
            
        $search = Event::where('name', 'like', '%' . $request->key . '%')->get();

        return response()->json($search);
    }
}
