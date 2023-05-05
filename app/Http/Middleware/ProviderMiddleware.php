<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProviderMiddleware
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

            if ($user->roles == 2)
            {
                return $next($request);
            } else {
                Auth::logout();
                return redirect('provider/login')
                    ->with('notification', 'Please login as provider');
            }
        } else {
            return redirect('provider/login')
                ->with('notification', 'Please login with provider rights to use the service');
        }
    }
}
