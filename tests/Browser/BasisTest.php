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
                ->assertSee('Basis')
                ->screenshot('admin/basis-create');
        });
    }

    public function test_it_shows_edit_form_for_implementation_basis()
    {
        $basis = Basis::factory()->create();

        $this->browse(function (Browser $browser) use ($basis) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.bases.edit', $basis->slug))
                ->assertSee('Edit')
                ->screenshot('admin/basis-edit');
        });
    }
}
