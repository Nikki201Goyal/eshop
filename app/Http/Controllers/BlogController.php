<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function create()
    {
        return view('BackEnd.Blogs.Add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'author' => 'required|min:2|max:50',
            'date'=> 'required',
            'description'=>'required',
            'image'=>'required',

        ]);
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $image->move('uploads/product/images/', $imageName);
        }

        if ($request->hasFile('AuthorPic')) {
        $photo = $request->file('AuthorPic');
        $photoName = time().$photo->getClientOriginalName();
        $photo->move('uploads/product/images/', $photoName);
        }

        Blog::create([
            'author' => $request->author,
            'title' => $request->title,
            'date' =>$request->date,
            'description' =>$request->description,
            'image'=> 'uploads/product/images/'.$imageName,
            'AuthorPic'=> 'uploads/product/images/'.$photoName,
            'slug' =>Str::slug($request->title),

        ]);

         return redirect()->route('viewBlogs')->with('success', 'You have successfully added a blogs!');

    }

    public function index()
    {

        $blogs = Blog::OrderBy('created_at', 'DESC')->get();
        $i = 1;
        return view('BackEnd.Blogs.index', compact('blogs', 'i'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('BackEnd.Blogs.edit', compact('blog'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'author' => 'required',
            'date' => 'required',
            'description' => 'required',
            'title' => 'required'
        ]);
        $blogs = Blog::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/product/images/', $image_new_name);
            $blogs->image = 'uploads/product/images/' . $image_new_name;
        }

        if($request->hasFile('AuthorPic')){
            $photo = $request->file('AuthorPic');
            $photoname = time().$photo->getClientOriginalName();
            $photo->move('uploads/product/images/', $photoname);
            $blogs->AuthorPic = 'uploads/product/images/' . $photoname;
        }

       
        $blogs->title = $request->title;
        $blogs->author = $request->author;
        $blogs->date = $request->date;
        $blogs->description = $request->description;
        $blogs->slug =  Str::slug($request->title);

        $blogs->save();

        return redirect()->route('viewBlogs')->with([
            'success' => 'updated successfully'
        ]);
    }

    public function delete($id)
    {
        Blog::find($id)->delete();
        return redirect()->route('viewBlogs')->with([
            'success' => 'Deleted successfully'
        ]);
    }

    public function status($id){
        $statustype = Blog::find($id)
        ->select('status')
        ->where('id','=',$id)
        ->first();

        if($statustype->status == '1'){
            $status = '0';
        }else{
            $status= '1';
        }
        $values = array('status' => $status);
        Blog::find($id)->where('id','=', $id)->update($values);

        return back()->with('success','you have successfully update');
    }
}
