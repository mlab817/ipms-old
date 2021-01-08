<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToPdpIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pdp_indicators', function (Blueprint $table) {
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('pdp_indicators')
                ->nullOnDelete()
                ->after('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdp_indicators', function (Blueprint $table) {
            $table->dropConstrainedForeignId('parent_id');
        });
    }
}
