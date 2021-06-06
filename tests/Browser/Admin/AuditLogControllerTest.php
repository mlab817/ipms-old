<?php

namespace Tests\Browser\Admin;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuditLogControllerTest extends DuskTestCase
{
    /**
     * @group audit-logs
     */
    public function test_it_shows_index_page_of_audit_logs()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->givePermissionTo('audit_logs.view_index');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('audit_logs.index'))
                ->assertSee('Audit Logs')
                ->screenshot('admin/audit-logs-index');
        });
    }

    /**
     * @group audit-logs
     */
    public function test_it_shows_audit_logs_page()
    {
        $user = User::factory()->state([
            'password_changed_at' => now(),
            'activated_at' => now(),
        ])->create();
        $user->givePermissionTo('audit_logs.view_index','audit_logs.view');

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->loginAs($user->id)
                ->visit(route('audit_logs.index'));

            $browser->assertSee('Audit Logs')
                ->screenshot('admin/audit-logs')
                ->pause(1000)
                ->clickLink('View');

            $browser->assertSee('View Audit Log')
                ->screenshot('admin/audit-logs-view');
        });
    }
}
