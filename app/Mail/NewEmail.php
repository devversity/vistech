<?php

namespace App\Mail;


use Illuminate\Support\Facades\Mail;

class NewEmail
{
    /**
     * Mail Data
     *
     * @var array
     */
    public array $mailData;

    /**
     * Recipient
     *
     * @var string
     */
    public string $recipient;

    /**
     * Create a new message instance.
     *
     * @param string $recipient
     * @param array $mailData
     *
     * @return void
     */
    public function __construct(string $recipient, array $mailData)
    {
        $this->recipient = $recipient;
        $this->mailData = $mailData;
    }

    public function send()
    {
        Mail::send('emails.' . $this->mailData['template'], $this->mailData, function($message) {
            $message->to($this->recipient, config('app.name'))
                ->subject($this->mailData['subject']);

            $message->from($this->mailData['from'], config('app.name'));
        });
    }


}
