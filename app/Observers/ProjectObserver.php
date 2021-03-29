<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    private $defaultLang;
    private $locale;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
    }

    public function retrieved(Project $project)
    {
        // ! These values can be null when they are not going to be retrieved (omitted in select statement)
        if (isset($project->slug))
            $project->slug = $project->slug[$this->locale] ?? $project->slug[$this->defaultLang];
        if (isset($project->main_title))
            $project->main_title = $project->main_title[$this->locale] ?? $project->main_title[$this->defaultLang];
    }
}
