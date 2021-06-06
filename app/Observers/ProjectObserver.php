<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Str;

class ProjectObserver
{
    private $defaultLang;
    private $locale;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
    }

    public function retrieved(Project $project): void
    {
        // ! These values can be null when they are not going to be retrieved (omitted in select statement)
        if (isset($project->slug))
            $project->slug = $project->slug[$this->locale] ?? $project->slug[$this->defaultLang];
        if (isset($project->main_title))
            $project->main_title = $project->main_title[$this->locale] ?? $project->main_title[$this->defaultLang];
    }

    public function creating(Project $project): void
    {
        $project->main_image = '/assets/uploads/' . $project->main_image;
    }

    public function saving(Project $project): void
    {
        $slug = collect([
            'en' => isset($project->slug['en']) ? Str::slug($project->slug['en']) : $project->slug['en'],
            'ru' => isset($project->slug['ru']) ? Str::slug($project->slug['ru']) : $project->slug['ru'],
            'uz' => isset($project->slug['uz']) ? Str::slug($project->slug['uz']) : $project->slug['uz'],
        ]);

        $project->slug = $slug;
    }
}
