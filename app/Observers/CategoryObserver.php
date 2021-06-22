<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    private $defaultLang;
    private $locale;

    public function __construct()
    {
        $this->defaultLang = config('app.default_language');
        $this->locale = session('language') ?? $this->defaultLang;
    }

    public function retrieved(Category $category)
    {
        if (isset($category))
            $category->category = $category->category[$this->locale];
    }
}
