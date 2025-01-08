<?php

namespace App\Jobs;

use App\Mail\NewsletterEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;;

class SendEmailsToNewsletterSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $emails;
    public $type;
    public $title;
    public $name;

    /**
     * Create a new job instance.
     */
    public function __construct($emails, $type, $title,$name)
    {
        $this->emails = $emails;
        $this->type = $type;
        $this->title = $title;
        $this->name = $name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->emails as $email) {
            
            Mail::to($email)->send(new NewsletterEmail($this->type, $this->title, $this->name));
        }
    }
}
