<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminCongeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array  $admins;


    /**
     * Create a new message instance.
     */
    public function __construct(array $admins,public String $title,public String $message,public String $url)
    {
        $this->admins = $admins;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $toAddresses = array_map(function ($admin) {
            return new Address($admin['email'], $admin['name']);
        }, $this->admins);

        return new Envelope(
            subject: 'New Conge received',
            from: new Address('Bw0dL@example.com', 'Admin'),
            to:$toAddresses,

        );
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.mail',
            with:[
                'title'=>$this->title,
                'message'=>$this->message,
                'url'=>'http://127.0.0.1:8000/admin/conges'
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
