<?php

namespace App\Http\Controllers;

use App\Jobs\ProjectCloneJob;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\CovidIntervention;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\InfrastructureSector;
use App\Models\Office;
use App\Models\OperatingUnitType;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PdpIndicator;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use Illuminate\Http\Request;

class ProjectCloneController extends Controller
{
    public function show(Project $project, string $uuid = null)
    {
        if ($uuid) {
            $project = $project->clones()->where('uuid', $uuid)->firstOrFail();
        }

        $project->load(
            'regions',
            'region_investments.region',
            'region_infrastructures.region',
            'fs_investments.funding_source',
            'fs_infrastructures.funding_source',
            'bases',
            'disbursement',
            'nep',
            'allocation',
            'feasibility_study',
            'right_of_way',
            'resettlement_action_plan',
            'ten_point_agendas',
            'sdgs',
            'pdp_chapters',
            'pdp_indicators',
            'operating_units');

        return view('projects.show', compact('project'))
            ->with([
                'offices'                   => Office::all(),
                'pap_types'                 => PapType::all(),
                'bases'                     => Basis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         => SpatialCoverage::all(),
                'regions'                   => Region::all(),
                'gads'                      => Gad::all(),
                'pip_typologies'            => PipTypology::all(),
                'cip_types'                 => CipType::all(),
                'years'                     => config('ipms.editor.years'),
                'approval_levels'           => ApprovalLevel::all(),
                'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
                'pdp_chapters'              => PdpChapter::orderBy('name')->get(),
                'sdgs'                      => Sdg::all(),
                'ten_point_agendas'         => TenPointAgenda::all(),
                'pdp_indicators'            => PdpIndicator::with('children.children.children')
                    ->where('level',1)
                    ->select('id','name')->get(),
                'funding_sources'           => FundingSource::all(),
                'funding_institutions'      => FundingInstitution::all(),
                'implementation_modes'      => ImplementationMode::all(),
                'tiers'                     => Tier::all(),
                'preparation_documents'     => PreparationDocument::all(),
                'fs_statuses'               => FsStatus::all(),
                'ou_types'                  => OperatingUnitType::with('operating_units')->get(),
                'covidInterventions'        => CovidIntervention::all(),
            ]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $this->authorize('update');

        $this->validate($request, [
            'updating_period_id' => 'required|exists:updating_periods,id'
        ]);

        // check updating period id
        if ($project->updating_period_id == $request->updating_period_id) {
            return back()->with('error','This project has already been cloned to this updating period');
        }

        $projectAlreadyCloned = Project::where('project_id', $project->id)
            ->where('updating_period_id', $request->updating_period_id)
            ->exists();

        if ($projectAlreadyCloned) {
            return back()->with('error','This project has already been cloned to this updating period');
        }

        dispatch(new ProjectCloneJob($project->id, $request->updating_period_id ?? config('ipms.current_updating_period'), auth()->id()));

        return back()->with('success','Successfully began cloning project. This may take some time.');
    }
}
