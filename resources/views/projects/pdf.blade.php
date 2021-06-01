<!-- TODO: Complete the Project Profile -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Print Preview | {{ $project->title }}</title>
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
<body>
<section class="container">
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
                    <label>Description</label>
                    <p>{!! $project->description !!}</p>
                </div>
                <div class="col-sm-3">
                    <label>Expected Outputs</label>
                    <p>{!! $project->expected_outputs !!}</p>
                </div>
                <div class="col-sm-3">
                    <label>Implementation Period</label>
                    <p>{{ $project->target_start_year . ' - ' . $project->target_end_year }}</p>
                </div>
                <div class="col-sm-3">
                    <label>Total Project Cost (PhP)</label>
                    <p>PhP{{ number_format($project->total_project_cost, 2) }}</p>
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
            <div class="row">
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
                    <p>{{ $project->updates }}</p>
                </div>
                <div class="col-sm-3">
                    <label>As of</label>
                    <p>{{ $project->updates_date }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h1 class="card-title"></h1>
        </div>
    </div>
</section>
</body>
</html>
