<?php

namespace App\Jobs\Project;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreProjectJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $validated;

    public function __construct(StoreProjectRequest $request, $validated)
    {
        $this->validated = $validated;
        $this->validated['main_image'] = $request->file('main_image')->store('projects');
    }


    public function handle()
    {
        Project::create($this->validated);
    }
}
