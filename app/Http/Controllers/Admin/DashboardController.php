<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\CompanyContact;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Slide;
use App\Models\UserContact;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function contacts()
    {
        $contact = CompanyContact::with('socialMedia')->first();

        return view('dashboard.about.contacts.index', compact('contact'));
    }
}
