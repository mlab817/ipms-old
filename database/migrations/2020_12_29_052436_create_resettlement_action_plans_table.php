<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResettlementActionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resettlement_action_plans', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->decimal('y2017',20,2)->default(0);
            $table->decimal('y2018',20,2)->default(0);
            $table->decimal('y2019',20,2)->default(0);
            $table->decimal('y2020',20,2)->default(0);
            $table->decimal('y2021',20,2)->default(0);
            $table->decimal('y2022',20,2)->default(0);
            $table->decimal('y2023',20,2)->default(0);
            $table->decimal('y2024',20,2)->default(0);
            $table->decimal('y2025',20,2)->default(0);
            $table->string('affected_households')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resettlement_action_plans');
    }
}
