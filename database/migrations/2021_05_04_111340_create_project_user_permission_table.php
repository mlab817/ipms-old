<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user_permission', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('read')->default(0);
            $table->boolean('update')->default(0);
            $table->boolean('delete')->default(0);
            $table->boolean('review')->default(0);
            $table->boolean('comment')->default(0);
            $table->timestamps();

            $table->primary(['project_id','user_id'],'project_user_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user_permission');
    }
}
