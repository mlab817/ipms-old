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
            $table->timestamps();

            $table->unique('project_id');
        });

        $projects = \App\Models\Project::select('id','updates as old_updates','updates_date AS old_updates_date')->get();

        foreach ($projects as $project) {
            $project->project_update()->create([
                'updates' => $project->old_updates,
                'updates_date'  => $project->old_updates_date,
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
        Schema::dropIfExists('project_updates');

        Schema::table('projects', function (Blueprint $table) {
            $table->text('updates')->nullable();
            $table->date('updates_date')->nullable();
        });
    }
}
