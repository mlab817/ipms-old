<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_list_of_users()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit(route('admin.users.index'))
                    ->assertSee('Users')
                    ->screenshot('users-index');
        });
    }

    public function test_it_creates_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                ->visit(route('admin.users.create'))
                ->assertSee('Add New User')
                ->type('name','User')
                ->type('email','user@email.com')
                ->select('office_id', 1)
                ->click('role_1')
                ->screenshot('create-user-page')
                ->press('submit')
                ->assertSee('Users');
        });
    }

    public function test_it_returns_validation_errors()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                ->visit(route('admin.users.create'))
                ->assertSee('Add New User')
                ->type('name','Admin')
                ->type('email','admin@admin.com')
                ->select('office_id', 1)
                ->click('role_1')
                ->screenshot('create-user-page')
                ->press('submit')
                ->assertSee('Users');
        });
    }
}
