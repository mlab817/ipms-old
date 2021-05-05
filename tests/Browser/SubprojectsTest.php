<?php

namespace Tests\Browser;

use App\Models\Project;
use App\Models\Subproject;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SubprojectsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_subprojects_under_a_project()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('subprojects.index', Project::find(1)))
                    ->assertSee('Subprojects')
                    ->screenshot('subprojects/subprojects-index');
        });
    }

    public function test_it_shows_create_subprojects_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('subprojects.create', Project::find(1)))
                ->assertSee('Add Subproject')
                ->screenshot('subprojects/subprojects-create');
        });
    }

    public function test_it_shows_edit_subprojects_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('subprojects.edit', Subproject::find(1)))
                ->assertSee('Edit Subproject')
                ->screenshot('subprojects/subprojects-edit');
        });
    }
}
