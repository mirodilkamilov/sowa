<?php

namespace App\Jobs;

use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\ProjectContent;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateProjectJob
{
    use Dispatchable;

    private UpdateProjectRequest $request;
    private array $validated;
    private Project $project;

    public function __construct(UpdateProjectRequest $request, Project $project)
    {
        $this->request = $request;
        $this->validated = $request->validated();
        $this->project = $project;
    }

    public function handle(): void
    {
        $this->updateMainPart($this->validated['main'][1]);
        $this->updateContentPart($this->validated['content']);
    }

    private function updateMainPart($mainPart): void
    {
        if ($this->request->hasFile('main.1.main_image'))
            $mainPart['main_image'] = $this->request->file('main.1.main_image')->store('projects');

        $this->project->update($mainPart);
        $this->project->categories()->sync($mainPart['category']);
    }

    private function updateContentPart($contents): void
    {
        $contentIdsFromUser = array();
        ProjectContent::withoutEvents(function () use ($contents, &$contentIdsFromUser) {
            foreach ($contents as $key => &$content) {
                $this->updateImageContent($content, $key);

                //? Check for created contents
                if (!isset($content['id'])) {
                    $content['project_id'] = $this->project->id;
                    $content['id'] = ProjectContent::create($content)->id;
                    $contentIdsFromUser[] = $content['id'];
                    continue;
                }

                $contentIdsFromUser[] = $content['id'];
                ProjectContent::where('id', $content['id'])->update($content);
            }
            unset($content);
        });


        //? Check for deleted contents
        $contentIdsFromDb = ProjectContent::where('project_id', $this->project->id)->pluck('id')->toArray();
        $needToDeleteIds = array_diff($contentIdsFromDb, $contentIdsFromUser);

        if (!empty($needToDeleteIds))
            ProjectContent::destroy($needToDeleteIds);
    }

    private function updateImageContent(&$content, $key): void
    {
        switch ($content['type']) {
            case 'image-small':
            case 'image-big':
                if ($this->request->hasFile("content.$key.image")) {
                    $image = $this->request->file("content.$key.image")->store('projects');
                    $content['image'] = ['image' => $image];
                }
                break;
            case 'slide':
                if (!isset($content['slide']))
                    break;

                foreach ($content['slide'] as $i => &$img) {
                    if ($this->request->hasFile("content.$key.slide.$i"))
                        $img = $this->request->file("content.$key.slide.$i")->store('projects');
                }

                $content['image'] = ['slide' => $content['slide']];
                unset($img, $content['slide']);
                break;
        }
    }
}
