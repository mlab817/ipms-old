<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('user_id')->constrained(); // causer
            $table->text('subject')->nullable();
            $table->text('content')->nullable();
            $table->foreignId('receiver_id')->constrained('users');
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('project_notifications');
    }
}
