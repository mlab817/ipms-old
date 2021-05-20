<div class="card card-primary card-outline">
    <div class="card-header">
        <h1 class="card-title">TRIP Information</h1>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Infrastructure Sector/s</label>
            <div class="col-sm-9">
                @forelse($project->infrastructure_sectors as $item)
                    <span class="badge badge-primary">{{ $item->name }}</span>
                @empty
                    <span>None selected</span>
                @endforelse
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Infrastructure Subsector/s</label>
            <div class="col-sm-9">
                @forelse($project->infrastructure_subsectors as $item)
                    <span class="badge badge-primary">{{ $item->name }}</span>
                @empty
                    <span>None selected</span>
                @endforelse
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Other Infrastructure Sector</label>
            <div class="col-sm-9">
                {{ $project->other_infra }}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Prerequisite/s</label>
            <div class="col-sm-9">
                @forelse($project->prerequisites as $item)
                    <span class="badge badge-primary">{{ $item->name }}</span>
                @empty
                    <span>None selected</span>
                @endforelse
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Implementation Risk & Mitigation Strategy</label>
            <div class="col-sm-9">
                {{ $project->risk }}
            </div>
        </div>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h1 class="card-title">Pre-Investment Requirement</h1>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Does the project have a Right of Way Acquisition (ROWA) component?</label>
            <div class="col-sm-9">
                @if($project->has_row)
                    <span class="badge badge-success">Yes</span>
                @else
                    <span class="badge badge-danger">No</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Schedule of Right of Way Acquisition (ROWA) Cost</label>
            <div class="col-sm-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-right">2017</th>
                                <th class="text-right">2018</th>
                                <th class="text-right">2019</th>
                                <th class="text-right">2020</th>
                                <th class="text-right">2021</th>
                                <th class="text-right">2022</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-right">{{ number_format($project->right_of_way->y2017 ?? 0) }}</td>
                                <td class="text-right">{{ number_format($project->right_of_way->y2018 ?? 0) }}</td>
                                <td class="text-right">{{ number_format($project->right_of_way->y2019 ?? 0) }}</td>
                                <td class="text-right">{{ number_format($project->right_of_way->y2020 ?? 0) }}</td>
                                <td class="text-right">{{ number_format($project->right_of_way->y2021 ?? 0) }}</td>
                                <td class="text-right">{{ number_format($project->right_of_way->y2022 ?? 0) }}</td>
                                <td class="text-right">{{ number_format(($project->right_of_way->y2016 ?? 0) +
                                    ($project->right_of_way->y2018 ?? 0) +
                                    ($project->right_of_way->y2019 ?? 0) +
                                    ($project->right_of_way->y2020 ?? 0) +
                                    ($project->right_of_way->y2021 ?? 0) +
                                    ($project->right_of_way->y2022 ?? 0)
                                    ) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Affected Households</label>
            <div class="col-sm-9">
                {{ $project->right_of_way->affected_households ?? '' }}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Does the project have a Resettlement Action Plan (RAP) component?</label>
            <div class="col-sm-9">
                @if($project->has_row)
                    <span class="badge badge-success">Yes</span>
                @else
                    <span class="badge badge-danger">No</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Schedule of Resettlement Action Plan (RAP) Cost</label>
            <div class="col-sm-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-right">2017</th>
                            <th class="text-right">2018</th>
                            <th class="text-right">2019</th>
                            <th class="text-right">2020</th>
                            <th class="text-right">2021</th>
                            <th class="text-right">2022</th>
                            <th class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-right">{{ number_format($project->resettlement_action_plan->y2017 ?? 0) }}</td>
                            <td class="text-right">{{ number_format($project->resettlement_action_plan->y2018 ?? 0) }}</td>
                            <td class="text-right">{{ number_format($project->resettlement_action_plan->y2019 ?? 0) }}</td>
                            <td class="text-right">{{ number_format($project->resettlement_action_plan->y2020 ?? 0) }}</td>
                            <td class="text-right">{{ number_format($project->resettlement_action_plan->y2021 ?? 0) }}</td>
                            <td class="text-right">{{ number_format($project->resettlement_action_plan->y2022 ?? 0) }}</td>
                            <td class="text-right">{{ number_format(($project->resettlement_action_plan->y2016 ?? 0) +
                                    ($project->resettlement_action_plan->y2018 ?? 0) +
                                    ($project->resettlement_action_plan->y2019 ?? 0) +
                                    ($project->resettlement_action_plan->y2020 ?? 0) +
                                    ($project->resettlement_action_plan->y2021 ?? 0) +
                                    ($project->resettlement_action_plan->y2022 ?? 0)
                                    ) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-sm-3">Affected Households</label>
            <div class="col-sm-9">
                {{ $project->resettlement_action_plan->affected_households ?? '' }}
            </div>
        </div>

    </div>
</div>

<!-- Funding Source Breakdown -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Infrastructure Cost by Funding Source") }} </h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-valign-middle">
            <thead>
            <tr>
                <th class="text-sm">Funding Source</th>
                <th class="text-sm text-right">2016 &amp; Prior</th>
                <th class="text-sm text-right">2017</th>
                <th class="text-sm text-right">2018</th>
                <th class="text-sm text-right">2019</th>
                <th class="text-sm text-right">2020</th>
                <th class="text-sm text-right">2021</th>
                <th class="text-sm text-right">2022</th>
                <th class="text-sm text-right">2023 &amp; Beyond</th>
                <th class="text-sm text-right">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($project->fs_infrastructures as $fs)
                <tr>
                    <td class="text-sm text-nowrap">
                        {{ $fs->funding_source->name }}
                    </td>
                    <td class="text-sm text-right">{{ number_format($fs->y2016) }}</td>
                    <td class="text-sm text-right">{{ number_format($fs->y2017) }}</td>
                    <td class="text-sm text-right">{{ number_format($fs->y2018) }}</td>
                    <td class="text-sm text-right">{{ number_format($fs->y2019) }}</td>
                    <td class="text-sm text-right">{{ number_format($fs->y2020) }}</td>
                    <td class="text-sm text-right">{{ number_format($fs->y2021) }}</td>
                    <td class="text-sm text-right">{{ number_format($fs->y2022) }}</td>
                    <td class="text-sm text-right">{{ number_format($fs->y2023) }}</td>
                    <td class="text-sm text-right">
                        {{
                            number_format($fs->y2016
                                + $fs->y2017
                                + $fs->y2018
                                + $fs->y2019
                                + $fs->y2020
                                + $fs->y2021
                                + $fs->y2022
                                + $fs->y2023)
                        }}
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Total</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2016')) }}</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2017')) }}</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2018')) }}</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2019')) }}</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2020')) }}</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2021')) }}</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2022')) }}</th>
                <th class="text-right">{{ number_format($project->fs_investments->sum('y2023')) }}</th>
                <th class="text-right">{{ number_format(
                        $project->fs_investments->sum('y2016')
                        + $project->fs_investments->sum('y2017')
                        + $project->fs_investments->sum('y2018')
                        + $project->fs_investments->sum('y2019')
                        + $project->fs_investments->sum('y2020')
                        + $project->fs_investments->sum('y2021')
                        + $project->fs_investments->sum('y2022')
                        + $project->fs_investments->sum('y2023')
                        ) }}</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<!--/. Funding Source Breakdown -->

<!-- Regional Breakdown -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Infrastructure Cost Required by Region") }} </h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-valign-middle">
            <thead>
            <tr>
                <th class="text-sm">Region</th>
                <th class="text-sm text-right">2016 &amp; Prior</th>
                <th class="text-sm text-right">2017</th>
                <th class="text-sm text-right">2018</th>
                <th class="text-sm text-right">2019</th>
                <th class="text-sm text-right">2020</th>
                <th class="text-sm text-right">2021</th>
                <th class="text-sm text-right">2022</th>
                <th class="text-sm text-right">2023 &amp; Beyond</th>
                <th class="text-sm text-right">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($project->region_infrastructures as $ri)
                <tr>
                    <td class="text-sm text-nowrap">
                        {{ $ri->region->label ?? '' }}
                    </td>
                    <td class="text-sm text-right">{{ number_format($ri->y2016) }}</td>
                    <td class="text-sm text-right">{{ number_format($ri->y2017) }}</td>
                    <td class="text-sm text-right">{{ number_format($ri->y2018) }}</td>
                    <td class="text-sm text-right">{{ number_format($ri->y2019) }}</td>
                    <td class="text-sm text-right">{{ number_format($ri->y2020) }}</td>
                    <td class="text-sm text-right">{{ number_format($ri->y2021) }}</td>
                    <td class="text-sm text-right">{{ number_format($ri->y2022) }}</td>
                    <td class="text-sm text-right">{{ number_format($ri->y2023) }}</td>
                    <th class="text-sm text-right">
                        {{
                            number_format($ri->y2016
                                + $ri->y2017
                                + $ri->y2018
                                + $ri->y2019
                                + $ri->y2020
                                + $ri->y2021
                                + $ri->y2022
                                + $ri->y2023)
                        }}
                    </th>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Total</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2016')) }}</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2017')) }}</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2018')) }}</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2019')) }}</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2020')) }}</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2021')) }}</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2022')) }}</th>
                <th class="text-right">{{ number_format($project->region_investments->sum('y2023')) }}</th>
                <th class="text-right">{{ number_format(
                        $project->region_investments->sum('y2016')
                        + $project->region_investments->sum('y2017')
                        + $project->region_investments->sum('y2018')
                        + $project->region_investments->sum('y2019')
                        + $project->region_investments->sum('y2020')
                        + $project->region_investments->sum('y2021')
                        + $project->region_investments->sum('y2022')
                        + $project->region_investments->sum('y2023')
                        ) }}</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<!--/. Regional Breakdown -->
