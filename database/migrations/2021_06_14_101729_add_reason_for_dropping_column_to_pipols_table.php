<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonForDroppingColumnToPipolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pipols', function (Blueprint $table) {
            $table->foreignId('reason_id')->nullable()->constrained('reasons')->nullOnDelete();
            $table->string('other_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pipols', function (Blueprint $table) {
            $table->dropColumn('reason_id','other_reason');
        });
    }
}
