<?php

namespace App\Http\ViewComposers;

use App\Models\CompanyContact;
use Illuminate\View\View;

class CompanyContactsComposer
{
    private $companyContact;

    public function __construct()
    {
        $this->companyContact = CompanyContact::with('socialMedia')->first();
    }

    public function compose(View $view)
    {
        $view->with('companyContact', $this->companyContact);
    }
}
