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
        $prefix = 'content.';

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

//?          Project content Validation
            'content' => 'required|array|min:1|max:10',
            $prefix . '*.type' => 'required|in:text,image-small,image-big,slide',
            $prefix . '*.position' => 'required|integer|min:1|max:10|distinct',

            $prefix . '*.title' => 'required_if:content.*.type,text|array|prohibited_unless:content.*.type,text',
            $prefix . '*.title.ru' => 'required_if:content.*.type,text|min:3|max:255',
            $prefix . '*.title.en' => 'nullable|required_with:content.*.description.en|min:3|max:255',
            $prefix . '*.title.uz' => 'nullable|required_with:content.*.description.uz|min:3|max:255',

            $prefix . '*.description' => 'required_if:content.*.type,text|array|prohibited_unless:content.*.type,text',
            $prefix . '*.description.ru' => 'required_if:content.*.type,text|min:3|max:1024',
            $prefix . '*.description.en' => 'nullable|required_with:content.*.title.en|min:3|max:1024',
            $prefix . '*.description.uz' => 'nullable|required_with:content.*.title.uz|min:3|max:1024',

            $prefix . '*.image' => 'required_if:content.*.type,image-small,image-big|image|max:3000|prohibited_if:content.*.type,text',
            $prefix . '*.slide' => 'required_if:content.*.type,slide|array|min:1|max:5|prohibited_if:content.*.type,text',
            $prefix . '*.slide.*' => 'image|max:3000',

        ];
    }
}
