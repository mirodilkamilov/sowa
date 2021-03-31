<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withoutEvents(function () {
            return Category::all();
        });

        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);

        $request->session()->flash('success', 'Category was successfully added!');
        return redirect()->route('categories.index');
    }


    public function edit($category)
    {
        $category = Category::withoutEvents(function () use ($category) {
            return Category::findOrFail($category);
        });

        return view('dashboard.categories.edit', compact('category'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);

        $request->session()->flash('success', 'Category was successfully edited!');
        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Category was successfully deleted!');
        return redirect()->route('categories.index');
    }
}
