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
    public function show(Project $project)
    {
        abort_if(! auth()->user()->can('update', $project), 403);

        if (! $project->has_infra) {
            return redirect()->route('projects.show', $project)
                ->withMessage('This project has no infrastructure component');
        }

        $project->load('risk','infrastructure_sectors','infrastructure_subsectors','fs_infrastructures.funding_source','region_infrastructures.region','right_of_way','resettlement_action_plan');

//        dd($project->region_infrastructures);
//
//        dd('no region_infrastructures');

        return view('trip.show', [
            'project'                   => $project,
            'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
            'regions'                   => Region::all(),
            'funding_sources'           => FundingSource::all(),
            'prerequisites'             => Prerequisite::all(),
            'regionInfrastructures'     => $project->region_infrastructures,
        ]);
    }

    public function update(TripStoreRequest $request, Project $project)
    {
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

        return redirect()->route('trips.show', $project);
    }
}
