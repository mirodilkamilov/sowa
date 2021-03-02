<?php

namespace App\Jobs\Project;

use App\Models\Project;

class ProjectStoreJob
{

    protected $attributes;

    /**
     * ProjectStoreJob constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->attributes = $request->only(['category_id', 'title', 'client', 'year', 'description', 'url', 'slug']);
        if ($request->hasFile('image'))
            $this->attributes['main_image'] = $request->file('image')->store('uploads/projects');

    }

    /**
     * @return mixed
     */
    public function handle()
    {
        return Project::create($this->attributes);
    }
}
