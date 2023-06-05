<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoticeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$message,$name, $email)
    {
        $this->title = $title;
        $this->message = $message;
        $this->name = $name;
        $this->email = $email;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject($this->title)
            ->view('mail.notice')
            ->with([
                'name' => $this->name,
                'contents' => $this->message,
            ]);
    }
}
