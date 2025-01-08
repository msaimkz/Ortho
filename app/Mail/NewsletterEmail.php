<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $type;
    public $title; 
    public $name; 

    public function __construct($type, $title,$name)
    {
        $this->type = $type;
        $this->title = $title;
        $this->name = $name;

        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->type == 'Blog' 
        ? 'New Blog is Avialable:'.$this->title 
        : ($this->type == 'Course' 
            ? 'New Course Added:'.$this->title 
            : 'Your Newsletter Email is here');

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
            view: 'Email.NewsletterMail',
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
