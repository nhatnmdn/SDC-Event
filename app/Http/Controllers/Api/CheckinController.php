<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RegistrationEvent;
use QrCode;
use Auth;
use Role;
use DB;

class CheckinController extends Controller {
    public function checkin( Request $request, $id ) {
        $user = $request->user();
        $checkin = RegistrationEvent::where( [
            'user_id' => $user->id,
            'event_id' => $id,
        ] )->first();
        if ( $user ) {
            if ( isset( $checkin->code ) ) {
                return QrCode::size( 200 )->generate( $checkin->code );

                $demo = \DB::table( 'registration' )
                ->join( 'user', 'registration.user_id', '=', 'user.id' )
                ->join( 'events', 'registration.event_id', '=', 'events.id' )
                ->where( 'code', $checkin->code )
                ->select( 'user.email', 'user.name', 'user.avatar', 'user.phone', 'user.address', 'event.name' )
                ->get();

                return response()->json($demo);
            }
            return response()->json( [
                'message'   => 'Không tồn tại sự kiện',
            ] );
        }
    }
}
