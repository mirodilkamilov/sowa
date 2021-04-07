<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Customer;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::with('aboutLists')->firstOrFail();
        $customers = Customer::orderBy('position')->get();

        return view('about.index', compact('about', 'customers'));
    }
}
