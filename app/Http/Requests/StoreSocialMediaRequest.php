<?php

namespace App\Http\Requests;

use App\Models\CompanyContact;
use Illuminate\Foundation\Http\FormRequest;

class StoreSocialMediaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'social_media' => 'required|array',
            'social_media.*.name' => 'required|in:Facebook,Telegram,Linkedin,Instagram',
            'social_media.*.company_contact_id' => 'required|integer|exists:company_contacts,id',
            'social_media.*.url' => 'required|url|max:50',
            'social_media.*.logo' => 'required|min:5|max:255',
        ];
    }

    public function authorize(): bool
    {
        $numOfContacts = CompanyContact::count();
        if ($numOfContacts === 0)
            return false;

        return true;
    }
}
