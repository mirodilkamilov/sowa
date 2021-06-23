<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Jobs\StoreAboutJob;
use App\Jobs\UpdateAboutJob;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::withoutEvents(function () {
            return About::with('aboutLists')->first();
        });

        return view('dashboard.about.main.index', compact('about'));
    }

    public function create()
    {
        return view('dashboard.about.main.create');
    }

    public function store(StoreAboutRequest $request)
    {
        try {
            StoreAboutJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('about.index');
        }

        $request->session()->flash('success', 'Main information was successfully saved!');
        return redirect()->route('about.index');
    }

    public function update(UpdateAboutRequest $request, About $about)
    {
        try {
            UpdateAboutJob::dispatchSync($about, $request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('about.index');
        }

        $request->session()->flash('success', 'Main information was successfully saved!');
        return redirect()->route('about.index');
    }

}
