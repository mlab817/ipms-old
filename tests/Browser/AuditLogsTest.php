<?php

namespace Tests\Browser;

use App\Models\AuditLog;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuditLogsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_index_page_of_audit_logs()
    {
        $this->browse(function (Browser $browser) {
            $browser
                    ->loginAs(1)
                    ->visit(route('admin.audit_logs.index'))
                    ->assertSee('Audit Logs')
                    ->screenshot('admin/audit-logs-index');
        });
    }

    public function test_it_shows_view_page_of_audit_log()
    {
        $this->browse(function (Browser $browser) {
            $linkToVisit = route('admin.audit_logs.show', AuditLog::all()->random()->id);
            $selector = "a[href=\"{$linkToVisit}\"]";

            $browser
                ->loginAs(1)
                ->visit(route('admin.audit_logs.index'))
                ->waitFor($selector)
                ->click($selector)
                ->assertSee('View Audit Log')
                ->screenshot('admin/audit-logs-show');
        });
    }
}
