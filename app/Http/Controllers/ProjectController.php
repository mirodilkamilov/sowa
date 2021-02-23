<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('projects.show', ['project' => $project]);
    }


    public function store(Request $request)
    {
        return $request->all();
    }

    public function index()
    {
        $project = Project::find(1);
        $project = $project->title();
        return view('projects.index', ['project' => $project]);
    }
}
