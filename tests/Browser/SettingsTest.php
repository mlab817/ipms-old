<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SettingsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_settings_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit('/settings')
                    ->assertSee('Settings')
                    ->assertSee('Profile')
                    ->assertSee('Roles & Permissions')
                    ->assertSee('Change Password')
                    ->screenshot('settings/settings-page');
        });
    }
}
