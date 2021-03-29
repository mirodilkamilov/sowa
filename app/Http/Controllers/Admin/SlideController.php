<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideRequest;
use App\Jobs\SlideStoreJob;
use App\Models\Slide;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all()->sortBy('position');

        return view('dashboard.slides.index', compact('slides'));
    }

    public function create()
    {
        $positions = Slide::select(['position'])->get()->sortBy('position');

        return view('dashboard.slides.create', compact('positions'));
    }

    public function store(StoreSlideRequest $request)
    {
        $imagePath = $request->file('image')->store('slides');
        $validated = $request->validated();
        $validated['image'] = $imagePath;

        //  SlideStoreJob::dispatch($validated);
        // TODO: Local development for now
        SlideStoreJob::dispatchNow($validated);

        $request->session()->flash('success', 'Slide was successfully added!');
        return redirect()->route('slides.create');
    }

    public function edit(Slide $slide)
    {
        return view('');
    }

}
