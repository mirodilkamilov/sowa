<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('position')->get();
        $positions = $customers->pluck('position')->toArray();

        return view('dashboard.about.customers.index', compact('customers', 'positions'));
    }

    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated()['customer'];
        $validated['logo'] = $request->file('customer.logo')->store('brands');
        Customer::create($validated);

        $request->session()->flash('success', 'Customer was successfully added!');
        return redirect()->route('customers.index');
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validated = $request->validated()['customer-edit'];
        if ($request->hasFile('customer-edit.logo'))
            $validated['logo'] = $request->file('customer-edit.logo')->store('brands');

        $customer->update($validated);

        $request->session()->flash('success', 'Customer was successfully saved!');
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('success', 'Customer was successfully deleted!');
        return redirect()->route('customers.index');
    }
}
