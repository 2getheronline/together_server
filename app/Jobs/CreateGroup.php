<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CreateGroup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $group;
    private $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($group, $message)
    {
        $this->group = $group;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->group->users as $user) {

            Mail::send('mails.GroupCreated', ['messageContent' => $this->message, 'group' => $this->group], function ($m) use ($user) {
                $m->to($user->email)->subject('Group Invition');
            });
        }
    }
}
