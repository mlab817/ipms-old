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
            $table->text('expected_output')->nullable();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
        });

        $allProjects = \App\Models\Project::select('id','expected_outputs')->get();

        foreach ($allProjects as $project) {
            $project->expected_output()->create([
                'expected_output' => $project->expected_outputs,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('expected_outputs');
        });
    }

    /**
     * Reverse the migrations.
     * This will not restore expected outputs
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('expected_outputs')->nullable();
        });

        Schema::dropIfExists('expected_outputs');
    }
}
