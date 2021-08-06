<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fs_investments', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });

        Schema::table('region_investments', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });

        Schema::table('disbursements', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });

        Schema::table('allocations', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });

        Schema::table('neps', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });

        Schema::table('feasibility_studies', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });

        Schema::table('right_of_ways', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });

        Schema::table('resettlement_action_plans', function (Blueprint $table) {
            $table->decimal('y2026',20,2)->default(0);
            $table->decimal('y2027',20,2)->default(0);
            $table->decimal('y2028',20,2)->default(0);
            $table->decimal('y2029',20,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investments', function (Blueprint $table) {
            //
        });
    }
}
