<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // 1. Cek parameter locale (priority)
        if ($request->has('lang')) {
            $locale = $request->get('lang');
        }
        // 2. Cek session
        elseif (session()->has('locale')) {
            $locale = session()->get('locale');
        }
        // 3. Cek cookie
        elseif ($request->cookie('lang')) {
            $locale = $request->cookie('lang');
        }
        // 4. Default dari config
        else {
            $locale = config('app.locale');
        }

        // Pastikan locale valid
        if (in_array($locale, ['en', 'id', 'ar'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
