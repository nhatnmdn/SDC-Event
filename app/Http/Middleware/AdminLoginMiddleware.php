<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->role_id == 1)
                return $next($request);
            if($user->role_id == 2)
                return $next($request);
            else
                return redirect()->route('admin.auth')->with('erorr','Tài khoản không có quyền truy cập Admin !');
        }
        else
            return redirect()->route('admin.auth');
    }
}
