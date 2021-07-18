<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.index', compact('user'));
    }
}
