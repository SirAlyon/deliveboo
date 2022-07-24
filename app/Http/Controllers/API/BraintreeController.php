<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function index(Request $request)
    {

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'bfnn26wc5d95kszv',
            'publicKey' => 'q3fb352q8jjdsq4f',
            'privateKey' => '5d1df97967da79b0b6f8c2cffc1076cb'
        ]);

        // pass $clientToken to your front-end
        $clientToken = $gateway->clientToken()->generate();
        //ddd($clientToken);
        
        return $clientToken;
    }

    public function makePayment(Request $request)
    {
        ddd($request);
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'bfnn26wc5d95kszv',
            'publicKey' => 'q3fb352q8jjdsq4f',
            'privateKey' => '5d1df97967da79b0b6f8c2cffc1076cb'
        ]);

        $nonce = $request->payment_method_nonce;
        $amount = $request->amount;



        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
            'submitForSettlement' => True
            ]
        ]);

        //ddd($request, $nonce,$amount, $result);
        $orderController = new OrderController;

        
        return redirect('/');

    
    }
}