<?php

namespace App\Observers;

use App\Models\Slide;

class SlideObserver
{
    public function retrieved(Slide $slide)
    {
        $langInSession = session('language');
        $slide->title = $slide->title[$langInSession];
        $slide->sub_title = $slide->sub_title[$langInSession];
        $slide->description = $slide->description[$langInSession];
    }
}
