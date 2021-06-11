<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipols', function (Blueprint $table) {
            $table->id();
            $table->string('pipol_code')->nullable();
            $table->text('project_title')->nullable();
            $table->string('spatial_coverage')->nullable();
            $table->string('category')->nullable();
            $table->string('submission_status')->nullable();
            $table->text('pipol_url')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ipms_id')->nullable()->constrained('projects','id')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pipols');
    }
}
