<?php

namespace App\Observers;

use App\Models\ProjectContent;
use Illuminate\Http\Request;

class ProjectContentObserver
{
    private $locale;

    public function __construct(Request $request)
    {
        $langInUrl = $request->segment(1);
        $this->locale = $langInUrl;
    }

    public function retrieved(ProjectContent $projectContent)
    {
        $projectContent->title = $projectContent->title[$this->locale] ?? '';
        $projectContent->description = $projectContent->description[$this->locale] ?? '';
    }
}
