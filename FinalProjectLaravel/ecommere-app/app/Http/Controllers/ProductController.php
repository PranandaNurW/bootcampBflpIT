<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $context = [
            "products" => Product::all()
        ];
        return view('product.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $context = [
            "categories" => Category::all(),
        ];
        
        return view('product.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->all();

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'New product successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Product::findOrFail($product->id);

        $context = [
            "categories" => Category::all(),
            "product" => $product
        ];

        return view('product.edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Product::findOrFail($product->id);
        $validatedData = $request->all();

        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Product successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::findOrFail($product->id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product successfully deleted');
    }
}
