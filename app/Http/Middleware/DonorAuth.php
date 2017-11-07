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
        if ($request->donee == 1) {
            return redirect()->back();
        }

        return $next($request);
    }
}
