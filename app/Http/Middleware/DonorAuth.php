<?php

namespace App\Http\Middleware;

use Closure;

class DonorAuth
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
        if (auth()->user()->donee == 1) {
            flash('You must be a donor to proceed.');
            return redirect()->back();
        }

        return $next($request);
    }
}
