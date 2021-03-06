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
            'name' => 'required|min:2|max:50|unique:categories',
            'photo' => 'required',
            'cover' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = time() . $image->getClientOriginalName();
        $image->move('uploads/product/images/', $imageName);
        }

        if ($request->hasFile('cover')) {
        $cover = $request->file('cover');
        $coverName = time() . $cover->getClientOriginalName();
        $cover->move('uploads/product/images/', $coverName);
        }
        
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => 'uploads/product/images/' . $imageName,
            'cover' => 'uploads/product/images/' . $coverName,
            'slug' =>Str::slug($request->name),
        ]);

        return redirect()->route('categories.index')->with('success', 'You have successfully added a Category!');
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
        ]);
        $category = category::findOrFail($id);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/product/images/', $image_new_name);
            $category->photo = 'uploads/product/images/' . $image_new_name;
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $covername = time() . $cover->getClientOriginalName();
            $cover->move('uploads/product/images/', $covername);
            $category->cover = 'uploads/product/images/' . $covername;
        }

       
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug =  Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with([
            'success' => 'Categories updated successfully'
        ]);
    }

    public function show($id){
        $category = Category::findOrFail($id);
        return view('BackEnd.Categories.show', compact('category'));
    }





}
