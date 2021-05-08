<?php

namespace Tests\Browser;

use App\Models\ReadinessLevel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReadinessLevelsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_readiness_levels_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('admin.readiness_levels.index'))
                    ->assertSee('Readiness Levels')
                    ->screenshot('admin/readiness-levels-index');
        });
    }

    public function test_it_shows_create_readiness_levels_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.readiness_levels.create'))
                ->assertSee('Add Readiness Level')
                ->screenshot('admin/readiness-levels-create');
        });
    }

    public function test_it_shows_edit_readiness_levels_page()
    {
        $this->browse(function (Browser $browser) {
            $readinessLevel = ReadinessLevel::find(1);
            $browser
                ->loginAs(1)
                ->visit(route('admin.readiness_levels.edit', $readinessLevel))
                ->assertSee('Edit Readiness Level')
                ->screenshot('admin/readiness-levels-edit');
        });
    }
}
