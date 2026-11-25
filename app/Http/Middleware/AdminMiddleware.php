<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! session()->has('admin_logged_in') || ! session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please log in to access the admin panel.');
        }

        return $next($request);
    }
}
