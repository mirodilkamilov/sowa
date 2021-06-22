<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        $user = $this->user();

        return [
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,$user->email,email",
            'password' => 'nullable|string|confirmed|min:8',
        ];
    }

    public function authorize()
    {
        $logInUserId = $this->user()->id;
        $requestedUserId = $this->segment(3);

        if ($logInUserId == $requestedUserId)
            return true;
        return  false;
    }
}
