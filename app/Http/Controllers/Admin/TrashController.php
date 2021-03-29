<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Slide;

class TrashController extends Controller
{
    public function index()
    {
        $projects = Project::onlyTrashed()->with('categories')->get();
        $slides = Slide::onlyTrashed()->get();

        return view('dashboard.trash.index', compact('projects', 'slides'));
    }
}
