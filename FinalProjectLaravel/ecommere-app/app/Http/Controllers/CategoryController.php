<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $context = [
            "categories" => Category::all()
        ];
        return view('category.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->all();

        Category::create($validatedData);

        return redirect()->route('category.index')->with('success', 'New category successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $context = [
            "category" => $category
        ];
        return view('category.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->all();

        $category->update($validatedData);

        return redirect()->route('category.index')->with('success', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::findOrFail($category->id);

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category successfully deleted');
    }
}
