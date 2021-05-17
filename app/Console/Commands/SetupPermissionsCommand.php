<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;

class SetupPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permissions = config('ipms.allPermissions');
        $permissionsCount = count($permissions);

        $this->output->progressStart($permissionsCount);

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission
            ], [
                'name' => $permission
            ]);

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();

        return 1;
    }
}
