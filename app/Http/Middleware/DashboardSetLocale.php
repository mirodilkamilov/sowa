<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DashboardSetLocale
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
        $langInSession = $request->session()->get('language');
        $locale = $langInSession;
        if (!isset($langInSession)) {
            $locale = config('app.default_language');
            $request->session()->put('language', $locale);
        }


        if ($request->has('change-language')) {
            $langFromQuery = $request->query('change-language');

            if ($this->isValidLanguageQuery($langFromQuery)) {
                $locale = $langFromQuery;
                $request->session()->put('language', $locale);
            }

        }

        app()->setLocale($locale);
        return $next($request);
    }

    private function isValidLanguageQuery($language): bool|int
    {
        $availableLanguages = config('app.languages');
        $pattern = '/' . implode('|', $availableLanguages) . '/';
        $isValid = preg_match($pattern, $language);

        return $isValid;
    }
}
