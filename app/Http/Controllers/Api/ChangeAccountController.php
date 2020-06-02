<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;

class ChangeAccountController extends Controller
{
    public function update_infomation(Request $request)
    {
        $user = $request->user();
        if($user)
        {
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');

            $user->save();
            return response()->json($user);
        }
    }

    public function update_password(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'old_pass' => 'required|string',
            'new_pass' => 'required|string',
        ]);

        if($user)
        {
            $credentials = $request->old_pass;
            if (Hash::check($credentials, $user->password)) {
                if($request->old_pass == $request->new_pass){
                    return response()->json([
                        'message' => 'Mật khẩu mới không được giống với mật khẩu hiện tại!'
                    ]);
                }else{
                    $user->password = Hash::make($request->input('new_pass'));
                    $user->save();
                    return response()->json([
                        'message' => 'Thay đổi mật khẩu thành công. Mật khẩu mới của bạn là: '.$request->new_pass
                    ]);
                }
            }else {
                return response()->json([
                    'message' => 'Mật khẩu cũ không đúng. Vui lòng kiểm tra lại!'
                ]);
            }
        }
    }
}
