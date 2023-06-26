<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateTaskMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Create Task',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.create-task',
            with: [
                'data' => $this->data
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
