<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\TextAreaAnswer;
use Mail;

class EmailTextArea implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $text_email;
    public function __construct($text_email)
    {
        $this->text_email=$text_email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admin=env('APP_ADMIN_EMAIL');
        Mail::to($admin)->send(new TextAreaAnswer($this->text_email));
    }
}
