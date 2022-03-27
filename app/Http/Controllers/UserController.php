<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('BackEnd.User.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'address' => 'required',
            'contact'=> 'required',
            'email'=>'required',


        ]);

        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $image->move('uploads/product/images/', $imageName);

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact' =>$request->contact,
            'email' =>$request->email,
            'image'=> 'uploads/product/images/'.$imageName,
        ]);

         return redirect()->route('users.index')->with('success', 'You have successfully updated a post!');

    }

    public function index()
    {

        $user =User::OrderBy('created_at', 'DESC')->get();
        $i = 1;
        return view('BackEnd.User.view', compact('user', 'i'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('BackEnd.User.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'contact' => 'required'
        ]);
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/product/images/', $image_new_name);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('users.index')->with([
            'success' => ' User Data updated successfully'
        ]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with([
            'success' => ' User Deleted successfully'
        ]);
    }

    public function toggleStatus($id){


        $user = User::FindOrFail($id);
        $status = !$user->status;
        $user->update(['status' => $status]);
        return back()->with('Success', 'User status changed successfully');

    }
}
