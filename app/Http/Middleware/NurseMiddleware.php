<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NurseMiddleware
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
        if (!($request->user()->type == 1)) {
            return redirect()->route('/');
        }
        return $next($request);
    }
}
