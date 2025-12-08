<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAccessMiddleware
{
    public function handle($request, Closure $next)
    {
        // Jika belum login → redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('guest.login');
        }

        return $next($request);
    }
}
