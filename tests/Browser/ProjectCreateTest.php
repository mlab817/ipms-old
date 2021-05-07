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
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('projects.create'))
                    ->screenshot('projects-create-page')
                    ->assertSee('Add New Project');
        });
    }

    public function test_it_returns_errors_on_validation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('projects.create'))
                ->loginAs(1)
                ->click('@submit-button')
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
}
