<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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
        $titleOfPage = $request->segment(2) ?? 'Digital agency';
        $titleOfPage = Str::title($titleOfPage);

        // * Language in URL always valid (because of regex check in web.php)
        $langInUrl = $request->segment(1);
        $langInSession = $request->session()->get('language');

        // * Make sure langInUrl and langInSession are same
        if ($langInSession !== $langInUrl)
            $request->session()->put('language', $langInUrl);

        $locale = $langInUrl;
        app()->setLocale($locale);

        View::share('titleOfPage', $titleOfPage);
        View::share('locale', session('language'));
        return $next($request);
    }
}
