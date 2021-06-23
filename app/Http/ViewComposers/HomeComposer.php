<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeComposer
{
    public string $titleOfPage;
    public string $locale;

    public function __construct(Request $request)
    {
        $titleOfPage = $request->segment(2) ?? 'Digital agency';
        $this->titleOfPage = Str::title($titleOfPage);

        $this->locale = app()->getLocale() ?? config('app.default_language');
    }

    public function compose(View $view): void
    {
        $view->with('titleOfPage', $this->titleOfPage);
        $view->with('locale', $this->locale);
    }
}
