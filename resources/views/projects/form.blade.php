@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if($errors->any())
            <div class="callout callout-danger">
                <h5><i class="fas fa-info"></i> Error:</h5>
                Please check the form for errors.
            </div>
            @endif

            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="regular_program" value="1" @if(old('regular_program') == 1) checked @endif>
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="regular_program" value="0" @if(old('regular_program') == 0) checked @endif>
                                        <label class="form-check-label">No</label>
                                    </div>
                                    @error('regular_program')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="bases">Implementation Bases <i class="text-danger fas fa-flag"></i></label>
                                    @foreach($bases as $option)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="bases[]" value="{{ $option->id }}" @if(!is_null(old('bases')) && in_array($option->id, old('bases'))) checked @endif>
                                        <label class="form-check-label">{{ $option->name }}</label>
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

                    <div class="col-md-6">
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
                                    <label for="regions">Regions</label>
                                    @foreach($regions as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="regions[]" value="{{ $option->id }}">
                                        <label class="form-check-label">{{ $option->name }}</label>
                                    </div>
                                    @endforeach
                                    @error('regions')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Project for Inclusion in which Programming Document</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <label class="form-check-label" for="pip">
                                        <input class="form-check-input" type="checkbox" id="pip" name="pip" value="1" @if(old('pip') == 1) checked @endif>
                                        Public Investment Program
                                    </label>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Typology</label>
                                    @foreach($pip_typologies as $option)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="pip_typology_id" value="{{ $option->id }}">
                                            <label class="form-check-label">{{ $option->name }}</label>
                                        </div>
                                    @endforeach
                                    @error('pip_typology_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="cip" value="1">
                                    <label class="form-check-label" for="cip">Core Investment Program/Project</label>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Typology</label>
                                    @foreach($cip_types as $option)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="pip_typology_id" value="{{ $option->id }}">
                                            <label class="form-check-label">{{ $option->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="trip" value="1">
                                    <label class="form-check-label">Three-Year Rolling Infrastructure Program</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="rdip" value="1">
                                    <label class="form-check-label">Regional Development Investment Program</label>
                                </div>
                                <div class="form-check ml-4">
                                    <input class="form-check-input" type="checkbox" name="rdc_endorsement_required" value="1">
                                    <label class="form-check-label">Is RDC endorsement required?</label>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Has the project been endorsed? If yes, when?</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <input type="checkbox" name="rdc_endorsed" value="1">
                                            </span>
                                        </div>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Implementation Period -->
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Implementation Period") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="target_start_year">Start of Implementation</label>
                                    <select class="form-control @error('target_start_year') is-invalid @enderror" name="target_start_year">
                                        <option value="" disabled selected>Select Year</option>
                                        @foreach($years as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    @error('target_start_year')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="target_end_year">Year of Project Completion</label>
                                    <select class="form-control @error('target_end_year') is-invalid @enderror" name="target_end_year">
                                        <option value="" disabled selected>Select Year</option>
                                        @foreach($years as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    @error('target_end_year')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Implementation Period -->

                    <!-- Pre-Investment Requirement -->
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Pre-Investment Requirement") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="iccable">Is the Project ICC-able?</label>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" value="1" name="iccable">
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" value="0" name="iccable">
                                        <label class="form-check-label">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="target_start_year">Level of Approval</label>
                                    <select class="form-control" name="approval_level_id">
                                        <option value="" disabled selected>Select Approval Level</option>
                                        @foreach($approval_levels as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="approval_date">Date of Submission/Approval</label>
                                    <input type="date" class="form-control" name="approval_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Pre-Investment Requirement -->

                    <!-- Employment Generation -->
                    <div class="col-md-6">
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

                    <!-- Infrastructure Sector -->
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Infrastructure Sector") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="infrastructure_sectors">Infrastructure Sectors</label>
                                    @foreach($infrastructure_sectors as $option)
                                        <div class="form-check">
                                            <label class="form-check-label" for="infrastructure_sector_{{ $option->id }}">
                                                <input id="infrastructure_sector_{{ $option->id }}" type="checkbox" value="{{ $option->id }}" class="form-check-input" name="infrastructure_sectors[]">
                                                {{ $option->name }}
                                            </label>
                                        </div>
                                        @foreach($option->children as $child)
                                            <div class="ml-4 form-check">
                                                <label for="infrastructure_subsector_{{ $child->id }}" class="form-check-label">
                                                    <input type="checkbox" id="infrastructure_subsector_{{ $child->id }}" value="{{ $child->id }}" name="infrastructure_subsectors[]" class="form-check-input">
                                                    {{ $child->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="other_infrastructure">Other Infrastructure</label>
                                    <input type="text" class="form-control @error('other_infrastructure') is-invalid @enderror" name="other_infrastructure" id="other_infrastructure" placeholder="Other infrastructure" value="{{ old('other_infrastructure') }}">
                                    @error('other_infrastructure')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="risk">Implementation Risk &amp; Mitigation Strategy</label>
                                    <textarea rows="4" style="resize: none;"  class="form-control @error('risk') is-invalid @enderror" name="risk" placeholder="Implementation Risk and Mitigation Strategy">{{ old('risk') }}</textarea>
                                    @error('risk')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Infrastructure Sector -->

                    <!-- Philippine Development Plan Chapter -->
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Philippine Development Plan") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pdp_chapter_id">Main philippine Development Chapter</label>
                                    <select id="pdp_chapter_id" name="pdp_chapter_id" class="form-control">
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
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Philippine Development Results Matrices Indicators") }}</h3>
                            </div>
                            <!-- TODO: PDP Indicators as Vue component -->
                            <div class="card-body">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Ten Point Agenda") }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_point_agendas">Ten Point Agenda</label>
                                    @foreach($ten_point_agendas as $option)
                                        <div class="form-check">
                                            <label class="form-check-label" for="sdg_{{ $option->id }}">
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
                    <div class="col-md-6">
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
                                            <label class="form-check-label" for="sdg_{{ $option->id }}">
                                                <input id="tpa_{{ $option->id }}" type="checkbox" value="{{ $option->id }}" class="form-check-input" name="ten_point_agendas[]">
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
                                    <label for="uacs_code">UACS Code <i class="text-danger fas fa-flag"></i></label>
                                    <input type="text" class="form-control @error('uacs_code') is-invalid @enderror" name="uacs_code" id="uacs_code" placeholder="UACS Code">
                                    @error('uacs_code')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Financial Information -->

                    <!-- Status & Updates -->
                    <div class="col-md-6">
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
                                <h3 class="card-title">{{ __("Financial Status") }} </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <i class="text-danger fas fa-flag"></i> All fields are required.
                                </div>
                                <table class="table table-bordered">
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
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2016]" value="{{ old("fs_investments.{$fs->id}.y2016") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2017]" value="{{ old("fs_investments.{$fs->id}.y2017") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2018]" value="{{ old("fs_investments.{$fs->id}.y2018") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2019]" value="{{ old("fs_investments.{$fs->id}.y2019") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2020]" value="{{ old("fs_investments.{$fs->id}.y2020") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2021]" value="{{ old("fs_investments.{$fs->id}.y2021") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2022]" value="{{ old("fs_investments.{$fs->id}.y2022") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="fs_investments[{{$fs->id}}][y2023]" value="{{ old("fs_investments.{$fs->id}.y2023") }}"></td>
                                            <td><input type="number" class="form-control text-right"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/. Funding Source Breakdown -->

                    <!-- Financial Status -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __("Financial Status") }}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
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
                                            <td><input type="number" class="form-control text-right" name="nep_2016" value="{{ old("nep_2016") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_2017" value="{{ old("nep_2017") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_2018" value="{{ old("nep_2018") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_2019" value="{{ old("nep_2019") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_2020" value="{{ old("nep_2020") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_2021" value="{{ old("nep_2021") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_2022" value="{{ old("nep_2022") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_2023" value="{{ old("nep_2023") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="nep_total" value="{{ old("nep_total") }}"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-sm">General Appropriations Act (GAA)</th>
                                            <td><input type="number" class="form-control text-right" name="gaa_2016" value="{{ old("gaa_2016") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_2017" value="{{ old("gaa_2017") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_2018" value="{{ old("gaa_2018") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_2019" value="{{ old("gaa_2019") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_2020" value="{{ old("gaa_2020") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_2021" value="{{ old("gaa_2021") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_2022" value="{{ old("gaa_2022") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_2023" value="{{ old("gaa_2023") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="gaa_total" value="{{ old("gaa_total") }}"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-sm">Actual Disbursement</th>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2016" value="{{ old("disbursement_2016") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2017" value="{{ old("disbursement_2017") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2018" value="{{ old("disbursement_2018") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2019" value="{{ old("disbursement_2019") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2020" value="{{ old("disbursement_2020") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2021" value="{{ old("disbursement_2021") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2022" value="{{ old("disbursement_2022") }}"></td>
                                            <td><input type="number" class="form-control text-right" name="disbursement_2023" value="{{ old("disbursement_2023") }}"></td>
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
