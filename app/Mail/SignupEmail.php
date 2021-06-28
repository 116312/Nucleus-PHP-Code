<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        
        $this->signup_mail_data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*return $this->view('emails.forget-password',compact('users'))->subject('Nucleus App Forget Password');*/
        return $this->from('ankit.mishra@thewitslab.com','Nuclues')->subject('Welcome New users!')->view('emails.ankit');
    }
}
