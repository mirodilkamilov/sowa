<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    private string $locale;

    public function __construct()
    {
        $this->locale = session('language') ?? config('app.default_language');
    }

    public function retrieved(Category $category): void
    {
        if (isset($category))
            $category->category = $category->category[$this->locale];
    }
}
