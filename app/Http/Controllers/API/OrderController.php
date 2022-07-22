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
        $orders=[];
        foreach ($data as $order){
            array_push($orders, '€' . $order['total_price'], $order['created_at']->format('m'));
        }
        return $orders;
    }
}
