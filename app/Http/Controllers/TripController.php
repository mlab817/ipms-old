<?php

namespace App\Http\Controllers;

use App\DataTables\Scopes\TripsDataTableScope;
use App\DataTables\TripDataTable;
use App\Http\Requests\TripStoreRequest;
use App\Http\Requests\TripUpdateRequest;
use App\Models\FsInfrastructure;
use App\Models\FundingSource;
use App\Models\InfrastructureSector;
use App\Models\Prerequisite;
use App\Models\Project;
use App\Models\Region;
use App\Models\RegionInfrastructure;
use App\Models\RightOfWay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TripController extends Controller
{
    public function index(TripDataTable $dataTable)
    {
        return $dataTable
            ->addScope(new TripsDataTableScope)
            ->render('projects.index');
    }

    public function create(Project $project)
    {
        $project->load('infrastructure_sectors','infrastructure_subsectors','fs_infrastructures','region_infrastructures','right_of_way','resettlement_action_plan');

        return view('trip.create', [
            'pageTitle'                 => 'Add TRIP Information: '. strtoupper($project->title),
            'project'                   => $project,
            'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
            'regions'                   => Region::all(),
            'funding_sources'           => FundingSource::all(),
            'prerequisites'             => Prerequisite::all(),
        ]);
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function edit(Project $project)
    {
        abort_unless(auth()->user()->can('projects.update'), 403);

        $project->load('infrastructure_sectors','infrastructure_subsectors','fs_infrastructures','region_infrastructures','right_of_way','resettlement_action_plan');

        return view('trip.edit', [
            'pageTitle'                 => 'Edit TRIP Information: '. strtoupper($project->title),
            'project'                   => $project,
            'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
            'regions'                   => Region::all(),
            'funding_sources'           => FundingSource::all(),
            'prerequisites'             => Prerequisite::all(),
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
        $project->prerequisites()->sync($request->prerequisites);

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
        $project->has_row                           = $request->has_row;
        $project->has_rap                           = $request->has_rap;
        $project->save();

        $project->infrastructure_subsectors()->sync($request->infrastructure_subsectors);
        $project->infrastructure_sectors()->sync($request->infrastructure_sectors);

        $project->right_of_way()->update($request->right_of_way);
        $project->resettlement_action_plan()->update($request->resettlement_action_plan);

//        dd($request->region_infrastructures);

        foreach ($request->region_infrastructures as $item) {
            $itemToUpdate = RegionInfrastructure::where('project_id', $project->id)
                ->where('region_id', $item['region_id'])
                ->first();
            $itemToUpdate->update($item);
        }

        foreach ($request->fs_infrastructures as $item) {
            $itemToUpdate = FsInfrastructure::where('project_id', $project->id)
                ->where('fs_id', $item['fs_id'])
                ->first();
            $itemToUpdate->update($item);
        }

        $project->prerequisites()->sync($request->prerequisites);

        return redirect()->route('projects.index')
            ->with('message','Successfully updated TRIP information');
    }
}
