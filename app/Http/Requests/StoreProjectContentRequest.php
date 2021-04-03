<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectContentRequest extends FormRequest
{
    public function rules()
    {
        $prefix = 'content.0.';
        return [
            $prefix . 'title.ru.*' => 'required|min:3|max:255',
            $prefix . 'description.ru.*' => 'required|min:3|max:255',
            $prefix . 'position.*' => 'required|integer'

//            'title.en.*' => 'required|min:3|max:255',
//            'title.uz.*' => 'required|min:3|max:255',
//            'description.ru.*' => 'required|min:3|max:255',
//            'description.en.*' => 'required|min:3|max:255',
//            'description.uz.*' => 'required|min:3|max:255',
//            'position.*' => 'required|integer'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
