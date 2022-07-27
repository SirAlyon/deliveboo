<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::all();
        $orderToReturn = [];
        for($i=1;$i<13;$i++){
            $orderToReturn[]=['month'=> $i, 'value'=>0];
        }

        foreach ($data as $order){
            $month = $order['created_at']->format('m');
            $orderToReturn[$month -1]['value'] += floatval($order['total_price']);
        }
        $orderShifted = [];
        $today = new DateTime();
        $todayMonth = intval($today->format('m'));
        //dd($todayMonth);
        for ($i=0; $i < 12; $i++) {

            $orderShifted[] = $orderToReturn[($i + $todayMonth) % 12];
        }
        return $orderShifted;

        //return $orderToReturn;
    }

    public function store(Request $request)
    {
        //ddd($request);



        $val_data = $request->validate([
            'guest_name' => ['required'],
            'guest_lastname' => ['required'],
            'guest_address' => ['required'],
            'guest_email' => ['required'],
            'guest_phone_number' => ['required'],
            'total_price' => ['required'],
        ]);

        //ddd($val_data);


        $new_order = Order::create($val_data);



        $shopping_cart = $request['shopping_cart'];
        $test = $shopping_cart[0];
        $products_id = $request['products_id'];
        //$test = $shopping_cart[0]->id;
        //$new_order->products()->->attach($shopping_cart);
        //$new_post->tags()->attach($request->tags);

        //ddd($products_id);

        foreach($products_id as $info){
            $new_order->products()->attach($info['id'], ['quantity'=> $info['qty'] ]);
            echo('id: ' .$info['id']. 'qty: '.$info['qty']);
        };
        //$new_order->products()->attach($products_id->id, ['quantity'=> $products_id->qty ]);

        //Response della chaiamta axios post, se creazione ordine è andata a buon fine...
        if($val_data){
            return  ddd($request->all()) ;
        }else{
            return 'no';
        }


        
    }
}

