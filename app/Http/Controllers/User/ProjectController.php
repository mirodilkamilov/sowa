<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $categories = Category::orderBy("category->$locale")->get();
        $projects = Project::select(['id', 'slug', 'main_image'])->with('categories')->get();

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show($locale, Project $project)
    {
        $project->load('categories', 'project_contents');
        $project_id = $project->id;

        $nextProject = $this->getNextProject($project_id);
        $prevProject = $this->getPreviousProject($project_id);

        return view('projects.show', compact(
            'project',
            'nextProject',
            'prevProject'
        ));
    }

    /**
     * @param $projectId
     * @return Project
     */
    private function getNextProject($projectId): Project
    {
        $nextProject = Project::select(['id', 'slug'])
            ->where('id', '>', $projectId)
            ->orderBy('id')->first();
        $nextProject = $nextProject ?? Project::find(1);

        return $nextProject;
    }

    /**
     * @param $projectId
     * @return Project
     */
    private function getPreviousProject($projectId): Project
    {
        $prevProject = Project::select(['id', 'slug'])
            ->where('id', '<', $projectId)
            ->orderByDesc('id')->first();
        $prevProject = $prevProject ?? Project::select(['id', 'slug'])->orderByDesc('id')->first();

        return $prevProject;
    }

}
