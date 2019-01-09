<?php

namespace App\Http\Middleware;

use App\Settings;
use Closure;

class Install
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
        $settings = Settings::find(1);

        if (!$settings) {
            return redirect('/install');
        } else {
            $s = $settings->install_run;

            if (empty($s) || $s !== 1) {
                return redirect('/install');
            }
        }

        return $next($request);
    }
}
