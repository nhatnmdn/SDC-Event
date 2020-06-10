<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RegistrationEvent;
// use QrCode;
use Auth;
use Role;
use DB;

class CheckinController extends Controller {
    public function checkin( Request $request, $id ) {
//        $user = $request->user();
//        $checkin = RegistrationEvent::where( [
//            'user_id' => $user->id,
//            'event_id' => $id,
//        ] )->first();
//        if ( $user ) {
//            if ( isset( $checkin->code ) ) {
//                $info = \DB::table( 'registration' )
//                ->join( 'users', 'registration.user_id', '=', 'users.id' )
//                ->where( 'code', $checkin->code )
//                ->select( 'users.email', 'users.name', 'users.avatar', 'users.phone', 'users.address' )
//                ->get();
//                return response()->json( $info );
//                // return QrCode::size( 200 )->generate( $info );
//            }
//            return response()->json( [
//                'message'   => 'Không tồn tại sự kiện',
//            ] );
//        }


        $user = \Auth()->user();
        if($user)
        {
            $code = $request->code;
            $regis = RegistrationEvent::where([
                'user_id'  => $user->id,
                'event_id' => $id,
                'status'   => 0,
            ])->first();
            if($regis->code == $code)
            {
                if ($regis->checkin == '')
                {
                    $regis->checkin = 1;
                    $regis->save();

                    return response()->json([
                        'message' => 'checkin thành công',
                        'user'    => $user
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
    }
}
