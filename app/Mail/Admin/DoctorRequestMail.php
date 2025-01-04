<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DoctorRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    private $doctor;
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
        $subject = $this->doctor['status'] === 'approve' 
        ? 'Doctor Registration Approved – Start Accessing Your Account' 
        : ($this->doctor['status'] === 'reject' 
            ? 'Your Doctor Registration Request Has Been Rejected' 
            : 'Your Doctor Registration Request Update');

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
            view: 'Email.DoctorRequestEmail',
            with: [
                'doctor' => $this->doctor, // Pass the $doctor variable to the view
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
