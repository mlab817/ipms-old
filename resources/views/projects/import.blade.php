@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Import Project from v1</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Manage Projects</a></li>
                        <li class="breadcrumb-item active">Import Project from v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h1 class="card-title">Enter Project Id below: </h1>
                    </div>
                    <form action="{{ route('projects.import.import') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id">Project ID: </label>
                                <input type="text" name="id" id="id" class="form-control @error('id') is-invalid @enderror" value="{{ old('id') }}">
                                @error('id') <span class="error invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            <a href="{{ route('admin.projects.index') }}" class="btn">
                                Back to Projects
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
