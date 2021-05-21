<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('code')->nullable();
            $table->text('title');
            $table->text('slug')->nullable();
            $table->foreignId('pap_type_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('regular_program')->default(0);
            $table->text('description')->nullable();
            $table->foreignId('spatial_coverage_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('iccable')->default(0);
            $table->boolean('pip')->default(0);
            $table->boolean('research')->default(0);
            $table->boolean('cip')->default(0);
            $table->foreignId('cip_type_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('trip')->default(0);
            $table->boolean('rdip')->default(0);
            $table->boolean('rdc_endorsement_required')->default(0);
            $table->boolean('rdc_endorsed')->default(0);
            $table->date('rdc_endorsed_date')->nullable();
            $table->string('other_infrastructure')->nullable();
            $table->text('risk')->nullable();
            $table->foreignId('pdp_chapter_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('no_pdp_indicator')->default(0);
            $table->foreignId('gad_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedBigInteger('target_start_year')->nullable();
            $table->unsignedBigInteger('target_end_year')->nullable();
            $table->boolean('has_fs')->default(0);
            $table->boolean('has_row')->default(0);
            $table->boolean('has_rap')->default(0);
            $table->string('employment_generated')->nullable();
            $table->foreignId('funding_source_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('implementation_mode_id')->nullable()->constrained()->nullOnDelete();
            $table->string('other_fs')->nullable();
            $table->foreignId('project_status_id')->nullable()->constrained()->nullOnDelete();
            $table->text('updates')->nullable();
            $table->date('updates_date')->nullable();
            $table->string('uacs_code')->nullable();
            $table->foreignId('tier_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');
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
        Schema::dropIfExists('projects');
    }
}
