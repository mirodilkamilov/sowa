<?php

namespace App\Observers;

use App\Models\AboutList;

class AboutListObserver
{
    private $defaultLang;
    private $locale;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
    }

    public function retrieved(AboutList $companyList)
    {
        $companyList->title = $companyList->title[$this->locale] ?? $companyList->title[$this->defaultLang];
        $companyList->list = $companyList->list[$this->locale] ?? $companyList->list[$this->defaultLang];
    }

}
