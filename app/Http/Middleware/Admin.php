<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->roles == 1)
            {
                return $next($request);
            }else
            {
                return redirect(RouteServiceProvider::INDEX_HOME)->with('notification_login', 'Đăng nhập dưới quyền admin');
            }
        }
        else
        {
            return redirect(RouteServiceProvider::INDEX_HOME)->with('notification_login', 'Đăng nhập dưới quyền admin hoặc chủ trọ');
        }

    }
}
