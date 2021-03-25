<?php

namespace App\Observers;

use App\Models\CompanyDetail;

class CompanyDetailObserver
{
    private $locale;

    public function __construct()
    {
        $this->locale = session('language') ?? config('app.locale');
    }

    public function retrieved(CompanyDetail $companyDetail)
    {
        $companyDetail->image_title = $companyDetail->image_title[$this->locale];
        $companyDetail->about_title = $companyDetail->about_title[$this->locale];
        $companyDetail->about_description = $companyDetail->about_description[$this->locale];
        $companyDetail->help_title = $companyDetail->help_title[$this->locale];
        $companyDetail->help_description = $companyDetail->help_description[$this->locale];
    }
}
