<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        // Check if user is logged in
        if (!Session::get('is_logged_in')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}

