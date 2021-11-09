<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfileStatus
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
        if (($request->user()->type == 1 && $request->user()->name == '')) {
            session()->flash('alert-warning', 'Please complete your profile first!');
            return redirect()->route('nurse.profile');
        }
        if (($request->user()->type == 2 && $request->user()->name == '')) {
            session()->flash('alert-warning', 'Please complete your profile first!');
            return redirect()->route('provider.profile');
        }
        return $next($request);
    }
}
