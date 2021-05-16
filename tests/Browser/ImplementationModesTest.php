<?php

namespace Tests\Browser;

use App\Models\ImplementationMode;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ImplementationModesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_modes_of_implementation_index()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit('/admin/implementation_modes')
                    ->assertSee('Modes of Implementation')
                    ->screenshot('implementation_modes/index');
        });
    }

    public function test_it_shows_create_mode_of_implementation_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit('/admin/implementation_modes')
                ->press('Create')
                ->assertSee('Add Mode of Implementation')
                ->screenshot('implementation_modes/create');
        });
    }

    public function test_it_shows_edit_mode_of_implementation_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.implementation_modes.edit', ImplementationMode::all()->first()))
                ->assertSee('Edit Mode of Implementation')
                ->screenshot('implementation_modes/edit');
        });
    }
}
