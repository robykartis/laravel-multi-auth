<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // if (auth()->user()->is_admin == 1) {

        //     return $next($request);
        // }
        // return redirect('dashboard')->with('error', "Anda Tidak Dapat Mengases Halaman Ini");


        if (Auth::check()) {
            // Admin Role
            if (Auth::user()->role == '1') {
                return $next($request);
            } else {
                return redirect('dashboard.admin')->with('message', "Anda Tidak Dapat Mengases Halaman Ini");
            }
        } else {
            return redirect('login')->with('message', "Login To Access Website Info");
        }
        return $next($request);
    }
}
