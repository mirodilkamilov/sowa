<?php

namespace App\Observers;

use App\Models\About;

class AboutObserver
{
    private string $defaultLang;
    private string $locale;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
    }

    public function retrieved(About $companyDetail): void
    {
        $companyDetail->image_title = $companyDetail->image_title[$this->locale] ?? $companyDetail->image_title[$this->defaultLang];
        $companyDetail->about_title = $companyDetail->about_title[$this->locale] ?? $companyDetail->about_title[$this->defaultLang];
        $companyDetail->about_description = $companyDetail->about_description[$this->locale] ?? $companyDetail->about_description[$this->defaultLang];
        $companyDetail->help_title = $companyDetail->help_title[$this->locale] ?? $companyDetail->help_title[$this->defaultLang];
        $companyDetail->help_description = $companyDetail->help_description[$this->locale] ?? $companyDetail->help_description[$this->defaultLang];
    }
}
