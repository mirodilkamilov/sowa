<?php

namespace App\Observers;

use App\Models\CompanyList;
use Illuminate\Http\Request;

class CompanyListObserver
{
    private $locale;

    public function __construct(Request $request)
    {
        $langInUrl = $request->segment(1);
        $this->locale = $langInUrl;
    }

    public function retrieved(CompanyList $companyList)
    {
        $companyList->title = $companyList->title[$this->locale];
        $companyList->list = $companyList->list[$this->locale];
    }

}
