<?php

namespace App\Jobs;

use App\Http\Requests\HandleTrashRequest;
use App\Models\Project;
use App\Models\Slide;
use App\Models\UserContact;
use Illuminate\Foundation\Bus\Dispatchable;

class HandleTrashJob
{
    use Dispatchable;

    private $type;
    private $id;

    public function __construct(HandleTrashRequest $request)
    {
        $validated = $request->validated()['trash'];
        $this->type = $validated['type'];
        $this->id = $validated['id'] ?? null;
    }

    public function handle(): void
    {
        switch ($this->type) {
            case 'project':
                Project::withoutEvents(function () {
                    Project::onlyTrashed()->findOrFail($this->id)->restore();
                });
                break;
            case 'slide':
                Slide::withoutEvents(function () {
                    Slide::onlyTrashed()->findOrFail($this->id)->restore();
                });
                break;
            case 'message':
                UserContact::onlyTrashed()->findOrFail($this->id)->restore();
                break;
            case 'emptyTrash':
                $projects = Project::onlyTrashed()->with('project_contents', 'categories')->get();
                foreach ($projects as $project) {
                    $project->project_contents()->delete();
                    $project->categories()->detach();
                    $project->forceDelete();
                }

                Slide::onlyTrashed()->forceDelete();
                UserContact::onlyTrashed()->forceDelete();
                break;
        }
    }
}
