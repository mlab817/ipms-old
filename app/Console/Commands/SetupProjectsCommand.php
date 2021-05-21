<?php

namespace App\Console\Commands;

use App\Models\FundingSource;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SetupProjectsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:projects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the projects from IPMS v1';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // check if projects table is empty
        if (DB::table('projects')->count() > 0) {
//            $this->error('Unable to proceed. The projects table is not empty.');
//            return 0;
        }

        $json = File::get(database_path() . '/seeders/json/ipmsv2.json');

        $projects = json_decode($json);

        $projectsCount = count($projects);

        $this->output->progressStart($projectsCount);

//        $this->info($projectsCount . ' projects found.');

        if ($projectsCount) {
            // seed
            $this->seed($projects);
        }

        $this->output->progressFinish();

        return 1;
    }

    public function seed($projects)
    {
        Schema::disableForeignKeyConstraints();

        Project::unsetEventDispatcher();

        foreach ($projects as $project) {
            if (! $project->prexc_activity_id) {
                $this->create($project);
            }
        }

        Schema::enableForeignKeyConstraints();
    }

    public function create($project)
    {
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

        $createdProject->pdp_chapters()->sync(collect($project->pdp_chapters)->pluck('id'));

        $createdProject->pdp_indicators()->sync(collect($project->pdp_indicators)->pluck('id'));

        $createdProject->bases()->sync(collect($project->bases)->pluck('id'));

        $createdProject->ten_point_agendas()->sync(collect($project->ten_point_agenda)->pluck('id'));

        $createdProject->prerequisites()->sync(collect($project->technical_readinesses)->pluck('id'));

        $fsources = FundingSource::all();

        foreach ($fsources as $fs) {
            $createdProject->fs_investments()->create([
                'fs_id' => $fs->id,
            ]);
            $createdProject->fs_infrastructures()->create([
                'fs_id' => $fs->id,
            ]);
        }

        // exlude N/A
        $regions = Region::where('id','<>',100)->get();

        foreach ($regions as $region) {
            $createdProject->region_investments()->create([
                'region_id' => $region->id
            ]);
            $createdProject->region_infrastructures()->create([
                'region_id' => $region->id
            ]);
        }

        $createdProject->feasibility_study()->create([
            'y2017' => $project->fs_target_2017,
            'y2018' => $project->fs_target_2018,
            'y2019' => $project->fs_target_2019,
            'y2020' => $project->fs_target_2020,
            'y2021' => $project->fs_target_2021,
            'y2022' => $project->fs_target_2022,
        ]);

        $createdProject->right_of_way()->create([
            'y2017' => $project->row_target_2017,
            'y2018' => $project->row_target_2018,
            'y2019' => $project->row_target_2019,
            'y2020' => $project->row_target_2020,
            'y2021' => $project->row_target_2021,
            'y2022' => $project->row_target_2022,
        ]);

        $createdProject->resettlement_action_plan()->create([
            'y2017' => $project->rap_target_2017,
            'y2018' => $project->rap_target_2018,
            'y2019' => $project->rap_target_2019,
            'y2020' => $project->rap_target_2020,
            'y2021' => $project->rap_target_2021,
            'y2022' => $project->rap_target_2022,
        ]);

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

        $this->output->progressAdvance();
    }
}
