<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyContactsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contacts' => 'required|array',
            'contacts.phone' => 'required|array|max:3',
            'contacts.phone.*' => 'required|min:3|max:25',
            'contacts.email' => 'required|array|max:3',
            'contacts.email.*' => 'required|email',
            'contacts.address' => 'required|min:5|max:255',
            'contacts.google_map' => 'required|url|max:500'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
