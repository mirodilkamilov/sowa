<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // * Language in URL always valid (because of regex check in web.php)
        $langInUrl = $request->segment(1);

        $locale = $langInUrl;

        $request->session()->put('language', $locale);
        app()->setLocale($locale);

        return $next($request);
    }
}
