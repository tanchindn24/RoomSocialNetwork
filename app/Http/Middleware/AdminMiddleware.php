<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {

            $user = Auth::user();

            if ($user->roles == 1)
            {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('admin/login')
                    ->with('notification', 'Please login as admin');
            }

        } else {
            return redirect('admin/login')
                ->with('notification', 'You are not admin');
        }
    }
}
