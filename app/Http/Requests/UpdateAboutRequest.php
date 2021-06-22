<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'main' => 'required|array|max:1',
            'main.*.image' => 'nullable|image|max:4000',

            'main.*.image_title.ru' => 'required|min:3|max:255',
            'main.*.image_title.en' => 'nullable|min:3|max:255',
            'main.*.image_title.uz' => 'nullable|min:3|max:255',

            'main.*.about_title.ru' => 'required|min:3|max:255',
            'main.*.about_title.en' => 'nullable|required_with:main.*.about_description.en|min:3|max:255',
            'main.*.about_title.uz' => 'nullable|required_with:main.*.about_description.uz|min:3|max:255',

            'main.*.about_description.ru' => 'required|min:3|max:1024',
            'main.*.about_description.en' => 'nullable|required_with:main.*.about_title.en|min:3|max:1024',
            'main.*.about_description.uz' => 'nullable|required_with:main.*.about_title.uz|min:3|max:1024',

            'main.*.help_title.ru' => 'required|min:3|max:255',
            'main.*.help_title.en' => 'nullable|required_with:main.*.help_description.en|min:3|max:255',
            'main.*.help_title.uz' => 'nullable|required_with:main.*.help_description.uz|min:3|max:255',

            'main.*.help_description.ru' => 'required|min:3|max:1024',
            'main.*.help_description.en' => 'nullable|required_with:main.*.help_title.en|min:3|max:1024',
            'main.*.help_description.uz' => 'nullable|required_with:main.*.help_title.uz|min:3|max:1024',

//?            List part
            'list' => 'required|array|max:2',
            'list.*.id' => 'required|integer|exists:about_lists',

            'list.*.title.ru' => 'required|min:3|max:255',
            'list.*.title.en' => 'nullable|min:3|max:255',
            'list.*.title.uz' => 'nullable|min:3|max:255',

            'list.*.list' => 'required|array|min:1|max:3',
            'list.*.list.ru' => 'required|array|max:10',
            'list.*.list.en' => 'nullable|array|max:10',
            'list.*.list.uz' => 'nullable|array|max:10',

            'list.*.list.ru.*' => 'required|min:3|max:50',
            'list.*.list.en.*' => 'sometimes|required|min:3|max:50',
            'list.*.list.uz.*' => 'sometimes|required|min:3|max:50',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
