<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    private $locale;

    public function __construct()
    {
        $this->locale = session('language') ?? config('app.locale');
    }

    public function retrieved(Category $category)
    {
        $category->category = $category->category[$this->locale];
    }
}
