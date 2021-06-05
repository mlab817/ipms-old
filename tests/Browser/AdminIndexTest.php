<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminIndexTest extends DuskTestCase
{
    /**
     * @group admin
     *
     * @return void
     */
    public function test_it_shows_admin_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit('/admin')
                    ->assertSee('Manage Libraries')
                    ->screenshot('admin/index');
        });
    }
}
