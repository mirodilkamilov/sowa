<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserContactRequest;
use App\Models\CompanyContact;
use App\Models\UserContact;

class UserContactController extends Controller
{
    public function create()
    {
        $map = CompanyContact::first()->google_map;
        return view('contacts.create', compact('map'));
    }

    public function store(StoreUserContactRequest $request)
    {
        $validated = $request->validated();
        UserContact::create($validated);

        $locale = session('language') ?? config('app.default_language');
        $request->session()->flash('success', 'Your application has been successfully sent!');
        return redirect()->route('contacts.create', $locale);
    }
}
