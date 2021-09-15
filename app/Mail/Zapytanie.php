<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Zapytanie extends Mailable
{
    use Queueable, SerializesModels;
public $request,$title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$title)
    {
        $this -> request = $request;
        $this -> subject = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.zapytanie');
    }
}
