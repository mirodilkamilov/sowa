<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryObserver
{
    private $locale;

    public function __construct(Request $request)
    {
        $langInUrl = $request->segment(1);
        $this->locale = $langInUrl;
    }

    public function retrieved(Category $category)
    {
        $category->category = $category->category[$this->locale];
    }
}
