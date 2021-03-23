<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Jobs\Project\ProjectStoreJob;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $categories = Category::select(['category'])->get()->sortBy('category');
        $projects = Project::select(['id', 'slug', 'main_image'])->with('categories')->get()->sortBy('categories');

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show($locale, Project $project)
    {
        $project->load('project_contents');

        $nextProject = $this->getNextProject($project->id);
        $prevProject = $this->getPreviousProject($project->id);

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

    public function create()
    {
        $categories = Category::all();
        return view('projects.create')->with('categories', $categories);
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            $project = $this->dispatchNow(new ProjectStoreJob($request));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        $request->session()->flash('success', 'Project was successful added!');
        return redirect()->back();
    }


}
