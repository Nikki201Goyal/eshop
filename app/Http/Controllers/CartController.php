<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function buyNow($slug){
        $product=products::where('slug', $slug)->first();
        $cart = Cart::all();
        if(Auth::check()){
            foreach($cart as $carts){
                $carts->delete();
            }
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,

                ]);
            return redirect()->route('cart');
            }
        else{
            return response()->json(['message' => 'login']);
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',


        ]);
        // return response()->json($user);
        if(Auth::check()){
            $product= Cart::where('user_id', Auth::user()->id)->where('product_id',$request->product_id)->first();

            if($product){
                $newCount = $product->quantity+1;
                $product->update(['quantity'=>$newCount]);
                return response()->json(['message' => 'success']);
            }
            else{
                $cart=Cart::create([

                    'user_id' => $request->user_id,
                    'product_id' => $request->product_id,

                ]);
                return response()->json(['message' => 'success']);
            }

        }
        else{
            return response()->json(['message' => 'login']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->update($request->all());
        return response()->json(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return back();
    }

    public function fromWishlist($id){
        $product = Wishlist::findOrFail($id);
        $data=[
            'user_id'=>$product->user_id,
            'product_id'=>$product->product_id,

        ];
        Cart::create($data);
        $product->delete();
        return back()->with('sucess', 'product added to cart sucessfully');
    }
}
