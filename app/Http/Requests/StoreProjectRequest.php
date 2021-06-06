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
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $prefixMain = 'main.';
        $prefixContent = 'content.';

//      TODO: configure php.ini to upload bigger files in production (upload_max_filesize = 16M ; post_max_size = 24M)
        return [
            'main' => 'required|array|max:1',
            $prefixMain . '*.main_title.ru' => 'required|min:3|max:255',
            $prefixMain . '*.main_title.en' => 'nullable|required_with:main.*.slug.en|min:3|max:255',
            $prefixMain . '*.main_title.uz' => 'nullable|required_with:main.*.slug.uz|min:3|max:255',
            $prefixMain . '*.slug.ru' => 'required|min:3|max:20',
            $prefixMain . '*.slug.en' => 'nullable|required_with:main.*.main_title.en|min:3|max:20',
            $prefixMain . '*.slug.uz' => 'nullable|required_with:main.*.main_title.uz|min:3|max:20',
            $prefixMain . '*.category' => 'required|integer|min:1|exists:categories,id',
            $prefixMain . '*.main_image' => 'required|image|max:4000',
            $prefixMain . '*.client' => 'nullable|min:3|max:30',
            $prefixMain . '*.year' => 'nullable|digits:4|integer|min:1990|max:' . (date('Y') + 1),
            $prefixMain . '*.url' => 'nullable|url',

//?          Project content Validation
            'content' => 'required|array|min:1|max:10',
            $prefixContent . '*.type' => 'required|in:text,image-small,image-big,slide',
            $prefixContent . '*.position' => 'required|integer|min:1|max:10|distinct',

            $prefixContent . '*.title' => 'required_if:content.*.type,text|array|prohibited_unless:content.*.type,text',
            $prefixContent . '*.title.ru' => 'required_if:content.*.type,text|min:3|max:255',
            $prefixContent . '*.title.en' => 'nullable|required_with:content.*.description.en|min:3|max:255',
            $prefixContent . '*.title.uz' => 'nullable|required_with:content.*.description.uz|min:3|max:255',

            $prefixContent . '*.description' => 'required_if:content.*.type,text|array|prohibited_unless:content.*.type,text',
            $prefixContent . '*.description.ru' => 'required_if:content.*.type,text|min:3|max:1024',
            $prefixContent . '*.description.en' => 'nullable|required_with:content.*.title.en|min:3|max:1024',
            $prefixContent . '*.description.uz' => 'nullable|required_with:content.*.title.uz|min:3|max:1024',

            $prefixContent . '*.image' => 'required_if:content.*.type,image-small,image-big|image|max:3000|prohibited_if:content.*.type,text',
            $prefixContent . '*.slide' => 'required_if:content.*.type,slide|array|min:1|max:5|prohibited_if:content.*.type,text',
            $prefixContent . '*.slide.*' => 'image|max:3000',
        ];
    }
}
