<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Jobs\Project\StoreProjectJob;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //   TODO: Sort by category (this not working)
        $projects = Project::with('categories')->get()->sortBy('categories');

        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.projects.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            StoreProjectJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('projects.create');
        }

        $request->session()->flash('success', 'Project was successfully created!');
        return redirect()->route('projects.index');
    }

    public function edit($projectId)
    {
        $project = Project::withoutEvents(function () use ($projectId) {
            $project = Project::findOrFail($projectId);
            $project->load('project_contents', 'categories');
            return $project;
        });
        $categories = Category::all();

        return view('dashboard.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy(Project $project)
    {
        //
    }
}
