<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function slides()
    {
        return view('dashboard.slides.index');
    }

    public function categories()
    {
        return view('dashboard.categories.index');
    }

    public function projects()
    {
        return view('dashboard.projects.index');
    }

    public function messages()
    {
        return view('dashboard.messages.index');
    }

    public function mainInfo()
    {
        return view('dashboard.about.main.index');
    }

    public function customers()
    {
        return view('dashboard.about.customers.index');
    }

    public function contacts()
    {
        return view('dashboard.about.contacts.index');
    }

    public function trash()
    {
        return view('dashboard.trash.index');
    }
}
