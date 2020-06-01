<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Notifications\SignupActivate;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // đăng kí tài khoản
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'address'  => 'required|string',
            'phone'    => 'required|string',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address'  => $request->address,
            'phone'    => $request->phone,
            'activation_token' => Str::random(60),
        ]);
        $user->save();

        $user->notify(new SignupActivate($user));

        return response()->json([
            'user' => $user,
            'message' => 'Tạo tài khoản thành công!Vui lòng check mail để xác thực tài khoản của bạn'
        ]);
    }

    // xác thực tài khoản
    public function signupActivate($token){
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Mã thông báo kích hoạt này không hợp lệ.'
            ]);
        }
        $user->status = true;
        $user->activation_token = '';
        $user->save();
        return 'Tài khoản của bạn đã được xác thực';
    }
    // đăng nhập hệ thống
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        $credentials['deleted_at'] = null;

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Email hoặc mật khẩu không chính xác!'
            ]);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        if ($user->status == 0) {
            return response()->json([
                'message'=>'Tài khoản của bạn chưa xác thực!',
            ]);
        }elseif($user->status == 2){
            return response()->json([
                'message'=>'Tài khoản của bạn đã bị khóa!',
            ]);
        }else{
            return response()->json([
                'message' => 'Đăng nhập thành công!',
                'user'=>$request->user(),
                'access_token' => $tokenResult->accessToken
            ]);
        }
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Đăng xuất thành công!'
        ]);
    }
}
