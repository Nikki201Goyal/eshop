<?php

namespace App\Http\Controllers;

use App\Models\Appliances;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Clothing;
use App\Models\electronics;
use App\Models\furniture;
use App\Models\Instruments;
use App\Models\Shoes;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\products;

class FrontEndController extends Controller
{
    public function home(){

        $categories=Category::all();
        $bests=products::inRandomOrder()->get()->take(3);
        $offers=products::inRandomOrder()->get()->take(2);
        $slider=products::inRandomOrder()->get()->take(3);
        $feature=products::inRandomOrder()->get()->take(3);
        $banner=category::inRandomOrder()->get()->take(2);
        $FeaturedOne=category::inRandomOrder()->get()->take(1);
        $blogs=Blog::inRandomOrder()->get()->take(3);
        $ProductAll = products::all();
        return view('FrontEnd.home', compact('categories', 'bests', 'offers', 'slider', 'feature', 'blogs', 'banner', 'FeaturedOne', 'ProductAll'));


    }

    public function contact(){
        return view('FrontEnd.contact');
    }

    public function about(){
        return view('FrontEnd.about');
    }

    public function faq(){
        return view('FrontEnd.FAQ');
    }

    public function terms(){
        return view('FrontEnd.termsAndCondition');
    }

    public function return(){
        return view('FrontEnd.return');
    }

    public function privacy(){
        return view('FrontEnd.privacy');
    }


    public function category($slug){
        $PopularProducts=products::inRandomOrder()->get()->take(5);
        $category=Category::where('slug', $slug)->first();
        $products=$category->products()->paginate(5);

        return view('FrontEnd.category', compact('category', 'PopularProducts', 'products'));
    }

    public function categoryList($slug){
        $PopularProducts=products::inRandomOrder()->get()->take(5);
        $category=Category::where('slug', $slug)->first();
        $products=$category->products()->paginate(5);
        return view('FrontEnd.categoryList', compact('category', 'PopularProducts', 'products'));
    }

    public function category4Grid($slug){
        $PopularProducts=products::inRandomOrder()->get()->take(5);
        $category=Category::where('slug', $slug)->first();
        $products=$category->products()->paginate(5);
        return view('FrontEnd.category4Grid', compact('category', 'PopularProducts', 'products'));
    }

    public function category2Grid($slug){
        $PopularProducts=products::inRandomOrder()->get()->take(5);
        $category=Category::where('slug', $slug)->first();
        $products=$category->products()->paginate(5);
        return view('FrontEnd.category2Grid', compact('category', 'PopularProducts', 'products'));
    }

    public function blogs(){
        $blogs = Blog::where('status','=',1)->paginate(5);

        return view('FrontEnd.Blogs', compact('blogs'));
    }

    public function product($slug){

        $product=products::where('slug', $slug)->first();
        // $avg=$product()->avg('rating');
        // dd($avg);
        return view('FrontEnd.product', compact('product'));
    }
    public function cart(){
        return view('FrontEnd.cart');
    }
    public function checkout(){
        return view('FrontEnd.checkout');
    }

    public function wishlist(){
        return view('FrontEnd.Wishlist');

    }

    public function storeContact(Request $request){

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        contact::create([
            'name' => $request->name,
             'phone' => $request->phone,
             'email' => $request->email,
             'subject' => $request->subject,
             'message' => $request->message,


         ]);

         return redirect()->back();

      }
}


