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
use RealRashid\SweetAlert\Facades\Alert;
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
        abort_if(! auth()->user()->can('update', $project), 403);

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
        abort_if(! auth()->user()->can('update', $project), 403);

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
        $project->risk()->create(['risk' => $request->risk]);

        $project->other_infrastructure              = $request->other_infrastructure;
        $project->trip_info                         = true;
        $project->save();

        $project->infrastructure_subsectors()->sync($request->infrastructure_subsectors);
        $project->infrastructure_sectors()->sync($request->infrastructure_sectors);
        $project->prerequisites()->sync($request->prerequisites);

        if ($request->has('region_infrastructures')) {
            foreach ($request->region_infrastructures as $entry) {
                $project->region_infrastructures()->updateOrCreate([
                    'region_id' => $entry['region_id']
                ], $entry);
            }
        }

//        $project->region_infrastructures()->createMany($request->region_infrastructures);
        if ($request->has('fs_infrastructures')) {
            foreach ($request->fs_infrastructures as $entry) {
                $project->fs_infrastructures()->updateOrCreate([
                    'fs_id' => $entry['fs_id']
                ], $entry);
            }
        }

        Alert::success('Success', 'Successfully added TRIP information');

        return redirect()->route('projects.own');
    }

    public function update(TripUpdateRequest $request, Project $project)
    {
        // update info
        $project->risk()->update(['risk' => $request->risk]);

        $project->other_infrastructure              = $request->other_infrastructure;
        $project->has_row                           = $request->has_row;
        $project->has_rap                           = $request->has_rap;
        $project->save();

        $project->infrastructure_subsectors()->sync($request->infrastructure_subsectors);
        $project->infrastructure_sectors()->sync($request->infrastructure_sectors);

        $project->right_of_way()->update($request->right_of_way);
        $project->resettlement_action_plan()->update($request->resettlement_action_plan);

        foreach ($request->region_infrastructures as $item) {
            foreach ($request->region_infrastructures as $entry) {
                $project->region_infrastructures()->updateOrCreate([
                    'region_id' => $entry['region_id']
                ], $entry);
            }
        }

        foreach ($request->fs_infrastructures as $item) {
            foreach ($request->fs_infrastructures as $entry) {
                $project->fs_infrastructures()->updateOrCreate([
                    'fs_id' => $entry['fs_id']
                ], $entry);
            }
        }

        $project->prerequisites()->sync($request->prerequisites);

        Alert::success('Success', 'Successfully updated TRIP information');

        return redirect()->route('projects.own');
    }
}
