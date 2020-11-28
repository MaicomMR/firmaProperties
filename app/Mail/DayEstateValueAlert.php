<?php

namespace App\Mail;

use App\MailingListModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DayEstateValueAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $emailTitle;
    public $emailSubject;
    public $estatesObject;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $emailTitle, $emailSubject, $estatesObject)
    {
        $this->email = $email;
        $this->emailTitle = $emailTitle;
        $this->emailSubject = $emailSubject;
        $this->estatesObject = $estatesObject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $estates = $this->estatesObject;

        $this->subject($this->emailSubject);
        $this->to($this->email, 'Maicom');
        $this->from('estatecare@gmail.com', $this->emailTitle);

        return $this->view('mail.alertEmail', compact(['estates']));
    }
}
