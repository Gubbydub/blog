<?php

namespace App\Http\Middleware;

use Closure;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            return redirect()->route('home');
        }
        // dd(auth()->user()->role);
        return $next($request);
    }
}
