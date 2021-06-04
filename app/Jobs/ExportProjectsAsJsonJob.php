<?php

namespace App\Jobs;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ExportProjectsAsJsonReadyNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Response;

class ExportProjectsAsJsonJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->user = User::find($userId);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $json = ProjectResource::collection(Project::all());

        $file = time() . '_export.json';

        \File::put(public_path($file), json_encode($json));

        $this->user->notify(new ExportProjectsAsJsonReadyNotification($file));
    }
}
