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
        return [
            'main' => 'required|array|max:1',
            'main.*.main_title.ru' => 'required|min:3|max:255',
            'main.*.main_title.en' => 'nullable|required_with:main.*.slug.en|min:3|max:255',
            'main.*.main_title.uz' => 'nullable|required_with:main.*.slug.uz|min:3|max:255',
            'main.*.slug.ru' => 'required|min:3|max:20',
            'main.*.slug.en' => 'nullable|required_with:main.*.main_title.en|min:3|max:20',
            'main.*.slug.uz' => 'nullable|required_with:main.*.main_title.uz|min:3|max:20',
            'main.*.category' => 'required|integer|min:1|exists:categories,id',
            'main.*.main_image' => 'required|image|max:4000',
            'main.*.client' => 'nullable|min:3|max:30',
            'main.*.year' => 'nullable|digits:4|integer|min:1990|max:' . (date('Y') + 1),
            'main.*.url' => 'nullable|url',

//?          Project content Validation
            'content' => 'required|array|min:1|max:10',
            'content.*.type' => 'required|in:text,image-small,image-big,slide',
            'content.*.position' => 'required|integer|min:1|max:10|distinct',

            'content.*.title' => 'required_if:content.*.type,text|array|prohibited_unless:content.*.type,text',
            'content.*.title.ru' => 'required_if:content.*.type,text|min:3|max:255',
            'content.*.title.en' => 'nullable|required_with:content.*.description.en|min:3|max:255',
            'content.*.title.uz' => 'nullable|required_with:content.*.description.uz|min:3|max:255',

            'content.*.description' => 'required_if:content.*.type,text|array|prohibited_unless:content.*.type,text',
            'content.*.description.ru' => 'required_if:content.*.type,text|min:3|max:1024',
            'content.*.description.en' => 'nullable|required_with:content.*.title.en|min:3|max:1024',
            'content.*.description.uz' => 'nullable|required_with:content.*.title.uz|min:3|max:1024',

            'content.*.image' => 'required_if:content.*.type,image-small,image-big|image|max:3000|prohibited_if:content.*.type,text',
            'content.*.slide' => 'required_if:content.*.type,slide|array|min:1|max:5|prohibited_if:content.*.type,text',
            'content.*.slide.*' => 'image|max:3000',
        ];
    }
}
