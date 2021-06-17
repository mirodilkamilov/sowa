<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HandleTrashRequest;
use App\Jobs\HandleTrashJob;
use App\Models\Project;
use App\Models\Slide;
use App\Models\UserContact;

class TrashController extends Controller
{
    public function index()
    {
        $projects = Project::onlyTrashed()->with('categories')->get();
        $slides = Slide::onlyTrashed()->get();
        $userContacts = UserContact::onlyTrashed()->get();

        return view('dashboard.trash.index', compact('projects', 'slides', 'userContacts'));
    }

    public function store(HandleTrashRequest $request)
    {
        try {
            HandleTrashJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('trash.index');
        }

        $request->session()->flash('success', 'Successfully changed!');
        return redirect()->route('trash.index');
    }
}
