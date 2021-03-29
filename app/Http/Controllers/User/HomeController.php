<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all()->sortBy('position');

        return view('home.index', compact('slides'));
    }
}
