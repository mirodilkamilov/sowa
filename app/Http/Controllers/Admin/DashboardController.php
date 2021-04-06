<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyContact;

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
