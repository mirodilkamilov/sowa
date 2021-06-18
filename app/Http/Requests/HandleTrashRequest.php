<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandleTrashRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'trash' => 'required|array|min:1|max:2',
            'trash.type' => 'required|in:emptyTrash,project,slide,message',
            'trash.id' => 'integer|required_unless:trash.type,emptyTrash'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
