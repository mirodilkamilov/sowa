<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectContentRequest extends FormRequest
{
    public function rules(): array
    {
        $prefix = 'content.';
        return [
            'content' => 'required|array|min:1|max:10',
            $prefix . '*.type' => 'required|in:text,image-small,image-big,slide',
            $prefix . '*.position' => 'required|integer|min:1|max:10|distinct',

            $prefix . '*.title' => 'required_if:content.*.type,text|array',
            $prefix . '*.title.ru' => 'required_if:content.*.type,text|min:3|max:255',
            $prefix . '*.title.en' => 'nullable|required_with:content.*.description.en|min:3|max:255',
            $prefix . '*.title.uz' => 'nullable|required_with:content.*.description.uz|min:3|max:255',

            $prefix . '*.description' => 'required_if:content.*.type,text|array',
            $prefix . '*.description.ru' => 'required_if:content.*.type,text|min:3|max:1024',
            $prefix . '*.description.en' => 'nullable|required_with:content.*.title.en|min:3|max:1024',
            $prefix . '*.description.uz' => 'nullable|required_with:content.*.title.uz|min:3|max:1024',

            $prefix . '*.image' => 'required_if:content.*.type,image-small,image-big|image|max:3000',
            $prefix . '*.slide' => 'required_if:content.*.type,slide|array|min:1|max:5',
            $prefix . '*.slide.*' => 'image|max:3000',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
