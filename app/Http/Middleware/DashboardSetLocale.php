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
        if ($request->has('change-language')) {
            $locale = $request->query('change-language');

            if ($this->isValidLanguageQuery($locale)) {
                app()->setLocale($locale);
                $request->session()->put('language', $locale);
            }
        }

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
