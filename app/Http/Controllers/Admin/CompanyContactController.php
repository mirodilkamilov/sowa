<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CompanyContactController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('position')->get();

        return view('dashboard.about.customers.index', compact('customers'));
    }
}
