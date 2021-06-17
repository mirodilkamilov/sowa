<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Http\RedirectResponse;

class SocialMediaController extends Controller
{
    /**
     * Both creates and updates social media
     *
     * @param StoreSocialMediaRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSocialMediaRequest $request)
    {
        $validated = $request->validated()['social_media'];

        try {
            SocialMedia::upsert($validated, ['name'], ['url']);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('company-contacts.index');
        }

        $request->session()->flash('success', 'Social media information was successfully saved!');
        return redirect()->route('company-contacts.index');
    }
}
