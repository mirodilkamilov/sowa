<?php

namespace App\Http\Requests;

use App\Models\Slide;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSlideRequest extends FormRequest
{
    public function rules()
    {
        $slide_id = $this->segment(3);
        $ignoredPosition = Slide::select(['position'])->find($slide_id)->position;

        return [
            'title.ru' => 'required|min:3|max:255',
            'title.en' => 'nullable|required_with:description.en|min:3|max:255',
            'title.uz' => 'nullable|required_with:description.uz|min:3|max:255',
            'sub_title.ru' => 'required|min:3|max:255',
            'sub_title.en' => 'nullable|min:3|max:255',
            'sub_title.uz' => 'nullable|min:3|max:255',
            'description.ru' => 'required|min:5|max:500',
            'description.en' => 'nullable|required_with:title.en|min:3|max:500',
            'description.uz' => 'nullable|required_with:title.uz|min:3|max:500',
            'url' => 'required|url',
            'position' => "required|integer|gt:0|unique:slides,position,{$ignoredPosition},position,deleted_at,NULL",
            'image' => 'nullable|image|max:4000',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
