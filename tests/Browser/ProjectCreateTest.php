<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProjectCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_create_project_form()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('projects.create'))
                    ->screenshot('projects-create-page')
                    ->assertSee('Add New PAP');
        });
    }

    public function test_it_returns_errors_on_validation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('projects.create'))
                ->loginAs(1)
                ->click('Submit')
                ->assertSee('Add New Project')
                ->assertSee('The PAP Title is required.')
                ->screenshot('validation errors');
        });
    }

    public function test_it_creates_project()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('projects.create'))
                ->type('title', 'New Project')
                ->select('pap_type_id', '1')
                ->radio('regular_program','1')
                ->check('bases[]', '2')
                ->type('description','Description of the PAP')
                ->type('expected_outputs', 'Expected outputs of the PAP')
                ->type('total_project_cost', 10000000)
                ->radio('has_infra', 1)
                ->select('project_status_id', '1')
                ->screenshot('projects-create-page');
        });
    }

    public function test_it_shows_create_project_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(4)
                ->visit(route('projects.create'))
                ->screenshot('projects/create-1')
                ->script('window.scrollTo(0, 1080);');
            $browser
                ->screenshot('projects/create-2')
                ->script('window.scrollTo(1080, 2160);');
            $browser->screenshot('projects/create-3')
                ->script('window.scrollTo(2160, 3240);');
            $browser->screenshot('projects/create-4')
                ->script('window.scrollTo(3240, 4320);');
            $browser->screenshot('projects/create-5')
                ->script('window.scrollTo(4320, 5400);');
            $browser->screenshot('projects/create-6')
                ->script('window.scrollTo(5400, 6480);');
            $browser->screenshot('projects/create-7')
                ->script('window.scrollTo(6480, 7560);');
            $browser->screenshot('projects/create-8')
                ->script('window.scrollTo(7560, 8640);');
            $browser->screenshot('projects/create-9')
                ->script('window.scrollTo(8640, 9720);');
        });
    }
}
