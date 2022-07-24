<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

        return $orderToReturn;
    }
}
