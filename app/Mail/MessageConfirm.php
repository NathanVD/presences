<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Message_Confirmation_Model;
use App\Message;

class MessageConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $message_model;
    public $sent_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $sent_message)
    {
        $this->message_model = Message_Confirmation_Model::first();
        $this->sent_message = $sent_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.message.confirmation')->subject("Confirmation : ".$this->sent_message->subject);
    }
}
