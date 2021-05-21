<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("General Information") }}</h3>
    </div>

    <div class="card-body">
        <div class="form-group row">
            <label for="title" class="col-sm-3">PAP Title </label>
            <div class="col-sm-9">
                {{ $project->title }}
            </div>
        </div>

        <div class="form-group row">
            <label for="pap_type_id" class="col-sm-3">PAP Type </label>
            <div class="col-sm-9">
                {{ $project->pap_type->name ?? '' }}
            </div>
        </div>

        <div class="form-group row">
            <label for="pap_type_id" class="col-sm-3">Is this a regular program? </label>
            <div class="col-sm-9">
                {{ $project->regular_program ? 'Yes' : 'No' }}
            </div>
        </div>

        <div class="form-group row">
            <label for="has_infra" class="col-sm-3">Does this PAP have INFRASTRUCTURE component/s? </label>
            <div class="col-sm-9">
                {{ $project->has_infra ? 'Yes' : 'No' }}
            </div>
        </div>

        <div class="form-group row">
            <label for="bases" class="col-sm-3">Implementation Bases </label>
            <div class="col-sm-9">
                @foreach($project->bases as $item)
                    <span class="badge badge-primary">{{ $item->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3">Description </label>
            <div class="col-sm-9">
                {{ $project->description }}
            </div>
        </div>

        <div class="form-group row">
            <label for="expected_outputs" class="col-sm-3">Expected Outputs </label>
            <div class="col-sm-9">
                {{ $project->expected_outputs }}
            </div>
        </div>

        <div class="form-group row">
            <label for="total_project_cost" class="col-sm-3">Total Project Cost (in absolute PhP) </label>
            <!-- TODO: Replace with MoneyInput -->
            <div class="col-sm-9">
                {{ number_format($project->total_project_cost, 2) }}
            </div>
        </div>

        <div class="form-group row">
            <label for="project_status_id" class="col-sm-3">Project Status </label>
            <div class="col-sm-9">
                {{ $project->project_status->name ?? '' }}
            </div>
        </div>

    </div>

</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Implementing Agencies") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="regions" class="col-form-label col-sm-3">Implementing Agencies </label>
            <div class="col-sm-9">
                @foreach($project->operating_units as $item)
                    <span class="badge badge-primary">
                        {{ $item->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Spatial Coverage") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="spatial_coverage_id" class="col-sm-3">Spatial Coverage </label>
            <div class="col-sm-9">
                {{ $project->spatial_coverage->name ?? '' }}
            </div>
        </div>

        <div class="form-group row">
            <label for="regions" class="col-sm-3">Regions </label>
            <div class="col-sm-9">
                @foreach($project->regions as $item)
                    <span class="badge badge-primary">{{ $item->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Implementation Period -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Implementation Period") }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="target_start_year" class="col-sm-6">Start of Implementation </label>
                    <div class="col-sm-6">
                        {{ $project->target_start_year }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="target_end_year" class="col-sm-6">Year of Project Completion </label>
                    <div class="col-sm-6">
                        {{ $project->target_end_year }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/. Implementation Period -->

<!-- Approval Status -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Approval Status") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="iccable" class="col-form-label col-sm-3">Is the Project ICC-able? </label>
            <div class="col-sm-9">
                <div class="form-check-inline">
                    {{ $project->iccable == 1 ? 'Yes' : 'No' }}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="target_start_year" class="col-form-label col-sm-3">Level of Approval (For ICCable only)</label>
            <div class="col-sm-9">
                {{ $project->approval_level->name ?? '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="approval_date" class="col-form-label col-sm-3">Date of Submission/Approval</label>
            <div class="col-sm-9">
                {{ $project->approval_date ?? '' }}
            </div>
        </div>
    </div>
</div>
<!--/. Approval Status -->

<!--/. Regional Development Investment Program -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Regional Development Investment Program</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Regional Development Investment Program </label>
            <div class="col-sm-9">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        {{ $project->rdip == 1 ? 'Yes' : 'No' }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Is RDC endorsement required? </label>
            <div class="col-sm-9">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        {{ $project->rdc_endorsement_required == 1 ? 'Yes' : 'No' }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="rdc_endorsed" class="col-form-label col-sm-3">Has the project been endorsed?</label>
            <div class="col-sm-9">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        {{ $project->rdc_endorsed == 1 ? 'Yes' : 'No' }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="rdc_endorsed_date" class="col-form-label col-sm-3">RDC Endorsement Date</label>
            <div class="col-sm-9">
                {{ $project->rdc_endorsed_date }}
            </div>
        </div>
    </div>
</div>
<!--/. Regional Development Investment Program -->

<!-- Project Preparation Details -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Project Preparation Details") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="preparation_document_id" class="col-form-label col-sm-3">Project
                Preparation Document </label>
            <div class="col-sm-9">
                {{ $project->preparation_document->name ?? '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="has_fs" class="col-form-label col-sm-3">Does the project require
                feasibility study? </label>
            <div class="col-sm-9">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        {{ $project->has_fs == 1 ? 'Yes' : 'No' }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="fs_status_id" class="col-form-label col-sm-3">Status of Feasibility
                Study (Only if FS is required)</label>
            <div class="col-sm-9">
                {{ $project->feasibility_study ? ($project->feasibility_study->fs_status->name ?? '') : '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="feasibility_study.needs_assistance" class="col-form-label col-sm-3">Does the conduct of
                feasibility
                study need assistance?</label>
            <div class="col-sm-9">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        {{ $project->feasibility_study ? ($project->feasibility_study->need_assistance == 1 ? 'Yes' : 'No') : '' }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="fs_cost">Schedule of Feasibility Study Cost (in absolute PhP)</label>
            <div class="table-responsive">
            <table class="table" id="fs_cost">
                <thead>
                <tr>
                    <th class="text-sm text-right">2017</th>
                    <th class="text-sm text-right">2018</th>
                    <th class="text-sm text-right">2019</th>
                    <th class="text-sm text-right">2020</th>
                    <th class="text-sm text-right">2021</th>
                    <th class="text-sm text-right">2022</th>
                    <th class="text-sm text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-right">
                        {{ number_format($project->feasibility_study->y2017 ?? 0) }}
                    </td>
                    <td class="text-right">
                         {{ number_format($project->feasibility_study->y2018 ?? 0) }}
                    </td>
                    <td class="text-right">
                        {{ number_format($project->feasibility_study->y2019 ?? 0) }}
                    </td>
                    <td class="text-right">
                        {{ number_format($project->feasibility_study->y2020 ?? 0) }}
                    </td>
                    <td class="text-right">
                        {{ number_format($project->feasibility_study->y2021 ?? 0) }}
                    </td>
                    <td class="text-right">
                        {{ number_format($project->feasibility_study->y2022 ?? 0) }}
                    </td>
                    <th class="text-right">
                        {{
                            number_format(($project->feasibility_study->y2017 ?? 0)
                            + ($project->feasibility_study->y2018 ?? 0)
                            + ($project->feasibility_study->y2019 ?? 0)
                            + ($project->feasibility_study->y2020 ?? 0)
                            + ($project->feasibility_study->y2021 ?? 0)
                            + ($project->feasibility_study->y2022 ?? 0))
                        }}
                    </th>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        <div class="form-group row">
            <label for="feasibility_study[completion_date]" class="col-form-label col-sm-3">Expected/Target
                Date of Completion of FS</label>
            <div class="col-sm-9">
                {{ $project->feasibility_study->completion_date ?? '' }}
            </div>
        </div>
    </div>
</div>
<!--/. Project Preparation Details -->

<!-- Employment Generation -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Employment Generation") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="employment_generated" class="col-form-label col-sm-3">No. of persons to
                be employed after completion of the project</label>
            <div class="col-sm-9">
                {{ $project->employment_generated }}
            </div>
        </div>
    </div>
</div>
<!--/. Employment Generation -->

<!-- Philippine Development Plan Chapter -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Philippine Development Plan") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="pdp_chapter_id" class="col-form-label col-sm-3">Main philippine
                Development Chapter </label>
            <div class="col-sm-9">
                {{ $project->pdp_chapter->name ?? '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="infrastructure_sectors" class="col-form-label col-sm-3">Other PDP
                Chapters</label>
            <div class="col-sm-9">
                @foreach($project->pdp_chapters as $option)
                    <span class="badge badge-primary">{{ $option->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--/. Philippine Development Plan Chapter -->

<!-- Philippine Development Plan Indicators -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Philippine Development Results Matrices (PDP-RM) Indicators") }}</h3>
    </div>
    <!-- TODO: PDP Indicators as Vue component -->
    <div class="card-body">
        <div class="form-check">
            <label for="no_pdp_indicator" class="form-check-label">
                <input type="checkbox" value="1" id="no_pdp_indicator" name="no_pdp_indicator"
                       class="form-check-input">
                No PDP Indicator applicable
            </label>
        </div>

        <div id="pdp_indicators_group" class="form-group mt-2">
            @foreach($project->pdp_indicators as $pi)
                <span class="badge badge-primary">{{ $pi->name }}</span>
            @endforeach
        </div>
    </div>
</div>
<!--/. Philippine Development Plan Indicators -->

<!-- Sustainable Development Goals -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Sustainable Development Goals") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="sdgs" class="col-form-label col-sm-3">Sustainable Development Goals </label>
                <div class="col-sm-9">
                    @foreach($project->sdgs as $option)
                        <span class="badge badge-primary">{{ $option->name }}</span>
                    @endforeach
                </div>
        </div>
    </div>
</div>
<!--/. Sustainable Development Goals -->

<!-- Ten Point Agenda -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Ten Point Agenda") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="ten_point_agendas" class="col-form-label col-sm-3">Ten Point Agenda </label>
                <div class="col-sm-9">
                    @foreach($project->ten_point_agendas as $option)
                        <span class="badge badge-primary">{{ $option->name }}</span>
                    @endforeach
                </div>
        </div>
    </div>
</div>
<!--/. Ten Point Agenda -->

<!-- Financial Information -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Financial Information") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="funding_source_id" class="col-form-label col-sm-3">Main Funding Source
            </label>
            <div class="col-sm-9">
                {{ $project->funding_source->name ?? '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="funding_sources" class="col-form-label col-sm-3">Other Funding
                Sources</label>
            <div class="col-sm-9">
                @foreach($project->funding_sources as $option)
                    <span class="badge badge-primary">
                        {{ $option->name }}
                    </span>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="other_fs" class="col-form-label col-sm-3">Other Funding Source
                (specify)</label>
            <div class="col-sm-9">
                {{ $project->other_fs }}
            </div>
        </div>
        <div class="form-group row">
            <label for="implementation_mode_id" class="col-form-label col-sm-3">Mode of
                Implementation </label>
            <div class="col-sm-9">
                {{ $project->implementation_mode->name ?? '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="funding_institution_id" class="col-form-label col-sm-3">Funding
                Institution</label>
            <div class="col-sm-9">
                {{ $project->funding_institution->name ?? '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="tier_id" class="col-form-label col-sm-3">Budget Tier </label>
            <div class="col-sm-9">
                {{ $project->tier->name ?? '' }}
            </div>
        </div>
        <div class="form-group row">
            <label for="uacs_code" class="col-form-label col-sm-3">UACS Code</label>
            <div class="col-sm-9">
                {{ $project->uacs_code }}
            </div>
        </div>
    </div>
</div>
<!--/. Financial Information -->

<!-- Status & Updates -->
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Status & Updates") }}</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="updates" class="col-form-label col-sm-3">Updates </label>
            <div class="col-sm-9">
                {{ $project->updates }}
            </div>
        </div>
        <div class="form-group row">
            <label for="updates_date" class="col-form-label col-sm-3">As of </label>
            <div class="col-sm-9">
                {{ $project->updates_date }}
            </div>
        </div>
    </div>
</div>
<!--/. Status & Updates -->

<!-- Funding Source Breakdown -->
<div class="card card-primary card-outline">
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
<div class="card card-primary card-outline">
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
            @foreach ($project->region_investments as $ri)
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

<div class="card card-primary card-outline">
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

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ __("Attachments") }}</h3>
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($project->attachments as $att)
                <tr>
                    <td>{{ $att->title }}</td>
                    <td class="row">
                        <a href="{{ route('attachments.download', $att) }}" class="btn btn-primary" target="_blank">Download</a>
                        <button type="button" class="btn btn-danger ml-2" onclick="deleteAttachment({{ $att->id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No attachments.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @can('update', $project)
    <div class="card-body">
        <form action="{{ route('projects.upload', $project) }}" method="POST" role="form"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="attachment">Upload File</label>
                <div class="my-3">
                    <input type="file" class="form-control-file @error('attachment') is-invalid @enderror" name="attachment" id="attachment">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
                @error('attachment')<span class="error invalid-feedback">{{ $message }}</span>@enderror
            </div>
        </form>
    </div>
    @endcan
</div>

@push('scripts')
<script>
    function deleteAttachment(id) {
        let response = confirm('Are you sure you want to delete this attachment? This action cannot be undone.')

        if (response) {
            // go delete
            // alert(`delete ${id}`)
            let placeholderUrl = "{{ route('attachments.destroy', ':url' ) }}"
            let deleteUrl = placeholderUrl.replace(':url', id)
            // alert(deleteUrl)

            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(result) {
                    console.log(result)
                    window.location.reload()
                }
            })
        }
    }
</script>
@endpush
