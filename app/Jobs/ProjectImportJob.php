<?php

namespace App\Jobs;

use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\Office;
use App\Models\PdpChapter;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\SpatialCoverage;
use App\Models\Tier;
use App\Notifications\ProjectImportFailedNotification;
use App\Notifications\ProjectImportSuccessNotification;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProjectImportJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $id;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $id, $user)
    {
        $this->id = $id;

        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle()
    {
        // check if project already exists
        $projectExists = Project::where('ipms_id', $this->id)->first();

        if (!$projectExists) {
            $data = $this->getProjectFromApi();

            // if the get project from API is null,
            // this means that the project does not exist so project is not found
            // notify user
            if (!$data) {
                return $this->user->notify(new ProjectImportFailedNotification($this->id, 'Project ID #' . $this->id . ' was not found.'));
            }

            // format the data for insertion
            $preparedData = $this->prepareData($data);

            $project = $this->create($preparedData);

            $project->created_by = $this->user->id;
            $project->save();

            $project->audit_logs()->create([
                'description' => 'imported',
                'user_id' => $project->created_by,
//            'original'     => [],
//            'modified'     => [],
//            'host'         => request()->ip() ?? null,
            ]);

            // notify user once project is created
            $this->user->notify(new ProjectImportSuccessNotification($project));
        } else {
            $this->user->notify(new ProjectImportFailedNotification($this->id, 'Project ID #' . $this->id . ' already imported.'));
        }
    }

    /**
     * @throws Exception
     */
    public function getProjectFromApi()
    {
        $response = Http::get(config('ipms.v1') . '/api/projects/' . $this->id);

        if (isset($response['error'])) {
            return null;
        } else {
            return $response->json();
        }
    }

    public function prepareData($data): array
    {
        $fs_infrastructures = collect($data['funding_source_infrastructures']);
        $fs_investments = collect($data['funding_source_financials']);
        $region_investments = collect($data['region_financials']);
        $fundingSources = FundingSource::select('id')->get();
        $regions = Region::where('id', '<>', 100)->select('id')->get();

        return [
            'ipms_id' => $data['id'],
            'uuid' => Str::uuid(),
            'slug' => Str::slug($data['title']),
            'title' => $data['title'],
            'pap_type_id' => $data['type_id'] ? (in_array($data['type_id'], [1, 2]) ? 2 : 1) : null,
            'regular_program' => $data['regular'],
            'expected_outputs' => $data['expected_outputs'],
            'description' => $data['description'],
            'spatial_coverage_id' => !in_array($data['spatial_coverage_id'], SpatialCoverage::all()->pluck('id')->toArray()) ? null : $data['spatial_coverage_id'],
            'funding_source_id' => !in_array($data['main_funding_source_id'], FundingSource::all()->pluck('id')->toArray()) ? null : $data['main_funding_source_id'],
            'funding_institution_id' => !in_array($data['funding_institution_id'], FundingInstitution::all()->pluck('id')->toArray()) ? null : $data['funding_institution_id'],
            'iccable' => $data['iccable'],
            'project_status_id' => !in_array($data['project_status_id'], ProjectStatus::all()->pluck('id')->toArray()) ? null : $data['project_status_id'],
            'updates' => $data['updates'],
            'updates_date' => $data['updates_date'],
            'gad_id' => !in_array($data['gad_id'], Gad::all()->pluck('id')->toArray()) ? null : $data['gad_id'],
            'has_infra' => $data['trip'],
            'rdip' => $data['rdip'],
            'rdc_endorsement_required' => $data['rdc_required'],
            'rdc_endorsed' => $data['rdc_endorsed'],
            'rdc_endorsement_date' => $data['rdc_endorsed_date'],
            'preparation_document_id' => !in_array($data['project_preparation_document_id'], PreparationDocument::all()->pluck('id')->toArray()) ? null : $data['project_preparation_document_id'],
            'has_fs' => $data['has_fs'],
            'has_row' => $data['has_row'],
            'has_rap' => $data['has_rap'],
            'risk' => $data['implementation_risk'],
            'employment_generated' => $data['employment_generated'],
            'uacs_code' => $data['uacs_code'],
            'tier_id' => !in_array($data['tier_id'], Tier::all()->pluck('id')->toArray()) ? null : $data['tier_id'],
            'target_start_year' => $data['target_start_year'],
            'target_end_year' => $data['target_end_year'],
            'pdp_chapter_id' => !in_array($data['pdp_chapter_id'], PdpChapter::all()->pluck('id')->toArray()) ? null : $data['pdp_chapter_id'],
            'implementation_mode_id' => !in_array($data['implementation_mode_id'], ImplementationMode::all()->pluck('id')->toArray()) ? null : $data['implementation_mode_id'],
            'office_id' => !in_array($data['operating_unit_id'], Office::all()->pluck('id')->toArray()) ? null : $data['operating_unit_id'],
            'total_project_cost' => round(floatval($data['investment_target_total'] ?? 0)),
            'trip_info' => $data['trip'],
            'bases' => collect($data['bases'])->pluck('id'),
            'sdgs' => collect($data['sustainable_development_goals'])->pluck('id'),
            'ten_point_agenda' => collect($data['ten_point_agenda'])->pluck('id'),
            'regions' => collect($data['regions'])->pluck('id'),
            'funding_sources' => collect($data['funding_sources'])->pluck('id'),
            'pdp_chapters' => collect($data['pdp_chapters'])->pluck('id'),
            'pdp_indicators' => collect($data['pdp_indicators'])->pluck('id'),
            'infrastructure_subsectors' => collect($data['infrastructure_subsectors'])->pluck('id'),
            'prerequisites' => collect($data['technical_readinesses'])->pluck('id'),

            'feasibility_study' => [
                'y2017' => round(floatval($data['fs_target_2017'])) ?? 0,
                'y2018' => round(floatval($data['fs_target_2018'])) ?? 0,
                'y2019' => round(floatval($data['fs_target_2019'])) ?? 0,
                'y2020' => round(floatval($data['fs_target_2020'])) ?? 0,
                'y2021' => round(floatval($data['fs_target_2021'])) ?? 0,
                'y2022' => round(floatval($data['fs_target_2022'])) ?? 0,
            ],

            'right_of_way' => [
                'y2017' => round(floatval($data['row_target_2017'])) ?? 0,
                'y2018' => round(floatval($data['row_target_2018'])) ?? 0,
                'y2019' => round(floatval($data['row_target_2019'])) ?? 0,
                'y2020' => round(floatval($data['row_target_2020'])) ?? 0,
                'y2021' => round(floatval($data['row_target_2021'])) ?? 0,
                'y2022' => round(floatval($data['row_target_2022'])) ?? 0,
            ],

            'resettlement_action_plan' => [
                'y2017' => round(floatval($data['rap_target_2017'])) ?? 0,
                'y2018' => round(floatval($data['rap_target_2018'])) ?? 0,
                'y2019' => round(floatval($data['rap_target_2019'])) ?? 0,
                'y2020' => round(floatval($data['rap_target_2020'])) ?? 0,
                'y2021' => round(floatval($data['rap_target_2021'])) ?? 0,
                'y2022' => round(floatval($data['rap_target_2022'])) ?? 0,
            ],

            'nep' => [
                'y2016' => round(floatval($data['nep_2016'])) ?? 0,
                'y2017' => round(floatval($data['nep_2017'])) ?? 0,
                'y2018' => round(floatval($data['nep_2018'])) ?? 0,
                'y2019' => round(floatval($data['nep_2019'])) ?? 0,
                'y2020' => round(floatval($data['nep_2020'])) ?? 0,
                'y2021' => round(floatval($data['nep_2021'])) ?? 0,
                'y2022' => round(floatval($data['nep_2022'])) ?? 0,
            ],

            'allocation' => [
                'y2016' => round(floatval($data['gaa_2016'])) ?? 0,
                'y2017' => round(floatval($data['gaa_2017'])) ?? 0,
                'y2018' => round(floatval($data['gaa_2018'])) ?? 0,
                'y2019' => round(floatval($data['gaa_2019'])) ?? 0,
                'y2020' => round(floatval($data['gaa_2020'])) ?? 0,
                'y2021' => round(floatval($data['gaa_2021'])) ?? 0,
                'y2022' => round(floatval($data['gaa_2022'])) ?? 0,
            ],

            'disbursement' => [
                'y2016' => round(floatval($data['disbursement_2016'])) ?? 0,
                'y2017' => round(floatval($data['disbursement_2017'])) ?? 0,
                'y2018' => round(floatval($data['disbursement_2018'])) ?? 0,
                'y2019' => round(floatval($data['disbursement_2019'])) ?? 0,
                'y2020' => round(floatval($data['disbursement_2020'])) ?? 0,
                'y2021' => round(floatval($data['disbursement_2021'])) ?? 0,
            ],

            'region_investments' => $regions->map(function ($region) use ($region_investments) {
                $match = $region_investments->where('region_id', $region->id)->first();
                if (!$match) {
                    return [
                        'region_id' => $region->id,
                        'y2016' => 0,
                        'y2017' => 0,
                        'y2018' => 0,
                        'y2019' => 0,
                        'y2020' => 0,
                        'y2021' => 0,
                        'y2022' => 0,
                        'y2023' => 0,
                    ];
                } else {
                    return [
                        'region_id' => $match['region_id'],
                        'y2016' => round(floatval($match['investment_target_2016'])) ?? 0,
                        'y2017' => round(floatval($match['investment_target_2017'])) ?? 0,
                        'y2018' => round(floatval($match['investment_target_2018'])) ?? 0,
                        'y2019' => round(floatval($match['investment_target_2019'])) ?? 0,
                        'y2020' => round(floatval($match['investment_target_2020'])) ?? 0,
                        'y2021' => round(floatval($match['investment_target_2021'])) ?? 0,
                        'y2022' => round(floatval($match['investment_target_2022'])) ?? 0,
                        'y2023' => round(floatval($match['investment_target_2023'])) ?? 0,
                    ];
                }
            }),

            'region_infrastructures' => $regions->map(function ($region) {
                return [
                    'region_id' => $region->id,
                    'y2016' => 0,
                    'y2017' => 0,
                    'y2018' => 0,
                    'y2019' => 0,
                    'y2020' => 0,
                    'y2021' => 0,
                    'y2022' => 0,
                    'y2023' => 0,
                ];
            }),

            'fs_infrastructures' => $fundingSources->map(function ($fs) use ($fs_infrastructures) {
                $match = $fs_infrastructures->where('funding_source_id', $fs->id)->first();
                if (!$match) {
                    return [
                        'fs_id' => $fs->id,
                        'y2016' => 0,
                        'y2017' => 0,
                        'y2018' => 0,
                        'y2019' => 0,
                        'y2020' => 0,
                        'y2021' => 0,
                        'y2022' => 0,
                        'y2023' => 0,
                    ];
                } else {
                    return [
                        'fs_id' => $match['funding_source_id'],
                        'y2016' => round(floatval($match['infrastructure_target_2016'])) ?? 0,
                        'y2017' => round(floatval($match['infrastructure_target_2017'])) ?? 0,
                        'y2018' => round(floatval($match['infrastructure_target_2018'])) ?? 0,
                        'y2019' => round(floatval($match['infrastructure_target_2019'])) ?? 0,
                        'y2020' => round(floatval($match['infrastructure_target_2020'])) ?? 0,
                        'y2021' => round(floatval($match['infrastructure_target_2021'])) ?? 0,
                        'y2022' => round(floatval($match['infrastructure_target_2022'])) ?? 0,
                        'y2023' => round(floatval($match['infrastructure_target_2023'])) ?? 0,
                    ];
                }
            }),

            'fs_investments' => $fundingSources->map(function ($fs) use ($fs_investments) {
                $match = $fs_investments->where('funding_source_id', $fs->id)->first();
                if (!$match) {
                    return [
                        'fs_id' => $fs->id,
                        'y2016' => 0,
                        'y2017' => 0,
                        'y2018' => 0,
                        'y2019' => 0,
                        'y2020' => 0,
                        'y2021' => 0,
                        'y2022' => 0,
                        'y2023' => 0,
                    ];
                } else {
                    return [
                        'fs_id' => $match['funding_source_id'],
                        'y2016' => round(floatval($match['investment_target_2016'])) ?? 0,
                        'y2017' => round(floatval($match['investment_target_2017'])) ?? 0,
                        'y2018' => round(floatval($match['investment_target_2018'])) ?? 0,
                        'y2019' => round(floatval($match['investment_target_2019'])) ?? 0,
                        'y2020' => round(floatval($match['investment_target_2020'])) ?? 0,
                        'y2021' => round(floatval($match['investment_target_2021'])) ?? 0,
                        'y2022' => round(floatval($match['investment_target_2022'])) ?? 0,
                        'y2023' => round(floatval($match['investment_target_2023'])) ?? 0,
                    ];
                }
            }),
        ];
    }

    public function create($data)
    {
        $project = Project::create($data);

        $project->description()->create([
            'description' => $data['description'],
        ]);

        $project->risk()->create([
            'risk' => $data['risk'],
        ]);

        $project->expected_output()->create([
            'expected_outputs' => $data['expected_outputs'],
        ]);

        $project->project_update()->create([
            'updates' => $data['updates'],
            'updates_date' => $data['updates_date'],
        ]);

        $project->feasibility_study()->create($data['feasibility_study']);

        $project->resettlement_action_plan()->create($data['resettlement_action_plan']);

        $project->right_of_way()->create($data['right_of_way']);

        $project->allocation()->create($data['allocation']);

        $project->nep()->create($data['nep']);

        $project->disbursement()->create($data['disbursement']);

        $project->region_investments()->createMany($data['region_investments']);

        $project->fs_investments()->createMany($data['fs_investments']);

        $project->sdgs()->attach($data['sdgs']);

        $project->bases()->attach($data['bases']);

        $project->ten_point_agendas()->attach($data['ten_point_agenda']);

        $project->regions()->attach($data['regions']);

        $project->funding_sources()->attach($data['funding_sources']);

        $project->pdp_chapters()->attach($data['pdp_chapters']);

        $project->pdp_indicators()->attach($data['pdp_indicators']);

        $project->infrastructure_subsectors()->attach($data['infrastructure_subsectors']);

        $project->prerequisites()->attach($data['prerequisites']);

        if ($project->has_infra) {
            if ($data['fs_infrastructures']) {
                $project->fs_infrastructures()->createMany($data['fs_infrastructures']);
            }
            if ($data['region_infrastructures']) {
                $project->region_infrastructures()->createMany($data['region_infrastructures']);
            }
        }

        return $project->refresh();
    }

    public function failed(Exception $exception)
    {
        // if the job fails delete the imported project
        $project = Project::where('ipms_id', $this->id)->first();
        if ($project) {
            $project->delete();
        }

        // only send project title
        $this->user->notify(new ProjectImportFailedNotification($this->id, $exception->getMessage()));
    }
}
