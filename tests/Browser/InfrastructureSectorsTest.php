<?php

namespace Tests\Browser;

use App\Models\InfrastructureSector;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InfrastructureSectorsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_infrastructure_sectors_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('admin.infrastructure_sectors.index'))
                    ->assertSee('Infrastructure Sector')
                    ->screenshot('admin/infrastructure-sectors-index');
        });
    }

    public function test_it_shows_create_infrastructure_sector_form()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.infrastructure_sectors.index'))
                ->press('Create')
                ->assertSee('Add Infrastructure Sector')
                ->type('name', 'New Infra Sector')
                ->press('Submit')
                ->pause(2000)
                ->screenshot('admin/infrastructure-sectors-create');
        });

        $this->assertDatabaseHas('infrastructure_sectors', [
            'name' => 'New Infra Sector'
        ]);
    }

    public function test_it_shows_update_infrastructure_sector_form()
    {
        $this->browse(function (Browser $browser) {
            $infraSector = InfrastructureSector::find(1);
            $browser
                ->loginAs(1)
                ->visit(route('admin.infrastructure_sectors.edit', $infraSector))
                ->assertSee('Edit Infrastructure Sector')
                ->type('name', 'New Infra Sector')
                ->press('Submit')
                ->pause(2000)
                ->screenshot('admin/infrastructure-sectors-update');
        });

        $this->assertDatabaseHas('infrastructure_sectors', [
            'name' => 'New Infra Sector'
        ]);
    }

    public function test_it_deletes_infrastructure_sector()
    {
        $this->browse(function (Browser $browser) {
            $infraSector = InfrastructureSector::find(1);
            $browser
                ->loginAs(1)
                ->visit(route('admin.infrastructure_sectors.edit', $infraSector))
                ->assertSee('Edit Infrastructure Sector')
                ->press('Delete')
                ->waitFor('#modal-delete')
                ->press('Confirm')
                ->pause(2000)
                ->screenshot('admin/infrastructure-sectors-delete');
        });

        $this->assertDatabaseMissing('infrastructure_sectors', [
            'id' => 1
        ]);
    }
}
