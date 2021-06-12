<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Jobs\StoreAboutJob;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::with('aboutLists')->first();

        return view('dashboard.about.main.index', compact('about'));
    }

    public function create()
    {
        return view('dashboard.about.main.create');
    }

    public function store(StoreAboutRequest $request)
    {
//        dd($request->validated());

        try {
            StoreAboutJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('about.index');
        }

        $request->session()->flash('success', 'Main information was successfully saved!');
        return redirect()->route('about.index');
    }

}
