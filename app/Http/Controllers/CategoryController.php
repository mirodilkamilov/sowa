<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        if ($request->isMethod('get'))
            return view('category.create');

        $validated = $request->validated();

        $newCategory = collect([
            'ru' => $validated['category_ru'],
            'en' => $validated['category_en'],
            'uz' => $validated['category_uz'],
        ]);

        $category = new Category;
        $category->category = $newCategory;
        $category->save();

        $request->session()->flash('alert-success', 'Category was successful added!');
        return redirect()->back();
    }
}
