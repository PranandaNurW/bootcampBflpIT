<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $title = "Blog";
        $context = [
            "title" => $title,
            "blogs" => Blog::all()
        ];
        return view("blog.index", $context);
    }
    
    public function detail(Blog $blog)
    {
        $title = "Single Blog";
    
        $context = [
            "title" => $title,
            "blog" => $blog
        ];
        return view('blog.show', $context);
    }

    public function index()
    {
        $title = "Dashboard Blog";
        $context = [
            "title" => $title,
            "blogs" => Blog::where('user_id', auth()->user()->id)->get()
        ];
        return view("dashboard.index", $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Blog";
        $context = [
            "title" => $title,
            "categories" => Category::all()
        ];
        return view("dashboard.create", $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $validatedData = $request->all();

        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        $validatedData['image'] = $image->hashName();

        Blog::create($validatedData);
        return redirect()->route('dashboard.index')->with('success', 'New post successfully created');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $title = "Single Blog";
    
        $context = [
            "title" => $title,
            "blog" => $blog
        ];
        return view('dashboard.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $this->authorize('owner', $blog);
        Blog::findOrFail($blog->id);

        $title = "Edit Blog";
        $context = [
            "title" => $title,
            "blog" => $blog,
            "categories" => Category::all()
        ];
        return view("dashboard.edit", $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->authorize('owner', $blog);
        Blog::findOrFail($blog->id);

        $validatedData = $request->all();
        
        if ($request->hasFile('image')) {
            Storage::delete('public/images/'.$blog->image);

            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());            
            $validatedData['image'] = $image->hashName();
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        $blog->update($validatedData);


        return redirect()->route('dashboard.index')->with('success', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('owner', $blog);
        Blog::findOrFail($blog->id);
        
        $blog->delete();
        return redirect()->route('dashboard.index')->with('success', 'Post successfully deleted');
    }
}
