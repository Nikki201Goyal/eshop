<?php

namespace App\Http\Controllers;

use App\Models\OrderDeatils;
use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\Order;
use App\Models\products;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;

class BackEndController extends Controller
{
     public function admin(){
         $products=products::all();
        $users=User::all();
        $order=Order::all();
        $subscribe=Subscribe::all();
        $sales = OrderDeatils::where('status', '=', '1')->get();
         $salesRecords = [];
        $sum = 0;
        foreach ($sales as $sale) {
            $sum += $sale->price * $sale->quantity;
        }
         $oldDate = Carbon::now()->subDays(7);
         for ($i=0;$i<7;$i++) {
             $date = $oldDate->addDay()->format('Y-m-d');
             foreach ($sales as $k => $sale) {
                 if (Carbon::parse($sale->created_at)->format('Y-m-d') == $date){
                    $salesRecords[$date][$k] = $sale->price * $sale->quantity;
                 }
             }
             if (!isset($salesRecords[$date])) {
                 $salesRecords[$date] = 0;
             }
             else{
                 $salesRecords[$date] = array_sum($salesRecords[$date]);
             }
         }
//         dd($salesRecords);
         return view('BackEnd.home', compact('products', 'users', 'order', 'subscribe', 'sum','salesRecords'));
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
