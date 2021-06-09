<?php

namespace App\Observers;

use App\Models\Slide;

class SlideObserver
{
    private $locale;
    private $defaultLang;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
    }

    public function retrieved(Slide $slide): void
    {
        // gets a record with default language if a record doesn't exists with locale
        if (isset($slide->title)) {
            $slide->title = $slide->title[$this->locale] ?? $slide->title[$this->defaultLang];
            $slide->sub_title = $slide->sub_title[$this->locale] ?? $slide->sub_title[$this->defaultLang];
            $slide->description = $slide->description[$this->locale] ?? $slide->description[$this->defaultLang];
        }
    }
}
