<?php

namespace Tests\Browser;

use App\Models\CipType;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CipTypesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_cip_types_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('admin.cip_types.index'))
                    ->assertSee('CIP Types')
                    ->screenshot('admin/cip-types-index');
        });
    }

    public function test_it_deletes_cip_type()
    {
        $cipType = CipType::create(['name' => 'test cip type']);

        $this->browse(function (Browser $browser) use ($cipType) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.cip_types.edit', $cipType))
                ->screenshot('admin/cip-types-edit')
                ->press('Delete')
                ->waitFor('#modal-delete')
                ->screenshot('admin/cip-types-delete-modal')
                ->press('Confirm')
                ->screenshot('admin/cip-types-edit');
        });

        $this->assertDatabaseMissing('cip_types', $cipType->toArray());
    }
}
