<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserPhoneController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|min:8|max:20'
        ]);

        try {
            UserContact::create($validated);
        } catch (\Exception $e) {
            Log::error($e->getMessage() . "\r\n{$e->getFile()} ({$e->getLine()})\r\n" . $e->getTraceAsString());
            session()->flash('error', 'Whoops! Something went wrong, please try it later. Admin is notified about this problem');
            return redirect()->back();
        }

        session()->flash('success', 'Your phone number has been successfully saved!');
        return redirect()->back();
    }
}
