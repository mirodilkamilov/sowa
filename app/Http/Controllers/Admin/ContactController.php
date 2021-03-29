<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $users = UserContact::all()->sortBy('created_at')->sortBy('status');

        return view('dashboard.messages.index', compact('users'));
    }

    public function edit(UserContact $userContact)
    {
        //
    }

    public function update(Request $request, UserContact $userContact)
    {
        //
    }

    public function destroy(UserContact $userContact)
    {
        //
    }
}
