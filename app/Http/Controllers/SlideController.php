<?php

namespace App\Http\Controllers;

use App\Models\CompanyContact;
use App\Models\Slide;

class SlideController extends Controller
{
    public function index()
    {
        $sliders = Slide::all()->sortBy('position');
        $companyContact = CompanyContact::with('socialMedia')->first();

        return view('home.index', compact('sliders', 'companyContact'));
    }
}
