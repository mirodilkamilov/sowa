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
        $slides = Slide::orderBy('position')->get();

        return view('dashboard.slides.index', compact('slides'));
    }

    public function create()
    {
        $positions = Slide::orderBy('position')->pluck('position');

        return view('dashboard.slides.create', compact('positions'));
    }

    public function store(StoreSlideRequest $request)
    {
        try {
            StoreSlideJob::dispatchSync($request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('slides.index');
        }

        $request->session()->flash('success', 'Slide was successfully added!');
        return redirect()->route('slides.index');
    }

    public function edit($slide)
    {
        $slide = Slide::withoutEvents(function () use ($slide) {
            return Slide::findOrFail($slide);
        });
        $positions = Slide::select(['position'])->orderBy('position')->get();

        return view('dashboard.slides.edit', compact('slide', 'positions'));
    }

    public function update(Slide $slide, UpdateSlideRequest $request)
    {
        try {
            UpdateSlideJob::dispatchSync($slide, $request);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('slides.index');
        }

        $request->session()->flash('success', 'Slide was successfully edited!');
        return redirect()->route('slides.index');
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();
        session()->flash('success', 'Slide was successfully deleted!');
        return redirect()->route('slides.index');
    }

}
