<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExportsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_export_data_page()
    {
        $user = User::find(1);
        $user->givePermissionTo('exports.view_index');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                    ->loginAs($user->id)
                    ->visit(route('exports.index'))
                    ->assertSee('Export Data')
                    ->screenshot('exports/index');
        });
    }
}
