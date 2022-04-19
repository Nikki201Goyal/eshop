<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::OrderBy('created_at', 'DESC')->get();
        $i = 1;
        return view('BackEnd.Products.view', compact('products', 'i'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('BackEnd.Products.add', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:products',
            'image' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'stock' => 'required',

        ]);
        // dd($request);
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . $image->getClientOriginalName();
        $image->move('uploads/product/images/', $imageName);
        }

        if ($request->hasFile('cover')) {
        $cover = $request->file('cover');
        $coverName = time() . $cover->getClientOriginalName();
        $cover->move('uploads/product/images/', $coverName);
        }

        products::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'uploads/product/images/' . $imageName,
            'cover' => 'uploads/product/images/' . $coverName,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'slug' =>Str::slug($request->name),


        ]);

        return redirect()->route('products.index')->with('success', 'You have successfully added a products!');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $pro = products::findOrFail($id);
        return view('BackEnd.Products.edit', compact('pro', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
        ]);
        $products = products::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/product/images/', $image_new_name);
            $products->image ='uploads/product/images/' . $image_new_name;
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $covername = time() . $cover->getClientOriginalName();
            $cover->move('uploads/product/images/', $covername);
            $products->cover ='uploads/product/images/' . $covername;
        }

       
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        
        $products->category_id = $request->category_id;
        $products->slug =  Str::slug($request->name);
        $products->stock = $request->stock;

        $products->save();

        return redirect()->route('products.index')->with([
            'success' => 'Product updated successfully'
        ]);
    }


    public function delete($id)
    {
        products::find($id)->delete();
        return redirect()->route('products.index')->with([
            'success' => 'Deleted successfully'
        ]);
    }

    public function toggleStatus($id){
        $product = products::FindOrFail($id);
        $status = !$product->status;
        $product->update(['status' => $status]);
        return back()->with('Success', 'Product status changed successfully');

    }

    public function show($id){
        $product = products::findOrFail($id);
        return view('BackEnd.Products.show', compact('product'));
    }


}
