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

    public function __construct(StoreProjectRequest $request)
    {
        $this->validated = $request->validated();
        $this->validated['main_image'] = $request->file('main_image')->store('projects');
    }


    public function handle()
    {
        return Project::create($this->validated)->id;
    }
}
