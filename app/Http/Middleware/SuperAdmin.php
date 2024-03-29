<?php

namespace App\Http\Middleware;

use App\Services\CheckRole;
use Closure;
use Illuminate\Http\Request;

class SuperAdmin
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
        if( CheckRole::isSuperAdmin($request->user()) ) {
            return $next($request);
        }
        return redirect(route('home'));
    }
}
