<?php

namespace App\Jobs;

use App\Http\Requests\StoreProjectContentRequest;
use App\Models\Project;
use App\Models\ProjectContent;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreProjectContentJob
{
    use Dispatchable, SerializesModels;

    private array $validated;
    private StoreProjectContentRequest $request;

    public function __construct(StoreProjectContentRequest $request)
    {
        $this->request = $request;
        $this->validated = $request->validated();
    }

    public function handle(): void
    {
        $this->storeImages();
        $this->storeContent();
    }

    private function storeImages(): void
    {
        foreach ($this->validated['content'] as $key => &$content) {
            if ($content['type'] === 'text')
                continue;

            switch ($content['type']) {
                case 'image-small':
                case 'image-big':
                    $content['image'] = $this->request->file("content.$key.image")->store('projects');
                    break;
                case 'slide':
                    foreach ($this->request->file("content.$key.slide") as $i => $image) {
                        $content['slide'][$i] = $image->store('projects');
                    }

                    // * rename slide to image
                    $content['image'] = $content['slide'];
                    unset($content['slide']);
                    break;
            }
        }
        unset($content);
    }

    private function storeContent(): void
    {
        $project_id = session('project_id');
        foreach ($this->validated['content'] as $content) {
            // * appends project_id on every content
            $content['project_id'] = $project_id;

            ProjectContent::create($content);
        }

        Project::withoutEvents(function () use ($project_id) {
            Project::withTrashed()
                ->findOrFail($project_id)
                ->update(['deleted_at' => null]);
        });
        session()->forget(['project_id', 'hasCompletedFirstPart']);
    }
}
