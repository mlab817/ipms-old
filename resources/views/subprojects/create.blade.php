@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('subprojects.store') }}" class="form-horizontal" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="project_id">Mother PAP <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <select class="form-control @error('project_id') is-invalid @enderror" id="project_id" name="project_id">
                                    <option value="" selected disabled>Select Mother PAP</option>
                                    @foreach($projects as $option)
                                        <option value="{{ $option->id }}" @if(old('project_id') == $option->id) selected @endif>{{ $option->title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="operating_unit_id">Operating Unit <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <select class="form-control @error('operating_unit_id') is-invalid @enderror" id="operating_unit_id" name="operating_unit_id">
                                    <option value="" selected disabled>Select Operating Unit</option>
                                    @foreach($operating_units as $option)
                                        <option value="{{ $option->id }}" @if(old('operating_unit_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                    @endforeach
                                </select>
                                @error('operating_unit_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="title">PAP Title <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="PAP Title" value="{{ old('title') }}">
                                @error('title')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="description">Description <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <textarea rows="4" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="expected_outputs">Expected Outputs <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <textarea rows="4" class="form-control @error('expected_outputs') is-invalid @enderror" id="expected_outputs" name="expected_outputs" placeholder="Expected Outputs">{{ old('expected_outputs') }}</textarea>
                                @error('expected_outputs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="total_cost">Total Cost (in absolute PhP) <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('total_cost') is-invalid @enderror" id="total_cost" name="total_cost" placeholder="0.00" value="{{ old('total_cost') }}">
                                @error('total_cost')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="funding_year">Funding Year <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <select class="form-control @error('funding_year') is-invalid @enderror" id="funding_year" name="funding_year">
                                    <option value="" selected disabled>Select Funding Year</option>
                                    @foreach($years as $option)
                                        <option value="{{ $option }}" @if(old('funding_year') == $option) selected @endif>{{ $option }}</option>
                                    @endforeach
                                </select>
                                @error('funding_year')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <span class="h5">Annual Breakdown (in absolute PhP)</span>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2017">FY 2017 <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('total_cost') is-invalid @enderror" id="y2017" name="y2017" placeholder="0.00" value="{{ old('y2017') }}">
                                @error('y2017')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2018">FY 2018 <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2018') is-invalid @enderror" id="y2018" name="y2018" placeholder="0.00" value="{{ old('y2018') }}">
                                @error('y2018')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2019">FY 2019 <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2019') is-invalid @enderror" id="y2019" name="y2019" placeholder="0.00" value="{{ old('y2019') }}">
                                @error('y2019')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2020">FY 2020 <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2020') is-invalid @enderror" id="y2020" name="y2020" placeholder="0.00" value="{{ old('y2020') }}">
                                @error('y2020')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2021">FY 2019 <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2021') is-invalid @enderror" id="y2021" name="y2021" placeholder="0.00" value="{{ old('y2021') }}">
                                @error('y2021')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2022">FY 2022 <i class="text-danger fas fa-flag"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2022') is-invalid @enderror" id="y2022" name="y2022" placeholder="0.00" value="{{ old('y2022') }}">
                                @error('y2022')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('subprojects.index') }}" class="btn">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
