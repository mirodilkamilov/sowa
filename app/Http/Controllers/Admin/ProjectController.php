<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Jobs\Project\ProjectStoreJob;
use App\Jobs\Project\StoreProjectJob;
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
        return view('dashboard.projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        StoreProjectJob::dispatchNow($request, $validated);

        $request->session()->flash('success', 'Project was successfully added!');
        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        //
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
