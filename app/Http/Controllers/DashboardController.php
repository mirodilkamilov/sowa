<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompanyContact;
use App\Models\CompanyDetail;
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

    public function slides()
    {
        $slides = Slide::all()->sortBy('position');

        return view('dashboard.slides.index', compact('slides'));
    }

    public function categories()
    {
        $categories = Category::withoutEvents(function () {
            return Category::all();
        });

        return view('dashboard.categories.index', compact('categories'));
    }

    public function projects()
    {
//        TODO: Sort by category (this not working)
        $projects = Project::with('categories')->get()->sortBy('categories');

        return view('dashboard.projects.index', compact('projects'));
    }

    public function messages()
    {
        $users = UserContact::all()->sortBy('created_at')->sortBy('status');

        return view('dashboard.messages.index', compact('users'));
    }

    public function mainInfo()
    {
        $companyDetail = CompanyDetail::with('companyLists')->first();

        return view('dashboard.about.main.index', compact('companyDetail'));
    }

    public function customers()
    {
        $customers = Customer::all()->sortBy('position');

        return view('dashboard.about.customers.index', compact('customers'));
    }

    public function contacts()
    {
        $contact = CompanyContact::with('socialMedia')->first();

        return view('dashboard.about.contacts.index', compact('contact'));
    }

    public function trash()
    {
        $projects = Project::onlyTrashed()->with('categories')->get();
        $slides = Slide::onlyTrashed()->get();

        return view('dashboard.trash.index', compact('projects', 'slides'));
    }
}
