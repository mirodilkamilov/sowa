<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Jobs\Project\ProjectStoreJob;
use App\Models\Category;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
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
