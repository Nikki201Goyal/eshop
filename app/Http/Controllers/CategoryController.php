<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::OrderBy('created_at', 'DESC')->get();
        $i = 1;
        return view('BackEnd.Categories.view', compact('category', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnd.Categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:Clothing',
            'photo' => 'required',
            'cover' => 'required',
            'description' => 'required',
            'slug' => 'required',

        ]);

        $image = $request->file('photo');
        $imageName = time() . $image->getClientOriginalName();
        $image->move('uploads/product/images/', $imageName);

        $cover = $request->file('cover');
        $coverName = time() . $cover->getClientOriginalName();
        $cover->move('uploads/product/images/', $coverName);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => 'uploads/product/images/' . $imageName,
            'cover' => 'uploads/product/images/' . $coverName,
            'slug' =>Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'You have successfully updated a post!');
    }

    public function edit($id)
    {
        $cate = Category::findOrFail($id);
        return view('BackEnd.Categories.edit', compact('cate'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required'
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->photo;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/product/images/', $image_new_name);
        }

        if ($request->hasFile('cover')) {
            $cover = $request->cover;
            $covername = time() . $cover->getClientOriginalName();
            $cover->move('uploads/product/images/', $covername);
        }

        $category = category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('categories.index')->with([
            'successful_message' => 'updated successfully'
        ]);
    }

    public function show($id){
        $category = Category::findOrFail($id);
        return view('BackEnd.Categories.show', compact('category'));
    }





}
