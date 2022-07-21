<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function index(Request $request)
    {
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'bfnn26wc5d95kszv',
            'publicKey' => 'q3fb352q8jjdsq4f',
            'privateKey' => '5d1df97967da79b0b6f8c2cffc1076cb'
        ]);
        $clientToken = $gateway->clientToken()->generate([
            "customerId" => 'alessio'
        ]);

        ddd($gateway);
        //return view('admin.test', compact('gateway'));
    }

    public function makePayment(Request $request)
    {
        
    }
}

