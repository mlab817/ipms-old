<?php

namespace Tests\Browser\Admin;

use App\Models\Basis;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BasisControllerTest extends DuskTestCase
{
    /**
     * @group basis
     */
    public function test_it_shows_list_of_implementation_basis()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
//        $user->givePermissionTo('libraries.view_index');
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.bases.index'))
                ->assertSee('Basis')
                ->screenshot('admin/basis-index');
        });
    }

    /**
     * @group basis
     */
    public function test_it_shows_create_form_for_implementation_basis()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
//        $user->givePermissionTo('libraries.create');
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.bases.create'))
                ->type('name', 'New Basis')
                ->press('Submit')
                ->assertSee('Basis')
                ->screenshot('admin/basis-create');
        });

        $this->assertDatabaseHas('bases', ['name' => 'New Basis']);
    }

    /**
     * @group basis
     */
    public function test_it_shows_edit_form_for_implementation_basis()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
//        $user->givePermissionTo('libraries.create');
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $basis = Basis::create(['name' => 'New Basis']);

            $browser
                ->loginAs($user->id)
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
