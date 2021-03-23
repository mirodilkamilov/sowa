<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetail;
use App\Models\Customer;

class CompanyDetailController extends Controller
{
    public function index()
    {
        $companyDetail = CompanyDetail::with('companyLists')->first();
        $customers = Customer::all();

        return view('about.index', compact('companyDetail', 'customers'));
    }
}
