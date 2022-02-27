<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function rating(Request $request){

        // dd($request);
        $request->validate([
           'user_id'=>'required',
            'rating'=>'required',
            'comment' =>'required',
        ]);

        if(Auth::check()){

        Rating::create([
        'user_id' => Auth::user()->id,
        'product_id' => $request->user_id,
        'rating' => $request->rating,
        'comment' => $request->comment,
        ]);
        return redirect()->route('home');
     }
     else{
        return response(403);
    }
    }
}
