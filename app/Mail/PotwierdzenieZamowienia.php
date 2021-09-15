<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PotwierdzenieZamowienia extends Mailable
{
    use Queueable, SerializesModels;
public $order,$cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,$cart)
    {
        $this->order = $order;
        $this->cart = $cart;
        $this->subject('Huge Pic, potwierdzenie zamówienia');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.shipped');
    }
}
