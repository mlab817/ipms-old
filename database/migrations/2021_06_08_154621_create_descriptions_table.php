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
            $table->timestamps();

            $table->unique('project_id');
        });

        $projects = \App\Models\Project::select('id','description AS old_description')->get();

        foreach ($projects as $project) {
            $project->description()->create([
                'description' => $project->old_description,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descriptions');

        Schema::table('projects', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }
}
