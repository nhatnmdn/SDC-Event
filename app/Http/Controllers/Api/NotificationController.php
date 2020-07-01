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
        dd($user);
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
            $token = "crUHxmmYTL-5dF_k7ymdSj:APA91bFBmdUaYJUhOwSv-a6o7PS9lgWDc6pamaTpUTiNELspy1771RZmkTqa7KcesxhO-VYXOKJPOjsgCw-YYumKLqo65VCwidfNSQpJvzjeAVoDgrJPwKJsghXOy8pseh_1f7SP4lcI";
            $body = "Bạn đã checkin thành công!";
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
                'Authorization: key= AAAAYUG1AgI:APA91bEddyRecCs2SpJPawuAOWHJ4HpLrpX9RvXSQml9x64fefEuWH6_zDuj5SaXavoFOLoMZ6Zu0V51zhVgpOQTsmfgr5v5MHn2HGIzBrGKa2Wj0qgX7Ab1RBVPrBZheQJN8yDAsezx',
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
