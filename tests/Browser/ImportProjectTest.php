<?php

namespace Tests\Browser;

use App\Jobs\ProjectImportJob;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Queue;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ImportProjectTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_import_project_page()
    {
        $user = User::find(1);
        $user->givePermissionTo('projects.import');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                    ->loginAs($user->id)
                    ->visit(route('projects.import.index'))
                    ->assertSee('Import Project from v1')
                    ->screenshot('projects/import/index');
        });
    }

    public function test_it_dispatches_project_import_job()
    {
        $user = User::find(1);
        $user->givePermissionTo('projects.import');

        $id = Project::max('ipms_id') + 1;

        $this->browse(function (Browser $browser) use ($user, $id) {
            $browser
                ->loginAs($user->id)
                ->visit(route('projects.import.index'))
                ->type('id', $id)
                ->screenshot('projects/import/index-filled')
                ->press('Submit')
                ->pause(2000)
                ->assertSee('Success')
                ->screenshot('projects/import/success');
        });
    }
}
