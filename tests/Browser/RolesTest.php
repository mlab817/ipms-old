<?php

namespace Tests\Browser;

use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RolesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_roles_index()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('admin.roles.index'))
                    ->assertSee('Roles')
                    ->screenshot('admin/roles-index');
        });
    }

    public function test_it_shows_create_roles()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.roles.create'))
                ->assertSee('Create Role')
                ->screenshot('admin/roles-create');
        });
    }

    public function test_it_shows_edit_roles()
    {
        $this->browse(function (Browser $browser) {
            $role = Role::find(1);
            $browser
                ->loginAs(1)
                ->visit(route('admin.roles.edit', $role->id))
                ->assertSee('Edit Role')
                ->screenshot('admin/roles-edit');
        });
    }
}
