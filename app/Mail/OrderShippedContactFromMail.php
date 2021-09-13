<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShippedContactFromMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_from;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_from)
    {
        $this->contact_from=$contact_from;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contact.contact_form');
    }
}
