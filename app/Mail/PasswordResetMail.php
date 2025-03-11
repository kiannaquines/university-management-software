<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Reset Your Password')
            ->markdown('emails.password-reset')
            ->with([
                'user' => $this->user,
                'token' => $this->token,
                'resetUrl' => config('app.frontend_url') . "/reset-password?token={$this->token}&email=" . urlencode($this->user->email),
            ]);
    }
}
