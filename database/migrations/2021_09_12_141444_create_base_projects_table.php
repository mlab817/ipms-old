<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_projects', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 8)->unique();
            $table->text('title');
            $table->text('summary')->nullable();
            $table->foreignId('pap_type_id')->nullable()->constrained()->nullOnDelete();
            $table->morphs('owner');
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('base_project_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_projects');

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('base_project_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }
}
