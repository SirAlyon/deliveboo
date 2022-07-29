<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessRestaurant extends Mailable
{

    public $order;
    public $cart;
    public $restaurant;




    public function __construct($order,$cart, $restaurant)
    {
        $this->order = $order;
        $this->cart = $cart;
        $this->restaurant = $restaurant;

        



    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('noreply@deliveboo.com')
            ->subject('You received a new order!')
            ->view('mail.order.createdRestaurant');
    }
}
