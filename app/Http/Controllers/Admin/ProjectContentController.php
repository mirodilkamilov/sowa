<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectContentRequest;
use App\Models\ProjectContent;
use Illuminate\Http\Request;

class ProjectContentController extends Controller
{
    public function store(StoreProjectContentRequest $request)
    {
        $request->dd();
    }

    public function update(Request $request, ProjectContent $projectContent)
    {
        //
    }

    public function destroy(ProjectContent $projectContent)
    {
        //
    }
}
