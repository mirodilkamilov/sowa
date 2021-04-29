<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectContentRequest;
use App\Jobs\StoreProjectContentJob;
use App\Models\ProjectContent;
use Illuminate\Http\Request;

class ProjectContentController extends Controller
{
    public function store(StoreProjectContentRequest $request)
    {
        try {
            StoreProjectContentJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('projects.create');
        }

        $request->session()->flash('success', 'Project content was successfully saved!');
        return redirect()->route('projects.create');
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
