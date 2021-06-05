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
        dd($request->all());
        try {
            $project_id = StoreProjectJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('projects.create');
        }

        $request->session()->flash('success', 'Main project part was successfully saved!');
        $request->session()->flash('info', 'Please complete the other part as well, because incomplete project will not be displayed');
        $request->session()->put('hasCompletedFirstPart', true);
        $request->session()->put('project_id', $project_id);
        return redirect()->route('projects.create');
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
