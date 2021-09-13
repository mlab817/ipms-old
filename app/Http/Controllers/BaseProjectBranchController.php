<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLevel;
use App\Models\BaseProject;
use App\Models\Basis;
use App\Models\Branch;
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
use App\Models\ReadinessLevel;
use App\Models\Region;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use Illuminate\Http\Request;

class BaseProjectBranchController extends Controller
{
    public function index(BaseProject $baseProject)
    {
        // get the default project whish is the same as the system's default branch
        $project = $baseProject->projects()->where('branch_id', config('ipms.default_branch'))->first();

        return view('projects.show', compact(['baseProject','project']))
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

    public function show(BaseProject $baseProject, Branch $branch)
    {
        $project = $this->getProject($baseProject, $branch);

        if (! $project) {
            return redirect()->route('base-projects.branches.index', $baseProject)
                ->with('error', $branch->name . ' does not exist yet for this project.');
        }

        return view('projects.show', compact(['baseProject','project']))
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

    public function review(BaseProject $baseProject, Branch $branch)
    {
        $project = $this->getProject($baseProject, $branch);
        $review = $project->review;
        $pip_typologies = PipTypology::all();
        $cip_types = CipType::all();
        $readiness_levels = ReadinessLevel::all();

        return view('projects.reviews.index', compact(['baseProject','project','review','pip_typologies','cip_types','readiness_levels']));
    }

    public function trips(BaseProject $baseProject, string $branch)
    {

    }

    public function getProject($baseProject, $branch)
    {
        return $baseProject->projects()->where('branch_id', $branch->id)->first();
    }

    public function history(BaseProject $baseProject, Branch $branch)
    {
        $project = $this->getProject($baseProject, $branch);

        $history = $project->revisionHistory()->latest()->get();
        $history = $history->merge($project->description->revisionHistory()->latest()->get());
        $history = $history->merge($project->expected_output->revisionHistory()->latest()->get());
        $history = $history->merge($project->nep->revisionHistory()->latest()->get());
        $history = $history->merge($project->allocation->revisionHistory()->latest()->get());
        $history = $history->merge($project->disbursement->revisionHistory()->latest()->get());
        $history = $history->merge($project->feasibility_study->revisionHistory()->latest()->get());
        $history = $history->merge($project->project_update->revisionHistory()->latest()->get());

        foreach ($project->region_investments as $ri) {
            $history = $history->merge($ri->revisionHistory()->latest()->get());
        }

        foreach ($project->fs_investments as $fsi) {
            $history = $history->merge($fsi->revisionHistory()->latest()->get());
        }

        $history = $history->sortByDesc('created_at');

        return view('projects.history', compact(['baseProject','branch','project','history']));
    }

    public function issues(BaseProject $baseProject, Branch $branch)
    {
        $project = $this->getProject($baseProject, $branch);
        $issues = $project->issues;

        return view('projects.issues.index', compact(['baseProject','branch','project','issues']));
    }

    public function createIssue(BaseProject $baseProject, Branch $branch)
    {
        $project = $this->getProject($baseProject, $branch);
        $issues = $project->issues;

        return view('projects.issues.create', compact(['baseProject','branch','project','issues']));
    }
}
