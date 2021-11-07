<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role === 'Super Admin') {
            return redirect('/admin/login');
        } elseif (Auth::guard($guard)->check() && (Auth::user()->role === 'Bosot Bari Member' || Auth::user()->role === 'Business Hold Reg')) {
            return redirect('/member/login');
        }else{
          return $next($request);
        }
    }
}
