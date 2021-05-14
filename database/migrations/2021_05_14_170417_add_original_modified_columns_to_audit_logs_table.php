<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginalModifiedColumnsToAuditLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audit_logs', function (Blueprint $table) {
            $table->dropColumn('properties');
            $table->text('original')->nullable();
            $table->text('modified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audit_logs', function (Blueprint $table) {
            $table->text('properties')->nullable();
            $table->dropColumn('original','modified');
        });
    }
}
