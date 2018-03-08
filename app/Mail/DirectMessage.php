<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DirectMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $sender;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $content;

    /**
     * Create a new message instance.
     *
     * @param $sender string
     * @param $subject string
     * @param $message string
     */
    public function __construct($sender, $subject, $message)
    {
        $this->sender = $sender;
        $this->subject = $subject;
        $this->content = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // PLAIN TEXT:   $this->view('view.email')->text('emails.orders.shipped_plain');
        // MODIFYING FROM:  $this->from('box@server.com')->view('view.email')
        return $this
            ->view('emails.contact.direct-message')
//            ->with([
//                'email'   => $this->sender,
//                'subject' => $this->subject,
//                'message' => $this->message,
//            ])
            ;
    }
}
