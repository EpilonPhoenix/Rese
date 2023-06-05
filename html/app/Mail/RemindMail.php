<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemindMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$shop,$name,$email,$date,$time,$id)
    {
        $this->title =$title;
        $this->shop = $shop;
        $this->name = $name;
        $this->email = $email;
        $this->date = $date;
        $this->time = $time;
        $this->id = $id;
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
            ->view('mail.reminder')
            ->with([
                'shop' => $this->shop,
                'name' => $this->name,
                'date' => $this->date,
                'time' => $this->time,
                'id' => $this->id,
            ]);
    }
}
