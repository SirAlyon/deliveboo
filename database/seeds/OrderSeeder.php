<?php

use App\Models\Order;
use Illuminate\Database\Seeder;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('db.orders');

        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->guest_name = $order['guest_name'];
            $new_order->guest_lastname = $order['guest_lastname'];
            $new_order->guest_email = $order['guest_email'];
            $new_order->guest_address = $order['guest_address'];
            $new_order->guest_phone_number = $order['guest_phone_number'];
            $new_order->total_price = $order['total_price'];
            $new_order->save();
        }
    }
}

