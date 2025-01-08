<?php

namespace App\Jobs;

use App\Mail\NewsletterEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailsToNewsletterSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;
    public $type;
    public $title;

    /**
     * Create a new job instance.
     */
    public function __construct($users, $type, $title)
    {
        $this->users = $users;
        $this->type = $type;
        $this->title = $title;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->users as $user) {

            Mail::to($user['email'])->send(new NewsletterEmail($this->type, $this->title, $user['name']));
        }
    }
}
