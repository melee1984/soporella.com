<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Shopping\Cart;


class TicketAttachEmail extends Mailable
{
    use Queueable, SerializesModels;

     public $_cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->_cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.attach')
                    ->subject('Soporella - Your Ticketing Outlet | Success');

    }
}