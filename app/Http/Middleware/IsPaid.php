<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPaid
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
        if (is_null($request->user()->isPaid)) {
            session()->flash('alert-warning', 'Please purchase your membership plan first to continue!');
            return redirect()->route('sub.index');
        }
        return $next($request);
    }
}
