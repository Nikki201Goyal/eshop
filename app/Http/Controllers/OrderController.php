<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\OrderDeatils;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $order = Order::OrderBy('created_at', 'DESC')->get();
        $i = 1;
        return view('BackEnd.Orders.view', compact('order', 'i', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        return view('BackEnd.orderDetails.view', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function placeOrder(Request $request){
        $request->validate([
            'address_id' => 'required',
            'total'=> 'required',
            'discount'=>'required',
            'payment_method'=>'required',
            'order_notes'=>'required',


        ]);
        $order= Order::create([
            'address_id' => $request->address_id,
             'total' => $request->total,
             'discount' => $request->discount,
             'payment_method' => $request->payment_method,
             'order_notes' => $request->order_notes,
         ]);

         $cart=Cart::where('user_id', Auth::user()->id)->get();

         foreach($cart as $carts){
            $orderDetails=OrderDeatils::create([
                'quantity' => $carts->quantity,
                'price' => $carts->product->price,
                'product_id' => $carts->product->id,
                'order_id' => $order->id,
            ]);
            $carts->delete();
            Mail::to(Auth::user()->email)->send(new
            \App\Mail\OrderConfirmed($order));
         }
         return view('FrontEnd.OrderCompleted');





    }
}
