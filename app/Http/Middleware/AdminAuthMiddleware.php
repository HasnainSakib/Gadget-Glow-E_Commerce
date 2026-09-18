<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->get('admin_logged_in') && !Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Please log in with your Admin Username and Password to access the Admin Panel.');
        }

        return $next($request);
    }
}
