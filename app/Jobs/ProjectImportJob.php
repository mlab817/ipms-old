<?php

namespace App\Jobs;

use App\Events\AuditLogEvent;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\Office;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\SpatialCoverage;
use App\Models\Tier;
use App\Models\User;
use App\Notifications\ProjectImportFailedNotification;
use App\Notifications\ProjectImportSuccessNotification;
use App\Services\ProjectCreateService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id;

    public $user;

    public $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $id, $user)
    {
        $this->id = $id;

        $this->user = $user;

        $this->url = config('ipms.v1');
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle(ProjectCreateService $projectCreateService)
    {
        // check if project already exists
        $project = Project::where('ipms_id', $this->id)->first();

        // if not exist create one, else send fail message
        if (! $project) {
            $response = Http::get($this->url . '/api/projects/' . $this->id);

            if (isset($response['error'])) {
                throw new \Exception($response->json());
            }

            $data = $response->json();

            $project = Project::withoutEvents(function () use ($projectCreateService, $data) {
                $project = $projectCreateService->create([
                    'ipms_id'                   => $data['id'],
                    'uuid'                      => Str::uuid(),
                    'slug'                      => Str::slug($data['title']),
                    'title'                     => $data['title'],
//                    'pap_type_id'               => !in_array($data['type_id'], PapType::all()->pluck('id')->toArray()) ? null : $data['type_id'],
                    'pap_type_id'               => $data['type_id'] ? (in_array($data['type_id'], [1,2]) ? 2 : 1) : null,
                    'regular_program'           => $data['regular'],
                    'expected_outputs'          => $data['expected_outputs'],
                    'description'               => $data['description'],
                    'spatial_coverage_id'       => !in_array($data['spatial_coverage_id'], SpatialCoverage::all()->pluck('id')->toArray()) ? null : $data['spatial_coverage_id'],
                    'funding_source_id'         => !in_array($data['main_funding_source_id'], FundingSource::all()->pluck('id')->toArray()) ? null : $data['main_funding_source_id'],
                    'funding_institution_id'    => !in_array($data['funding_institution_id'], FundingInstitution::all()->pluck('id')->toArray()) ? null : $data['funding_institution_id'],
                    'iccable'                   => $data['iccable'],
                    'project_status_id'         => !in_array($data['project_status_id'], ProjectStatus::all()->pluck('id')->toArray()) ? null : $data['project_status_id'],
                    'updates'                   => $data['updates'],
                    'updates_date'              => $data['updates_date'],
                    'gad_id'                    => !in_array($data['gad_id'], Gad::all()->pluck('id')->toArray()) ? null : $data['gad_id'],
                    'has_infra'                 => $data['trip'],
                    'rdip'                      => $data['rdip'],
                    'rdc_endorsement_required'  => $data['rdc_required'],
                    'rdc_endorsed'              => $data['rdc_endorsed'],
                    'rdc_endorsement_date'      => $data['rdc_endorsed_date'],
                    'preparation_document_id'   => !in_array($data['project_preparation_document_id'], PreparationDocument::all()->pluck('id')->toArray()) ? null : $data['project_preparation_document_id'],
                    'has_fs'                    => $data['has_fs'],
                    'has_row'                   => $data['has_row'],
                    'has_rap'                   => $data['has_rap'],
                    'risk'                      => $data['implementation_risk'],
                    'employment_generated'      => $data['employment_generated'],
                    'uacs_code'                 => $data['uacs_code'],
                    'tier_id'                   => !in_array($data['tier_id'], Tier::all()->pluck('id')->toArray()) ? null : $data['tier_id'],
                    'target_start_year'         => $data['target_start_year'],
                    'target_end_year'           => $data['target_end_year'],
                    'pdp_chapter_id'            => !in_array($data['pdp_chapter_id'], PdpChapter::all()->pluck('id')->toArray()) ? null : $data['pdp_chapter_id'],
                    'implementation_mode_id'    => !in_array($data['implementation_mode_id'], ImplementationMode::all()->pluck('id')->toArray()) ? null : $data['implementation_mode_id'],
                    'office_id'                 => !in_array($data['operating_unit_id'], Office::all()->pluck('id')->toArray()) ? null : $data['operating_unit_id'],
                    'total_project_cost'        => round(floatval($data['investment_target_total'] ?? 0)),
                    'trip_info'                 => $data['trip'],
                    'relations'                 => [
                        'bases'                     => collect($data['bases'])->pluck('id'),
                        'sdgs'                      => collect($data['sustainable_development_goals'])->pluck('id'),
                        'ten_point_agenda'          => collect($data['ten_point_agenda'])->pluck('id'),
                        'regions'                   => collect($data['regions'])->pluck('id'),
                        'funding_sources'           => collect($data['funding_sources'])->pluck('id'),
                        'pdp_chapters'              => collect($data['pdp_chapters'])->pluck('id'),
                        'pdp_indicators'            => collect($data['pdp_indicators'])->pluck('id'),
                        'infrastructure_subsectors' => collect($data['infrastructure_subsectors'])->pluck('id'),
                        'prerequisites'             => collect($data['technical_readinesses'])->pluck('id'),
                    ],

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

                    'region_investments' => !empty($data['region_financials']) ? collect($data['region_financials'])->map(function ($item) {
                        return [
                            'region_id' => $item['region_id'],
                            'y2016' => round(floatval($item['investment_target_2016'])) ?? 0,
                            'y2017' => round(floatval($item['investment_target_2017'])) ?? 0,
                            'y2018' => round(floatval($item['investment_target_2018'])) ?? 0,
                            'y2019' => round(floatval($item['investment_target_2019'])) ?? 0,
                            'y2020' => round(floatval($item['investment_target_2020'])) ?? 0,
                            'y2021' => round(floatval($item['investment_target_2021'])) ?? 0,
                            'y2022' => round(floatval($item['investment_target_2022'])) ?? 0,
                            'y2023' => round(floatval($item['investment_target_2023'])) ?? 0,
                        ];
                    }) : collect([]),

                    'fs_infrastructures' => !empty($data['funding_source_infrastructures']) ? collect($data['funding_source_infrastructures'])->map(function ($item) {
                        return [
                            'fs_id' => $item['funding_source_id'],
                            'y2016' => round(floatval($item['infrastructure_target_2016'])) ?? 0,
                            'y2017' => round(floatval($item['infrastructure_target_2017'])) ?? 0,
                            'y2018' => round(floatval($item['infrastructure_target_2018'])) ?? 0,
                            'y2019' => round(floatval($item['infrastructure_target_2019'])) ?? 0,
                            'y2020' => round(floatval($item['infrastructure_target_2020'])) ?? 0,
                            'y2021' => round(floatval($item['infrastructure_target_2021'])) ?? 0,
                            'y2022' => round(floatval($item['infrastructure_target_2022'])) ?? 0,
                            'y2023' => round(floatval($item['infrastructure_target_2023'])) ?? 0,
                        ];
                    }) : collect([]),

                    'fs_investments' => !empty($data['funding_source_financials']) ? collect($data['funding_source_financials'])->map(function ($item) {
                        return [
                            'fs_id' => $item['funding_source_id'],
                            'y2016' => round(floatval($item['investment_target_2016'])) ?? 0,
                            'y2017' => round(floatval($item['investment_target_2017'])) ?? 0,
                            'y2018' => round(floatval($item['investment_target_2018'])) ?? 0,
                            'y2019' => round(floatval($item['investment_target_2019'])) ?? 0,
                            'y2020' => round(floatval($item['investment_target_2020'])) ?? 0,
                            'y2021' => round(floatval($item['investment_target_2021'])) ?? 0,
                            'y2022' => round(floatval($item['investment_target_2022'])) ?? 0,
                            'y2023' => round(floatval($item['investment_target_2023'])) ?? 0,
                        ];
                    }) : collect([]),
                ]);

                $project->created_by = $this->user->id;
                $project->save();

                $project->audit_logs()->create([
                    'description'  => 'imported',
                    'user_id'      => $this->user->id,
                    'original'     => $project->getOriginal() ?? null,
                    'modified'     => $project->getChanges() ?? null,
                    'host'         => request()->ip() ?? null,
                ]);

                return $project;
            });

            $this->user->notify(new ProjectImportSuccessNotification($project));

            event(new AuditLogEvent($this->user->name . ' successfully imported project:' . $project->title, 'System Message'));
        } else {
            $this->user->notify(new ProjectImportFailedNotification($this->id, 'Project ID #' . $this->id .' already imported.'));
            event(new AuditLogEvent($this->user->name . ' failed importing project: ' . $project->title, 'System Message'));
        }
    }

    public function failed(\Exception $exception)
    {
        // only send project title
        $this->user->notify(new ProjectImportFailedNotification($this->id, $exception->getMessage()));
    }
}
