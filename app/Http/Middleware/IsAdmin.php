<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            //Check xem user đã đăng nhập chưa
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }
        //     //Get current user
        // $user = Auth::user();
        //     //Check role cua user
        // if ($user->role===1) {
        //     return $next($request);
        // }else{
        //     return redirect()->route('home');
        // }

        if (Auth::check() && Auth::user()->role) {
            return $next($request);
        }
        return redirect()->route('login');

    }
}
