<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $register;
    protected $billing;

    public function __construct($register,$billing)
    {
        $this->register = $register;
        $this->billing = $billing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
     
        return $this->view('emails.register',['register'=> $this->register,'billing'=>$this->billing])->subject('Round Register Notification');
    }
}
