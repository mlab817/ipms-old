@extends('layouts.app')

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

            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("General Information") }}</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Project Title <i class="text-danger fas fa-flag"></i></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Project Title" value="{{ old('title') }}">
                                    @error('title')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="pap_type_id">PAP Type <i class="text-danger fas fa-flag"></i></label>
                                    <select class="form-control @error('pap_type_id') is-invalid @enderror" name="pap_type_id">
                                        <option value="" selected disabled>Select PAP Type</option>
                                        @foreach($pap_types as $option)
                                            <option value="{{ $option->id }}" @if(old('pap_type_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pap_type_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="pap_type_id">Is this a regular program?  <i class="text-danger fas fa-flag"></i></label>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="regular_program" value="1" @if(old('regular_program') == 1) checked @endif>
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="regular_program" value="0" @if(old('regular_program') == 0) checked @endif>
                                        <label class="form-check-label">No</label>
                                    </div>
                                    @error('regular_program')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="bases">Implementation Bases <i class="text-danger fas fa-flag"></i></label>
                                    @foreach($bases as $option)
                                        <div class="form-check">
                                            <label class="form-check-label @error('bases') text-danger @enderror">
                                                <input type="checkbox" class="form-check-input @error('bases') text-danger @enderror" name="bases[]" value="{{ $option->id }}" @if(in_array($option->id, old('bases') ?? [])) checked @endif>
                                                {{ $option->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('bases')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description  <i class="text-danger fas fa-flag"></i></label>
                                    <textarea rows="4" style="resize: none;"  class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                    @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="expected_outputs">Expected Outputs <i class="text-danger fas fa-flag"></i></label>
                                    <textarea rows="4" style="resize: none;"  class="form-control @error('expected_outputs') is-invalid @enderror" name="expected_outputs">{{ old('expected_outputs') }}</textarea>
                                    @error('expected_outputs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="total_project_cost">Total Project Cost (in absolute PhP) <i class="text-danger fas fa-flag"></i></label>
                                    <!-- TODO: Replace with MoneyInput -->
                                    <input type="number" class="form-control text-right @error('total_project_cost') is-invalid @enderror" name="total_project_cost" value="{{ old('total_project_cost') }}"></input>
                                    @error('total_project_cost')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="project_status_id">Project Status <i class="text-danger fas fa-flag"></i></label>
                                    <select class="form-control @error('pap_type_id') is-invalid @enderror" name="project_status_id">
                                        <option value="" selected disabled>Select Project Status</option>
                                        @foreach($project_statuses as $option)
                                            <option value="{{ $option->id }}" @if(old('project_status_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_status_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Spatial Coverage") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="spatial_coverage_id">Spatial Coverage <i class="text-danger fas fa-flag"></i></label>
                                    <select name="spatial_coverage_id" id="spatial_coverage_id" class="form-control @error('spatial_coverage_id') is-invalid @enderror">
                                        <option value="" selected disabled>Select Spatial Coverage</option>
                                        @foreach($spatial_coverages as $option)
                                            <option value="{{ $option->id }}" @if(old('spatial_coverage_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('spatial_coverage_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="regions">Regions <i class="text-danger fas fa-flag"></i></label>
                                    @foreach($regions->sortBy('order') as $option)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="regions[]" value="{{ $option->id }}" {{ in_array($option->id, old('regions') ?? []) ? 'checked' : '' }}>
                                                {{ $option->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('regions')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Project for Inclusion in which Programming Document</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pip">Public Investment Program <i class="text-danger fas fa-flag"></i></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="pip" value="1" @if(old('pip') == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="pip" value="0" @if(old('pip') == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group ml-4">
                                            <label>Typology <i class="text-danger fas fa-flag"></i></label>
                                            @foreach($pip_typologies as $option)
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input @error('pip_typology_id') text-danger @enderror" name="pip_typology_id" value="{{ $option->id }}" @if(old('pip_typology_id') == $option->id) checked @endif>
                                                    <label class="form-check-label @error('pip_typology_id') text-danger @enderror">{{ $option->name }}</label>
                                                    @error('pip_typology_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                                </div>
                                            @endforeach
                                            @error('pip_typology_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cip">Core Investment Program/Project <i class="text-danger fas fa-flag"></i></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="cip" value="1" @if(old('cip') == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="cip" value="0" @if(old('cip') == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group ml-4">
                                            <label>CIP Type <i class="text-danger fas fa-flag"></i></label>
                                            @foreach($cip_types as $option)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="cip_type_id" value="{{ $option->id }}">
                                                        {{ $option->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @error('cip_type_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="">Three-Year Rolling Infrastructure Program <i class="text-danger fas fa-flag"></i></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="trip" value="1" @if(old('trip') == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="trip" value="0" @if(old('trip') == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                            @error('trip')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="">Regional Development Investment Program <i class="text-danger fas fa-flag"></i></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdip" value="1" @if(old('rdip') == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdip" value="0" @if(old('rdip') == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                            @error('rdip')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group ml-4">
                                            <label class="">Is RDC endorsement required? <i class="text-danger fas fa-flag"></i></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdc_endorsement_required" value="1" @if(old('rdc_endorsement_required') == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdc_endorsement_required" value="0" @if(old('rdc_endorsement_required') == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                            @error('rdc_endorsement_required')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group ml-4">
                                            <label>Has the project been endorsed?</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdc_endorsed" value="1" @if(old('rdc_endorsed') == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdc_endorsed" value="0" @if(old('rdc_endorsed') == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                            @error('rdc_endorsement_required')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group ml-4">
                                            <label for="rdc_endorsed_date">RDC Endorsement Date</label>
                                            <input type="date" class="form-control @error('rdc_endorsed_date') is-invalid @enderror" name="rdc_endorsed_date" value="{{ old('rdc_endorsed_date') }}">
                                            @error('rdc_endorsed_date')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Implementation Period -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Implementation Period") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="target_start_year">Start of Implementation <i class="text-danger fas fa-flag"></i></label>
                                            <select class="form-control @error('target_start_year') is-invalid @enderror" name="target_start_year">
                                                <option value="" disabled selected>Select Year</option>
                                                @foreach($years as $option)
                                                    <option value="{{ $option }}" {{ old('target_start_year') == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                            @error('target_start_year')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="target_end_year">Year of Project Completion <i class="text-danger fas fa-flag"></i></label>
                                            <select class="form-control @error('target_end_year') is-invalid @enderror" name="target_end_year">
                                                <option value="" disabled selected>Select Year</option>
                                                @foreach($years as $option)
                                                    <option value="{{ $option }}" {{ old('target_end_year') == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                            @error('target_end_year')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Implementation Period -->

                    <!-- Approval Status -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Approval Status") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="iccable">Is the Project ICC-able? <i class="text-danger fas fa-flag"></i></label>
                                    <div class="form-check-inline">
                                        <input type="radio" class="form-check-input" value="1" name="iccable" {{ old('iccable') == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input type="radio" class="form-check-input" value="0" name="iccable" {{ old('iccable') == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="target_start_year">Level of Approval</label>
                                    <select class="form-control @error('approval_level_id') is-invalid @enderror" name="approval_level_id">
                                        <option value="" disabled selected>Select Approval Level</option>
                                        @foreach($approval_levels as $option)
                                            <option value="{{ $option->id }}" {{ old('approval_level_id') == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('approval_level_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="approval_date">Date of Submission/Approval</label>
                                    <input type="date" class="form-control @error('approval_date') is-invalid @enderror" name="approval_date" value="{{ old('approval_date') }}">
                                    @error('approval_date')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Approval Status -->

                    <!-- Project Preparation Details -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Project Preparation Details") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="preparation_document_id">Project Preparation Document</label>
                                    <select name="preparation_document_id" id="preparation_document_id" class="form-control">
                                        <option value="" selected disabled>Select document</option>
                                        @foreach($preparation_documents as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="iccable">Does the project require feasibility study? <i class="text-danger fas fa-flag"></i></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="1" name="has_fs" {{ old('has_fs') == 1 ? 'checked' : '' }}>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="0" name="has_fs" {{ old('has_fs') == 0 ? 'checked' : '' }}>
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fs_status_id">Status of Feasibility Study</label>
                                    <select name="feasibility_study[fs_status_id]" id="fs_status_id" class="form-control">
                                        <option value="" selected disabled>Select Status</option>
                                        @foreach($fs_statuses as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="iccable">Does the conduct of feasibility study need assistance?</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="1" name="feasibility_study[needs_assistance]" @if(old('feasibility_study[need_assistance]') == 1) checked @endif>
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="0" name="feasibility_study[needs_assistance]" @if(old('feasibility_study[need_assistance]') == 0) checked @endif>
                                            No
                                        </label>
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
                                                    <input type="number" class="form-control text-right" name="feasibility_study[y2017]" value="{{ old('feasibility_study.y2017', 0) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control text-right" name="feasibility_study[y2018]" value="{{ old('feasibility_study.y2018', 0) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control text-right" name="feasibility_study[y2019]" value="{{ old('feasibility_study.y2019', 0) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control text-right" name="feasibility_study[y2020]" value="{{ old('feasibility_study.y2020', 0) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control text-right" name="feasibility_study[y2021]" value="{{ old('feasibility_study.y2021', 0) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control text-right" name="feasibility_study[y2022]" value="{{ old('feasibility_study.y2022', 0) }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control text-right" name="feasibility_study[total]" value="{{ old('feasibility_study.total', 0) }}">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="feasibility_study[completion_date]">Expected/Target Date of Completion of FS</label>
                                    <input type="date" class="form-control" name="feasibility_study[completion_date]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Project Preparation Details -->

                    <!-- Employment Generation -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Employment Generation") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="employment_generated">No. of persons to be employed after completion of the project</label>
                                    <input class="form-control @error('employment_generated') is-invalid @enderror" type="number" name="employment_generated" value="{{ old('employment_generated') }}">
                                    @error('employment_generated')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Employment Generation -->

                    <!-- Philippine Development Plan Chapter -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Philippine Development Plan") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pdp_chapter_id">Main philippine Development Chapter <i class="text-danger fas fa-flag"></i></label>
                                    <select id="pdp_chapter_id" name="pdp_chapter_id" class="form-control @error('pdp_chapter_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select Main PDP Chapter</option>
                                        @foreach($pdp_chapters as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="infrastructure_sectors">Other PDP Chapters</label>
                                    @foreach($pdp_chapters as $option)
                                        <div class="form-check">
                                            <label class="form-check-label" for="pdp_chapter_{{ $option->id }}">
                                                <input id="pdp_chapter_{{ $option->id }}" type="checkbox" value="{{ $option->id }}" class="form-check-input" name="pdp_chapters[]">
                                                {{ $option->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Philippine Development Plan Chapter -->

                    <!-- Philippine Development Plan Indicators -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Philippine Development Results Matrices Indicators") }}</h3>
                            </div>
                            <!-- TODO: PDP Indicators as Vue component -->
                            <div class="card-body">
                                <p class="text-danger">Loading the indicators here causes the system to crash.</p>
                                <div class="form-check">
                                    <label for="no_pdp_indicator">
                                        <input type="checkbox" value="1" id="no_pdp_indicator" name="no_pdp_indicator" class="form-check-input">
                                        No PDP Indicator applicable
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Philippine Development Plan Indicators -->

                    <!-- Sustainable Development Goals -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Sustainable Development Goals") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sdgs">Sustainable Development Goals</label>
                                    @foreach($sdgs as $option)
                                        <div class="form-check">
                                            <label class="form-check-label" for="sdg_{{ $option->id }}">
                                                <input id="sdg_{{ $option->id }}" type="checkbox" value="{{ $option->id }}" class="form-check-input" name="sdgs[]">
                                                {{ $option->name }}
                                                <p class="text-xs">{{ $option->description }}</p>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Sustainable Development Goals -->

                    <!-- Ten Point Agenda -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Ten Point Agenda") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_point_agendas">Ten Point Agenda</label>
                                    @foreach($ten_point_agendas as $option)
                                        <div class="form-check">
                                            <label class="form-check-label" for="tpa_{{ $option->id }}">
                                                <input id="tpa_{{ $option->id }}" type="checkbox" value="{{ $option->id }}" class="form-check-input" name="ten_point_agendas[]">
                                                {{ $option->name }}
                                                <p class="text-xs">{{ $option->description }}</p>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Ten Point Agenda -->

                    <!-- Financial Information -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Financial Information") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="funding_source_id">Main Funding Source <i class="text-danger fas fa-flag"></i></label>
                                    <select class="form-control @error('funding_source_id') is-invalid @enderror" name="funding_source_id">
                                        <option value="" disabled selected>Select Funding Source</option>
                                        @foreach($funding_sources as $option)
                                            <option value="{{ $option->id }}" @if(old('funding_source_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="funding_sources">Other Funding Sources</label>
                                    @foreach($funding_sources as $option)
                                        <div class="form-check">
                                            <label class="form-check-label" for="fs_{{ $option->id }}">
                                                <input id="fs_{{ $option->id }}" type="checkbox" value="{{ $option->id }}" class="form-check-input" name="ten_point_agendas[]">
                                                {{ $option->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="other_fs">Other Funding Source (specify)</label>
                                    <input type="text" class="form-control" name="other_fs" id="other_fs" placeholder="Other funding source (please specify)">
                                    @error('other_fs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="implementation_mode_id">Mode of Implementation <i class="text-danger fas fa-flag"></i></label>
                                    <select class="form-control @error('implementation_mode_id') is-invalid @enderror" name="implementation_mode_id">
                                        <option value="" disabled selected>Select Implementation Mode</option>
                                        @foreach($implementation_modes as $option)
                                            <option value="{{ $option->id }}" @if(old('implementation_mode_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('implementation_mode_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="funding_institution_id">Funding Institution</label>
                                    <select class="form-control" name="funding_institution_id">
                                        <option value="" disabled selected>Select Funding Institution</option>
                                        @foreach($funding_institutions as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tier_id">Budget Tier <i class="text-danger fas fa-flag"></i></label>
                                    <select class="form-control @error('tier_id') is-invalid @enderror" name="tier_id">
                                        <option value="" disabled selected>Select Budget Tier</option>
                                        @foreach($tiers as $option)
                                            <option value="{{ $option->id }}" @if(old('tier_id') == $option->id) selected @enderror>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tier_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="uacs_code">UACS Code</label>
                                    <input type="text" class="form-control @error('uacs_code') is-invalid @enderror" name="uacs_code" id="uacs_code" placeholder="UACS Code" value="{{ old('uacs_code') }}">
                                    @error('uacs_code')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Financial Information -->

                    <!-- Status & Updates -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Status & Updates") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="updates">Updates <i class="text-danger fas fa-flag"></i></label>
                                    <textarea rows="4" style="resize: none;" class="form-control @error('updates') is-invalid @enderror" id="updates" name="updates">{{ old('updates') }}</textarea>
                                    @error('updates')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="updates_date">As of <i class="text-danger fas fa-flag"></i></label>
                                    <input type="date" class="form-control @error('updates_date') is-invalid @enderror" id="updates_date" name="updates_date" value="{{ old('updates_date') }}">
                                    @error('updates_date')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Status & Updates -->

                    <!-- Funding Source Breakdown -->
                    <div class="col-md-12">
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
                                    @foreach ($funding_sources as $fs)
                                        <tr>
                                            <th class="text-sm">
                                                <input type="hidden" name="fs_investments[{{$fs->id}}][fs_id]" value="{{ $fs->id }}">
                                                {{ $fs->name }}
                                            </th>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2016]" value="{{ old("fs_investments.{$fs->id}.y2016", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2017]" value="{{ old("fs_investments.{$fs->id}.y2017", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2018]" value="{{ old("fs_investments.{$fs->id}.y2018", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2019]" value="{{ old("fs_investments.{$fs->id}.y2019", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2020]" value="{{ old("fs_investments.{$fs->id}.y2020", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2021]" value="{{ old("fs_investments.{$fs->id}.y2021", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2022]" value="{{ old("fs_investments.{$fs->id}.y2022", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2023]" value="{{ old("fs_investments.{$fs->id}.y2023", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Funding Source Breakdown -->

                    <!-- Regional Breakdown -->
                    <div class="col-md-12">
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
                                    @foreach ($regions->sortBy('order') as $fs)
                                        <tr>
                                            <th class="text-sm">
                                                <input type="hidden" name="region_investments[{{$fs->id}}][region_id]" value="{{ $fs->id }}">
                                                {{ $fs->name }}
                                            </th>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2016]" value="{{ old("region_investments.{$fs->id}.y2016", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2017]" value="{{ old("region_investments.{$fs->id}.y2017", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2018]" value="{{ old("region_investments.{$fs->id}.y2018", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2019]" value="{{ old("region_investments.{$fs->id}.y2019", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2020]" value="{{ old("region_investments.{$fs->id}.y2020", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2021]" value="{{ old("region_investments.{$fs->id}.y2021", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2022]" value="{{ old("region_investments.{$fs->id}.y2022", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right" name="region_investments[{{$fs->id}}][y2023]" value="{{ old("region_investments.{$fs->id}.y2023", 0) }}"></td>
                                            <td><input type="number" class="form-control text-right"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Regional Breakdown -->

                    <!-- Financial Status -->
                    <div class="col-md-12">
                        <div class="card card-primary">
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
                                        <td><input type="number" class="form-control text-right" name="nep_2016" value="{{ old("nep_2016", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_2017" value="{{ old("nep_2017", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_2018" value="{{ old("nep_2018", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_2019" value="{{ old("nep_2019", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_2020" value="{{ old("nep_2020", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_2021" value="{{ old("nep_2021", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_2022" value="{{ old("nep_2022", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_2023" value="{{ old("nep_2023", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="nep_total" value="{{ old("nep_total") }}"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm">General Appropriations Act (GAA)</th>
                                        <td><input type="number" class="form-control text-right" name="gaa_2016" value="{{ old("gaa_2016", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_2017" value="{{ old("gaa_2017", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_2018" value="{{ old("gaa_2018", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_2019" value="{{ old("gaa_2019", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_2020" value="{{ old("gaa_2020", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_2021" value="{{ old("gaa_2021", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_2022" value="{{ old("gaa_2022", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_2023" value="{{ old("gaa_2023", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="gaa_total" value="{{ old("gaa_total") }}"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-sm">Actual Disbursement</th>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2016" value="{{ old("disbursement_2016", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2017" value="{{ old("disbursement_2017", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2018" value="{{ old("disbursement_2018", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2019" value="{{ old("disbursement_2019", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2020" value="{{ old("disbursement_2020", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2021" value="{{ old("disbursement_2021", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2022" value="{{ old("disbursement_2022", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_2023" value="{{ old("disbursement_2023", 0) }}"></td>
                                        <td><input type="number" class="form-control text-right" name="disbursement_total" value="{{ old("disbursement_total") }}"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Financial Status -->

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
@endsection
