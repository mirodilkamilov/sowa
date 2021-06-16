<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyContact;

class CompanyContactController extends Controller
{
    public function index()
    {
        $contacts = CompanyContact::with('socialMedia')->get();

        return view('dashboard.about.contacts.index', compact('contacts'));
    }
}
