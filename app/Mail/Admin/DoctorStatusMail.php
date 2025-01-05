<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DoctorStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $doctor;

    /**
     * Create a new message instance.
     */
    public function __construct($doctor)
    {
        $this->doctor = $doctor;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->doctor['status'] === 'active' 
    ? 'Your Doctor Account is Now Active – Login to Access' 
    : 'Your Doctor Account Has Been Blocked – Contact Support';

        return new Envelope(
            subject: $subject,
        );

    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Email.DoctorStatusEmail',
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
