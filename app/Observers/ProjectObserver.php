<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Str;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param \App\Models\Project $project
     * @return void
     */
    public function creating(Project $project)
    {
        // ! Here should be $project->slug['ru'] ...
        //  $project->slug = Str::slug($project->slug);
    }

    /**
     * @param Project $project
     * @return void
     */
    public function retrieved(Project $project)
    {
        $project->main_title = $project->main_title['ru'];
    }
}
