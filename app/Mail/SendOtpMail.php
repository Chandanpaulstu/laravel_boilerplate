<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $token;

    public function __construct($otp, $token)
    {
        $this->otp = $otp;
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Password Reset OTP')
                    ->view('emails.password_reset');
    }
}
