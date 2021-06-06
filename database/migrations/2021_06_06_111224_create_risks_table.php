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
        });

        $allProjects = \App\Models\Project::select('id','risk')->get();

        foreach ($allProjects as $project) {
            $project->risk()->create([
                'risk' => $project->risk,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('risk');
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
            $table->text('risk')->nullable();
        });

        Schema::dropIfExists('risks');
    }
}
