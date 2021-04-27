<?php

namespace App\Http\Controllers;

use App\DataTables\TripDataTable;
use App\Http\Requests\TripStoreRequest;
use App\Http\Requests\TripUpdateRequest;
use App\Models\FundingSource;
use App\Models\InfrastructureSector;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TripController extends Controller
{
    public function index(TripDataTable $dataTable)
    {
        return $dataTable->render('trip.index');
    }

    public function create(Project $project)
    {
        $project->load('infrastructure_sectors','infrastructure_subsectors','fs_infrastructures','region_infrastructures','right_of_way','resettlement_action_plan');

        return view('trip.edit', [
            'pageTitle'                 => 'Add TRIP Information: '. strtoupper($project->title),
            'project'                   => $project,
            'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
            'regions'                   => Region::all(),
            'funding_sources'           => FundingSource::all(),
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return $project;
    }

    public function edit(string $slug)
    {
        $project = Project::with('infrastructure_sectors','infrastructure_subsectors','fs_infrastructures','region_infrastructures','right_of_way','resettlement_action_plan')->where('slug', $slug)->firstOrFail();

        return view('trip.edit', [
            'pageTitle'                 => 'Edit TRIP Information: '. strtoupper($project->title),
            'project'                   => $project,
            'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
            'regions'                   => Region::all(),
            'funding_sources'           => FundingSource::all(),
        ]);
    }

    public function store(TripStoreRequest $request, Project $project)
    {
        // handle save
        $project->risk                              = $request->risk;
        $project->other_infrastructure              = $request->other_infrastructure;
        $project->trip_info                         = true;
        $project->save();

        $project->infrastructure_subsectors()->sync($request->infrastructure_subsectors);
        $project->infrastructure_sectors()->sync($request->infrastructure_sectors);
        $project->region_infrastructures()->createMany($request->region_infrastructures);
        $project->fs_infrastructures()->createMany($request->fs_infrastructures);

        return redirect()->route('projects.index')
            ->with('message','Successfully added TRIP information');
    }

    public function update(TripUpdateRequest $request, Project $project)
    {
        // update info
        $project->risk                              = $request->risk;
        $project->other_infrastructure              = $request->other_infrastructure;
        $project->save();

        $project->infrastructure_subsectors()->sync($request->infrastructure_subsectors);
        $project->infrastructure_sectors()->sync($request->infrastructure_sectors);

        return redirect()->route('projects.index')
            ->with('message','Successfully updated TRIP information');
    }
}
