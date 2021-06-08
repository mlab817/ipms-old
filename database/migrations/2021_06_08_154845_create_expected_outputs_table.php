<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpectedOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expected_outputs', function (Blueprint $table) {
            $table->id();
            $table->text('expected_outputs')->nullable();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique('project_id');
        });

        $projects = \App\Models\Project::select('id','expected_outputs as old_expected_outputs')->get();

        foreach ($projects as $project) {
            $project->expected_output()->create([
                'expected_outputs' => $project->old_expected_outputs,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('expected_outputs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expected_outputs');

        Schema::table('projects', function (Blueprint $table) {
            $table->text('expected_outputs')->nullable();
        });
    }
}
