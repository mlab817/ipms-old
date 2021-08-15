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

    <div id="office">
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label for="office_id">Office</label>
            </dt>
            <dd>
                <select class="form-select" name="office_id">
                    <option value="">Select Office</option>
                    @foreach($offices as $option)
                        <option value="{{ $option->id }}" @if(old('office_id', $project->office_id) == $option->id) selected @endif>{{ $option->id .' - '. $option->acronym }}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3" id="pap"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Program or Project</label>
        </dt>
        <dd>
            @foreach($pap_types as $pap_type)
                <div class="form-checkbox">
                    <label for="pap_type_{{$pap_type->id}}">
                        <input class="form-checkbox" type="radio" id="pap_type_{{$pap_type->id}}" name="pap_type_id" value="{{ $pap_type->id }}" @if(old('pap_type_id', $project->pap_type_id) == $pap_type->id) checked @endif>
                        {{ $pap_type->name }}
                        <p class="note">
                            {{ $pap_type->description }}
                        </p>
                        @if($pap_type->id ==1)
                            <span class="form-checkbox-details text-normal d-block">
                                <span>Regular Program</span>
                                <select @if($project->pap_type_id == 2) disabled @endif class="form-select" name="regular_program" id="regular_program">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </span>
                        @endif
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Does this PAP have INFRASTRUCTURE component/s?</label>
        </dt>
        <dd>
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
                    <input class="form-checkbox-details-trigger" type="radio" id="has_infra_0" name="has_infra" value="0" @if(old('has_infra', $project->has_infra) == 0) checked @endif>
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

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label>Basis for Implementation</label>
        </dt>
        <dd>
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

    <dl class="form-group my-0">
        <dt class="input-label">
            <label for="">Description</label>
        </dt>
        <dd class="form-group-body">
            <textarea class="form-control input-contrast" id="mde-description" name="description">{!! old('description', $project->description->description ?? '') !!}</textarea>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group my-0">
        <dt class="input-label">
            <label for="">Expected Outputs</label>
        </dt>
        <dd class="form-group-body">
            <textarea class="form-control input-contrast" id="expected_outputs" name="expected_outputs">{!! old('expected_outputs', $project->expected_output->expected_outputs ?? '')  !!}</textarea>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group my-0">
        <dt class="input-label">
            <label for="">Total Project Cost</label>
        </dt>
        <dd class="form-group-body" x-data="{
            isEditing: false,
            totalProjectCost: {{ $project->total_project_cost }}
            }">
            <input x-show="!isEditing" @click="isEditing = true; $nextTick(() => $refs.totalProjectCost.focus());" type="text" class="form-control input-contrast" readonly x-bind:value="totalProjectCost.toLocaleString()">
            <input x-cloak x-show="isEditing" @click.away="isEditing = false" type="number" class="form-control input-contrast" x-ref="totalProjectCost" name="total_project_cost" x-model="totalProjectCost">

            <p class="note">
                For projects, the total project cost is the total cost of the project including funding years beyond the plan period.
                For programs, the total project cost is the total cost for the plan period only.
            </p>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div>
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label for="office_id">Project Status</label>
            </dt>
            <dd>
                <select class="form-select" name="project_status_id">
                    <option value="">Select Status</option>
                    @foreach($project_statuses as $option)
                        <option value="{{ $option->id }}">{{ $option->id .' - '. $option->name }}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="other-pap-information">{{ __("Other PAP Information") }}</div>
    </div>

    <div>
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label for="research">Is it a Research and Development Program/Project?</label>
            </dt>
            <dd>
                <select class="form-select" name="research">
                    @foreach($booleanOptions as $key => $option)
                        <option value="{{ $key }}">{{ $key . ' - ' . $option}}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3"></div>

    <div>
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label for="research">Is it an ICT
                    Program/Project?</label>
            </dt>
            <dd>
                <select class="form-select" name="research" wire:model="ict">
                    @foreach($booleanOptions as $key => $option)
                        <option value="{{ $key }}">{{ $key . ' - ' . $option}}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3"></div>

    <div>
        <dl class="form-group d-inline-block my-0">
            <dt class="input-label">
                <label for="research">Is it responsive to
                    COVID-19/New Normal Intervention?</label>
            </dt>
            <dd>
                <select class="form-select" name="research" wire:model="covid">
                    @foreach($booleanOptions as $key => $option)
                        <option value="{{ $key }}">{{ $key . ' - ' . $option}}</option>
                    @endforeach
                </select>
            </dd>
        </dl>
    </div>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label>COVID Interventions</label>
        </dt>
        <dd>
            @foreach($covidInterventions as $key => $option)
                <div class="form-checkbox">
                    <label for="covid_int_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="covid_int_{{ $option->id }}"
                            name="covid_interventions[]"
                            value="{{ $option->id }}">
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

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label>Spatial Coverage</label>
        </dt>
        <dd>
            <select class="form-select" name="spatialCoverage">
                <option value="">Spatial Coverage</option>
                @foreach($spatial_coverages as $option)
                    <option value="{{ $option->id }}">{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label>Regions</label>
        </dt>
        <dd>
            @foreach($regions as $option)
                <div class="form-checkbox">
                    <label for="region_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="region_{{ $option->id }}"
                            value="{{ $option->id }}">
                        {{ $option->name }}
                    </label>
                </div>
            @endforeach

            <button class="btn ml-3" type="submit">Save</button>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="implementation-period">{{ __("Implementation Period") }}</div>
    </div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label>Start Year</label>
        </dt>
        <dd>
            <select class="form-select" name="target_start_year">
                <option value="">Year</option>
                @foreach($years as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label>End Year</label>
        </dt>
        <dd>
            <select class="form-select" name="target_end_year">
                <option value="">Year</option>
                @foreach($years as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="approval-status">{{ __("Approval Status") }}</div>
    </div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Is this project ICC-able?</label>
        </dt>
        <dd>
            <select class="form-select" name="iccable" id="iccable" wire:model="iccable">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Level of Approval (for ICCable projects only)</label>
        </dt>
        <dd>
            <select class="form-select" name="approval_level_id" id="approval_level_id" wire:model="approvalLevel">
                <option value="">Approval Level</option>
                @foreach($approval_levels as $key => $option)
                    <option value="{{ $option->id }}">{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Date of Approval (for ICCable projects only)</label>
        </dt>
        <dd>
            <input type="date" class="form-control" name="approval_date" id="approval_date">
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Gender Responsiveness</label>
        </dt>
        <dd>
            <select class="form-select" name="gad_id" id="gad_id" wire:model="gad">
                <option value="">Gender Responsiveness</option>
                @foreach($gads as $option)
                    <option value="{{ $option->id }}">{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="regional-development-investment-program">{{ __("Regional Development Investment Program") }}</div>
    </div>


    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Is this PAP included in the RDIP?</label>
        </dt>
        <dd>
            <select class="form-select" name="rdip" id="rdip" wire:model="rdip">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}">{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Is RDC endorsement required?</label>
        </dt>
        <dd>
            <select class="form-select" name="rdc_endorsement_required" id="rdc_endorsement_required" wire:model="rdcEndorsementRequired">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}">{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Has the PAP been endorsed?</label>
        </dt>
        <dd>
            <select class="form-select" name="rdc_endorsed" id="rdc_endorsed" wire:model="rdcEndorsed">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}">{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">RDC Endorsement Date</label>
        </dt>
        <dd>
            <input type="date" class="form-control" name="rdc_endorsed_date" id="rdc_endorsed_date" wire:model="rdcEndorsedDate">
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="project-preparation-details">{{ __("Project Preparation Details") }}</div>
    </div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Project Preparation Document</label>
        </dt>
        <dd>
            <select class="form-select" name="preparation_document_id" id="preparation_document_id" wire:model="preparationDocument">
                @foreach($preparation_documents as $key => $option)
                    <option value="{{ $option->id }}">{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Does the project require feasibility study?</label>
        </dt>
        <dd>
            <select class="form-select" name="has_fs" id="has_fs" wire:model="hasFs">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}">{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Status of Feasibility Study (Only if FS is required)</label>
        </dt>
        <dd>
            <select class="form-select" name="feasibility_study[fs_status_id]" id="feasibility_study[fs_status_id]" wire:model="fsStatus">
                @foreach($fs_statuses as $key => $option)
                    <option value="{{ $option->id }}">{{ $option->id . ' - ' . $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Does the conduct of feasibility study need assistance?</label>
        </dt>
        <dd>
            <select class="form-select" name="feasibility_study[need_assistance]" id="feasibility_study[need_assistance]" wire:model="needAssistance">
                @foreach($booleanOptions as $key => $option)
                    <option value="{{ $key }}">{{ $key . ' - ' . $option }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="my-0">
        <dt class="input-label">
            <label for="rename-field">Schedule of Feasibility Study Cost (in absolute PhP)</label>
        </dt>
        <dd class="form-group-body" x-data="{}">
            <div class="d-table col-12" x-show="isEditing" x-cloak>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2017" name="feasibility_study[y2017]">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2018" name="feasibility_study[y2018]">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2019" name="feasibility_study[y2019]">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2020" name="feasibility_study[y2020]">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2021" name="feasibility_study[y2021]">
                </div>
                <div class="d-table-cell col-2 p-1">
                    <input type="number" class="form-control text-right width-full input-contrast" id="feasibility_study.y2022" name="feasibility_study[y2022]">
                </div>
                <div class="d-table-cell d-inline-flex text-nowrap col">
                    <button class="btn" type="submit">Save</button>
                </div>
            </div>
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="employment-generation">{{ __("Employment Generation") }}</div>
    </div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">No. of persons to be employed after completion of the project</label>
        </dt>
        <dd>
            <input type="number" name="employment_generated" id="employment_generated" class="form-control">
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="pdp-chapter">{{ __("PDP Chapter") }}</div>
    </div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">PDP Chapter</label>
        </dt>
        <dd>
            <select class="form-select" name="pdp_chapter_id" id="pdp_chapter_id" wire:model="pdpChapter">
                @foreach($pdp_chapters as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Other PDP Chapters</label>
            <p class="note">Select all that applies</p>
        </dt>
        <dd>
            @foreach($pdp_chapters as $key => $option)
                <div class="form-checkbox">
                    <label for="pdp_chapter_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="pdp_chapter_{{ $option->id }}"
                            name="pdp_chapters[]"
                            value="{{ $option->id }}">
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

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Sustainable Development Goals</label>
        </dt>
        <dd>
            @foreach($sdgs as $key => $option)
                <div class="form-checkbox">
                    <label for="sdg_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="sdg_{{ $option->id }}"
                            name="sdgs[]"
                            value="{{ $option->id }}">
                        {{ $option->name }}
                        <p class="note">{{ $option->description }}</p>
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="ten-point-agenda">{{ __("Ten Point Agenda") }}</div>
        <div class="Subhead-description">Select all that applies</div>
    </div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Ten Point Agenda</label>
        </dt>
        <dd>
            @foreach($ten_point_agendas as $key => $option)
                <div class="form-checkbox">
                    <label for="tpa_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="tpa_{{ $option->id }}"
                            name="ten_point_agendas[]"
                            value="{{ $option->id }}">
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

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Main Funding Source</label>
        </dt>
        <dd>
            <select name="funding_source_id" id="funding_source_id" class="form-select" wire:model="fundingSource">
                @foreach($funding_sources as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Other Funding Sources</label>
        </dt>
        <dd>
            @foreach($funding_sources as $option)
                <div class="form-checkbox">
                    <label for="fs_{{ $option->id }}">
                        <input
                            type="checkbox"
                            id="fs_{{ $option->id }}"
                            name="funding_sources[]"
                            value="{{ $option->id }}">
                        {{ $option->name }}
                    </label>
                </div>
            @endforeach
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Other Funding Source (please specify)</label>
        </dt>
        <dd>
            <input type="text" name="other_fs" id="other_fs" class="form-control input-contrast">
        </dd>
    </dl>

    <div class="my-3"></div>


    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Mode of Implementation</label>
        </dt>
        <dd>
            <select name="implementation_mode_id" id="implementation_mode_id" class="form-select">
                @foreach($implementation_modes as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Funding Institution</label>
        </dt>
        <dd>
            <select name="funding_institution_id" id="funding_institution_id" class="form-select">
                @foreach($funding_institutions as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">Budget Tier</label>
        </dt>
        <dd>
            <select name="tier_id" id="tier_id" class="form-select">
                @foreach($tiers as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group d-inline-block my-0">
        <dt class="input-label">
            <label for="rename-field">UACS Code</label>
        </dt>
        <dd>
            <input type="text" name="uacs_code" id="uacs_code" class="form-control input-contrast">
        </dd>
    </dl>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="status-and-updates">{{ __("Status & Updates") }}</div>
    </div>

    <dl class="form-group my-0">
        <dt class="input-label">
            <label for="rename-field">Updates</label>
        </dt>
        <dd class="form-group-body">
            <textarea id="updates" name="updates" class="form-control input-contrast"></textarea>
        </dd>
    </dl>

    <div class="my-3"></div>

    <dl class="form-group my-0">
        <dt class="input-label">
            <label for="rename-field">As of</label>
        </dt>
        <dd class="form-group-body">
            <input type="date" id="updates_date" name="updates_date" class="form-control input-contrast">
        </dd>
    </dl>

    <div class="my-3"></div>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="investment-required-by-fund-source">{{ __("Investment Required by Funding Source") }}</div>
        <div class="Subhead-description">in absolute PhP terms</div>
    </div>

    <form wire:submit.prevent="updateFsInvestments">
        <dl class="my-0">
            <dt class="input-label">

            </dt>
            <dd class="form-group-body">
                <div class="d-table col-12 border-bottom border-top">
                    <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                        Funding Source
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
                @foreach ($project->fs_investments as $key => $fs)
                    <div class="d-table col-12 border-bottom" x-data="{ fs: {{ $fs  }} }">
                        <div class="col-1 p-1 d-table-cell">
                            <input type="hidden">
                            {{ $fs->funding_source->name ?? '' }}
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2016" x-model="fs.y2016">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2017" x-model="fs.y2017">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2018" x-model="fs.y2018">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2019" x-model="fs.y2019">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2020" x-model="fs.y2020">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2021" x-model="fs.y2021">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2022" x-model="fs.y2022">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="fsInvestments.{{ $key }}.y2023" x-model="fs.y2023">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" x-bind:value="parseFloat(fs.y2016) + parseFloat(fs.y2017) + parseFloat(fs.y2018) + parseFloat(fs.y2019) + parseFloat(fs.y2020) + parseFloat(fs.y2021) + parseFloat(fs.y2022) + parseFloat(fs.y2023)">
                        </div>
                    </div>
                @endforeach

                <div class="d-table col-12 border-bottom border-top">
{{--                    <div class="col-1 p-2 text-center v-align-middle d-table-cell">--}}
{{--                        Total--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2016'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2017'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2018'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2019'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2020'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2021'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2022'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $fsTotals['y2023'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{--}}
{{--                            $fsTotals['y2016'] ?? 0--}}
{{--                            + $fsTotals['y2017'] ?? 0--}}
{{--                            + $fsTotals['y2018'] ?? 0--}}
{{--                            + $fsTotals['y2019'] ?? 0--}}
{{--                            + $fsTotals['y2020'] ?? 0--}}
{{--                            + $fsTotals['y2021'] ?? 0--}}
{{--                            + $fsTotals['y2022'] ?? 0--}}
{{--                            + $fsTotals['y2023'] ?? 0--}}
{{--                        }}--}}
{{--                    </div>--}}
                </div>

                <div class="d-flex mt-2">
                    <button class="btn" type="submit">Save</button>
                </div>
            </dd>
        </dl>
    </form>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="investment-required-by-region">{{ __("Investment Required by Region") }}</div>
        <div class="Subhead-description">in absolute PhP terms</div>
    </div>

        <dl class="my-0">
            <dt class="input-label">

            </dt>
            <dd class="form-group-body">
                <div class="d-table col-12 border-bottom border-top">
                    <div class="col-1 p-2 text-center v-align-middle d-table-cell">
                        Region
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
                @foreach ($project->region_investments->sortBy('region.order') as $key => $region)
                    <div class="d-table col-12 border-bottom" x-data="{ region: {{ $region  }} }">
                        <div class="col-1 p-1 d-table-cell">
                            <input type="hidden">
                            {{ $region->region->label ?? '' }}
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2016" x-model="region.y2016">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2017" x-model="region.y2017">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2018" x-model="region.y2018">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2019" x-model="region.y2019">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2020" x-model="region.y2020">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2021" x-model="region.y2021">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2022" x-model="region.y2022">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" wire:model="regionInvestments.{{ $key }}.y2023" x-model="region.y2023">
                        </div>
                        <div class="col-1 p-1 d-table-cell">
                            <input type="number" class="form-control text-right input-contrast width-full" x-bind:value="parseFloat(region.y2016) + parseFloat(region.y2017) + parseFloat(region.y2018) + parseFloat(region.y2019) + parseFloat(region.y2020) + parseFloat(region.y2021) + parseFloat(region.y2022) + parseFloat(region.y2023)">
                        </div>
                    </div>
                @endforeach

                <div class="d-table col-12 border-bottom border-top">
{{--                    <div class="col-1 p-2 text-center v-align-middle d-table-cell">--}}
{{--                        Total--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2016'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2017'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2018'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2019'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2020'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2021'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2022'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{ $regionTotals['y2023'] ?? 0 }}--}}
{{--                    </div>--}}
{{--                    <div class="col-1 p-2 text-right v-align-middle d-table-cell">--}}
{{--                        {{--}}
{{--                            $regionTotals['y2016'] ?? 0--}}
{{--                            + $regionTotals['y2017'] ?? 0--}}
{{--                            + $regionTotals['y2018'] ?? 0--}}
{{--                            + $regionTotals['y2019'] ?? 0--}}
{{--                            + $regionTotals['y2020'] ?? 0--}}
{{--                            + $regionTotals['y2021'] ?? 0--}}
{{--                            + $regionTotals['y2022'] ?? 0--}}
{{--                            + $regionTotals['y2023'] ?? 0--}}
{{--                        }}--}}
{{--                    </div>--}}
                </div>

                <div class="d-flex mt-2">
                    <button class="btn" type="submit">Save</button>
                </div>
            </dd>
        </dl>

    <div class="Subhead Subhead--spacious">
        <div class="Subhead-heading" id="financial-status">{{ __("Financial Status") }}</div>
    </div>

    <dl class="my-0">
        <dt class="input-label">

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

            <div class="d-table col-12 border-bottom" x-data="{}">
                <div class="col-1 p-1 d-table-cell">
                    NEP
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full">
                </div>
            </div>

            <div class="d-table col-12 border-bottom" x-data="{}">
                <div class="col-1 p-1 d-table-cell">
                    GAA
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2016">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2017">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2018">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2019">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2020">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2021">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2022">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="allocation.y2023">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" x-bind:value="allocation.y2016 + allocation.y2017 + allocation.y2018 + allocation.y2019 + allocation.y2020 + allocation.y2021 + allocation.y2022 + allocation.y2023">
                </div>
            </div>

            <div class="d-table col-12 border-bottom" x-data="{}">
                <div class="col-1 p-1 d-table-cell">
                    Disbursement
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2016">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2017">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2018">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2019">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2020">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2021">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2022">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" wire:model.debounce.500ms="disbursement.y2023">
                </div>
                <div class="col-1 p-1 d-table-cell">
                    <input type="number" class="form-control text-right input-contrast width-full" x-bind:value="disbursement.y2016 + disbursement.y2017 + disbursement.y2018 + disbursement.y2019 + disbursement.y2020 + disbursement.y2021 + disbursement.y2022 + disbursement.y2023">
                </div>
            </div>

            <div class="d-flex mt-2">
                <button class="btn" type="submit">Save</button>
            </div>
        </dd>
    </dl>
</div>
