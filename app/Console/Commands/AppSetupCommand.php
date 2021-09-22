<?php

namespace App\Console\Commands;

use App\Models\BaseProject;
use App\Models\Branch;
use App\Models\Project;
use App\Models\User;
use App\Services\GenerateUsernameService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AppSetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the application for new features';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(GenerateUsernameService $service)
    {
        $service::generateUsername();

        $this->info('Completed generating username');

        $this->setupBranchesTable();

        $this->setupBaseProjects();

        return 0;
    }

    public function setupBranchestable()
    {
        if (! Branch::count()) {
            Artisan::call('db:seed BranchesTableSeeder');
            $this->info('Seeded branches seeder');
        } else {
            $this->info('Branches table is not empty');
        }
    }

    public function setupBaseProjects()
    {
        $projects = Project::all();

        $bar = $this->output->createProgressBar(count($projects));

        $bar->start();

        // generate nanoid() for all projects
        foreach ($projects as $item) {
            $item->is_current = true;
            $item->uuid = nanoid(8);
            $item->owner()->associate(User::find($item->created_by));
            $item->save();

            // only create base project if there is none made
            if (! $item->base_project) {
                // create a base project for all projects
                $baseProject = BaseProject::create([
                    'title' => $item->title,
                    'pap_type_id' => $item->pap_type_id,
                ]);

                // set the owner to the project owner
                $baseProject->owner()->associate($item->owner);

                // link the base project id to the project
                $item->base_project_id = $baseProject->id;
                $item->save();

                $bar->advance();
            }
        }

        $bar->finish();

        $this->info('Completed setting up projects');
    }
}
