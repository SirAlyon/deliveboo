<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Controllers\Admin\OrderController;
use App\Mail\OrderSuccess;
use App\Mail\OrderSuccessRestaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

       //ddd($request);
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


        //dd($request);
        /* $new_order = Order::find('orders')->where('total_price', $result->amount);
        dd($new_order); */
        Mail::to($request->guest_user_email)->send(new OrderSuccess());
        $restaurant = User::find($request->user_id);
        Mail::to($restaurant->email)->send(new OrderSuccessRestaurant());
        //Mail::to(User::find())
/*
        $val_data = $request->validate([
            'guest_name' => ['required'],
            'guest_lastname' => ['required'],
            'guest_address' => ['required'],
            'guest_email' => ['required'],

            'guest_phone_number' => ['required'],
            'total_price' => ['required'],
        ]);

        //ddd($val_data);
        Order::create($val_data);
 */

        return redirect('/');


    }
}
