<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupValidatorFeature extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:validator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup validator feature';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('permission:create-role validator web');
        Artisan::call('permission:create-permission projects.validate web');
        $this->info('Successfully created validator role and projects.validate permission');

        $validatorRole = Role::findByName('validator');
        $validatorRole->givePermissionTo('projects.validate');
        $this->info('Successfully assigned permission to validator');

        return 0;
    }
}
