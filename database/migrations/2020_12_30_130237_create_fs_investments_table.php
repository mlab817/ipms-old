<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFsInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fs_investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fs_id')->constrained('funding_sources')->cascadeOnDelete();
            $table->decimal('y2016',20,2)->default(0);
            $table->decimal('y2017',20,2)->default(0);
            $table->decimal('y2018',20,2)->default(0);
            $table->decimal('y2019',20,2)->default(0);
            $table->decimal('y2020',20,2)->default(0);
            $table->decimal('y2021',20,2)->default(0);
            $table->decimal('y2022',20,2)->default(0);
            $table->decimal('y2023',20,2)->default(0);
            $table->decimal('y2024',20,2)->default(0);
            $table->decimal('y2025',20,2)->default(0);
            $table->timestamps();

            $table->unique(['project_id','fs_id'], 'pfsi_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fs_investments');
    }
}
