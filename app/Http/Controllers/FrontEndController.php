<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Appliances;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Clothing;
use App\Models\electronics;
use App\Models\furniture;
use App\Models\Instruments;
use App\Models\Shoes;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\Order;
use App\Models\products;
use App\Models\User;
use App\Models\Subscribe;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function home(){
// dd(Auth::check());
//        Session::set('locale', 'en');
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

    public function forgetPassword(){
        return view('FrontEnd.ForgetPassword');
    }

    public function orderCompleted(Request $request){
        $order=Order::where('oid',$request->oid)->get();
        return view('FrontEnd.orderCompleted',compact('order'));
    }

    public function orderInComplete(){
        return view('FrontEnd.orderInCompleted');
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
        return view('FrontEnd.returnPolicy');
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
        $blogs = Blog::where('status','=',1)->paginate(6);

        return view('FrontEnd.Blogs', compact('blogs'));
    }


    public function singleBlog($slug){
        $blogs = Blog::inRandomOrder()->get()->take(10);
        $blog=Blog::where('slug', $slug)->first();

        return view('FrontEnd.BlogSingle',compact('blogs', 'blog'));
    }

    public function product($slug){

        $product=products::where('slug', $slug)->first();
        $likeProducts=products::inRandomOrder()->get()->take(3);


        // $avg=$product()->avg('rating');
        // dd($avg);
        return view('FrontEnd.product', compact('product', 'likeProducts'));
    }

    public function cart(){
        if(Auth::check()){
            $address=Address::where('user_id', Auth::user()->id)->where('status', 1)->first();
            $user=Auth::user();
            $cart=Cart::where('user_id', $user->id)->get();
            $total=0;
            foreach ($cart as $item){
                $total+=$item->product->price*$item->quantity;
            }

            return view('FrontEnd.cart', compact('cart', 'address','total'));

        }
        else{
            return redirect()->route('login');
        }
    }

    public function checkout(Request $request){
//        dd($request);
        if(Auth::check()){
            $shipping = $request->shipping;
            $address=Address::where('user_id', Auth::user()->id)->where('status', 1)->first();
            $user=Auth::user();
            $cart=Cart::where('user_id', $user->id)->get();
            $total = 0;
            foreach($cart as $carts){
                $total += $carts->quantity * $carts->product->price;
            }
            return view('FrontEnd.checkout', compact('address', 'cart', 'total','shipping'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function dashboard(){
        if(Auth::check()){
            $order=Order::where('user_id', Auth::user()->id)->get();
            $user=Auth::user();
            $address= Address::where('user_id', Auth::user()->id)->get();
            return view('FrontEnd.dashboard', compact('address', 'order', 'user'));

        }
        else{
            return redirect()->route('login');
        }
    }

    public function editprofile(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ]);
        $User = Auth::user();
        $User->name = $request->name;
        $User->address = $request->address;
        $User->contact = $request->contact;
        $User->email = $request->email;
        $User->save();
        if($request->password!=null){
            // dd('pass');
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'oldpassword' => 'required',
            ]);
            if(Hash::check($request->oldpassword,$User->password)){
                // dd('hash');
                $User->password = bcrypt($request->password);
                $User->save();
                Auth::logout();
            }
            else{
                return redirect()->back()->with('warning','Old Password does not match');
            }
        }
        return redirect()->route('dashboard')->with([
            'success' => 'Profile edited successfully'
        ]);
    }
    public function wishlist(){
        if(Auth::check()){
            $user=Auth::user();
            $wishlist=Wishlist::where('user_id', $user->id)->get();
            return view('FrontEnd.Wishlist', compact('wishlist'));

        }
        else{
            return redirect()->route('login');
        }


    }

    public function storeContact(Request $request){

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $contact= contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,


        ]);
        Mail::to('nikkigoyal107@gmail.com')->send(new
        \App\Mail\ContactMessage($contact));
        return redirect()->back();
    }

    public function storeSubscribe(Request $request){

        $request->validate([
            'email'=>'required',

        ]);
        $subscibe= Subscribe::create([
            'email' => $request->email,
        ]);
        return redirect()->back();

    }

    public function compare(){
        return view('FrontEnd.compare');
    }
    public function compareData($slug){
        $category = Category::where('slug', $slug)->first();
        return response()->json($category->products);
    }
    public function compareProduct($id){
        $product = products::find($id);
        return response()->json($product);
    }

    public function search(Request $request){
        $products= products::query()
            ->where('name', 'LIKE', "%{$request->q}%")
            ->get();
        return view('FrontEnd.search', compact('products'));
    }

    public function SortBy(Request $request,$slug){


        $sort = $request->sortBy;
        $category=Category::where('slug', $slug)->first();
        $PopularProducts=products::inRandomOrder()->get()->take(5);
        if($sort=='higher_price'){
            $products = $category->products()->orderBy('price','desc')->paginate(10)->withQueryString();
        }
        elseif($sort=='lower_price'){
            $products = $category->products()->orderBy('price','asc')->paginate(10)->withQueryString();
        }
        elseif($sort=='newness'){
            $products = $category->products()->orderBy('created_at','desc')->paginate(10)->withQueryString();
        }
        if ($request->link == 'category') {
            return view('FrontEnd.category', compact('category', 'products', 'PopularProducts'));
        }
        elseif ($request->link == 'categoryList') {
            return view('FrontEnd.categoryList', compact('category', 'products', 'PopularProducts'));
        }
        elseif ($request->link == 'category2grid') {
            return view('FrontEnd.Category2Grid', compact('category', 'products', 'PopularProducts'));
        }
        elseif ($request->link == 'category4grid') {
            return view('FrontEnd.Category4Grid', compact('category', 'products', 'PopularProducts'));
        }
//        return view('FrontEnd.Category', compact('products','category','PopularProducts'));
    }

    public function filter(Request $request){
//        dd($request->page);
        $ids= array();
        if (isset($request->category)){
            foreach ($request->category as $slug) {
                $category=Category::where('slug', $slug)->first();
                array_push($ids, $category->id);
            }
        }
        $products = products::whereIn('category_id', $ids)->paginate(10)->withQueryString();
        $PopularProducts=products::inRandomOrder()->get()->take(5);
        $category=Category::where('slug', $slug)->first();
        if ($request->link == 'category') {
            return view('FrontEnd.category', compact('category', 'products', 'PopularProducts'));
        }
        elseif ($request->link == 'categoryList') {
            return view('FrontEnd.categoryList', compact('category', 'products', 'PopularProducts'));
        }
        elseif ($request->link == 'category2grid') {
            return view('FrontEnd.Category2Grid', compact('category', 'products', 'PopularProducts'));
        }
        elseif ($request->link == 'category4grid') {
            return view('FrontEnd.Category4Grid', compact('category', 'products', 'PopularProducts'));
        }
//        return view('FrontEnd.category', compact('category', 'PopularProducts', 'products'));
    }


    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

    public function invoice(Request $request){

        $order = Order::where('oid',$request->oid)->first();
//        dd($order->id);
        $total=0;
        foreach ($order->orderDetails as $item){
            $total+=$item->prod->price*$item->quantity;
        }
        return view('FrontEnd.Mail.invoice', compact('order','total'));
    }
}


