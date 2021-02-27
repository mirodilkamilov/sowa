<?php

namespace App\Http\Controllers;

use App\Models\Project;

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
}
