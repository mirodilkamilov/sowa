<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;

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
        try {
            Category::create($validated);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('categories.index');
        }

        $request->session()->flash('success', 'Category was successfully added!');
        return redirect()->back();
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
        try {
            $category->update($validated);
        } catch (\Exception $exception) {
            $request->session()->flash('error', $exception->getMessage());
            return redirect()->route('categories.index');
        }

        $request->session()->flash('success', 'Category was successfully edited!');
        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (QueryException $exception) {
            session()->flash('error', "Project with category: $category->category exist. Please edit or delete that project first");
            return redirect()->route('categories.index');
        }

        session()->flash('success', 'Category was successfully deleted!');
        return redirect()->route('categories.index');
    }
}
