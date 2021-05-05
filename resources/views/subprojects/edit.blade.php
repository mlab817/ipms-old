@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('subprojects.update', $subproject) }}" class="form-horizontal" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="operating_unit_id">Mother PAP</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" readonly value="{{ $subproject->project->title }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="operating_unit_id">Operating Unit</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" readonly value="{{ $subproject->operating_unit->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="title">PAP Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="PAP Title" value="{{ old('title', $subproject->title) }}">
                                @error('title')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="description">Description</label>
                            <div class="col-sm-9">
                                <textarea rows="4" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description">{{ old('description', $subproject->description) }}</textarea>
                                @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="expected_outputs">Expected Outputs</label>
                            <div class="col-sm-9">
                                <textarea rows="4" class="form-control @error('expected_outputs') is-invalid @enderror" id="expected_outputs" name="expected_outputs" placeholder="Expected Outputs">{{ old('expected_outputs', $subproject->expected_outputs) }}</textarea>
                                @error('expected_outputs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="total_cost">Total Cost (in absolute PhP)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('total_cost') is-invalid @enderror" id="total_cost" name="total_cost" placeholder="0.00" value="{{ old('total_cost', $subproject->total_cost) }}">
                                @error('total_cost')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="funding_year">Funding Year</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('funding_year') is-invalid @enderror" id="funding_year" name="funding_year">
                                    <option value="" selected disabled>Select Funding Year</option>
                                    @foreach($years as $option)
                                        <option value="{{ $option }}" @if(old('funding_year', $subproject->funding_year) == $option) selected @endif>{{ $option }}</option>
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
                            <label class="col-form-label col-sm-3" for="y2017">FY 2017</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('total_cost') is-invalid @enderror" id="y2017" name="y2017" placeholder="0.00" value="{{ old('y2017', $subproject->y2017) }}">
                                @error('y2017')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2018">FY 2018</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2018') is-invalid @enderror" id="y2018" name="y2018" placeholder="0.00" value="{{ old('y2018', $subproject->y2018) }}">
                                @error('y2018')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2019">FY 2019</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2019') is-invalid @enderror" id="y2019" name="y2019" placeholder="0.00" value="{{ old('y2019', $subproject->y2019) }}">
                                @error('y2019')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2020">FY 2020</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2020') is-invalid @enderror" id="y2020" name="y2020" placeholder="0.00" value="{{ old('y2020', $subproject->y2020) }}">
                                @error('y2020')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2021">FY 2019</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2021') is-invalid @enderror" id="y2021" name="y2021" placeholder="0.00" value="{{ old('y2021', $subproject->y2021) }}">
                                @error('y2021')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3" for="y2022">FY 2022</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('y2022') is-invalid @enderror" id="y2022" name="y2022" placeholder="0.00" value="{{ old('y2022', $subproject->y2022) }}">
                                @error('y2022')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('subprojects.index', ['project' => $subproject->project]) }}" class="btn">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
