<?php

namespace App\Http\Middleware;


use Closure;
use Modules\Setting\Entities\Setting;

class Maintenance
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
        $setting = Setting::first();
        if (!$setting->maintenance) {
            return $next($request);
        }
        return redirect('/maintenance');
    }
}
