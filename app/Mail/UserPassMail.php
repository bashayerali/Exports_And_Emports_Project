<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserPassMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $psaaUser;
     protected $emailUser;

    public function __construct($psaaUser, $emailUser)
    {
        //
        $this->psaaUser=$psaaUser;
        $this->emailUser=$emailUser;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user-pass-mail')->with([
            'Password' => $this->psaaUser,
            'Email' => $this->emailUser,
            
        ]);

    }
}
