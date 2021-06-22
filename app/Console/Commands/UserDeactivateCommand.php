<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserDeactivateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:deactivate {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate a user via email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (! $user) {
            $this->error('Error: User not found');
            return 0;
        }

        if (! $user->activated_at) {
            $this->error('Error: User already deactivated');
            return 0;
        }

        $user->deactivate();

        $this->info('Success! User successfully deactivated');

        return 1;

    }
}
