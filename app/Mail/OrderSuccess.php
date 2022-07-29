<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $cart;


    public function __construct($order, $cart)
    {
        $this->order = $order;
        $this->cart = $cart;

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
            ->subject('Your order confirmation')
            ->view('mail.order.created');
    }
}
