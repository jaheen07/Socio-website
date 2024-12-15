<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class reset_pass extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data = '';
    public function __construct($code)
    {
        $this->data = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $mssg = 'Hello socio user,<br>here is your password reset code:<br>'.$this->data;
        return $this->html($mssg)->subject('New Password Restoration Code');
    }
}
