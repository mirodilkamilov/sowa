<?php

namespace App\Observers;

use App\Models\ProjectContent;

class ProjectContentObserver
{
    private $defaultLang;
    private $locale;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
    }

    public function retrieved(ProjectContent $projectContent)
    {
        if (isset($projectContent->title))
            $projectContent->title = $projectContent->title[$this->locale] ?? $projectContent->title[$this->defaultLang];
        if (isset($projectContent->description))
            $projectContent->description = $projectContent->description[$this->locale] ?? $projectContent->description[$this->defaultLang];
    }
}
