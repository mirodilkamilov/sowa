<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Customer;

class UserAboutController extends Controller
{
    public function index()
    {
        $about = About::with('aboutLists')->first();
        $customers = Customer::all();

        return view('about.index', compact('about', 'customers'));
    }
}