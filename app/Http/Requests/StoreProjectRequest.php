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
//      TODO: Validate category properly (compare with database)
        return [
            'title' => 'required',
            'slug' => 'required|max:20',
            'image' => 'required|image',
            'category' => 'required',
            'description' => 'required|max:250',
            'url' => 'url',
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Supported image formats: jpg, jpeg, png, bmp, gif, svg, or webp',
            'body.required' => 'A message is required',
        ];
    }
}
