<?php

namespace App\Observers;

use App\Models\CompanyDetail;
use Illuminate\Http\Request;

class CompanyDetailObserver
{
    private $locale;

    public function __construct(Request $request)
    {
        $langInUrl = $request->segment(1);
        $this->locale = $langInUrl;
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
