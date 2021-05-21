<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class OriginalIpmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(database_path() . '/seeders/json/ipmsv2.json');

        $projects = json_decode(mb_convert_encoding($json, 'UTF-8','auto'));

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                echo ' - No errors';
                break;
            case JSON_ERROR_DEPTH:
                echo ' - Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntax error, malformed JSON';
                break;
            case JSON_ERROR_UTF8:
                echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                echo ' - Unknown error';
                break;
        }

        Schema::disableForeignKeyConstraints();

        Project::unsetEventDispatcher();

        foreach ($projects as $project) {
            if (! $project->prexc_activity_id) {
                $createdProject = Project::create([
                    'uuid'                      => Str::uuid(),
                    'title'                     => $project->title,
                    'pap_type_id'               => $project->type->id ?? null,
                    'rdip'                      => $project->rdip,
                    'rdc_endorsement_required'  => $project->rdc_required,
                    'rdc_endorsed'              => $project->rdc_endorsed,
                    'rdc_endorsed_date'         => $project->rdc_endorsed_date,
                    'iccable'                   => $project->iccable,
                    'preparation_document_id'   => $project->project_preparation_document->id ?? null,
                    'spatial_coverage_id'       => $project->spatial_coverage->id ?? null,
                    'expected_outputs'          => $project->expected_outputs,
                    'description'               => $project->description,
                    'regular_program'           => $project->regular,
                    'target_start_year'         => $project->target_start_year,
                    'target_end_year'           => $project->target_end_year,
                    'has_fs'                    => $project->has_fs,
                    'has_row'                   => $project->has_row,
                    'has_rap'                   => $project->has_rap,
                    'pdp_chapter_id'            => $project->pdp_chapter->id ?? null,
                    'funding_source_id'         => $project->main_funding_source->id ?? null,
                    'implementation_mode_id'    => $project->implementation_mode->id ?? null,
                    'risk'                      => $project->implementation_risk,
                    'tier_id'                   => $project->tier->id ?? null,
                    'uacs_code'                 => $project->uacs_code,
                    'project_status_id'         => $project->project_status->id ?? null,
                    'gad_id'                    => $project->gad->id ?? null,
                    'funding_institution_id'    => $project->funding_institution->id ?? null,
                    'office_id'                 => $project->operating_unit->id ?? null,
                ]);

                $createdProject->regions()->sync(collect($project->regions)->pluck('id'));
                $createdProject->sdgs()->sync(collect($project->sustainable_development_goals)->pluck('id'));
                $createdProject->pdp_indicators()->sync(collect($project->pdp_indicators)->pluck('id'));
                $createdProject->bases()->sync(collect($project->bases)->pluck('id'));
                $createdProject->ten_point_agendas()->sync(collect($project->ten_point_agenda)->pluck('id'));
                $createdProject->nep()->create([
                    'y2016' => $project->nep_2016,
                    'y2017' => $project->nep_2017,
                    'y2018' => $project->nep_2018,
                    'y2019' => $project->nep_2019,
                    'y2020' => $project->nep_2020,
                ]);
                $createdProject->allocation()->create([
                    'y2016' => $project->gaa_2016,
                    'y2017' => $project->gaa_2017,
                    'y2018' => $project->gaa_2018,
                    'y2019' => $project->gaa_2019,
                    'y2020' => $project->gaa_2020,
                ]);
                $createdProject->disbursement()->create([
                    'y2016' => $project->disbursement_2016,
                    'y2017' => $project->disbursement_2017,
                    'y2018' => $project->disbursement_2018,
                    'y2019' => $project->disbursement_2019,
                    'y2020' => $project->disbursement_2020,
                ]);
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
