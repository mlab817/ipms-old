<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFeasibilityStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feasibility_studies', function (Blueprint $table) {
            $table->string('fs_start_date')->nullable()->after('needs_assistance');
            $table->string('fs_end_date')->nullable()->after('fs_start_date');
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
            $table->dropColumn('fs_start_date');
            $table->dropColumn('fs_end_date');
        });
    }
}
