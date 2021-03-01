<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:assign {--email=} {--role=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign role to user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $role = $this->option('role');
        $email = $this->option('email');

        $this->info($email);

        // find user based on email
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->assignRole($role);

            $headers = ['Name','Email','Roles'];
            $fields = [
                'Name' => $user->name,
                'Email'=> $user->email,
                'Roles'=> implode(', ', $user->roles->pluck('name')->toArray()),
            ];

            $this->table($headers, [$fields]);

            $this->info('Successfully assigned role');
        } else {
            $this->error('Error: User not found');
        }
    }
}
