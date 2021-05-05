<?php

namespace Tests\Browser;

use App\Models\PdpIndicator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PdpIndicatorsTest extends DuskTestCase
{
    public function test_it_shows_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.pdp_indicators.index'))
                ->assertSee('PDP-RM Indicators')
                ->screenshot('admin/pdp_indicators-index');
        });
    }

    public function test_it_shows_create_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.pdp_indicators.create'))
                ->assertSee('Add PDP RM Indicator')
                ->screenshot('admin/pdp_indicators-create');
        });
    }

    public function test_it_shows_edit_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.pdp_indicators.edit', PdpIndicator::whereNotNull('name')->first()))
                ->assertSee('Edit PDP RM Indicator')
                ->screenshot('admin/pdp_indicators-edit');
        });
    }
}
