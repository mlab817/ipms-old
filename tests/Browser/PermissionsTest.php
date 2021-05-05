<?php

namespace Tests\Browser;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PermissionsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_permissions_index()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.permissions.index'))
                ->assertSee('Permissions')
                ->screenshot('admin/permissions-index');
        });
    }

    public function test_it_shows_create_permissions()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('admin.permissions.create'))
                ->assertSee('Create Permission')
                ->screenshot('admin/permissions-create');
        });
    }

    public function test_it_shows_edit_permissions()
    {
        $this->browse(function (Browser $browser) {
            $role = Permission::find(1);
            $browser
                ->loginAs(1)
                ->visit(route('admin.permissions.edit', $role->id))
                ->assertSee('Edit Permission')
                ->screenshot('admin/permissions-edit');
        });
    }
}
