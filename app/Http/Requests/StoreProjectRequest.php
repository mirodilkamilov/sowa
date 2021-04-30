<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
//      TODO: configure php.ini to upload bigger files in production (upload_max_filesize = 16M ; post_max_size = 24M)
        return [
            'main_title.ru' => 'required|min:3|max:255',
            'main_title.en' => 'nullable|required_with:slug.en|min:3|max:255',
            'main_title.uz' => 'nullable|required_with:slug.uz|min:3|max:255',
            'slug.ru' => 'required|min:3|max:20',
            'slug.en' => 'nullable|required_with:main_title.en|min:3|max:20',
            'slug.uz' => 'nullable|required_with:main_title.uz|min:3|max:20',
            'category' => 'required|integer|min:1|exists:categories,id',
            'main_image' => 'required|image|max:4000',
            'client' => 'nullable|min:3|max:30',
            'year' => 'nullable|digits:4|integer|min:1990|max:' . (date('Y') + 1),
            'url' => 'nullable|url',
        ];
    }
}
