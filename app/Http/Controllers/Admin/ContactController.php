<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserContact;

class ContactController extends Controller
{
    public function index()
    {
        $users = UserContact::latest()->get();

        return view('dashboard.messages.index', compact('users'));
    }

    public function edit(UserContact $userContact)
    {
        //
    }

    public function update(UpdateUserRequest $request, $userContact)
    {
        // * $userContact comes here as a string not as a collection
        $userContact = UserContact::findOrFail($userContact);
        $validated = $request->validated();
        $userContact->comment = $validated['comment'];
        $userContact->status = $validated['status'];
        $userContact->save();

        $request->session()->flash('success', 'Changed successfully!');
        return redirect()->route('contacts.index');
    }

    public function destroy(UserContact $userContact)
    {
        //
    }
}
