<?php

namespace Tests\Browser\Admin;

use App\Models\CipType;
use App\Models\ImplementationMode;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CipTypeControllerTest extends DuskTestCase
{
    /**
     * @group cip-type
     */
    public function test_it_shows_cip_types_index()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.cip_types.index'))
                ->assertSee('CIP Types')
                ->screenshot('admin/cip-types-index');
        });
    }

    /**
     * @group cip-type
     */
    public function test_it_shows_create_cip_type_form()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.cip_types.index'))
                ->press('Create')
                ->assertSee('Add CIP Type')
                ->screenshot('admin/cip-types-create');
        });
    }

    /**
     * @group cip-type
     */
    public function test_it_shows_edit_form_and_updates_implementation_mode()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.cip_types.index'))
                ->pause(2000)
                ->clickLink('Edit')
                ->assertSee('Edit CIP Type')
                ->screenshot('admin/cip-types-edit');
        });
    }

    /**
     * @group cip-type
     */
    public function test_it_can_update_cip_type()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');
        $cipType = CipType::factory()->create();

        $this->browse(function (Browser $browser) use ($user, $cipType) {
            $browser
                ->loginAs($user->id)
                ->visit(route('admin.cip_types.edit', $cipType))
                ->assertSee('Edit CIP Type')
                ->screenshot('admin/cip-types-edit');

            $browser
                ->type('name', 'New implementation mode')
                ->type('description', 'My description')
                ->press('Submit');
        });

        $this->assertDatabaseHas('cip_types', [
            'name' => 'New implementation mode',
            'description' => 'My description'
        ]);
    }

    /**
     * @group cip-type
     */
    public function test_it_deletes_cip_type()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->assignRole('admin');

        $cipType = CipType::create(['name' => 'test cip type']);

        $this->browse(function (Browser $browser) use ($user, $cipType) {
            $browser
                ->loginAs($user->id)
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
