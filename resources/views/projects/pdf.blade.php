<!-- TODO: Complete the Project Profile -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Print Preview | {{ $project->title }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A==" crossorigin="anonymous" />
    <style>
        @media print {
            div.card {
                break-inside: avoid !important;
            }
        }
    </style>
</head>
<body onload="window.print()">

<section class="container">
    <div class="row my-1 d-print-none">
        <button class="btn btn-danger btn-sm" type="button" onclick="window.open('', '_self', ''); window.close();">Close Window</button>
    </div>

    <h2 style="text-align: center;" class="mb-3">
        {{ $project->title }}
    </h2>
    <div class="card card-secondary">
        <div class="card card-header">
            <h1 class="card-title">General Information</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Project ID</label>
                    <p>{{ $project->id }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Status</label>
                    <p>{{ $project->project_status->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Main Implementing Office</label>
                    <p>{{ $project->office->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Implementing Agency/ies</label>
                    <p>{{ implode($project->operating_units->pluck('label')->toArray(),', ') }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Type of PAP</label>
                    <p>{{ $project->pap_type->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Basis for Implementation</label>
                    <p>{{ implode($project->bases->pluck('name')->toArray(),', ') }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Spatial Coverage</label>
                    <p>{{ optional($project->spatial_coverage)->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Region/s</label>
                    <p>{{ implode($project->regions->pluck('label')->toArray(),', ') }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Implementation Period</label>
                    <p>{{ $project->target_start_year . ' - ' . $project->target_end_year }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Total Project Cost (PhP)</label>
                    <p>PhP{{ number_format($project->total_project_cost, 2) }}</p>
                </div>
                <div class="col-sm-12">
                    <label>Description</label>
                    <div>{!! $project->description->description !!}</div>
                </div>
                <div class="col-sm-12">
                    <label>Expected Outputs</label>
                    <div>{!! $project->expected_output->expected_outputs !!}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Other PAP Information</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Is it a Research and Development Program/Project? </label>
                    <p>{{ $project->research ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Is it an ICT Program/Project? </label>
                    <p>{{ $project->ict ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Is it responsive to COVID-19/New Normal Intervention? </label>
                    <p>{{ $project->covid ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Included in which of the following document:</label>
                    <p>{{ implode($project->covid_interventions->pluck('name')->toArray(), ', ') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Approval Status</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Is the Project ICC-able?</label>
                    <p>{{ $project->iccable ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Level of Approval (For ICCable only)</label>
                    <p>{{ optional($project->approval_level)->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Date of Submission/Approval</label>
                    <p>{{ $project->approval_level_date }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Gender Responsiveness</label>
                    <p>{{ optional($project->gad)->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Regional Development Investment Program</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Include in the RDIP?</label>
                    <p>{{ $project->rdip ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Is RDC endorsement required?</label>
                    <p>{{ $project->rdc_endorsement_required ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Is the PAP endorsed by RDC?</label>
                    <p>{{ $project->rdc_endorsed ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>RDC Endorsement Date</label>
                    <p>{{ $project->rdc_endorsed_date }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Project Preparation Details</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Project Preparation Document</label>
                    <p>{{ optional($project->preparation_document)->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Does the project require feasibility study?</label>
                    <p>{{ $project->has_fs ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Status of feasibility study</label>
                    <p>{{ $project->feasibility_study->fs_status->name ?? '' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Does the conduct of feasibility study need assistance?</label>
                    <p>{{ $project->feasibility_study->fs_status->name ?? '' }}</p>
                </div>
            </div>
            <div class="col p-0">
                <label>Schedule of Feasibility Study Cost</label>
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <td class="text-right">2017</td>
                            <td class="text-right">2018</td>
                            <td class="text-right">2019</td>
                            <td class="text-right">2020</td>
                            <td class="text-right">2021</td>
                            <td class="text-right">2022</td>
                            <td class="text-right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-right">{{ number_format($project->feasibility_study->y2017, 2) }}</td>
                            <td class="text-right">{{ number_format($project->feasibility_study->y2018, 2) }}</td>
                            <td class="text-right">{{ number_format($project->feasibility_study->y2019, 2) }}</td>
                            <td class="text-right">{{ number_format($project->feasibility_study->y2020, 2) }}</td>
                            <td class="text-right">{{ number_format($project->feasibility_study->y2021, 2) }}</td>
                            <td class="text-right">{{ number_format($project->feasibility_study->y2022, 2) }}</td>
                            <td class="text-right">
                                {{ number_format($project->feasibility_study->total, 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <label>Expected/Target Date of Completion of FS</label>
                    <p>{{ $project->feasibility_study->completion_date }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Employment Generation</h1>
        </div>
        <div class="card-body">
            <div class="col-sm-3">
                <label>No. of persons to be employed after completion of the project</label>
                <p>{{ $project->employment_generated }}</p>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Philippine Development Plan</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <label>PDP Chapters</label>
                    <p>{{ implode($project->pdp_chapters->pluck('name')->toArray(),', ') }}</p>
                </div>
                <div class="col-sm-12">
                    <label>PDP Result Matrices (RM) Indicators</label>
                    <p>
                        {{ implode($project->pdp_indicators->pluck('name')->toArray(),', ') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Sustainable Development Goals</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <p>{{ implode($project->sdgs->pluck('name')->toArray(),', ') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">0 + 10 Socioeconomic Agenda</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <p>{{ implode($project->ten_point_agendas->pluck('name')->toArray(),', ') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Financial Information</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Main Funding Source</label>
                    <p>{{ optional($project->funding_source)->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Other Funding Source/s</label>
                    <p>{{ implode($project->funding_sources->pluck('name')->toArray(),', ') }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Other Funding Source (specify)</label>
                    <p>{{ $project->other_fs }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Mode of Implementation</label>
                    <p>{{ optional($project->implementation_mode)->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Funding Institution</label>
                    <p>{{ optional($project->funding_institution)->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Budget Tier / Categorization</label>
                    <p>{{ optional($project->tier)->name }}</p>
                </div>
                <div class="col-sm-3">
                    <label>UACS Code</label>
                    <p>{{ $project->uacs_code }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Status and Updates</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <label>Updates</label>
                    <div>{!! $project->project_update->updates !!}</div>
                </div>
                <div class="col-sm-3">
                    <label>As of</label>
                    <p>{{ $project->project_update->updates_date }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Funding Source Breakdown -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Total Investment Required by Funding Source") }} </h3>
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
                @foreach ($project->fs_investments as $fs)
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
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Total Investment Required by Region") }} </h3>
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
                @foreach ($project->region_investments->sortBy('region.order') as $ri)
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

    @if($project->has_infra && $project->trip_info)
    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">TRIP Information</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>Infrastructure Sector/s</label>
                    <p>{{ implode($project->infrastructure_sectors->pluck('name')->toArray(), ', ') }}</p>
                </div>

                <div class="col-sm-3">
                    <label>Infrastructure Subsector/s</label>
                    <p>{{ implode($project->infrastructure_subsectors->pluck('name')->toArray(), ', ') }}</p>
                </div>

                <div class="col-sm-3">
                    <label>Other Infrastructure Sector</label>
                    <p>{{ $project->other_infra }}</p>
                </div>

                <div class="col-sm-3">
                    <label>Prerequisite/s</label>
                    <p>
                        {{ implode($project->prerequisites->pluck('name')->toArray(),', ')  }}
                    </p>
                </div>

                <div class="col-sm-12">
                    <label>Implementation Risk & Mitigation Strategy</label>
                    <p>
                        {!! $project->risk->risk !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Pre-Investment Requirement</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <label>Does the project have a Right of Way Acquisition (ROWA) component?</label>
                    <p>{{ $project->has_row ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Affected Households</label>
                    <p>{{ $project->right_of_way->affected_households ?? '' }}</p>
                </div>
                <div class="col-sm-12">
                    <label>Schedule of Right of Way Acquisition (ROWA) Cost</label>
                    <div class="col-sm-12">
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
                <div class="col-sm-6">
                    <label>Does the project have a Resettlement Action Plan (RAP) component?</label>
                    <p>{{ $project->has_row ? 'Yes' : 'No' }}</p>
                </div>

                <div class="col-sm-3">
                    <label>Affected Households</label>
                    <p>
                        {{ $project->resettlement_action_plan->affected_households ?? '' }}
                    </p>
                </div>

            <div class="col-sm-12">
                <label>Schedule of Resettlement Action Plan (RAP) Cost</label>
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
        </div>
    </div>

    <!-- Funding Source Breakdown -->
    <div class="card card-secondary">
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
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2016')) }}</th>
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2017')) }}</th>
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2018')) }}</th>
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2019')) }}</th>
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2020')) }}</th>
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2021')) }}</th>
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2022')) }}</th>
                    <th class="text-right">{{ number_format($project->fs_infrastructures->sum('y2023')) }}</th>
                    <th class="text-right">{{ number_format(
                        $project->fs_infrastructures->sum('y2016')
                        + $project->fs_infrastructures->sum('y2017')
                        + $project->fs_infrastructures->sum('y2018')
                        + $project->fs_infrastructures->sum('y2019')
                        + $project->fs_infrastructures->sum('y2020')
                        + $project->fs_infrastructures->sum('y2021')
                        + $project->fs_infrastructures->sum('y2022')
                        + $project->fs_infrastructures->sum('y2023')
                        ) }}</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!--/. Funding Source Breakdown -->

    <!-- Regional Breakdown -->
    <div class="card card-secondary">
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
                @foreach ($project->region_infrastructures->sortBy('region.order') as $ri)
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
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2016')) }}</th>
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2017')) }}</th>
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2018')) }}</th>
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2019')) }}</th>
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2020')) }}</th>
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2021')) }}</th>
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2022')) }}</th>
                    <th class="text-right">{{ number_format($project->region_infrastructures->sum('y2023')) }}</th>
                    <th class="text-right">{{ number_format(
                        $project->region_infrastructures->sum('y2016')
                        + $project->region_infrastructures->sum('y2017')
                        + $project->region_infrastructures->sum('y2018')
                        + $project->region_infrastructures->sum('y2019')
                        + $project->region_infrastructures->sum('y2020')
                        + $project->region_infrastructures->sum('y2021')
                        + $project->region_infrastructures->sum('y2022')
                        + $project->region_infrastructures->sum('y2023')
                        ) }}</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!--/. Regional Breakdown -->
    @endif

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Financial Status") }}</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-valign-middle">
                <thead>
                <tr>
                    <th></th>
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
                <tr>
                    <td class="text-sm text-nowrap">National Expenditure Program (NEP)</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2016 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2017 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2018 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2019 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2020 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2021 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2022 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->nep->y2023 ?? 0) }}</td>
                    <th class="text-sm text-right">
                        {{
                            number_format(($project->nep->y2016 ?? 0)
                                + ($project->nep->y2017 ?? 0)
                                + ($project->nep->y2018 ?? 0)
                                + ($project->nep->y2019 ?? 0)
                                + ($project->nep->y2020 ?? 0)
                                + ($project->nep->y2021 ?? 0)
                                + ($project->nep->y2022 ?? 0)
                                + ($project->nep->y2023 ?? 0))
                        }}
                    </th>
                </tr>
                <tr>
                    <td class="text-sm text-nowrap">General Appropriations Act (GAA)</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2016 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2017 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2018 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2019 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2020 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2021 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2022 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->allocation->y2023 ?? 0) }}</td>
                    <th class="text-sm text-right">
                        {{
                            number_format(($project->allocation->y2016 ?? 0)
                                + ($project->allocation->y2017 ?? 0)
                                + ($project->allocation->y2018 ?? 0)
                                + ($project->allocation->y2019 ?? 0)
                                + ($project->allocation->y2020 ?? 0)
                                + ($project->allocation->y2021 ?? 0)
                                + ($project->allocation->y2022 ?? 0)
                                + ($project->allocation->y2023 ?? 0))
                        }}
                    </th>
                </tr>
                <tr>
                    <td class="text-sm text-nowrap">Actual Disbursement</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2016 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2017 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2018 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2019 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2020 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2021 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2022 ?? 0) }}</td>
                    <td class="text-sm text-right">{{ number_format($project->disbursement->y2023 ?? 0) }}</td>
                    <th class="text-sm text-right">
                        {{
                            number_format(($project->disbursement->y2016 ?? 0)
                                + ($project->disbursement->y2017 ?? 0)
                                + ($project->disbursement->y2018 ?? 0)
                                + ($project->disbursement->y2019 ?? 0)
                                + ($project->disbursement->y2020 ?? 0)
                                + ($project->disbursement->y2021 ?? 0)
                                + ($project->disbursement->y2022 ?? 0)
                                + ($project->disbursement->y2023 ?? 0))
                        }}
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <p>Prepared by:
                <br/>
                <br/>
                <br/>
                <strong>{{ optional($project->creator)->full_name }} </strong>
            </p>
        </div>
        <div class="col-sm-6">
            <p>Noted by:
                <br/>
                <br/>
                <br/>
                <strong>__________________________________________</strong>
            </p>
        </div>
    </div>

    @if($project->review()->exists())
    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title">Review</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label>For inclusion in the PIP?</label>
                    <p>{{ $project->review->pip ? 'Yes' : 'No' }}</p>
                </div>

                <div class="col-sm-3">
                    <label>PIP Typology</label>
                    <p>{{ $project->review->pip_typology->name ?? '' }}</p>
                </div>

                <div class="col-sm-3">
                    <label>For inclusion in the CIP?</label>
                    <p>{{ $project->review->cip ? 'Yes' : 'No' }}</p>
                </div>

                <div class="col-sm-3">
                    <label>CIP Type</label>
                    <p>{{ $project->review->cip_type->name ?? '' }}</p>
                </div>

                <div class="col-sm-3">
                    <label>For inclusion in TRIP?</label>
                    <p>{{ $project->review->trip ? 'Yes' : 'No' }}</p>
                </div>

                <div class="col-sm-3">
                    <label>For inclusion in IFP?</label>
                    <p>{{ $project->review->ifp ? 'Yes' : 'No' }}</p>
                </div>

                <div class="col-sm-3">
                    <label>Readiness Level</label>
                    <p>{{ $project->review->readiness_level->name ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <p class="text-xs text-muted m-0">Last updated on {{ $project->updated_at }}</p>
            <p class="text-xs text-muted m-0">Generated on {{ now() }}</p>
        </div>
    </div>
</section>
</body>
</html>
