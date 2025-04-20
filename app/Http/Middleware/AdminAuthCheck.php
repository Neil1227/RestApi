<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Check if admin is logged in, otherwise redirect to login page
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
