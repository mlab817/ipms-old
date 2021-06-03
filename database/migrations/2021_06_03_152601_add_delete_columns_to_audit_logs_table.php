<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteColumnsToAuditLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('audit_logs','properties')) {
            Schema::table('audit_logs', function (Blueprint $table) {
                $table->dropColumn('properties');
            });
        }
        if (! Schema::hasColumn('audit_logs','original')) {
            Schema::table('audit_logs', function (Blueprint $table) {
                $table->text('original')->nullable();
            });
        }
        if (! Schema::hasColumn('audit_logs','modified')) {
            Schema::table('audit_logs', function (Blueprint $table) {
                $table->text('modified')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audit_logs', function (Blueprint $table) {
            //
        });
    }
}
