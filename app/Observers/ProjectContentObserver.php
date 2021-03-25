<?php

namespace App\Observers;

use App\Models\ProjectContent;

class ProjectContentObserver
{
    private $locale;

    public function __construct()
    {
        $this->locale = session('language') ?? config('app.locale');
    }

    public function retrieved(ProjectContent $projectContent)
    {
        $projectContent->title = $projectContent->title[$this->locale] ?? '';
        $projectContent->description = $projectContent->description[$this->locale] ?? '';
    }
}
