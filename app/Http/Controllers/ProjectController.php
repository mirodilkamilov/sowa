<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('projects.show', ['project' => $project]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('projects.create')->with('categories', $categories);
    }

    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['slug'], '-');

        $extension = $request->file('image')->extension();
        $imageName = $validated['slug'] . '-main.' . $extension;
        $path = $validated['image']->storeAs('images/projects', $imageName);

        $projectCollection = collect([
            'title' => [
                'ru' => $validated['title'],
                'en' => '',
                'uz' => '',
            ],
            'slug' => [
                'ru' => $validated['slug'],
                'en' => '',
                'uz' => '',
            ],
            'description' => [
                'ru' => $validated['description'],
                'en' => '',
                'uz' => '',
            ],
        ]);

        $project = new Project;
        $project->category_id = $validated['category_id'];
        $project->title = $projectCollection['title'];
        $project->slug = $projectCollection['slug'];
        $project->main_image = $path;
        $project->client = $validated['client'];
        $project->year = $validated['year'];
        $project->description = $projectCollection['description'];
        $project->url = $validated['url'];
        $project->save();

        $request->session()->flash('alert-success', 'Project was successful added!');
        return redirect()->back();
    }
}
