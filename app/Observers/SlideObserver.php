<?php

namespace App\Observers;

use App\Models\Slide;

class SlideObserver
{
    private $locale;
    private $defaultLang;
    private $availableLangs;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
        $this->availableLangs = config('app.languages');
    }

    public function retrieved(Slide $slide)
    {
        if (isset($slide->title)) {
            $slide->title = $slide->title[$this->locale] ?? $slide->title[$this->defaultLang];
            $slide->sub_title = $slide->sub_title[$this->locale] ?? $slide->sub_title[$this->defaultLang];
            $slide->description = $slide->description[$this->locale] ?? $slide->description[$this->defaultLang];
        }
    }

    public function saving(Slide $slide)
    {
        $slide->image = '/assets/uploads/' . $slide->image;
    }
}
