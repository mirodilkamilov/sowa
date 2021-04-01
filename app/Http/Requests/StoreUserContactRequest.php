<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserContactRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'phone' => 'required|min:3|max:20',
            'message' => 'required|min:5|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
