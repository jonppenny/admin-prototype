<?php

namespace App\Http\Middleware;

use App\Settings;
use Closure;
use Schema;

class Install
{
    private $settings;

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
        if (!Schema::hasTable('settings')) {
            return redirect('/install');
        } else {
            $this->settings = Settings::find(1);

            $installed = $this->settings->install_run;

            if (empty($installed) || $installed !== 1) {
                return redirect('/install');
            }
        }

        return $next($request);
    }
}
