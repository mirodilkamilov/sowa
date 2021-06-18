<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function rules()
    {
        $customer_id = $this->segment(3);
        $ignoredPosition = Customer::find($customer_id)->position;

        return [
            'customer-edit' => 'required|array',
            'customer-edit.name' => 'required|min:3|max:50',
            'customer-edit.position' => "required|integer|gt:0|unique:customers,position,$ignoredPosition,position",
            'customer-edit.logo' => 'nullable|image|max:2048',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
