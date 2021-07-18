<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category.ru' => 'required|max:30|unique:categories,category->ru',
            'category.en' => 'required|max:30|unique:categories,category->en',
            'category.uz' => 'required|max:30|unique:categories,category->uz',
        ];
    }

    public function attributes(): array
    {
        return [
            'category.ru' => 'category (ru)',
            'category.en' => 'category (en)',
            'category.uz' => 'category (uz)',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute must not exceed from :max characters.',
            'unique' => 'The :input already exist.'
        ];
    }
}
