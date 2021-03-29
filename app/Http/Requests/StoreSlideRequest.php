<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title.ru' => 'required|min:3|max:255',
            'title.en' => 'nullable|required_with:description.en|min:3|max:255',
            'title.uz' => 'nullable|required_with:description.uz|min:3|max:255',
            'sub_title.ru' => 'required|min:3|max:255',
            'sub_title.en' => 'nullable|min:3|max:255',
            'sub_title.uz' => 'nullable|min:3|max:255',
            'description.ru' => 'required|min:5|max:500',
            'description.en' => 'nullable|required_with:title.en|min:3|max:500',
            'description.uz' => 'nullable|required_with:title.uz|min:3|max:500',
            'url' => 'required|url',
            'position' => 'required|integer|gt:0|unique:slides,position,NULL,id,deleted_at,NULL',
            'image' => 'required|image|max:4000',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
