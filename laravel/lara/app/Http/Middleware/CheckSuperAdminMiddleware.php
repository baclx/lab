<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('level') !== 1) {
            return redirect()->back()->with('error', "you can not delete this");
        }
        return $next($request);
    }
}
