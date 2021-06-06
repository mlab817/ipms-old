<?php

namespace Tests\Browser\Admin;

use App\Models\ImplementationMode;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ImplementationModeControllerTest extends DuskTestCase
{
    /**
     * @group implementation-mode
     */
    public function test_it_shows_modes_of_implementation_index()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit('/admin/implementation_modes')
                ->assertSee('Modes of Implementation')
                ->screenshot('implementation_modes/index');
        });
    }

    /**
     * @group implementation-mode
     */
    public function test_it_shows_create_mode_of_implementation_page_and_saves_new_item()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');
        $mode = ImplementationMode::factory()->make();

        $this->browse(function (Browser $browser) use ($user, $mode) {
            $browser
                ->loginAs($user->id)
                ->visit('/admin/implementation_modes')
                ->press('Create')
                ->assertSee('Add Mode of Implementation')
                ->screenshot('implementation_modes/create');

            $browser
                ->type('name', $mode->name)
                ->type('description', $mode->description)
                ->press('Submit');
        });

        $this->assertDatabaseHas('implementation_modes', $mode->toArray());
    }

    /**
     * @group implementation-mode
     */
    public function test_it_shows_edit_mode_of_implementation_page()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.implementation_modes.edit', ImplementationMode::all()->first()))
                ->assertSee('Edit Mode of Implementation')
                ->screenshot('implementation_modes/edit');
        });
    }

    public function test_it_deletes_a_mode_of_implementation()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');

        $mode = ImplementationMode::factory()->create();

        $this->browse(function (Browser $browser) use ($user, $mode) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.implementation_modes.edit', $mode))
                ->press('Delete')
                ->waitFor('.modal')
                ->press('Confirm')
                ->pause(2000)
                ->screenshot('admin/implementation_modes-delete');
        });

        $this->assertSoftDeleted($mode);
    }
}
