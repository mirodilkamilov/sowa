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

    public function retrieved(ProjectContent $projectContent): void
    {
        if (isset($projectContent->title))
            $projectContent->title = $projectContent->title[$this->locale] ?? $projectContent->title[$this->defaultLang];
        if (isset($projectContent->description))
            $projectContent->description = $projectContent->description[$this->locale] ?? $projectContent->description[$this->defaultLang];
    }

    public function creating(ProjectContent $projectContent): void
    {
        if ($projectContent['type'] === 'image-small' || $projectContent['type'] === 'image-big') {
            $projectContent['image'] = '/assets/uploads/' . $projectContent['image'];
        }

        if ($projectContent['type'] === 'slide') {
            $tempSlide = [];
            foreach ($projectContent['image'] as $image) {
                $tempSlide[] = '/assets/uploads/' . $image;
            }
            $projectContent['image'] = $tempSlide;
        }
    }
}
