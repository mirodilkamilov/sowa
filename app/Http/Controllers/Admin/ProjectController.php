<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Jobs\StoreProjectJob;
use App\Jobs\UpdateProjectJob;
use App\Models\Category;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
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

    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            UpdateProjectJob::dispatchSync($request, $project);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('projects.edit', $project->id);
        }

        $request->session()->flash('success', 'Changes were successfully saved!');
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        try {
            $project->delete();
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->route('projects.index');
        }

        session()->flash('success', 'Project was successfully deleted!');
        return redirect()->route('projects.index');
    }
}
