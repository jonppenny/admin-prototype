<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $a = ['admin', 'manager'];

        if (!in_array($request->user()->role, $a)) {
            return redirect('/');
        }

        return $next($request);
    }
}
