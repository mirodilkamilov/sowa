<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        $langInSession = $request->session()->get('language');

        // * Make sure langInUrl and langInSession are same
        if ($langInSession !== $langInUrl)
            $request->session()->put('language', $langInUrl);

        $locale = $langInUrl;
        app()->setLocale($locale);

        // * Share session value with $locale variable across all views
        View::share('locale', session('language'));
        return $next($request);
    }
}
