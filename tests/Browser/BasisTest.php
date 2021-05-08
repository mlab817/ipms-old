<?php

namespace Tests\Browser;

use App\Models\Basis;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BasisTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_list_of_implementation_basis()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.bases.index'))
                ->assertSee('Basis')
                ->screenshot('admin/basis-index');
        });
    }

    public function test_it_shows_create_form_for_implementation_basis()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.bases.create'))
                ->type('name', 'New Basis')
                ->press('Submit')
                ->assertSee('Basis')
                ->screenshot('admin/basis-create');
        });

        $this->assertDatabaseHas('bases', ['name' => 'New Basis']);
    }

    public function test_it_shows_edit_form_for_implementation_basis()
    {
        $this->browse(function (Browser $browser) {
            $basis = Basis::create(['name' => 'New Basis']);

            $browser
                ->loginAs(1)
                ->visit(route('admin.bases.edit', 'new-basis'))
                ->assertSee('Edit')
                ->type('name', 'New Basis 2')
                ->type('description', 'second basis')
                ->screenshot('admin/basis-edit')
                ->press('Submit')
                ->pause(2000);
        });

        $this->assertDatabaseHas('bases', [
            'name' => 'New Basis 2',
            'description'   => 'second basis'
        ]);
    }
}
