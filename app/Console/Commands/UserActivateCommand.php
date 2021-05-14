<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserActivateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:activate {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activate a user via email';

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

        if ($user->activated_at) {
            $this->error('Error: User already activated');
            return 0;
        }

        $user->activate();

        $this->info('Success! User successfully activated');

        return 1;

    }
}
