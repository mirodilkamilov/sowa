<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserContactRequest extends FormRequest
{
    public function rules()
    {
        return [
            'status' => 'required|in:need action,not reviewed,reviewed,spam',
            'comment' => 'nullable|min:3|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
