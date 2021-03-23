<?php

namespace App\Observers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideObserver
{
    private $locale;

    public function __construct(Request $request)
    {
        $langInUrl = $request->segment(1);
        $this->locale = $langInUrl;
    }

    public function retrieved(Slide $slide)
    {
        $slide->title = $slide->title[$this->locale];
        $slide->sub_title = $slide->sub_title[$this->locale];
        $slide->description = $slide->description[$this->locale];
    }
}
