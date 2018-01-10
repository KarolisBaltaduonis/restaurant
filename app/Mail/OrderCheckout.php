<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class OrderCheckout extends Mailable
{
    use Queueable, SerializesModels;

    protected $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart)
    {
          $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.checkout')->with([
          'cart'=>$this->cart,
          'name'=>Auth::user()->name,
        ]);
    }
}
