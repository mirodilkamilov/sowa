<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class ProjectController extends Controller
{
    public function show(Project $project_id, $slug)
    {
        $projects = Project::find($project_id);
        return view('projects.show')->with('projects', $projects);// ['projects' => $projects]);
    }
}
