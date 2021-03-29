<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Jobs\StoreSlideJob;
use App\Jobs\UpdateSlideJob;
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
        StoreSlideJob::dispatchNow($validated);

        $request->session()->flash('success', 'Slide was successfully added!');
        return redirect()->route('slides.create');
    }

    public function edit($slide)
    {
        $slide = Slide::withoutEvents(function () use ($slide) {
            return Slide::findOrFail($slide);
        });
        $positions = Slide::select(['position'])->get()->sortBy('position');

        return view('dashboard.slides.edit', compact('slide', 'positions'));
    }

    public function update(Slide $slide, UpdateSlideRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image'))
            $validated['image'] = $request->file('image')->store('slides');
        $validated['id'] = $slide->id;

        UpdateSlideJob::dispatchNow($slide, $validated);
        $request->session()->flash('success', 'Slide was successfully edited!');
        return redirect()->route('slides.edit', $slide->id);
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();
        session()->flash('success', 'Slide was successfully deleted!');
        return redirect()->route('slides.index');
    }

}
