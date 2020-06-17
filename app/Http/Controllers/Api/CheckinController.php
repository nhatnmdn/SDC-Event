<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RegistrationEvent;
use App\Model\User;
use Auth;
use Role;
use DB;

class CheckinController extends Controller {
    public function checkin( Request $request, $id ) {
        $user = \Auth()->user();
        if($user->role_id != 3)
        {
            $code = $request->code;
            $regis = RegistrationEvent::where([
                'event_id' => $id,
                'status'   => 0,
            ])->first();

            if($regis->code == $code)
            {
                $info = User::where('id',$regis->user_id)->get();
                if ($regis->checkin == '')
                {
                    $regis->checkin = 1;
                    $regis->save();

                    return response()->json([
                        'message' => 'checkin thành công',
                        'user'    => $info
                    ]);
                }
                return response()->json([
                    'message' => 'Bạn đã checkin',
                ]);
            }
            return response()->json([
                'message' => 'Checkin thất bại'
            ]);
        }
        return response()->json([
            'message'   => 'Bạn không có quyền checkin.'
        ]);
    }
}
