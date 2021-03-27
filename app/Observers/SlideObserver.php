<?php

namespace App\Observers;

use App\Models\Slide;

class SlideObserver
{
    private $locale;

    public function __construct()
    {
        $this->locale = session('language') ?? config('app.locale');
    }

    public function retrieved(Slide $slide)
    {
        $slide->title = $slide->title[$this->locale] ?? '';
        $slide->sub_title = $slide->sub_title[$this->locale] ?? '';
        $slide->description = $slide->description[$this->locale] ?? '';
    }
}
