<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PatientStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $subject;
    /**
     * Create a new message instance.
     */
    public function __construct($patient)
    {
        $this->patient = $patient;

        $this->subject = $this->patient['status'] === 'block' 
        ? 'Your Account Has Been Blocked' 
        : ($this->patient['status'] === 'active' 
            ? 'Your Account Has Been Activated' 
            : 'Account Status Update');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->patient['status'] === 'block' 
        ? 'Your Account Has Been Blocked' 
        : ($this->patient['status'] === 'active' 
            ? 'Your Account Has Been Activated' 
            : 'Account Status Update');

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
            view: 'Email.PatientAccountStatus',
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
