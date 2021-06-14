@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create PIPOL Entry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pipols.index') }}">PIPOL Tracker</a></li>
                        <li class="breadcrumb-item active">Create PIPOL Entry</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('pipols.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="pipol_code" class="col-sm-3 required">PIPOL Code</label>
                            <div class="col-sm-9">
                                <input value="{{ old('pipol_code') }}" type="text" class="form-control @error('pipol_code') is-invalid @enderror" name="pipol_code" id="pipol_code" placeholder="PIPOL Code">
                                @error('pipol_code')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project_title" class="col-sm-3 required">Project Title</label>
                            <div class="col-sm-9">
                                <input value="{{ old('project_title') }}" type="text" class="form-control @error('project_title') is-invalid @enderror" name="project_title" id="project_title" placeholder="Project Title">
                                @error('project_title')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-sm-3 required">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach($categories as $option)
                                        <option value="{{ $option }}" @if(old('category') == $option) selected @endif>{{ $option }}</option>
                                    @endforeach
                                </select>
                                @error('category')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pipol_url" class="col-sm-3 required">PIPOL URL</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="pipol_url">{{ config('ipms.pipol_base_url') }}</span>
                                    </div>
                                    <input value="{{ old('pipol_url') }}" type="text" class="form-control @error('pipol_url') is-invalid @enderror" name="pipol_url" id="pipol_url" aria-describedby="pipol_url" placeholder="Project ID">
                                    @error('pipol_url')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="submission_status" class="col-sm-3 required">Status of Submission</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('submission_status') is-invalid @enderror" name="submission_status" id="submission_status">
                                    <option value="" selected disabled>Select Submission Status</option>
                                    @foreach($submission_statuses as $option)
                                        <option value="{{ $option }}" @if(old('submission_status') == $option) selected @endif>{{ $option }}</option>
                                    @endforeach
                                </select>
                                @error('submission_status')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ipms_id" class="col-sm-3 required">IPMS Project</label>
                            <div class="col-sm-9">
                                <select class="form-control select2 @error('ipms_id') is-invalid @enderror" name="ipms_id" id="ipms_id">
                                    <option value="" selected disabled>Select IPMS Project</option>
                                    @foreach($projects as $option)
                                        <option value="{{ $option->id }}" @if(old('ipms_id') == $option->id) selected @endif>{{ $option->title }}</option>
                                    @endforeach
                                </select>
                                @error('ipms_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reason_id" class="col-sm-3 required">Reason for Dropping</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('reason_id') is-invalid @enderror" name="reason_id" id="reason_id">
                                    <option value="" selected disabled>Select Reason for Dropping</option>
                                    @foreach(\App\Models\Reason::all() as $option)
                                        <option value="{{ $option->id }}" @if(old('reason_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                    @endforeach
                                </select>
                                @error('reason_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="other_reason" class="col-sm-3 required">Other reason (pls. specify)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('other_reason') is-invalid @enderror" name="other_reason" id="other_reason" placeholder="Specify if reason is not included in the choices" value="{{ old('other_reason') }}">
                                @error('other_reason')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="remarks" class="col-sm-3">Remarks</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('remarks') is-invalid @enderror" name="remarks" id="remarks" placeholder="Remarks">{{ old('remarks') }}</textarea>
                                @error('remarks')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('pipols.index') }}" class="btn ml-1">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
