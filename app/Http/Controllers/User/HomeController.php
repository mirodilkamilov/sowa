<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('position')->get();

        return view('home.index', compact('slides'));
    }
}
