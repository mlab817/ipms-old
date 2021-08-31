@php
    $booleanOptions = [
        1 => 'Yes',
        0 => 'No'
    ];
@endphp

<div>
    <div class="Subhead Subhead--spacious">
        <div id="general-information" class="Subhead-heading">{{ __("General Information") }}</div>
    </div>

    <div class="my-3" id="pap"></div>

    <dl class="form-group d-inline-block mb-4 @error('title') errored @enderror">
        <dt class="form-group-header">
            <label for="title">PAP Title</label>
        </dt>
        <dd class="form-group-body">
            <input type="text" class="form-control input-block" name="title" id="title" aria-describedby="title-input-validation" value="{{ old('title', $project->title) }}">
            @error('title')
                <p class="note error" id="title-input-validation">{{ $message }}</p>
            @enderror
        </dd>
    </dl>

    <div class="my-3" id=""></div>

    <dl class="form-group d-inline-block mb-4 @error('office_id') errored @enderror">
        <dt class="form-group-header">
            <label for="office_id">Office</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="office_id" id="office_id">
                <option value="">Select Office</option>
                @foreach($offices as $option)
                    <option value="{{ $option->id }}" @if(old('office_id', $project->office_id) == $option->id) selected @endif>{{ $option->id .' - '. $option->acronym }}</option>
                @endforeach
            </select>
            @error('office_id')
            <p class="note error" id="title-input-validation">{{ $message }}</p>
            @enderror
        </dd>
    </dl>

    <div class="my-3" id=""></div>

    <dl class="form-group d-inline-block mb-4 @error('pap_type_id') errored @enderror">
        <dt class="form-group-header">
            <label for="pap_type_id">Program or Project</label>
        </dt>
        <dd class="form-group-body" x-data="{ pap_type_id: {{ $project->pap_type_id }} }">
            @foreach($pap_types as $pap_type)
                <div class="form-checkbox">
                    <label for="pap_type_{{$pap_type->id}}">
                        <input class="form-checkbox" type="radio" id="pap_type_{{$pap_type->id}}" name="pap_type_id" x-model="pap_type_id" value="{{ $pap_type->id }}" @if(old('pap_type_id', $project->pap_type_id) == $pap_type->id) checked @endif>
                        {{ $pap_type->name }}
                        <p class="note">
                            {{ $pap_type->description }}
                        </p>
                        @if($pap_type->id == 1)
                            <span class="form-checkbox-details text-normal d-block">
                                <span>Regular Program</span>
                                <select x-bind:disabled="pap_type_id == 2" class="form-select" name="regular_program" id="regular_program">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </span>
                        @endif
                    </label>
                </div>
            @endforeach

            @error('pap_type_id')
                <p class="note error">{{ $message }}</p>
            @enderror
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="rename-field">Does this PAP have INFRASTRUCTURE component/s?</label>
        </dt>
        <dd class="form-group-body">
            <div class="form-checkbox ">
                <label>
                    <input class="form-checkbox-details-trigger" type="radio" id="has_infra_1" name="has_infra" value="1" @if(old('has_infra', $project->has_infra) == 1) checked @endif>
                    Yes
                    <p class="note">
                        Ticking yes will prequalify the PAP into the Three-Year Rolling Infrastructure Program (TRIP).
                        You will also need to provide infrastructure profile for the PAP to be considered for inclusion in the TRIP.
                    </p>
                </label>
            </div>
            <div class="form-checkbox ">
                <label>
                    <input class="form-checkbox" type="radio" id="has_infra_0" name="has_infra" value="0" @if(old('has_infra', $project->has_infra) == 0) checked @endif>
                    No
                    <p class="note">
                        Ticking no will disqualify the PAP from the Three-Year Rolling Infrastructure Program (TRIP).
                        The infrastructure profile previously supplied will not be deleted but will no longer be viewable
                        until the yes option is ticked.
                    </p>
                </label>
            </div>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label>Basis for Implementation</label>
        </dt>
        <dd class="form-group-body">
            @foreach($bases as $option)
                <div class="form-checkbox">
                    <label for="basis_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="basis_{{ $option->id }}"
                            value="{{ $option->id }}"
                            @if(in_array($option->id, old('bases', $project->bases->pluck('id')->toArray() ?? []))) checked @endif>
                        {{ $option->name }}
                        <p class="note">
                            {{ $option->description }}
                        </p>
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-flex flex-column @error('description') errored @enderror">
        <dt class="form-group-header">
            <label for="description">Description</label>
        </dt>
        <dd class="form-group-body mb-4">
            <textarea style="resize: none;" class="form-control input-contrast" id="description" name="description" aria-describedby="description-input-validation">{!! old('description', $project->description->description ?? '') !!}</textarea>
            @error('description')
                <p class="note error" id="description-input-validation">{{ $message }}</p>
            @enderror
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-flex flex-column @error('expected_outputs') errored @enderror">
        <dt class="form-group-header">
            <label for="expected_outputs">Expected Outputs</label>
        </dt>
        <dd class="form-group-body mb-4">
            <textarea style="resize: none;" class="form-control input-contrast" id="expected_outputs" name="expected_outputs" aria-describedby="expected-outputs-input-validation">{!! old('expected_outputs', $project->expected_output->expected_outputs ?? '')  !!}</textarea>
            @error('expected_outputs')
                <p class="note error">{{ $message }}</p>
            @enderror
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4 @error('total_project_cost') errored @enderror">
        <dt class="form-group-header">
            <label for="">Total Project Cost</label>
        </dt>
{{--        <dd class="form-group-body" x-data="{--}}
{{--                isEditing: false,--}}
{{--                totalProjectCost: {{ $project->total_project_cost }}--}}
{{--            }">--}}
{{--            <input x-show="!isEditing" @click="isEditing = true; $nextTick(() => $refs.totalProjectCost.focus());" type="text" class="form-control input-contrast" readonly x-bind:value="totalProjectCost.toLocaleString()">--}}
{{--            <input x-cloak x-show="isEditing" @click.away="isEditing = false" type="number" class="form-control input-contrast" x-ref="totalProjectCost" name="total_project_cost" x-model="totalProjectCost">--}}

{{--            <p class="note">--}}
{{--                For projects, the total project cost is the total cost of the project including funding years beyond the plan period.--}}
{{--                For programs, the total project cost is the total cost for the plan period only.--}}
{{--            </p>--}}
{{--        </dd>--}}
        <dd class="form-group-body">
            <input class="form-control input-contrast" type="number" name="total_project_cost" id="total_project_cost" aria-describedby="total-project-cost-input-validation" value="{{ old('total_project_cost', $project->total_project_cost ?? 0) }}">
            @error('total_project_cost')
            <p class="note error" id="total-project-cost-input-validation">
                {{ $message }}
            </p>
            @enderror
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="project_status_id">Project Status</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="project_status_id" id="project_status_id">
                <option value="">Select Status</option>
                @foreach($project_statuses as $option)
                    <option value="{{ $option->id }}" @if(old('project_status_id', $project->project_status_id) == $option->id) selected @endif>{{ $option->id .' - '. $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="other-pap-information">{{ __("Other PAP Information") }}</div>
    </div>

    <div>
        <dl class="form-group d-inline-block mb-4">
            <dt class="form-group-header">
                <label for="research">Is it a Research and Development Program/Project?</label>
            </dt>
            <dd class="form-group-body">
                <select class="form-select" name="research">
                    @foreach($booleanOptions as $key => $option)
                        <option value="{{ $key }}" @if(old('research', $project->research) == $key) selected @endif>{{ $key . ' - ' . $option}}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3"></div>

    <div>
        <dl class="form-group d-inline-block mb-4">
            <dt class="form-group-header">
                <label for="ict">Is it an ICT
                    Program/Project?</label>
            </dt>
            <dd class="form-group-body">
                <select class="form-select" name="ict" id="ict">
                    @foreach($booleanOptions as $key => $option)
                        <option value="{{ $key }}" @if(old('ict', $project->ict) == $key) selected @endif>{{ $key . ' - ' . $option}}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3"></div>

    <div>
        <dl class="form-group d-inline-block mb-4">
            <dt class="form-group-header">
                <label for="research">Is it responsive to
                    COVID-19/New Normal Intervention?</label>
            </dt>
            <dd class="form-group-body">
                <select class="form-select" name="research">
                    @foreach($booleanOptions as $key => $option)
                        <option value="{{ $key }}" @if(old('covid', $project->covid) == $key) selected @endif>{{ $key . ' - ' . $option}}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label>COVID Interventions</label>
        </dt>
        <dd class="form-group-body">
            @foreach($covidInterventions as $key => $option)
                <div class="form-checkbox">
                    <label for="covid_int_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="covid_int_{{ $option->id }}"
                            name="covid_interventions[]"
                            value="{{ $option->id }}"
                            @if(in_array($option->id, old('covid_interventions', $project->covid_interventions->pluck('id')->toArray() ?? []))) checked @endif>
                        {{ $option->name }}
                        <p class="note">
                            {{ $option->description }}
                        </p>
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="Subhead Subhead--spacious my-3">
        <div class="Subhead-heading" id="spatial-coverage">{{ __("Spatial Coverage") }}</div>
    </div>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label>Spatial Coverage</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="spatial_coverage_id">
                <option value="">Spatial Coverage</option>
                @foreach($spatial_coverages as $option)
                    <option value="{{ $option->id }}" @if(old('spatial_coverage_id', $project->spatial_coverage_id) == $option->id) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label>Regions</label>
        </dt>
        <dd class="form-group-body">
            @foreach($regions->sortBy('order') as $option)
                <div class="form-checkbox">
                    <label for="region_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="region_{{ $option->id }}"
                            value="{{ $option->id }}"
                            name="regions[]"
                            @if(in_array($option->id, old('regions', $project->regions->pluck('id')->toArray() ?? []))) checked @endif>
                        {{ $option->name }}
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="implementation-period">{{ __("Implementation Period") }}</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="target_start_year">Start Year</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="target_start_year" id="target_start_year">
                <option value="">Year</option>
                @foreach($years as $option)
                    <option value="{{ $option }}" @if(old('target_start_year', $project->target_start_year) == $option) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="target_end_year">End Year</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="target_end_year" id="target_end_year">
                <option value="">Year</option>
                @foreach($years as $option)
                    <option value="{{ $option }}" @if(old('target_end_year', $project->target_end_year) == $option) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="approval-status">{{ __("Approval Status") }}</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="iccable">Is this project ICC-able?</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="iccable" id="iccable">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}" @if(old('iccable', $project->iccable) == $key) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="approval_level_id">Level of Approval (for ICCable projects only)</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="approval_level_id" id="approval_level_id">
                <option value="">Approval Level</option>
                @foreach($approval_levels as $key => $option)
                    <option value="{{ $option->id }}" @if(old('approval_level_id', $project->approval_level_id) == $key) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="approval_date">Date of Approval (for ICCable projects only)</label>
        </dt>
        <dd class="form-group-body">
            <input type="date" class="form-control" name="approval_date" id="approval_date" value="{{ old('approval_date', $project->approval_date) }}">
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="gad_id">Gender Responsiveness</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="gad_id" id="gad_id">
                <option value="">Select Gender Responsiveness</option>
                @foreach($gads as $option)
                    <option value="{{ $option->id }}" @if(old('gad_id', $project->gad_id) == $option->id) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="regional-development-investment-program">{{ __("Regional Development Investment Program") }}</div>
    </div>


    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="rdip">Is this PAP included in the RDIP?</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="rdip" id="rdip">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}" @if(old('rdip', $project->rdip) == $key) selected @endif>{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="rdc_endorsement_required">Is RDC endorsement required?</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="rdc_endorsement_required" id="rdc_endorsement_required">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}" @if(old('rdc_endorsement_required', $project->rdc_endorsement_required) == $key) selected @endif>{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="rdc_endorsed">Has the PAP been endorsed?</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="rdc_endorsed" id="rdc_endorsed">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}" @if(old('rdc_endorsed', $project->rdc_endorsed) == $key) selected @endif>{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="rdc_endorsed_date">RDC Endorsement Date</label>
        </dt>
        <dd class="form-group-body">
            <input type="date" class="form-control" name="rdc_endorsed_date" id="rdc_endorsed_date" value="{{ old('rdc_endorsed_date', $project->rdc_endorsed_date) }}">
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="project-preparation-details">{{ __("Project Preparation Details") }}</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="preparation_document_id">
            <label for="rename-field">Project Preparation Document</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="preparation_document_id" id="preparation_document_id">
                @foreach($preparation_documents as $option)
                    <option value="{{ $option->id }}" @if(old('preparation_document_id', $project->preparation_document_id) == $option->id) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="has_fs">Does the project require feasibility study?</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="has_fs" id="has_fs">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}" @if(old('has_fs', $project->has_fs) == $key) selected @endif>{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="fs_status_id">Status of Feasibility Study (Only if FS is required)</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="feasibility_study[fs_status_id]" id="fs_status_id">
                <option value="">FS Status</option>
                @foreach($fs_statuses as $option)
                    <option value="{{ $option->id }}" @if(old('feasibility_study.fs_status_id', $project->feasibility_study->fs_status_id ?? null) == $option->id) selected @endif>{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="completion_date">Expected Date of Completion (Only if FS is required)</label>
        </dt>
        <dd class="form-group-body">
            <input class="form-control" name="feasibility_study[completion_date]" id="completion_date" type="date" value="{{ old('feasibility_study.completion_date', $project->feasibility_study->completion_date ?? null) }}">
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="needs_assistance">Does the conduct of feasibility study need assistance?</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="feasibility_study[needs_assistance]" id="needs_assistance">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}" @if(old('feasibility_study.needs_assistance', $project->feasibility_study->needs_assistance ?? null) == $key) selected @endif>{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="mb-4">
        <dt class="form-group-header">
            <label for="rename-field">Schedule of Feasibility Study Cost (in absolute PhP)</label>
        </dt>
        <dd class="form-group-body">
            <div class="d-table col-12">
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2017" name="feasibility_study[y2017]" value="{{ old('feasibility_study.y2017', $project->feasibility_study->y2017 ?? 0) }}">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2018" name="feasibility_study[y2018]" value="{{ old('feasibility_study.y2018', $project->feasibility_study->y2018 ?? 0) }}">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2019" name="feasibility_study[y2019]" value="{{ old('feasibility_study.y2019', $project->feasibility_study->y2019 ?? 0) }}">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2020" name="feasibility_study[y2020]" value="{{ old('feasibility_study.y2020', $project->feasibility_study->y2020 ?? 0) }}">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2021" name="feasibility_study[y2021]" value="{{ old('feasibility_study.y2021', $project->feasibility_study->y2021 ?? 0) }}">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2022" name="feasibility_study[y2022]" value="{{ old('feasibility_study.y2022', $project->feasibility_study->y2022 ?? 0) }}">
                </div>
            </div>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="employment-generation">{{ __("Employment Generation") }}</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="employment_generated">No. of persons to be employed after completion of the project</label>
        </dt>
        <dd class="form-group-body">
            <input type="number" name="employment_generated" id="employment_generated" class="form-control" value="{{ old('employment_generated', $project->employment_generated) }}">
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="pdp-chapter">{{ __("PDP Chapter") }}</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="pdp_chapter_id">PDP Chapter</label>
        </dt>
        <dd class="form-group-body">
            <select class="form-select" name="pdp_chapter_id" id="pdp_chapter_id">
                @foreach($pdp_chapters as $option)
                    <option value="{{ $option->id }}" @if(old('pdp_chapter_id', $project->pdp_chapter_id) == $option->id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="pdp_chapters">Other PDP Chapters</label>
            <p class="note">Select all that applies</p>
        </dt>
        <dd class="form-group-body">
            @foreach($pdp_chapters->sortBy('name') as $key => $option)
                <div class="form-checkbox">
                    <label for="pdp_chapter_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="pdp_chapter_{{ $option->id }}"
                            name="pdp_chapters[]"
                            value="{{ $option->id }}"
                            @if(in_array($option->id, old('pdp_chapters', $project->pdp_chapters->pluck('id')->toArray() ?? []))) checked @endif>
                        {{ $option->name }}
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="sustainable-development-goals">{{ __("Sustainable Development Goals") }}</div>
        <div class="Subhead-description">Select all that applies</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="sdgs">Sustainable Development Goals</label>
        </dt>
        <dd class="form-group-body">
            @foreach($sdgs as $option)
                <div class="form-checkbox">
                    <label for="sdg_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="sdg_{{ $option->id }}"
                            name="sdgs[]"
                            value="{{ $option->id }}"
                            @if(in_array($option->id, old('sdgs', $project->sdgs->pluck('id')->toArray() ?? []))) checked @endif>
                        {{ $option->name }}
                        <p class="note">{{ $option->description }}</p>
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="ten-point-agendas">{{ __("Ten Point Agenda") }}</div>
        <div class="Subhead-description">Select all that applies</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="ten_point_agendas">Ten Point Agenda</label>
        </dt>
        <dd class="form-group-body">
            @foreach($ten_point_agendas as $key => $option)
                <div class="form-checkbox">
                    <label for="tpa_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="tpa_{{ $option->id }}"
                            name="ten_point_agendas[]"
                            value="{{ $option->id }}"
                            @if(in_array($option->id, old('ten_point_agendas', $project->ten_point_agendas->pluck('id')->toArray() ?? []))) checked @endif>
                        {{ $option->name }}
                        <p class="note">{{ $option->description }}</p>
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="financial-information">{{ __("Financial Information") }}</div>
        <div class="Subhead-description">Select all that applies</div>
    </div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="funding_source_id">Main Funding Source</label>
        </dt>
        <dd class="form-group-body">
            <select name="funding_source_id" id="funding_source_id" class="form-select">
                @foreach($funding_sources as $option)
                    <option value="{{ $option->id }}" @if(old('funding_source_id', $project->funding_source_id) == $option->id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="rename-field">Other Funding Sources</label>
        </dt>
        <dd class="form-group-body">
            @foreach($funding_sources as $option)
                <div class="form-checkbox">
                    <label for="fs_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="fs_{{ $option->id }}"
                            name="funding_sources[]"
                            value="{{ $option->id }}"
                            @if(in_array($option->id, old('funding_sources', $project->funding_sources->pluck('id')->toArray() ?? []))) checked @endif>
                        {{ $option->name }}
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="other_fs">Other Funding Source (please specify)</label>
        </dt>
        <dd class="form-group-body">
            <input type="text" name="other_fs" id="other_fs" class="form-control input-contrast" value="{{ old('other_fs', $project->other_fs) }}">
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="implementation_mode_id">Mode of Implementation</label>
        </dt>
        <dd class="form-group-body">
            <select name="implementation_mode_id" id="implementation_mode_id" class="form-select">
                <option value="">Implementation Mode</option>
                @foreach($implementation_modes as $option)
                    <option value="{{ $option->id }}" @if(old('implementation_mode_id', $project->implementation_mode_id) == $option->id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="funding_institution_id">Funding Institution</label>
        </dt>
        <dd class="form-group-body">
            <select name="funding_institution_id" id="funding_institution_id" class="form-select">
                <option value="">Funding Institution</option>
                @foreach($funding_institutions as $option)
                    <option value="{{ $option->id }}" @if(old('funding_institution_id', $project->funding_institution_id) == $option->id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="rename-field">Budget Tier</label>
        </dt>
        <dd class="form-group-body">
            <select name="tier_id" id="tier_id" class="form-select">
                <option value="">Tier</option>
                @foreach($tiers as $option)
                    <option value="{{ $option->id }}" @if(old('tier_id', $project->tier_id) == $option->id) selected @endif>{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block mb-4">
        <dt class="form-group-header">
            <label for="uacs_code">UACS Code</label>
        </dt>
        <dd class="form-group-body">
            <input type="text" name="uacs_code" id="uacs_code" class="form-control input-contrast" value="{{ old('uacs_code', $project->uacs_code) }}">
        </dd>
    </dl>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="status-and-updates">{{ __("Status & Updates") }}</div>
    </div>

    <dl class="form-group mb-4">
        <dt class="form-group-header">
            <label for="rename-field">Updates</label>
        </dt>
        <dd class="form-group-body">
            <textarea id="updates" name="updates" class="form-control input-contrast">{{ old('updates', $project->project_update->updates ?? '') }}</textarea>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group mb-4">
        <dt class="form-group-header">
            <label for="rename-field">As of</label>
        </dt>
        <dd class="form-group-body">
            <input type="date" id="updates_date" name="updates_date" class="form-control input-contrast" value="{{ old('updates', $project->project_update->updates_date ?? '') }}">
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="investment-required-by-funding-source">{{ __("Investment Required by Funding Source") }}</div>
        <div class="Subhead-description">in absolute PhP terms</div>
    </div>

    <dl class="mb-4">
        <dt class="form-group-header">

        </dt>
        <dd class="form-group-body">
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('fsInvestments', () => ({
                        items: @json($project->fs_investments),
                        get total() {
                            const items = this.items,
                                totalsRow = {
                                    y2016: 0,
                                    y2017: 0,
                                    y2018: 0,
                                    y2019: 0,
                                    y2020: 0,
                                    y2021: 0,
                                    y2022: 0,
                                    y2023: 0,
                                    total: 0
                                }

                            items.length && items.reduce((acc, item) => {
                                acc.y2016 += parseFloat(item.y2016)
                                acc.y2017 += parseFloat(item.y2017)
                                acc.y2018 += parseFloat(item.y2018)
                                acc.y2019 += parseFloat(item.y2019)
                                acc.y2020 += parseFloat(item.y2020)
                                acc.y2021 += parseFloat(item.y2021)
                                acc.y2022 += parseFloat(item.y2022)
                                acc.y2023 += parseFloat(item.y2023)
                                acc.total += parseFloat(item.y2016)
                                    + parseFloat(item.y2017)
                                    + parseFloat(item.y2018)
                                    + parseFloat(item.y2019)
                                    + parseFloat(item.y2020)
                                    + parseFloat(item.y2021)
                                    + parseFloat(item.y2022)
                                    + parseFloat(item.y2023)
                                return acc
                            }, totalsRow)

                            return totalsRow
                        },
                        format(val) {
                            return val.toLocaleString()
                        }
                    }));
                });
            </script>
            <div x-data="fsInvestments">
                <table class="d-table col-12 border-y">
                    <thead>
                        <tr class="border-bottom">
                            <th class="col-1 p-1">Funding Source</th>
                            <th class="col-1 p-1">2016 &amp; Prior</th>
                            <th class="col-1 p-1">2017</th>
                            <th class="col-1 p-1">2018</th>
                            <th class="col-1 p-1">2019</th>
                            <th class="col-1 p-1">2020</th>
                            <th class="col-1 p-1">2021</th>
                            <th class="col-1 p-1">2022</th>
                            <th class="col-1 p-1">2023 &amp; Beyond</th>
                            <th class="col-1 p-1">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <template x-for="(item, index) in items" :key="index">
                        <tr class="col-12 border-bottom" x-data="{
                            item: item,
                            get total() {
                                const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.item
                                return parseFloat(y2016)
                                    + parseFloat(y2017)
                                    + parseFloat(y2018)
                                    + parseFloat(y2019)
                                    + parseFloat(y2020)
                                    + parseFloat(y2021)
                                    + parseFloat(y2022)
                                    + parseFloat(y2023)
                            }
                        }">
                            <td class="col-1 px-2 py-2">
                                <input type="hidden" x-bind:name="`fs_investments[${index}][fs_id]`" x-model="item.fs_id">
                                <span x-text="item.funding_source.name"></span>
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2016]`" x-model="item.y2016">
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2017]`" x-model="item.y2017">
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2018]`" x-model="item.y2018">
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2019]`" x-model="item.y2019">
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2020]`" x-model="item.y2020">
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2021]`" x-model="item.y2021">
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2022]`" x-model="item.y2022">
                            </td>
                            <td class="col-1 px-2 py-2">
                                <input type="number" class="form-control text-right pr-1 width-full" x-bind:name="`fs_investments[${index}][y2023]`" x-model="item.y2023">
                            </td>
                            <td class="col-1 px-2 text-right">
                                <span x-text="format(total)"></span>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="p-2">
                                Total
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2016)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2017)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2018)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2019)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2020)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2021)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2022)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2023)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.total)"></span>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </dd>
    </dl>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="investment-required-by-region">{{ __("Investment Required by Region") }}</div>
        <div class="Subhead-description">in absolute PhP terms</div>
    </div>

    <dl class="mb-4">
        <dt class="form-group-header">

        </dt>
        <dd class="form-group-body">
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('regionInvestments', () => ({
                        items: @json(old('region_investments', $project->region_investments)),
                        get total() {
                            const items = this.items,
                                totalsRow = {
                                    y2016: 0,
                                    y2017: 0,
                                    y2018: 0,
                                    y2019: 0,
                                    y2020: 0,
                                    y2021: 0,
                                    y2022: 0,
                                    y2023: 0,
                                    total: 0
                                }

                            items.length && items.reduce((acc, item) => {
                                acc.y2016 += parseFloat(item.y2016)
                                acc.y2017 += parseFloat(item.y2017)
                                acc.y2018 += parseFloat(item.y2018)
                                acc.y2019 += parseFloat(item.y2019)
                                acc.y2020 += parseFloat(item.y2020)
                                acc.y2021 += parseFloat(item.y2021)
                                acc.y2022 += parseFloat(item.y2022)
                                acc.y2023 += parseFloat(item.y2023)
                                acc.total += parseFloat(item.y2016)
                                    + parseFloat(item.y2017)
                                    + parseFloat(item.y2018)
                                    + parseFloat(item.y2019)
                                    + parseFloat(item.y2020)
                                    + parseFloat(item.y2021)
                                    + parseFloat(item.y2022)
                                    + parseFloat(item.y2023)
                                return acc
                            }, totalsRow)

                            return totalsRow
                        },
                        format(val) {
                            return val.toLocaleString()
                        }
                    }));
                });
            </script>
            <div x-data="regionInvestments">
                <table class="d-table col-12 border-y">
                    <thead>
                        <tr class="border-bottom">
                            <th class="col-1 p-1">Region</th>
                            <th class="col-1 p-1">2016 &amp; Prior</th>
                            <th class="col-1 p-1">2017</th>
                            <th class="col-1 p-1">2018</th>
                            <th class="col-1 p-1">2019</th>
                            <th class="col-1 p-1">2020</th>
                            <th class="col-1 p-1">2021</th>
                            <th class="col-1 p-1">2022</th>
                            <th class="col-1 p-1">2023 &amp; Beyond</th>
                            <th class="col-1 p-1">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(item, index) in items" :key="index">
                            <tr class="border-bottom" x-data="{
                                    item: item,
                                    get total() {
                                        const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.item
                                        return parseFloat(y2016)
                                            + parseFloat(y2017)
                                            + parseFloat(y2018)
                                            + parseFloat(y2019)
                                            + parseFloat(y2020)
                                            + parseFloat(y2021)
                                            + parseFloat(y2022)
                                            + parseFloat(y2023)
                                    }
                                }">
                                <td class="p-1">
                                    <input type="hidden" x-bind:name="`region_investments[${index}][region_id]`" x-model="item.region_id">
                                    <span x-text="item.region.label"></span>
                                </td>
                                <td class="p-1">
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2016]`" x-model="item.y2016">
                                </td>
                                <td class="p-1">
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2017]`" x-model="item.y2017">
                                </td>
                                <td class="p-1">
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2018]`" x-model="item.y2018">
                                </td>
                                <td class="p-1">
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2019]`" x-model="item.y2019">
                                </td>
                                <td>
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2020]`" x-model="item.y2020">
                                </td>
                                <td class="p-1">
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2021]`" x-model="item.y2021">
                                </td>
                                <td class="p-1">
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2022]`" x-model="item.y2022">
                                </td>
                                <td class="p-1">
                                    <input type="number" class="form-control border-0 text-right pr-1 width-full" x-bind:name="`region_investments[${index}][y2023]`" x-model="item.y2023">
                                </td>
                                <td class="p-1 text-right">
                                    <span x-text="format(total)"></span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="p-2">
                                Total
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2016)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2017)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2018)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2019)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2020)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2021)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2022)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.y2023)"></span>
                            </th>
                            <th class="p-2 text-right">
                                <span x-text="format(total.total)"></span>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </dd>
    </dl>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="financial-status">{{ __("Financial Status") }}</div>
    </div>

    <dl class="mb-4">
        <dt class="form-group-header">

        </dt>
        <dd class="form-group-body">
            <div class="d-table col-12 border-bottom border-top">
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">

                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2016 &amp; Prior
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2017
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2018
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2019
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2020
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2021
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2022
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    2023 &amp; Beyond
                </div>
                <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                    Total
                </div>
            </div>

            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('nep', () => ({
                        nep: @json($project->nep ?? []),
                        get total() {
                            const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.nep
                            return parseFloat(y2016)
                                + parseFloat(y2017)
                                + parseFloat(y2018)
                                + parseFloat(y2019)
                                + parseFloat(y2020)
                                + parseFloat(y2021)
                                + parseFloat(y2022)
                                + parseFloat(y2023)
                        },
                        format(val) {
                            return val.toLocaleString()
                        }
                    }));
                });
            </script>

            <div class="d-table col-12 border-bottom" x-data="nep">
                <div class="col-1 p-2 d-table-cell">
                    NEP
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2016]" x-model="nep.y2016" value="{{ old('nep.y2016', $project->nep->y2016 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2017]" x-model="nep.y2017" value="{{ old('nep.y2017', $project->nep->y2017 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2018]" x-model="nep.y2018" value="{{ old('nep.y2018', $project->nep->y2018 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2019]" x-model="nep.y2019" value="{{ old('nep.y2019', $project->nep->y2019 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2020]" x-model="nep.y2020" value="{{ old('nep.y2020', $project->nep->y2020 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2021]" x-model="nep.y2021" value="{{ old('nep.y2021', $project->nep->y2021 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2022]" x-model="nep.y2022" value="{{ old('nep.y2022', $project->nep->y2022 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="nep[y2023]" x-model="nep.y2023" value="{{ old('nep.y2023', $project->nep->y2023 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell text-right">
                    <span x-text="format(total)"></span>
                </div>
            </div>

            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('allocation', () => ({
                        allocation: @json($project->allocation ?? []),
                        get total() {
                            const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.allocation
                            return parseFloat(y2016)
                                + parseFloat(y2017)
                                + parseFloat(y2018)
                                + parseFloat(y2019)
                                + parseFloat(y2020)
                                + parseFloat(y2021)
                                + parseFloat(y2022)
                                + parseFloat(y2023)
                        },
                        format(val) {
                            return val.toLocaleString()
                        }
                    }));
                });
            </script>

            <div class="d-table col-12 border-bottom" x-data="allocation">
                <div class="col-1 p-2 d-table-cell">
                    GAA
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2016]" x-model="allocation.y2016" value="{{ old('allocation.y2016', $project->allocation->y2016 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2017]" x-model="allocation.y2017" value="{{ old('allocation.y2017', $project->allocation->y2017 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2018]" x-model="allocation.y2018" value="{{ old('allocation.y2018', $project->allocation->y2018 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2019]" x-model="allocation.y2019" value="{{ old('allocation.y2019', $project->allocation->y2019 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2020]" x-model="allocation.y2020" value="{{ old('allocation.y2020', $project->allocation->y2020 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2021]" x-model="allocation.y2021" value="{{ old('allocation.y2021', $project->allocation->y2021 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2022]" x-model="allocation.y2022" value="{{ old('allocation.y2022', $project->allocation->y2022 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="allocation[y2023]" x-model="allocation.y2023" value="{{ old('allocation.y2023', $project->allocation->y2023 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell text-right">
                    <span x-text="format(total)"></span>
                </div>
            </div>

            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('disbursement', () => ({
                        disbursement: @json($project->disbursement ?? []),
                        get total() {
                            const { y2016, y2017, y2018, y2019, y2020, y2021, y2022, y2023 } = this.disbursement
                            return parseFloat(y2016)
                                + parseFloat(y2017)
                                + parseFloat(y2018)
                                + parseFloat(y2019)
                                + parseFloat(y2020)
                                + parseFloat(y2021)
                                + parseFloat(y2022)
                                + parseFloat(y2023)
                        },
                        format(val) {
                            return val.toLocaleString()
                        }
                    }));
                });
            </script>
            <div class="d-table col-12 border-bottom" x-data="disbursement">
                <div class="col-1 p-1 d-table-cell">
                    Disbursement
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2016]" x-model="disbursement.y2016" value="{{ old('disbursement.y2016', $project->disbursement->y2016 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2017]" x-model="disbursement.y2017" value="{{ old('disbursement.y2017', $project->disbursement->y2017 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2018]" x-model="disbursement.y2018" value="{{ old('disbursement.y2018', $project->disbursement->y2018 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2019]" x-model="disbursement.y2019" value="{{ old('disbursement.y2019', $project->disbursement->y2019 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2020]" x-model="disbursement.y2020" value="{{ old('disbursement.y2020', $project->disbursement->y2020 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2021]" x-model="disbursement.y2021" value="{{ old('disbursement.y2021', $project->disbursement->y2021 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2022]" x-model="disbursement.y2022" value="{{ old('disbursement.y2022', $project->disbursement->y2022 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell">
                    <input type="number" class="form-control text-right pr-1 width-full" name="disbursement[y2023]" x-model="disbursement.y2023" value="{{ old('disbursement.y2023', $project->disbursement->y2023 ?? 0) }}">
                </div>
                <div class="col-1 p-2 d-table-cell text-right">
                    <span x-text="format(total)"></span>
                </div>
            </div>

        </dd>
    </dl>
</div>


@push('scripts')
    <script>
        function createMoneyInput() {
            return {
                value: {{ $value ?? 0 }},
                type: 'text',
                onFocus() {
                    this.type = 'number';
                    const value = this.value;
                    this.value = value ? value.replace(/,/g, '') : 0;
                },
                onBlur() {
                    const value = this.value;
                    this.type = 'text';
                    this.value = Number(value).toLocaleString('en-US');
                }
            }
        }
    </script>
@endpush
