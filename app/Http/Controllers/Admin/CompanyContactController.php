<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyContactRequest;
use App\Http\Requests\UpdateCompanyContactsRequest;
use App\Models\CompanyContact;

class CompanyContactController extends Controller
{
    public function index()
    {
        $contact = CompanyContact::with('socialMedia')->first();

        return view('dashboard.about.contacts.index', compact('contact'));
    }

    public function store(StoreCompanyContactRequest $request)
    {
        $validated = $request->validated()['contacts'];
        CompanyContact::create($validated);

        $request->session()->flash('success', 'Company contacts information was successfully saved!');
        return redirect()->route('company-contacts.index');
    }

    public function update(UpdateCompanyContactsRequest $request, CompanyContact $companyContact)
    {
        $validated = $request->validated()['contacts'];
        $companyContact->update($validated);

        $request->session()->flash('success', 'Company contacts information was successfully saved!');
        return redirect()->route('company-contacts.index');
    }
}
