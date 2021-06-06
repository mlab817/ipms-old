<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
        });

        $allProjects = \App\Models\Project::select('id','description')->get();

        foreach ($allProjects as $project) {
            $project->description()->create([
                'description' => $project->description,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     * Note that this will not recover the description info
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('description')->nullable();
        });

        Schema::dropIfExists('descriptions');
    }
}
