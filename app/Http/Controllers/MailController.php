<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function OrderConfirmed(){
        $details = [
            'title' => 'Mail from admin',
            'body' => 'Ur order has been confirmed',

        ];
    \Mail::to('your_receiver_email@gmail.com')->send(new
    \App\Mail\OrderConfirmed($details));

    }
}
