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
        if ($request->hasFile('image')) {
            $imagePath = 'assets/uploads/' . $request->file('image')->store('projects');
            $this->attributes['main_image'] = $imagePath;
        }
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        return Project::create($this->attributes);
    }
}
