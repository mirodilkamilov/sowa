<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class ProjectController extends Controller
{
    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('projects.show', ['project' => $project]);
    }
}
