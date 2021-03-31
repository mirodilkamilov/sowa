<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules()
    {
        $category_id = $this->segment(3);
        $category = Category::withoutEvents(function () use ($category_id) {
            return Category::find($category_id)->category;
        });

        return [
            'category.ru' => "required|min:3|max:50|unique:categories,category->ru,{$category['ru']},category->ru",
            'category.en' => "required|min:3|max:50|unique:categories,category->en,{$category['en']},category->en",
            'category.uz' => "required|min:3|max:50|unique:categories,category->uz,{$category['uz']},category->uz",
        ];
    }

    public function authorize()
    {
        return true;
    }
}
