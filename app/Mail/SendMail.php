<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $attachments = [];


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from = [], $to = [], $subject = '', $files = [])
    {
       $this->from = $from;
       $this->to   = $to;
       $this->attachments = $files;
       $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
//        return $this
//            ->markdown('emails.html');
    }

}
