<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function saving(Project $project)
    {
//        $project->slug['ru'] = Str::slug($project->slug['ru']);
//        $project->slug['en'] = Str::slug($project->slug['en']);
//        $project->slug['uz'] = Str::slug($project->slug['uz']);
    }

    /**
     * @param Project $project
     * @return void
     */
    public function retrieved(Project $project)
    {
        $project->slug = $project->slug[$this->preferredLang];
        $project->main_title = $project->main_title[$this->preferredLang];
    }
}
