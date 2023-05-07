<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SeekerMiddleware
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

            if ($user->roles == 3)
            {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('login')
                    ->with('notification', 'Please log in');
            }
        } else {
            return redirect('login')
                ->with('notification', 'Please log in');
        }
    }
}
