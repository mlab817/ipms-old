<?php

namespace Tests\Browser;

use App\Models\Sdg;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SdgsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('admin.sdgs.index'))
                    ->assertSee('Sustainable Development Goals')
                    ->screenshot('admin/sdgs-index');
        });
    }

    public function test_it_shows_create_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.sdgs.create'))
                ->assertSee('Add SDG')
                ->screenshot('admin/sdgs-create');
        });
    }

    public function test_it_shows_edit_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.sdgs.edit', Sdg::find(1)))
                ->assertSee('Edit SDG')
                ->screenshot('admin/sdgs-edit');
        });
    }
}
