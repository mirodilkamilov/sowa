<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectContentRequest extends FormRequest
{
    public function rules()
    {
        $prefix = 'content.';
        return [
            // ? Text content
            $prefix . '0.title.ru.*' => 'required|min:3|max:255',
            $prefix . '0.title.en.*' => 'nullable|required_with:content.0.description.en.*|min:3|max:255',
            $prefix . '0.title.uz.*' => 'nullable|required_with:content.0.description.uz.*|min:3|max:255',
            $prefix . '0.description.ru.*' => 'required|min:3|max:255',
            $prefix . '0.description.en.*' => 'nullable|required_with:content.0.title.en.*|min:3|max:255',
            $prefix . '0.description.uz.*' => 'nullable|required_with:content.0.title.uz.*|min:3|max:255',
            $prefix . '0.position.*' => 'required|integer',

            // ? Image content
            $prefix . '1.image-type.*' => 'required|in:image-big,image-small',
            $prefix . '1.position.*' => 'required|integer',
//            $prefix . '1.image' => 'required|array',
            $prefix . '1.image.*' => 'required|image',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
