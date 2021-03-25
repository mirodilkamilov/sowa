<?php

namespace App\Observers;

use App\Models\CompanyList;
use Illuminate\Http\Request;

class CompanyListObserver
{
    private $locale;

    public function __construct()
    {
        $this->locale = session('language') ?? config('app.locale');
    }

    public function retrieved(CompanyList $companyList)
    {
        $companyList->title = $companyList->title[$this->locale];
        $companyList->list = $companyList->list[$this->locale];
    }

}
