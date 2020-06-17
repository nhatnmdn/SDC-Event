<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Device_token;
use DB;
use Auth;

class NotificationController extends Controller
{
	public function save_notification(Request $request){
        $user = Auth::user();
        if($user){
            $device = new Device_token;
            $device->token = $request->token;
            $device->user_id = $user->id;
            if ($device->save()) {
                echo 'success';
            }else{
            	echo 'error';
            }
        }
    }

    public  function show_notification(){
        $user = Auth::user();
        if($user){
            $ch = curl_init("https://fcm.googleapis.com/fcm/send");
            $device =  \DB::table('users')
            ->join('tbl_device_token', 'users.id', '=', 'tbl_device_token.user_id')
            ->select('users.id', 'users.role_id', 'tbl_device_token.token')
            ->get();
            foreach( $device as $devices){
                $token = $devices->token;

            $body = "Bạn đã đăng ký thành công sự kiện";
            $title = "SDC Thông báo";
            $notification = [
                'title' => $title,
                'body' => $body,
            ];
            $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
            $fcmNotification = [
            'to' => $token,
            'notification' => $notification,
            'data' => $extraNotificationData
            ];
            $json = json_encode($fcmNotification);
            $headers = [
                'Authorization: key= AAAAuja7SH4:APA91bEd5sE4B2K1MtzM6GIx3DcYxTvP6FyD42f-BiKCISOtVApMewoHfTBjT_BCy18kjaoY0CUdEOzkinLwn6xYKLX-YHZ72gAW-iAQibpJCMuouX2W0doj5Mo6vwJfX2oz8cFIQpA-',
                'Content-Type: application/json'
            ];

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

            curl_exec($ch);

            }

        }
    }
}
