<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        try {
            //code..

            if (auth()->user()->is_admin == 1) {
                return $next($request);
            }
        } catch (\Throwable $th) {
            //throw $th;

            return redirect('login')->with('error', "You don't have admin access.");
        }

        return redirect('login')->with('error', "You don't have admin access.");
    }
    
}
