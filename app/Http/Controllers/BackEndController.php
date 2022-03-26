<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\Subscribe;
use Carbon\Carbon;

class BackEndController extends Controller
{
     public function admin(){
         return view('BackEnd.home');
     }

     public function Contact(){
        $contact = contact::all();
        $i=1;
        return view('BackEnd.Contact.contact', compact('contact', 'i'));
    }

    public function ConInfo($id){
        $mytime = Carbon::now()->format('d-m-Y');
     $contact=contact::findOrFail($id);
    return view('BackEnd.Contact.conInfo', compact('contact', 'mytime'));
    }

    public function Subscribe(){
        $subscribe = Subscribe::all();
        $i=1;
        return view('BackEnd.Subscribers.subscribe', compact('subscribe', 'i'));
    }
}
