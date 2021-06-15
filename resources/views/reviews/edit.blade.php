@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Review</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reviews.index') }}">Review PAPs</a></li>
                        <li class="breadcrumb-item active">Edit Review</li>
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
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif

            <div class="row pr-2 pb-3 justify-content-end">
                {{--                <a href="{{ route('projects.show', $project) }}" target="_blank" class="btn btn-outline-info">View Project Info (New Tab)</a>--}}
                <button type="button" class="btn btn-outline-info" onclick="openPopup()">View Project Info</button>
            </div>

            <div class="callout callout-info">
                <div class="row">
                    <div class="col">
                        <p>Title: <strong>{{ $project->title  }}</strong></p>
                        <p>Office: <strong>{{ $project->office->name ?? '' }}</strong></p>
                    </div>
                    <div class="col">
                        <p>Created by: <img src="{{ $project->creator->avatar }}" width="20" height="20" class="img-circle"> <strong>{{ $project->creator->name ?? '' }}</strong> on <strong>{{ $project->created_at->format('M d, Y') }}</strong></p>
                        <p>Last Updated: <strong>{{ $project->updated_at->format('M d, Y') }}</strong></p>
                    </div>
                </div>
            </div>

            <form class="form-horizontal" action="{{ route('reviews.update', $review) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="project_id" value="{{ $review->project->id }}">

                <div class="card card-info">
                    <div class="card-header">
                        <h1 class="card-title">PAP Review and Evaluation</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="pip" class="col-form-label col-sm-3">Public Investment Program</label>
                            <div class="col-sm-9">
                                <div class="form-check-inline">
                                    <label for="pip_1" class="form-check-label">
                                        <input id="pip_1" type="radio" class="form-check-input" name="pip" value="1" @if(old('pip', $review->pip) == 1) checked @endif>
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label for="pip_0" class="form-check-label">
                                        <input id="pip_0" type="radio" class="form-check-input" name="pip" value="0" @if(old('pip', $review->pip) == 0) checked @endif>
                                        No
                                    </label>
                                </div>
                            </div>
                            @error('pip')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group row">
                            <label for="pip_typology_id" class="col-sm-3">PIP Typology</label>
                            <div class="col-sm-9">
                                <select id="pip_typology_id" name="pip_typology_id" class="form-control @error('pip_typology_id') is-invalid @enderror">
                                    <option value="" selected disabled>Select Typology</option>
                                    @foreach($pip_typologies as $option)
                                        <option value="{{ $option->id }}" @if(old('pip_typology_id', $review->pip_typology_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                    @endforeach
                                </select>
                                @error('pip_typology_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cip" class="col-form-label col-sm-3">Core Investment Program/Project</label>
                            <div class="col-sm-9">
                                <div class="form-check-inline">
                                    <label for="cip_1" class="form-check-label">
                                        <input id="cip_1" type="radio" class="form-check-input" name="cip" value="1" @if(old('pip', $review->cip) == 1) checked @endif>
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label for="cip_0" class="form-check-label">
                                        <input id="cip_0" type="radio" class="form-check-input" name="cip" value="0" @if(old('pip', $review->cip) == 0) checked @endif>
                                        No
                                    </label>
                                </div>
                                @error('pip')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cip_type_id" class="col-sm-3">CIP Type</label>
                            <div class="col-sm-9">
                                <select id="cip_type_id" name="cip_type_id" class="form-control @error('cip_type_id') is-invalid @enderror">
                                    <option value="" selected disabled>Select Typology</option>
                                    @foreach($cip_types as $option)
                                        <option value="{{ $option->id }}" @if(old('cip_type_id', $review->cip_type_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                    @endforeach
                                </select>
                                @error('cip_type_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trip" class="col-form-label col-sm-3">Three-Year Rolling Infrastructure Program/Project</label>
                            <div class="col-sm-9">
                                <div class="form-check-inline">
                                    <label for="trip_1" class="form-check-label">
                                        <input id="trip_1" type="radio" class="form-check-input" name="trip" value="1" @if(old('trip', $review->trip) == 1) checked @endif>
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label for="trip_0" class="form-check-label">
                                        <input id="trip_0" type="radio" class="form-check-input" name="trip" value="0" @if(old('trip', $review->trip) == 0) checked @endif>
                                        No
                                    </label>
                                </div>
                                @error('trip')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ifp" class="col-form-label col-sm-3 required">Infrastructure Flagship Project(IFP)</label>
                            <div class="col-sm-9">
                                <div class="form-check-inline">
                                    <label for="trip_1" class="form-check-label">
                                        <input id="ifp_1" type="radio" class="form-check-input" name="ifp" value="1" @if(old('ifp', $review->ifp) == 1) checked @endif>
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label for="trip_0" class="form-check-label">
                                        <input id="ifp_0" type="radio" class="form-check-input" name="ifp" value="0" @if(old('ifp', $review->ifp) == 0) checked @endif>
                                        No
                                    </label>
                                </div>
                                @error('ifp')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="trip" class="col-form-label col-sm-3">Readiness Level</label>
                            <div class="col-sm-9">
                                <select id="readiness_level_id" name="readiness_level_id" class="form-control">
                                    <option value="" selected disabled>Select Readiness Level</option>
                                    @foreach($readiness_levels as $option)
                                        <option value="{{ $option->id }}" @if(old('readiness_level_id', $review->readiness_level_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                    @endforeach
                                </select>
                                @error('readiness_level_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-form-label col-sm-3">Comments</label>
                            <div class="col-sm-9">
                                <textarea id="comments" name="comments" rows="4" class="form-control" placeholder="Any comment...">{{ old('comments', $review->comments) }}</textarea>
                                @error('comments')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col pb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('reviews.index') }}" class="btn">Back to List</a>
                </div>

            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        let targetUrl = "{{ route('projects.show', $project) }}";
        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=0,height=0,left=-1000,top=-1000`;

        function openPopup() {
            window.open(targetUrl, "{{ $project->title }}", params);
        }
    </script>
@endpush
