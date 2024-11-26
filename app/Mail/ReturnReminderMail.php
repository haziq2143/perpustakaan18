<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReturnReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $book;
    public $loan;



    /**
     * Create a new message instance.
     */
    public function __construct($user, $book, $loan)
    {
        $this->user = $user;
        $this->book = $book;
        $this->loan = $loan;
    }

    /**
     * Get the message envelope.
     */

    public function build() {}
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengingat Pengembalian Buku',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.return_reminder',
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
