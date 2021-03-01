<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create
        {email : the email to register}
        {--email= : the email to register}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get email from arguments
        // or from email option
        // defaults to argument
        $email = $this->argument('email') ? $this->argument('email') : $this->option('email');

        // if it is not provided, ask for one
        if (!$email) {
            $email = $this->ask('Email');
        }

        // tell the user that we are looking for user with that email
        // $this->info('Please wait while we check for user records');

        // validate if email is already in use
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->info('This email is available');

            if ($this->confirm('Do you wish to continue?')) {
                // ask user for inputs
                $name       = $this->ask('Name');
                $password   = $this->secret('Password');
                $active     = $this->choice(
                    'Activate upon creation',
                    ['yes','no'],
                    0
                );

                $inputs = [
                    'name'      => $name,
                    'email'     => $email,
                    'password'  => $password,
                    'active'    => (bool) $active,
                ];

                // create user
                $validator = $this->validate($inputs);

                if ($validator->fails()) {
                    $this->info('User not created. See error messages below:');

                    foreach ($validator->errors()->all() as $error) {
                        $this->error($error);
                    }

                    return 1;
                }

                try {
                    $user = User::create([
                        'name'      => $name,
                        'email'     => $email,
                        'password'  => Hash::make($password),
                        'active'    => (bool) $active,
                    ]);

                    $headers = ['Name','Email','Active'];
                    $fields = [
                        'Name' => $user->name,
                        'Email' => $user->email,
                        'Active'=> $user->active,
                    ];

                    $this->info('Successfully created user');
                    $this->table($headers, [$fields]);
                } catch (\Exception $exception) {
                    $this->error($exception->getMessage());
                }
            }
        } else {
            $this->error('Error: Email is already in use.');
        }
    }

    public function validate($input): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($input, [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8'],
            'active'    => ['required', 'bool'],
        ]);
    }
}
