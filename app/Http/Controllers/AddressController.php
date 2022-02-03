<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'address' => 'required',
            'contact'=> 'required',
            'email'=>'required',
            'postcode'=>'required',


        ]);

       $address= Address::create([
            'name' => $request->name,
             'address' => $request->address,
             'email' => $request->email,
             'contact' => $request->contact,
             'user_id' => Auth::user()->id,
             'postcode' => $request->postcode,



         ]);
         $addresses = Address::where('user_id', Auth::user()->id)->get();
         foreach($addresses as $a){
             $a->update(['status'=>0]);

         }
         $address->update(['status'=>1]);
         return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddressRequest  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'email' => 'required',
            'postcode' => 'required',
        ]);

        $address = Address::findorFail($request->id);
        $address->name = $request->name;
        $address->contact = $request->contact;
        $address->address = $request->address;
        $address->postcode = $request->postcode;
        $address->email = $request->email;
        $address->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }

    public function activate($id){
        $address = Address::where('user_id', Auth::user()->id)->get();
        foreach($address as $a){
            $a->update(['status'=>0]);

        }
        $add=Address::findOrFail($id);
        $add->update(['status'=>1]);
        return redirect()->back();

    }
}
