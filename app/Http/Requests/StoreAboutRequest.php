<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
{
    public function rules(): array
    {
        $prefixMain = 'main.';
        $prefixList = 'list.';

        return [
            'main' => 'required|array|max:1',
            $prefixMain . '*.image' => 'required|image|max:4000',

            $prefixMain . '*.image_title.ru' => 'required|min:3|max:255',
            $prefixMain . '*.image_title.en' => 'nullable|min:3|max:255',
            $prefixMain . '*.image_title.uz' => 'nullable|min:3|max:255',

            $prefixMain . '*.about_title.ru' => 'required|min:3|max:255',
            $prefixMain . '*.about_title.en' => 'nullable|required_with:main.*.about_description.en|min:3|max:255',
            $prefixMain . '*.about_title.uz' => 'nullable|required_with:main.*.about_description.uz|min:3|max:255',

            $prefixMain . '*.about_description.ru' => 'required|min:3|max:1024',
            $prefixMain . '*.about_description.en' => 'nullable|required_with:main.*.about_title.en|min:3|max:1024',
            $prefixMain . '*.about_description.uz' => 'nullable|required_with:main.*.about_title.uz|min:3|max:1024',

            $prefixMain . '*.help_title.ru' => 'required|min:3|max:255',
            $prefixMain . '*.help_title.en' => 'nullable|required_with:main.*.help_description.en|min:3|max:255',
            $prefixMain . '*.help_title.uz' => 'nullable|required_with:main.*.help_description.uz|min:3|max:255',

            $prefixMain . '*.help_description.ru' => 'required|min:3|max:1024',
            $prefixMain . '*.help_description.en' => 'nullable|required_with:main.*.help_title.en|min:3|max:1024',
            $prefixMain . '*.help_description.uz' => 'nullable|required_with:main.*.help_title.uz|min:3|max:1024',

//?            List part
            'list' => 'required|array|max:2',
            $prefixList . '*.title.ru' => 'required|min:3|max:255',
            $prefixList . '*.title.en' => 'nullable|min:3|max:255',
            $prefixList . '*.title.uz' => 'nullable|min:3|max:255',

            $prefixList . '*.list' => 'required|array|min:1|max:3',
            $prefixList . '*.list.ru' => 'required|array|max:10',
            $prefixList . '*.list.en' => 'nullable|array|max:10',
            $prefixList . '*.list.uz' => 'nullable|array|max:10',

            $prefixList . '*.list.ru.*' => 'required|min:3|max:50',
            $prefixList . '*.list.en.*' => 'nullable|min:3|max:50',
            $prefixList . '*.list.uz.*' => 'nullable|min:3|max:50',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
