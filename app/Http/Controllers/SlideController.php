<?php

namespace App\Http\Controllers;

use App\Models\Slide;

class SlideController extends Controller
{
    public function index()
    {
        $sliders = Slide::all()->sortBy('position');

        return view('home.index', compact('sliders'));
    }
}
