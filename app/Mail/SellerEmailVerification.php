<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellerEmailVerification extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $enc_user_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $enc_user_id)
    {
        $this->user = $user;
        $this->enc_user_id = $enc_user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.seller.verification');
    }
}
