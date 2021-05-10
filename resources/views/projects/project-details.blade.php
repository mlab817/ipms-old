
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("General Information") }}</h3>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="title" class="col-sm-3">Project Title <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->title }}
                </div>
            </div>

            <div class="form-group row">
                <label for="pap_type_id" class="col-sm-3">PAP Type <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->pap_type->name ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="pap_type_id" class="col-sm-3">Is this a regular program? <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->regular_program ? 'Yes' : 'No' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="has_infra" class="col-sm-3">Does this PAP have INFRASTRUCTURE component/s? <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->has_infra ? 'Yes' : 'No' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="bases" class="col-sm-3">Implementation Bases <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    <ul>
                        @foreach($project->bases as $item)
                            <li>{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-3">Description <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->description }}
                </div>
            </div>

            <div class="form-group row">
                <label for="expected_outputs" class="col-sm-3">Expected Outputs <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->expected_outputs }}
                </div>
            </div>

            <div class="form-group row">
                <label for="total_project_cost" class="col-sm-3">Total Project Cost (in absolute PhP) <i
                        class="text-danger fas fa-flag"></i></label>
                <!-- TODO: Replace with MoneyInput -->
                <div class="col-sm-9">
                    {{ number_format($project->total_project_cost, 2) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="project_status_id" class="col-sm-3">Project Status <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->project_status->name ?? '' }}
                </div>
            </div>

        </div>

    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Implementing Agencies") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="regions" class="col-form-label col-sm-3">Implementing Agencies <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    <ul>
                    @foreach($project->operating_units as $item)
                        <li>
                            {{ $item->name }}
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Spatial Coverage") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="spatial_coverage_id" class="col-sm-3">Spatial Coverage <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    {{ $project->spatial_coverage->name ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="regions" class="col-sm-3">Regions <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    <ul>
                    @foreach($project->regions as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Implementation Period -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Implementation Period") }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="target_start_year" class="col-sm-3">Start of Implementation <i
                                class="text-danger fas fa-flag"></i></label>
                        <div class="col-sm-9">
                            {{ $project->target_start_year }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="target_end_year" class="col-sm-3">Year of Project Completion <i
                                class="text-danger fas fa-flag"></i></label>
                        <div class="col-sm-9">
                            {{ $project->target_end_year }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. Implementation Period -->

    <!-- Approval Status -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Approval Status") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="iccable" class="col-form-label col-sm-3">Is the Project ICC-able? <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" value="1"
                               name="iccable" @if(old('iccable', $project->iccable) == 1) checked @endif>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" value="0"
                               name="iccable" @if(old('iccable', $project->iccable) == 0) checked @endif>
                        <label class="form-check-label">No</label>
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
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Regional Development Investment Program</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Regional Development Investment Program <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-9">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdip" value="1"
                                   @if(old('rdip', $project->rdip) == 1) checked @endif>
                            Yes
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdip" value="0"
                                   @if(old('rdip', $project->rdip) == 0) checked @endif>
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="ml-4">
                <div class="form-group row">
                    <label class="col-form-label col-sm-2">Is RDC endorsement required? <i
                            class="text-danger fas fa-flag"></i></label>
                    <div class="col-sm-10">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio"
                                       name="rdc_endorsement_required" value="1"
                                       @if(old('rdc_endorsement_required', $project->rdc_endorsement_required) == 1) checked @endif>
                                Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio"
                                       name="rdc_endorsement_required" value="0"
                                       @if(old('rdc_endorsement_required', $project->rdc_endorsement_required) == 0) checked @endif>
                                No
                            </label>
                        </div>
                        @error('rdc_endorsement_required')<span
                            class="error invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rdc_endorsed" class="col-form-label col-sm-2">Has the project been endorsed?</label>
                    <div class="col-sm-10">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="rdc_endorsed"
                                       value="1" @if(old('rdc_endorsed', $project->rdc_endorsed) == 1) checked @endif>
                                Yes
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="rdc_endorsed"
                                       value="0" @if(old('rdc_endorsed', $project->rdc_endorsed) == 0) checked @endif>
                                No
                            </label>
                        </div>
                        @error('rdc_endorsed')<span
                            class="error invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rdc_endorsed_date" class="col-form-label col-sm-2">RDC Endorsement Date</label>
                    <div class="col-sm-10">
                        <input type="date"
                               class="form-control @error('rdc_endorsed_date') is-invalid @enderror"
                               name="rdc_endorsed_date" value="{{ old('rdc_endorsed_date') }}">
                        @error('rdc_endorsed_date')<span
                            class="error invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. Regional Development Investment Program -->

    <!-- Project Preparation Details -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Project Preparation Details") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="preparation_document_id" class="col-form-label col-sm-2">Project
                    Preparation Document <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    {{ $project->preparation_document->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="has_fs" class="col-form-label col-sm-2">Does the project require
                    feasibility study? <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="1"
                                   name="has_fs" {{ old('has_fs', $project->has_fs) == 1 ? 'checked' : '' }}>
                            Yes
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="0"
                                   name="has_fs" {{ old('has_fs', $project->has_fs) == 0 ? 'checked' : '' }}>
                            No
                        </label>
                    </div>
                    @error('has_fs')<span
                        class="error invalid-feedback">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="fs_status_id" class="col-form-label col-sm-2">Status of Feasibility
                    Study (Only if FS is required)</label>
                <div class="col-sm-10">
                    {{ $project->feasibility_study->fs_status->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="feasibility_study.needs_assistance" class="col-form-label col-sm-2">Does the conduct of feasibility
                    study need assistance?</label>
                <div class="col-sm-10">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="1"
                                   name="feasibility_study[needs_assistance]"
                                   @if(old('feasibility_study.need_assistance', $project->feasibility_study->need_assistance ?? '') == 1) checked @endif>
                            Yes
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="0"
                                   name="feasibility_study[needs_assistance]"
                                   @if(old('feasibility_study.need_assistance', $project->feasibility_study->need_assistance ?? '') == 0) checked @endif>
                            No
                        </label>
                    </div>
                    @error('feasibility_study.need_assistance')<span
                        class="error invalid-feedback">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group">
                <label for="fs_cost">Schedule of Feasibility Study Cost (in absolute PhP)</label>
                <table id="fs_cost">
                    <thead>
                    <tr>
                        <th class="text-sm text-center">2017</th>
                        <th class="text-sm text-center">2018</th>
                        <th class="text-sm text-center">2019</th>
                        <th class="text-sm text-center">2020</th>
                        <th class="text-sm text-center">2021</th>
                        <th class="text-sm text-center">2022</th>
                        <th class="text-sm text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" class="money fs form-control text-right"
                                   name="feasibility_study[y2017]"
                                   value="{{ old('feasibility_study.y2017', $project->feasibility_study->y2017 ?? 0) }}">
                        </td>
                        <td>
                            <input type="text" class="money fs form-control text-right"
                                   name="feasibility_study[y2018]"
                                   value="{{ old('feasibility_study.y2018', $project->feasibility_study->y2018 ?? 0) }}">
                        </td>
                        <td>
                            <input type="text" class="money fs form-control text-right"
                                   name="feasibility_study[y2019]"
                                   value="{{ old('feasibility_study.y2019', $project->feasibility_study->y2019 ?? 0) }}">
                        </td>
                        <td>
                            <input type="text" class="money fs form-control text-right"
                                   name="feasibility_study[y2020]"
                                   value="{{ old('feasibility_study.y2020', $project->feasibility_study->y2020 ?? 0) }}">
                        </td>
                        <td>
                            <input type="text" class="money fs form-control text-right"
                                   name="feasibility_study[y2021]"
                                   value="{{ old('feasibility_study.y2021', $project->feasibility_study->y2021 ?? 0) }}">
                        </td>
                        <td>
                            <input type="text" class="money fs form-control text-right"
                                   name="feasibility_study[y2022]"
                                   value="{{ old('feasibility_study.y2022', $project->feasibility_study->y2022 ?? 0) }}">
                        </td>
                        <td>
                            <input type="text" class="money form-control text-right" id="fs_total" readonly>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group row">
                <label for="feasibility_study[completion_date]" class="col-form-label col-sm-2">Expected/Target
                    Date of Completion of FS</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control"
                           name="feasibility_study[completion_date]"
                           value="{{ old('feasibility_study.completion_date', $project->feasibility_study->completion_date ?? '') }}">
                </div>
            </div>
        </div>
    </div>
    <!--/. Project Preparation Details -->

    <!-- Employment Generation -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Employment Generation") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="employment_generated" class="col-form-label col-sm-2">No. of persons to
                    be employed after completion of the project</label>
                <div class="col-sm-10">
                    <input class="form-control @error('employment_generated') is-invalid @enderror"
                           type="number" name="employment_generated"
                           value="{{ old('employment_generated', $project->employment_generated) }}">
                    @error('employment_generated')<span
                        class="error invalid-feedback">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
    <!--/. Employment Generation -->

    <!-- Philippine Development Plan Chapter -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Philippine Development Plan") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="pdp_chapter_id" class="col-form-label col-sm-2">Main philippine
                    Development Chapter <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    {{ $project->pdp_chapter->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="infrastructure_sectors" class="col-form-label col-sm-2">Other PDP
                    Chapters</label>
                <div class="col-sm-10">
                    <ul>
                        @foreach($project->pdp_chapters as $option)
                        <li>{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/. Philippine Development Plan Chapter -->

    <!-- Philippine Development Plan Indicators -->
    <div class="card card-primary">
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
                @foreach ($pdp_indicators as $pi1)
                    <div id="pdp_chapter_{{$pi1->id}}" class="pdp_chapters">
                        <span class="font-weight-bold">{{ $pi1->name }}</span>
                        @foreach($pi1->children as $pi2)
                            <div class="ml-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="pdp_outcome_{{$pi2->id}}">
                                        <input type="checkbox"
                                               class="form-check-input pdp_indicators"
                                               value="{{$pi2->id}}"
                                               name="pdp_indicators[]"
                                               id="pdp_outcome_{{$pi2->id}}"
                                               @if(in_array($pi2->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                        {{ $pi2->name }}
                                    </label>
                                </div>
                                <div>
                                    @foreach($pi2->children as $pi3)
                                        <div class="ml-4">
                                            <div class="form-check">
                                                <label class="form-check-label"
                                                       for="pdp_suboutcome_{{$pi3->id}}">
                                                    <input type="checkbox"
                                                           class="form-check-input pdp_indicators"
                                                           value="{{$pi3->id}}"
                                                           name="pdp_indicators[]"
                                                           id="pdp_suboutcome_{{$pi3->id}}"
                                                           @if(in_array($pi3->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                    {{ $pi3->name }}
                                                </label>
                                            </div>
                                            @foreach($pi3->children as $pi4)
                                                <div class="ml-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label"
                                                               for="pdp_output_{{$pi4->id}}">
                                                            <input type="checkbox"
                                                                   class="form-check-input pdp_indicators"
                                                                   value="{{$pi4->id}}"
                                                                   name="pdp_indicators[]"
                                                                   id="pdp_output_{{$pi4->id}}"
                                                                   @if(in_array($pi4->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                            {{ $pi4->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--/. Philippine Development Plan Indicators -->

    <!-- Sustainable Development Goals -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Sustainable Development Goals") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="sdgs" class="col-form-label col-sm-2">Sustainable Development Goals <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    <ul>
                        @foreach($project->sdgs as $option)
                        <li>{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/. Sustainable Development Goals -->

    <!-- Ten Point Agenda -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Ten Point Agenda") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="ten_point_agendas" class="col-form-label col-sm-2">Ten Point Agenda <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    <ul>
                    @foreach($project->ten_point_agendas as $option)
                        <li>{{ $option->name }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/. Ten Point Agenda -->

    <!-- Financial Information -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Financial Information") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="funding_source_id" class="col-form-label col-sm-2">Main Funding Source
                    <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    {{ $project->funding_source->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="funding_sources" class="col-form-label col-sm-2">Other Funding
                    Sources</label>
                <div class="col-sm-10">
                    <ul>
                    @foreach($project->funding_sources as $option)
                        <li>
                            {{ $option->name }}
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-group row">
                <label for="other_fs" class="col-form-label col-sm-2">Other Funding Source
                    (specify)</label>
                <div class="col-sm-10">
                    <ul>
                        @foreach($project->funding_sources as $option)
                            <li>{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-group row">
                <label for="implementation_mode_id" class="col-form-label col-sm-2">Mode of
                    Implementation <i class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    {{ $project->implementation_mode->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="funding_institution_id" class="col-form-label col-sm-2">Funding
                    Institution</label>
                <div class="col-sm-10">
                    {{ $project->funding_institution->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="tier_id" class="col-form-label col-sm-2">Budget Tier <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    {{ $project->tier->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="uacs_code" class="col-form-label col-sm-2">UACS Code</label>
                <div class="col-sm-10">
                    {{ $project->uacs_code }}
                </div>
            </div>
        </div>
    </div>
    <!--/. Financial Information -->

    <!-- Status & Updates -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Status & Updates") }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="updates" class="col-form-label col-sm-2">Updates <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    <textarea rows="4" style="resize: none;"
                              class="form-control @error('updates') is-invalid @enderror"
                              id="updates"
                              name="updates">{{ old('updates', $project->updates) }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="updates_date" class="col-form-label col-sm-2">As of <i
                        class="text-danger fas fa-flag"></i></label>
                <div class="col-sm-10">
                    <input type="date"
                           class="form-control @error('updates_date') is-invalid @enderror"
                           id="updates_date" name="updates_date"
                           value="{{ old('updates_date', $project->updates_date) }}">
                    @error('updates_date')<span
                        class="error invalid-feedback">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
    <!--/. Status & Updates -->

    <!-- Funding Source Breakdown -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Investment Required by Funding Source") }} </h3>
        </div>
        <div class="card-body">
            <div class="row px-2 pb-2">
                <i class="text-danger fas fa-flag"></i> All fields are required.
            </div>
            <table class="table-responsive">
                <thead>
                <tr>
                    <th></th>
                    <th class="text-sm text-center">2016 &amp; Prior</th>
                    <th class="text-sm text-center">2017</th>
                    <th class="text-sm text-center">2018</th>
                    <th class="text-sm text-center">2019</th>
                    <th class="text-sm text-center">2020</th>
                    <th class="text-sm text-center">2021</th>
                    <th class="text-sm text-center">2022</th>
                    <th class="text-sm text-center">2023 &amp; Beyond</th>
                    <th class="text-sm text-center">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($project->fs_investments as $fs)
                    <tr>
                        <th class="text-sm">
                            <input type="hidden" name="fs_investments[{{ $fs->id }}][fs_id]"
                                   value="{{ old('fs_investments.{$fs->id}.fs_id', $fs->fs_id ?? 0) }}">
                            {{ $fs->funding_source->name }}
                        </th>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2016 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2016]"
                                   value="{{ old("fs_investments.{$fs->id}.y2016", $fs->y2016 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2017 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2017]"
                                   value="{{ old("fs_investments.{$fs->id}.y2017", $fs->y2017 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2018 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2018]"
                                   value="{{ old("fs_investments.{$fs->id}.y2018", $fs->y2018 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2019 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2019]"
                                   value="{{ old("fs_investments.{$fs->id}.y2019", $fs->y2019 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2020 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2020]"
                                   value="{{ old("fs_investments.{$fs->id}.y2020", $fs->y2020 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2021 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2021]"
                                   value="{{ old("fs_investments.{$fs->id}.y2021", $fs->y2021 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2022 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2022]"
                                   value="{{ old("fs_investments.{$fs->id}.y2022", $fs->y2022 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="fs_investments fs_investments_2023 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                   name="fs_investments[{{$fs->id}}][y2023]"
                                   value="{{ old("fs_investments.{$fs->id}.y2023", $fs->y2023 ?? 0) }}">
                        </td>
                        <td><input type="text" class="form-control text-right"
                                   id="fs_investments_{{$fs->fs_id}}_total" readonly></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Total</th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2016_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2017_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2018_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2019_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2020_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2021_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2022_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="fs_investments_2023_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control text-right" id="fs_investments_total"
                               readonly>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!--/. Funding Source Breakdown -->

    <!-- Regional Breakdown -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Investment Required by Region") }} </h3>
        </div>
        <div class="card-body">
            <div class="row px-2 pb-2">
                <i class="text-danger fas fa-flag"></i> All fields are required.
            </div>
            <table class="table-responsive">
                <thead>
                <tr>
                    <th></th>
                    <th class="text-sm text-center">2016 &amp; Prior</th>
                    <th class="text-sm text-center">2017</th>
                    <th class="text-sm text-center">2018</th>
                    <th class="text-sm text-center">2019</th>
                    <th class="text-sm text-center">2020</th>
                    <th class="text-sm text-center">2021</th>
                    <th class="text-sm text-center">2022</th>
                    <th class="text-sm text-center">2023 &amp; Beyond</th>
                    <th class="text-sm text-center">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($project->region_investments as $ri)
                    <tr>
                        <th class="text-sm">
                            <input type="hidden"
                                   name="region_investments[{{$ri->id}}][region_id]"
                                   value="{{ $ri->region_id }}">
                            {{ $ri->region->name }}
                        </th>
                        <td><input type="text"
                                   class="region_investments money region_investments_2016 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2016]"
                                   value="{{ old("region_investments.{$ri->id}.y2016", $ri->y2016 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="region_investments money region_investments_2017 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2017]"
                                   value="{{ old("region_investments.{$ri->id}.y2017", $ri->y2017 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="region_investments money region_investments_2018 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2018]"
                                   value="{{ old("region_investments.{$ri->id}.y2018", $ri->y2018 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="region_investments money region_investments_2019 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2019]"
                                   value="{{ old("region_investments.{$ri->id}.y2019", $ri->y2019 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="region_investments money region_investments_2020 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2020]"
                                   value="{{ old("region_investments.{$ri->id}.y2020", $ri->y2020 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="region_investments money region_investments_2021 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2021]"
                                   value="{{ old("region_investments.{$ri->id}.y2021", $ri->y2021 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="region_investments money region_investments_2022 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2022]"
                                   value="{{ old("region_investments.{$ri->id}.y2022", $ri->y2022 ?? 0) }}">
                        </td>
                        <td><input type="text"
                                   class="region_investments money region_investments_2023 region_investments_{{$ri->region_id}} form-control money text-right"
                                   name="region_investments[{{$ri->id}}][y2023]"
                                   value="{{ old("region_investments.{$ri->id}.y2023", $ri->y2023 ?? 0) }}">
                        </td>
                        <td><input type="text" class="form-control money text-right"
                                   id="region_investments_{{$ri->region_id}}_total" readonly></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Total</th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2016_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2017_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2018_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2019_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2020_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2021_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2022_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_2023_total" readonly>
                    </th>
                    <th>
                        <input type="text" class="form-control money text-right"
                               id="region_investments_total" readonly>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!--/. Regional Breakdown -->

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Financial Status") }}</h3>
        </div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                <table class="table table-striped" style="width: 100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-sm text-center">2016 &amp; Prior</th>
                        <th class="text-sm text-center">2017</th>
                        <th class="text-sm text-center">2018</th>
                        <th class="text-sm text-center">2019</th>
                        <th class="text-sm text-center">2020</th>
                        <th class="text-sm text-center">2021</th>
                        <th class="text-sm text-center">2022</th>
                        <th class="text-sm text-center">2023 &amp; Beyond</th>
                        <th class="text-sm text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="text-sm">National Expenditure Program (NEP)</th>
                        <td class="text-right">{{ $project->nep->y2016 ?? 0 }}</td>
                        <td class="text-right">{{ $project->nep->y2017 ?? 0 }}</td>
                        <td class="text-right">{{ $project->nep->y2018 ?? 0 }}</td>
                        <td class="text-right">{{ $project->nep->y2019 ?? 0 }}</td>
                        <td class="text-right">{{ $project->nep->y2020 ?? 0 }}</td>
                        <td class="text-right">{{ $project->nep->y2021 ?? 0 }}</td>
                        <td class="text-right">{{ $project->nep->y2022 ?? 0 }}</td>
                        <td class="text-right">{{ $project->nep->y2023 ?? 0 }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="text-sm">General Appropriations Act (GAA)</th>
                        <td class="text-right">{{ $project->allocation->y2016 ?? 0 }}</td>
                        <td class="text-right">{{ $project->allocation->y2017 ?? 0 }}</td>
                        <td class="text-right">{{ $project->allocation->y2018 ?? 0 }}</td>
                        <td class="text-right">{{ $project->allocation->y2019 ?? 0 }}</td>
                        <td class="text-right">{{ $project->allocation->y2020 ?? 0 }}</td>
                        <td class="text-right">{{ $project->allocation->y2021 ?? 0 }}</td>
                        <td class="text-right">{{ $project->allocation->y2022 ?? 0 }}</td>
                        <td class="text-right">{{ $project->allocation->y2023 ?? 0 }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="text-sm">Actual Disbursement</th>
                        <td class="text-right">{{ $project->disbursement->y2016 ?? 0 }}</td>
                        <td class="text-right">{{ $project->disbursement->y2017 ?? 0 }}</td>
                        <td class="text-right">{{ $project->disbursement->y2018 ?? 0 }}</td>
                        <td class="text-right">{{ $project->disbursement->y2019 ?? 0 }}</td>
                        <td class="text-right">{{ $project->disbursement->y2020 ?? 0 }}</td>
                        <td class="text-right">{{ $project->disbursement->y2021 ?? 0 }}</td>
                        <td class="text-right">{{ $project->disbursement->y2022 ?? 0 }}</td>
                        <td class="text-right">{{ $project->disbursement->y2023 ?? 0 }}</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __("Attachments") }}</h3>
        </div>
        <div class="card-body">
            @can('projects.update', $project)
            <div class="col-12">
                <form action="{{ route('projects.upload', $project) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="attachment">Upload File</label>
                        <input type="file" name="attachment" id="attachment" accept=".xls,.xlsx" class="form-control @error('attachment') is-invalid @enderror">
                        @error('attachment')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
            @endcan

            <div class="col-12 mt-2">
                <table class="table table-striped">
                    <thead>
                        <td>Title</td>
                        <td>Link</td>
                    </thead>
                    <tbody>
                        @forelse ($project->attachments as $att)
                            <tr>
                                <td>{{ $att->title }}</td>
                                <td>
                                    <a href="{{ route('attachments.download', $att) }}" target="_blank">Download</a>
                                    <form action="{{ route('attachments.destroy', $att) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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
        </div>
    </div>
