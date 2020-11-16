<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( $request->user()->roles->where('role_name', 'super_admin')->first() || $request->user()->roles->where('role_name', 'admin')->first() ) {
            return $next($request);
        }
        return redirect(route('home'));
    }
}