@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
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
                                    <label for="title">Project Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Project Title" value="{{ old('title') }}">
                                    @error('title')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="pap_type_id">PAP Type</label>
                                    <select class="form-control @error('pap_type_id') is-invalid @enderror" name="pap_type_id">
                                        <option value="" selected disabled>Select PAP Type</option>
                                        @foreach($pap_types as $option)
                                            <option value="{{ $option->id }}" @if(old('pap_type_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pap_type_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="pap_type_id">Is this a regular program?</label>
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
                                    <label for="bases">Implementation Bases</label>
                                    @foreach($bases as $option)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="bases[]" value="{{ $option->id }}">
                                        <label class="form-check-label">{{ $option->name }}</label>
                                    </div>
                                    @endforeach
                                    @error('bases')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                    @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="expected_outputs">Expected Outputs</label>
                                    <textarea class="form-control @error('expected_outputs') is-invalid @enderror" name="expected_outputs">{{ old('expected_outputs') }}</textarea>
                                    @error('expected_outputs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="total_project_cost">Total Project Cost (in absolute PhP)</label>
                                    <input-money class="form-control @error('total_project_cost') is-invalid @enderror" name="total_project_cost" value="what value" total-project-cost="{{ old('total_project_cost') }}"></input-money>
                                    @error('total_project_cost')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="project_status_id">Project Status</label>
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
                                    <label for="spatial_coverage_id">Spatial Coverage</label>
                                    <select name="spatial_coverage_id" id="spatial_coverage_id" class="form-control">
                                        <option value="" selected disabled>Select Spatial Coverage</option>
                                        @foreach($spatial_coverages as $option)
                                            <option value="{{ $option->id }}" @if(old('$spatial_coverage_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                        @endforeach
                                    </select>
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
                                    <input class="form-check-input" type="checkbox" name="pip" value="1">
                                    <label class="form-check-label" for="pip">Public Investment Program</label>
                                </div>
                                <div class="form-group ml-4">
                                    <label>Typology</label>
                                    @foreach($pip_typologies as $option)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="pip_typology_id" value="{{ $option->id }}">
                                            <label class="form-check-label">{{ $option->name }}</label>
                                        </div>
                                    @endforeach
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
                                    <select class="form-control" name="target_start_year">
                                        <option value="" disabled selected>Select Year</option>
                                        @foreach($years as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="target_end_year">Year of Project Completion</label>
                                    <select class="form-control" name="target_end_year">
                                        <option value="" disabled selected>Select Year</option>
                                        @foreach($years as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
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
                                    <input class="form-control" type="number" name="employment_generated">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/. Employment Generation -->
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </section>
@endsection
<script>
    import InputMoney from "../../js/components/InputMoney";
    export default {
        components: {InputMoney}
    }
</script>
