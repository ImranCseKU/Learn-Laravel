<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class VerificationEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $user )
    {
        $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verification')->with('user', $this->user);

    }
}
