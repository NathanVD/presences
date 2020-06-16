<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Message;

class MessageTransfer extends Mailable
{
    use Queueable, SerializesModels;

    public $sent_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $sent_message)
    {
        $this->sent_message = $sent_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.message.transfer')->subject("Transfert : ".$this->sent_message->subject);
    }
}
