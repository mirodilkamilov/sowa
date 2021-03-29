<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserContactController extends Controller
{
    public function create()
    {
        return view('contacts.create');
    }
}
