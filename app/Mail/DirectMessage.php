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
    public $topic;

    /**
     * @var string
     */
    public $content;

//    public $_addr="";

    /**
     * Create a new message instance.
     *
     * @param $sender string
     * @param $topic string
     * @param $content string
     */
    public function __construct($sender, $topic, $content)
    {
//        $this->replyTo = $sender;
        $this->sender = $sender;
        $this->topic = $topic;
        $this->content = $content;
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
            ->view('emails.contact.direct-message')->replyTo($this->sender);
//            ->with([
//                'email'   => $this->sender,
//                'subject' => $this->subject,
//                'message' => $this->message,
//            ])
            ;
    }
}
