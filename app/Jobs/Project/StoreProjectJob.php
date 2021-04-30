<?php

namespace App\Jobs\Project;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreProjectJob
{
    use Dispatchable, SerializesModels;

    private array $validated;
    private int $category_id;

    public function __construct(StoreProjectRequest $request)
    {
        $this->validated = $request->validated();
        $this->validated['main_image'] = $request->file('main_image')->store('projects');

        $this->category_id = $this->validated['category'];
        unset($this->validated['category']);
    }


    public function handle()
    {
        $project = Project::create($this->validated);
        $project->categories()->attach($this->category_id);
        return $project->id;
    }
}
