@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Change Project Owner</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Manage Projects</a></li>
                        <li class="breadcrumb-item active">Change Project Owner</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.projects.changeOwner.post', $project) }}" method="POST">
                    @csrf

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="title" class="col-sm-3">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $project->title }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="office" class="col-sm-3">Office</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $project->office->name ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="former_owner" class="col-sm-3">Former Owner</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $project->creator->name ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_owner" class="col-sm-3">New Owner</label>
                            <div class="col-sm-9">
                                <select class="form-control select2 @error('user_id') is-invalid @enderror" name="user_id">
                                    <option value="" disabled selected>Select User</option>
                                    @foreach($users as $option)
                                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                        <a class="btn mr-2" href="{{ route('admin.projects.users.index', $project) }}">Back to Project</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
