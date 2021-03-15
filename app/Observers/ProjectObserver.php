<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectObserver
{
    private $preferredLang;

    public function __construct(Request $request)
    {
        $this->preferredLang = $request->cookie('lang');
        if (!$request->hasCookie('lang'))
            $this->preferredLang = 'ru';
    }

    /**
     * Handle the Project "created" event.
     *
     * @param Project $project
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
        $project->main_title = $project->main_title["$this->preferredLang"];
    }
}
