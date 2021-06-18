<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'customer' => 'required|array',
            'customer.name' => 'required|min:3|max:50',
            'customer.position' => 'required|integer|gt:0|unique:customers,position',
            'customer.logo' => 'required|image|max:2048',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
