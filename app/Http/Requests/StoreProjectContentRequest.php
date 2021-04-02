<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectContentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title.ru.*' => 'required|min:3|max:255',
            'title.en.*' => 'required|min:3|max:255',
            'title.uz.*' => 'required|min:3|max:255',
            'description.ru.*' => 'required|min:3|max:255',
            'description.en.*' => 'required|min:3|max:255',
            'description.uz.*' => 'required|min:3|max:255',
            'position.*' => 'required|integer'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
