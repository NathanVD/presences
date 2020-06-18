<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Newsletter_Subscriber_Model;

class NewsletterSubscriber extends Mailable
{
    use Queueable, SerializesModels;

    public $message_model;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message_model = Newsletter_Subscriber_Model::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newsletter.subscribe');
    }
}