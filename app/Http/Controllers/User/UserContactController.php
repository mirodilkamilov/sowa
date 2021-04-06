<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserContactRequest;
use App\Models\CompanyContact;
use App\Models\UserContact;
use Illuminate\Support\Facades\Log;

class UserContactController extends Controller
{
    public function create()
    {
        $map = CompanyContact::select(['google_map'])->first()?->google_map;
        return view('contacts.create', compact('map'));
    }

    public function store(StoreUserContactRequest $request)
    {
        $locale = session('language') ?? config('app.default_language');
        $validated = $request->validated();

        try {
            UserContact::create($validated);
        } catch (\Exception $e) {
            Log::error($e->getMessage() . "\r\n{$e->getFile()} ({$e->getLine()})\r\n" . $e->getTraceAsString());
            session()->flash('error', 'Whoops! Something went wrong, please try it later. Admin is notified about this problem');
            return redirect()->route('contacts.create', $locale);
        }

        session()->flash('success', 'Your application has been successfully sent!');
        return redirect()->route('contacts.create', $locale);
    }
}
