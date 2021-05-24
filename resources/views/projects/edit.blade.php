@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit PAP</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @can('projects.view_own')
                        <li class="breadcrumb-item"><a href="{{ route('projects.own') }}">Own Projects</a></li>
                        @endcan
                        <li class="breadcrumb-item active">Edit PAP</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if($errors->any())
                <div class="callout callout-danger">
                    <h5><i class="fas fa-info"></i> Error:</h5>
                    Please check the form for errors.
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('projects.update', $project->uuid) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="callout callout-info">
                            <h5>Instruction:</h5>

                            <p>All fields with red asterisk (<span class="text-danger">*</span>) are required. The system does
                                not accept decimal places (.00) so input only whole numbers.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("General Information") }}</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="title" class="col-form-label col-sm-3">PAP Title <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               name="title" placeholder="PAP Title"
                                               value="{{ old('title', $project->title) }}">
                                        @error('title')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pap_type_id" class="col-form-label col-sm-3">PAP Type <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('pap_type_id') is-invalid @enderror"
                                                name="pap_type_id">
                                            <option value="" selected disabled>Select PAP Type</option>
                                            @foreach($pap_types as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('pap_type_id', $project->pap_type_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('pap_type_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pap_type_id" class="col-form-label col-sm-3">Is this a regular program? <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="regular_program" value="1"
                                                   @if(old('regular_program', $project->regular_program) == 1) checked @endif>
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="regular_program" value="0"
                                                   @if(old('regular_program', $project->regular_program) == 0) checked @endif>
                                            <label class="form-check-label">No</label>
                                        </div>
                                        @error('regular_program')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="has_subprojects" class="col-form-label col-sm-3 required">Does this PAP have subprojects/activities? </label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="has_subprojects" value="1" @if(old('has_subprojects', $project->has_subprojects) == 1) checked @endif>
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="has_subprojects" value="0" @if(old('has_subprojects', $project->has_subprojects) == 0) checked @endif>
                                            <label class="form-check-label">No</label>
                                        </div>
                                        @error('has_subprojects')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="has_infra" class="col-form-label col-sm-3">Does this PAP have INFRASTRUCTURE component/s? <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="has_infra" value="1"
                                                   @if(old('has_infra', $project->has_infra) == 1) checked @endif>
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="has_infra" value="0"
                                                   @if(old('has_infra', $project->has_infra) == 0) checked @endif>
                                            <label class="form-check-label">No</label>
                                        </div>
                                        @error('has_infra')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bases" class="col-form-label col-sm-3">Implementation Bases <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        @foreach($bases as $option)
                                            <div class="form-check">
                                                <label class="form-check-label @error('bases') text-danger @enderror">
                                                    <input type="checkbox"
                                                           class="form-check-input @error('bases') text-danger @enderror"
                                                           name="bases[]" value="{{ $option->id }}"
                                                           @if(in_array($option->id, old('bases', $project->bases->pluck('id')->toArray() ?? []))) checked @endif>
                                                    {{ $option->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('bases')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-form-label col-sm-3">Description <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <textarea rows="4" style="resize: none;"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  name="description">{{ old('description', $project->description) }}</textarea>
                                        @error('description')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expected_outputs" class="col-form-label col-sm-3">Expected Outputs <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <textarea rows="4" style="resize: none;"
                                                  class="form-control @error('expected_outputs') is-invalid @enderror"
                                                  name="expected_outputs">{{ old('expected_outputs', $project->expected_outputs) }}</textarea>
                                        @error('expected_outputs')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="total_project_cost" class="col-form-label col-sm-3">Total Project Cost (in absolute PhP) <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <!-- TODO: Replace with MoneyInput -->
                                        <input type="text"
                                               class="money form-control @error('total_project_cost') is-invalid @enderror"
                                               name="total_project_cost"
                                               value="{{ old('total_project_cost', $project->total_project_cost) }}">
                                        @error('total_project_cost')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="project_status_id" class="col-form-label col-sm-3">Project Status <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('pap_type_id') is-invalid @enderror"
                                                name="project_status_id">
                                            <option value="" selected disabled>Select Project Status</option>
                                            @foreach($project_statuses as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('project_status_id', $project->project_status_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project_status_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Implementing Agencies") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="regions" class="col-form-label col-sm-3">Implementing Agencies <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        @foreach($operating_units as $option)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input @error('operating_units') text-danger @enderror" type="checkbox" name="operating_units[]" value="{{ $option->id }}" {{ in_array($option->id, old('operating_units', $project->operating_units()->pluck('id')->toArray() ?? []) ?? []) ? 'checked' : '' }}>
                                                    {{ $option->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('operating_units')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Other PAP Information") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 required" for="research">Is it a Research and Development Program/Project? </label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="research" value="1" @if(old('research', $project->research) == 1) checked @endif>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="research" value="0" @if(old('research', $project->research) == 0) checked @endif>
                                                No
                                            </label>
                                        </div>
                                        @error('research')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 required" for="ict">Is it an ICT Program/Project? </label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="ict" value="1" @if(old('ict', $project->ict) == 1) checked @endif>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="ict" value="0" @if(old('ict', $project->ict) == 0) checked @endif>
                                                No
                                            </label>
                                        </div>
                                        @error('ict')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 required" for="covid">Is it responsive to COVID-19/New Normal Intervention? </label>
                                    <div class="col-sm-9">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="covid" value="1" @if(old('covid', $project->covid) == 1) checked @endif>
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="covid" value="0" @if(old('covid', $project->covid) == 0) checked @endif>
                                                No
                                            </label>
                                        </div>
                                        @error('covid')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="covid_interventions" class="col-form-label col-sm-3">Included in which of the following document: </label>
                                    <div class="col-sm-9">
                                        @foreach($covidInterventions as $option)
                                            <div class="form-check">
                                                <label class="form-check-label" for="covid_{{ $option->id }}">
                                                    <input
                                                        id="covid_{{ $option->id }}"
                                                        type="checkbox"
                                                        value="{{ $option->id }}"
                                                        class="form-check-input"
                                                        name="covid_interventions[]"
                                                        @if(in_array($option->id, old('covid_interventions', $project->covid_interventions()->pluck('id')->toArray() ?? []))) checked @endif>
                                                    {{ $option->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Spatial Coverage") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="spatial_coverage_id" class="col-form-label col-sm-3">Spatial Coverage <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select name="spatial_coverage_id" id="spatial_coverage_id"
                                                class="form-control @error('spatial_coverage_id') is-invalid @enderror">
                                            <option value="" selected disabled>Select Spatial Coverage</option>
                                            @foreach($spatial_coverages as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('spatial_coverage_id', $project->spatial_coverage_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('spatial_coverage_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="regions" class="col-form-label col-sm-3">Regions <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        @foreach($regions->sortBy('order') as $option)
                                            @if($option->id !== 99)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input
                                                            class="form-check-input @error('regions') text-danger @enderror"
                                                            type="checkbox" name="regions[]"
                                                            value="{{ $option->id }}" {{ in_array($option->id, old('regions', $project->regions->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                                        {{ $option->name }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                        @error('regions')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Implementation Period -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Implementation Period") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="target_start_year" class="col-form-label col-sm-6">Start of Implementation <i
                                                    class="text-danger fas fa-flag"></i></label>
                                            <div class="col-sm-6">
                                                <select
                                                    class="form-control @error('target_start_year') is-invalid @enderror"
                                                    name="target_start_year">
                                                    <option value="" disabled selected>Select Year</option>
                                                    @foreach($years as $option)
                                                        <option
                                                            value="{{ $option }}" @if(old('target_start_year', $project->target_start_year) == $option) selected @endif>{{ $option }}</option>
                                                    @endforeach
                                                </select>
                                                @error('target_start_year')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="target_end_year" class="col-form-label col-sm-6">Year of Project Completion <i
                                                    class="text-danger fas fa-flag"></i></label>
                                            <div class="col-sm-6">
                                                <select class="form-control @error('target_end_year') is-invalid @enderror"
                                                        name="target_end_year">
                                                    <option value="" disabled selected>Select Year</option>
                                                    @foreach($years as $option)
                                                        <option
                                                            value="{{ $option }}" @if(old('target_end_year', $project->target_end_year) == $option) selected @endif>{{ $option }}</option>
                                                    @endforeach
                                                </select>
                                                @error('target_end_year')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Implementation Period -->

                    <!-- Approval Status -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
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
                                        @error('iccable')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="target_start_year" class="col-form-label col-sm-3">Level of Approval (For ICCable only)</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('approval_level_id') is-invalid @enderror"
                                                name="approval_level_id">
                                            <option value="" disabled selected>Select Approval Level</option>
                                            @foreach($approval_levels as $option)
                                                <option
                                                    value="{{ $option->id }}" @if(old('approval_level_id', $project->approval_level_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('approval_level_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="approval_date" class="col-form-label col-sm-3">Date of Submission/Approval</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('approval_date') is-invalid @enderror"
                                               name="approval_date" value="{{ old('approval_date', $project->approval_date) }}">
                                        @error('approval_date')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gad_id" class="col-form-label col-sm-3 required">Gender Responsiveness </label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2 @error('gad_id') is-invalid @enderror" name="gad_id">
                                            <option value="" disabled selected>Select GAD Classification</option>
                                            @foreach($gads as $option)
                                                <option value="{{ $option->id }}" {{ old('gad_id', $project->gad_id) == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('gad_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Approval Status -->

                    <!--/. Regional Development Investment Program -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
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
                                        @error('rdip')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Is RDC endorsement required? <i
                                                class="text-danger fas fa-flag"></i></label>
                                        <div class="col-sm-9">
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
                                        <label for="rdc_endorsed" class="col-form-label col-sm-3">Has the project been endorsed?</label>
                                        <div class="col-sm-9">
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
                                        <label for="rdc_endorsed_date" class="col-form-label col-sm-3">RDC Endorsement Date</label>
                                        <div class="col-sm-9">
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
                    </div>
                    <!--/. Regional Development Investment Program -->

                    <!-- Project Preparation Details -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Project Preparation Details") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="preparation_document_id" class="col-form-label col-sm-3">Project
                                        Preparation Document <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select name="preparation_document_id" id="preparation_document_id"
                                                class="form-control">
                                            <option value="" selected disabled>Select document</option>
                                            @foreach($preparation_documents as $option)
                                                <option value="{{ $option->id }}" @if(old('preparation_document_id', $project->preparation_document_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('preparation_document_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="has_fs" class="col-form-label col-sm-3">Does the project require
                                        feasibility study? <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
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
                                    <label for="fs_status_id" class="col-form-label col-sm-3">Status of Feasibility
                                        Study (Only if FS is required)</label>
                                    <div class="col-sm-9">
                                        <select name="feasibility_study[fs_status_id]" id="fs_status_id"
                                                class="form-control">
                                            <option value="" selected disabled>Select Status</option>
                                            @foreach($fs_statuses as $option)
                                                <option value="{{ $option->id }}" @if(old('feasibility_study.fs_status_id', $project->feasibility_study->fs_status_id ?? '') == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('feasibility_study.fs_status_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="feasibility_study.needs_assistance" class="col-form-label col-sm-3">Does the conduct of feasibility
                                        study need assistance?</label>
                                    <div class="col-sm-9">
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
                                    <label for="feasibility_study[completion_date]" class="col-form-label col-sm-3">Expected/Target
                                        Date of Completion of FS</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control"
                                               name="feasibility_study[completion_date]"
                                               value="{{ old('feasibility_study.completion_date', $project->feasibility_study->completion_date ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Project Preparation Details -->

                    <!-- Employment Generation -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Employment Generation") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="employment_generated" class="col-form-label col-sm-3">No. of persons to
                                        be employed after completion of the project</label>
                                    <div class="col-sm-9">
                                        <input class="form-control @error('employment_generated') is-invalid @enderror"
                                               type="number" name="employment_generated"
                                               value="{{ old('employment_generated', $project->employment_generated) }}">
                                        @error('employment_generated')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Employment Generation -->

                    <!-- Philippine Development Plan Chapter -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Philippine Development Plan") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="pdp_chapter_id" class="col-form-label col-sm-3">Main philippine
                                        Development Chapter <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select id="pdp_chapter_id" name="pdp_chapter_id"
                                                class="form-control @error('pdp_chapter_id') is-invalid @enderror">
                                            <option value="" disabled selected>Select Main PDP Chapter</option>
                                            @foreach($pdp_chapters as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('pdp_chapter_id', $project->pdp_chapter_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="infrastructure_sectors" class="col-form-label col-sm-3">Other PDP
                                        Chapters</label>
                                    <div class="col-sm-9">
                                        @foreach($pdp_chapters as $option)
                                            <div class="form-check">
                                                <label class="form-check-label" for="pdp_chapter_{{ $option->id }}">
                                                    <input id="pdp_chapter_{{ $option->id }}" type="checkbox"
                                                           value="{{ $option->id }}" class="form-check-input"
                                                           name="pdp_chapters[]"
                                                           @if(in_array($option->id, old('pdp_chapters', $project->pdp_chapters->pluck('id')->toArray() ?? []))) checked @endif>
                                                    {{ $option->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Philippine Development Plan Chapter -->

                    <!-- Philippine Development Plan Indicators -->
                    <div class="col-md-12">
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
                    </div>
                    <!--/. Philippine Development Plan Indicators -->

                    <!-- Sustainable Development Goals -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Sustainable Development Goals") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="sdgs" class="col-form-label col-sm-3">Sustainable Development Goals <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        @foreach($sdgs as $option)
                                            <div class="form-check">
                                                <label class="form-check-label" for="sdg_{{ $option->id }}">
                                                    <input id="sdg_{{ $option->id }}" type="checkbox"
                                                           value="{{ $option->id }}" class="form-check-input"
                                                           name="sdgs[]" @if(in_array($option->id, old('sdgs', $project->sdgs->pluck('id')->toArray() ?? []))) checked @endif>
                                                    {{ $option->name }}
                                                    <p class="text-xs">{{ $option->description }}</p>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('sdgs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Sustainable Development Goals -->

                    <!-- Ten Point Agenda -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Ten Point Agenda") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="ten_point_agendas" class="col-form-label col-sm-3">Ten Point Agenda <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        @foreach($ten_point_agendas as $option)
                                            <div class="form-check">
                                                <label class="form-check-label" for="tpa_{{ $option->id }}">
                                                    <input id="tpa_{{ $option->id }}" type="checkbox"
                                                           value="{{ $option->id }}" class="form-check-input"
                                                           name="ten_point_agendas[]"
                                                           @if(in_array($option->id, old('ten_point_agendas', $project->ten_point_agendas->pluck('id')->toArray() ?? []))) checked @endif>
                                                    {{ $option->name }}
                                                    <p class="text-xs">{{ $option->description }}</p>
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('ten_point_agendas')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Ten Point Agenda -->

                    <!-- Financial Information -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Financial Information") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="funding_source_id" class="col-form-label col-sm-3">Main Funding Source
                                        <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('funding_source_id') is-invalid @enderror"
                                                name="funding_source_id">
                                            <option value="" disabled selected>Select Funding Source</option>
                                            @foreach($funding_sources as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('funding_source_id', $project->funding_source_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('funding_source_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="funding_sources" class="col-form-label col-sm-3">Other Funding
                                        Sources</label>
                                    <div class="col-sm-9">
                                        @foreach($funding_sources as $option)
                                            <div class="form-check">
                                                <label class="form-check-label" for="fs_{{ $option->id }}">
                                                    <input id="fs_{{ $option->id }}" type="checkbox"
                                                           value="{{ $option->id }}" class="form-check-input"
                                                           name="funding_sources[]"
                                                           @if(in_array($option->id, old('funding_sources', $project->funding_sources->pluck('id')->toArray() ?? []))) checked @endif>
                                                    {{ $option->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('funding_sources')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="other_fs" class="col-form-label col-sm-3">Other Funding Source
                                        (specify)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="other_fs" id="other_fs"
                                               placeholder="Other funding source (please specify)"
                                               value="{{ old('other_fs', $project->other_fs) }}">
                                        @error('other_fs')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="implementation_mode_id" class="col-form-label col-sm-3">Mode of
                                        Implementation <i class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select
                                            class="form-control @error('implementation_mode_id') is-invalid @enderror"
                                            name="implementation_mode_id">
                                            <option value="" disabled selected>Select Implementation Mode</option>
                                            @foreach($implementation_modes as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('implementation_mode_id', $project->implementation_mode_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('implementation_mode_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="funding_institution_id" class="col-form-label col-sm-3">Funding
                                        Institution</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="funding_institution_id">
                                            <option value="" disabled selected>Select Funding Institution</option>
                                            @foreach($funding_institutions as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('funding_institution_id', $project->funding_institution_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('funding_institution_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tier_id" class="col-form-label col-sm-3">Budget Tier <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('tier_id') is-invalid @enderror"
                                                name="tier_id">
                                            <option value="" disabled selected>Select Budget Tier</option>
                                            @foreach($tiers as $option)
                                                <option value="{{ $option->id }}"
                                                        @if(old('tier_id', $project->tier_id) == $option->id) selected @enderror>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('tier_id')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uacs_code" class="col-form-label col-sm-3">UACS Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('uacs_code') is-invalid @enderror"
                                               name="uacs_code" id="uacs_code" placeholder="UACS Code"
                                               value="{{ old('uacs_code', $project->uacs_code) }}">
                                        @error('uacs_code')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Financial Information -->

                    <!-- Status & Updates -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Status & Updates") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="updates" class="col-form-label col-sm-3">Updates <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
                                        <textarea rows="4" style="resize: none;"
                                                class="form-control @error('updates') is-invalid @enderror"
                                                id="updates"
                                                name="updates"
                                                placeholder="For proposed program/project, please indicate the physical status of the program/project in terms of project preparation, approval, funding, etc. If ongoing or completed, please provide information on the delivery of outputs, percentage of completion and financial status/ accomplishment in terms of utilization rate.">{{ old('updates', $project->updates) }}</textarea>
                                        @error('updates')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updates_date" class="col-form-label col-sm-3">As of <i
                                            class="text-danger fas fa-flag"></i></label>
                                    <div class="col-sm-9">
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
                    </div>
                    <!--/. Status & Updates -->

                    <!-- Funding Source Breakdown -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
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
                    </div>
                    <!--/. Funding Source Breakdown -->

                    <!-- Regional Breakdown -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
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
                    </div>
                    <!--/. Regional Breakdown -->

                    <!-- Financial Status -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Financial Status") }}</h3>
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
                                    <tr>
                                        <th class="text-sm">National Expenditure Program (NEP)</th>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2016]"
                                                   value="{{ old("nep.y2016", $project->nep->y2016 ?? 0) }}"></td>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2017]"
                                                   value="{{ old("nep.y2017", $project->nep->y2017 ?? 0) }}"></td>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2018]"
                                                   value="{{ old("nep.y2018", $project->nep->y2018 ?? 0) }}"></td>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2019]"
                                                   value="{{ old("nep.y2019", $project->nep->y2019 ?? 0) }}"></td>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2020]"
                                                   value="{{ old("nep.y2020", $project->nep->y2020 ?? 0) }}"></td>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2021]"
                                                   value="{{ old("nep.y2021", $project->nep->y2021 ?? 0) }}"></td>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2022]"
                                                   value="{{ old("nep.y2022", $project->nep->y2022 ?? 0) }}"></td>
                                        <td><input type="text" class="nep money form-control text-right"
                                                   name="nep[y2023]"
                                                   value="{{ old("nep.y2023", $project->nep->y2023 ?? 0) }}"></td>
                                        <td><input type="text" class="form-control text-right" id="nep_total" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm">General Appropriations Act (GAA)</th>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2016]"
                                                   value="{{ old("allocation.y2016", $project->allocation->y2016 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2017]"
                                                   value="{{ old("allocation.y2017", $project->allocation->y2017 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2018]"
                                                   value="{{ old("allocation.y2018", $project->allocation->y2018 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2019]"
                                                   value="{{ old("allocation.y2019", $project->allocation->y2019 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2020]"
                                                   value="{{ old("allocation.y2020", $project->allocation->y2020 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2021]"
                                                   value="{{ old("allocation.y2021", $project->allocation->y2021 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2022]"
                                                   value="{{ old("allocation.y2022", $project->allocation->y2022 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="allocation money form-control text-right"
                                                   name="allocation[y2023]"
                                                   value="{{ old("allocation.y2023", $project->allocation->y2023 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="form-control text-right" id="allocation_total" }}"
                                            readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm">Actual Disbursement</th>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2016]"
                                                   value="{{ old("disbursement.y2016", $project->disbursement->y2016 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2017]"
                                                   value="{{ old("disbursement.y2017", $project->disbursement->y2017 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2018]"
                                                   value="{{ old("disbursement.y2018", $project->disbursement->y2018 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2019]"
                                                   value="{{ old("disbursement.y2019", $project->disbursement->y2019 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2020]"
                                                   value="{{ old("disbursement.y2020", $project->disbursement->y2020 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2021]"
                                                   value="{{ old("disbursement.y2021", $project->disbursement->y2021 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2022]"
                                                   value="{{ old("disbursement.y2022", $project->disbursement->y2022 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   name="disbursement[y2023]"
                                                   value="{{ old("disbursement.y2023", $project->disbursement->y2023 ?? 0) }}">
                                        </td>
                                        <td><input type="text" class="disbursement money form-control text-right"
                                                   id="disbursement_total" readonly></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Financial Status -->

                </div>

                <div class="card-footer">
                    <div class="col">
                        <div class="row justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('projects.own') }}" class="btn">Back to List</a>
                            </div>
                            <div>
                                @can('delete', $project)
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                    Delete
                                </button>
                                @endcan
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-info back-to-top" role="button" aria-label="Scroll to top">
        <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </a>
@endsection

@section('modal')
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label required">Reason for deletion</label>
                            <textarea class="form-control" rows="4" name="reason" id="reason" placeholder="Reason for deletion (e.g. duplicate)" autofocus required></textarea>
                        </div>
                        @if(config('ipms.force_delete'))
                            <p class="text-danger">The system is currently set to permanently delete PAPs. Proceed with caution.</p>
                        @endif
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@include('projects.partials.script')
