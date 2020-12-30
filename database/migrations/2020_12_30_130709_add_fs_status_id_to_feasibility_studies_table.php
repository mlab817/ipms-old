<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFsStatusIdToFeasibilityStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feasibility_studies', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->foreignId('fs_status_id')->nullable()->constrained()->nullOnDelete()->after('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feasibility_studies', function (Blueprint $table) {
            $table->enum('status',['ongoing','completed','for preparation'])->nullable()->after('project_id');
            $table->dropColumn('fs_status_id');
        });
    }
}
