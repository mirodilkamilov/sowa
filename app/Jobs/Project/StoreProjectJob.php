<?php

namespace App\Jobs\Project;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\ProjectContent;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreProjectJob
{
    use Dispatchable, SerializesModels;

    private StoreProjectRequest $request;
    private array $validated;
    private int $category_id;

    public function __construct(StoreProjectRequest $request)
    {
        $this->request = $request;
        $this->validated = $request->validated();
        $this->category_id = $this->validated['main'][1]['category'];
        unset($this->validated['main'][1]['category']);
    }


    public function handle(): void
    {
        $this->storeImages();
        $this->storeContent();
    }

    private function storeImages(): void
    {
        $this->validated['main'][1]['main_image'] = $this->request->file('main.1.main_image')->store('projects');

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
        $project = Project::create($this->validated['main'][1]);
        $project->categories()->attach($this->category_id);

        foreach ($this->validated['content'] as $content) {
            // * appends project_id on every content
            $content['project_id'] = $project->id;

            ProjectContent::create($content);
        }
    }
}
