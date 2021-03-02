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
            'title' => 'required|array',
            'title.ru' => 'required',
            'title.uz' => 'nullable',
            'slug' => 'required|max:20',
            'image' => 'required|image|max:3072',
            'category_id' => 'required|exists:categories,id',
            'client' => 'nullable|max:30',
            'year' => 'nullable|digits:4',
            'description' => 'required|max:250',
            'url' => 'nullable|url',
        ];
    }
}
