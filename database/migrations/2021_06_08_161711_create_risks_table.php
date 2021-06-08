<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->id();
            $table->text('risk')->nullable();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique('project_id');
        });

        $projects = \App\Models\Project::select('id','risk AS old_risk')->get();

        foreach ($projects as $project) {
            $project->risk()->create([
                'risk' => $project->old_risk,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('risk');
            $table->dropColumn('mitigation_strategy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('risks');

        Schema::table('projects', function (Blueprint $table) {
            $table->text('risk')->nullable();
        });
    }
}
