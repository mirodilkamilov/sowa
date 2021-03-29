<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

   public function create()
   {
      //
   }


   public function store(Request $request)
   {
      //
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
