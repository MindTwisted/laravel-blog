<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMessage extends Mailable
{
    public $messageData;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param array $messageData
     * @return void
     */
    public function __construct(array $messageData)
    {
        $this->messageData = $messageData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('views.emails.contactEmail',
            ['messageData' => $this->messageData]);
    }
}
