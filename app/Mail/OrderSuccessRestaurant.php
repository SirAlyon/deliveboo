<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessRestaurant extends Mailable
{


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('noreply@deliveboo.com')
            ->subject('A new order was created')
            ->view('mail.order.createdRestaurant');
    }
}