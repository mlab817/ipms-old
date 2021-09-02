<?php

namespace App\Jobs;

use App\Models\Member;
use App\Models\Office;
use App\Models\User;
use App\Notifications\SendInvitationForUserToJoinOfficeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendInvitationForUserToJoinOfficeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $member;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->member->member_id);

        $user->notify(new SendInvitationForUserToJoinOfficeNotification($this->member->id));
    }
}
