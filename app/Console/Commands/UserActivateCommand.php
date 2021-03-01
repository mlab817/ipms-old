<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Console\Command;

class UserActivateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:activate {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activate a user using email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (! $this->argument('email')) {
            $email = $this->ask('Email');
        } else {
            $email = $this->argument('email');
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->activate();
            $user->save();

            $this->table(
                ['Name','Email','Active'],
                [
                    [
                        'Name'  => $user->name,
                        'Email' => $user->email,
                        'Active'=> $user->active,
                    ]
                ]
            );
        } else {
            $this->error('Error: No admin with email found.');
        }
    }
}
