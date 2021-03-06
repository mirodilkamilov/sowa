<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Session;
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
        $project->slug = Str::slug($project->slug);
    }

    /**
     * @param Project $project
     * @return void
     */
    public function retrieved(Project $project)
    {
        $project->title = $project->title['ru'];
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param \App\Models\Project $project
     * @return void
     */
    public function updated(Project $project)
    {
        //
    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param \App\Models\Project $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     *
     * @param \App\Models\Project $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param \App\Models\Project $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
