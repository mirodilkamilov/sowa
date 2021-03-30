<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
