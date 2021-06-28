<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActionColumnToIssueCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issue_comments', function (Blueprint $table) {
            // add action to issue_comments upon creation to reopen/close issue
            $table->enum('action', ['close','reopen'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issue_comments', function (Blueprint $table) {
            $table->dropColumn('action');
        });
    }
}
