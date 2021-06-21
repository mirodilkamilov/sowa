<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserContactRequest;
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

    public function update(UpdateUserContactRequest $request, $userContact)
    {
        // * $userContact comes here as a string not as a collection
        $userContact = UserContact::findOrFail($userContact);
        $validated = $request->validated();
        $userContact->comment = $validated['comment'];
        $userContact->status = $validated['status'];

        try {
            $userContact->save();
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('contacts.index');
        }

        $request->session()->flash('success', 'Changed successfully!');
        return redirect()->route('contacts.index');
    }

    public function destroy($userContact)
    {
        $userContact = UserContact::findOrFail($userContact);
        $userContact->delete();

        session()->flash('success', 'User message was successfully deleted!');
        return redirect()->route('contacts.index');
    }
}
