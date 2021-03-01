<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_ru' => 'required|max:30|unique:categories,category->ru',
            'category_en' => 'required|max:30|unique:categories,category->en',
            'category_uz' => 'required|max:30|unique:categories,category->uz',
        ];
    }

    public function attributes()
    {
        return [
            'category_ru' => 'category (ru)',
            'category_en' => 'category (en)',
            'category_uz' => 'category (uz)',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute must not exceed from :max characters.',
            'unique' => 'The :input already exist.'
        ];
    }
}