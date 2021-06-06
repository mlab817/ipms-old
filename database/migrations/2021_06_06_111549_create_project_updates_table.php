<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_updates', function (Blueprint $table) {
            $table->id();
            $table->text('updates')->nullable();
            $table->date('updates_date')->nullable();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
        });

        $allProjects = \App\Models\Project::select('id','updates','updates_date')->get();

        foreach ($allProjects as $project) {
            $project->project_update()->create([
                'updates' => $project->updates,
                'updates_date' => $project->updates_date,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('updates','updates_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('updates')->nullable();
            $table->date('updates_date')->nullable();
        });

        Schema::dropIfExists('project_updates');
    }
}
