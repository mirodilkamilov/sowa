<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    private $locale;

    public function __construct()
    {
        $this->locale = session('language') ?? config('app.locale');
    }

    /**
     * Handle the Project "created" event.
     *
     * @param Project $project
     * @return void
     */
    public function saving(Project $project)
    {
        //
    }

    /**
     * @param Project $project
     * @return void
     */
    public function retrieved(Project $project)
    {
        // ! These values can be null when they are not going to be retrieved (omitted in select statement)
        $project->slug = $project->slug[$this->locale] ?? '';
        $project->main_title = $project->main_title[$this->locale] ?? '';
    }
}
