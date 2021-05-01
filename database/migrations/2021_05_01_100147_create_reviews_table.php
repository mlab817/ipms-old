<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->boolean('pip')->default(0);
            $table->foreignId('pip_typology_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('cip')->default(0);
            $table->foreignId('cip_type_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('trip')->default(0);
            $table->string('pipol_code')->nullable();
            $table->string('pipol_url')->nullable();
            $table->boolean('pipol_encoded')->default(0);
            $table->boolean('pipol_finalized')->default(0);
            $table->boolean('pipol_endorsed')->default(0);
            $table->boolean('pipol_validated')->default(0);
            $table->text('comments')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('reviews');
    }
}
