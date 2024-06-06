<?php

namespace App\Http\Controllers;
use App\Models\Property;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
    public function show($id)
    {
        $category = Category::find($id);
        $properties = Property::where('category_id', $id)->get();
        return view('categories.category', compact('category', 'properties'));
    }
    public function client()
    {
        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }
}

