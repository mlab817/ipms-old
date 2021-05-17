@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Project Access</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Manage Projects</a></li>
                        <li class="breadcrumb-item active">Manage Project Access</li>
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
                <form action="{{ route('admin.projects.users.store', $project->uuid) }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="user_id" class="col-form-label col-sm-3">Project</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" disabled name="project" value="{{ $project->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-form-label col-sm-3">User</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('user_id'){{ 'is-invalid' }}@enderror" name="user_id" id="user_id">
                                    <option value="" disabled selected>Select user</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permissions" class="col-form-label col-sm-3">Permissions</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <label for="read" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="read" id="read" value="1">
                                        Read
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="update" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="update" id="update" value="1">
                                        Update
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="delete" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="delete" id="delete" value="1">
                                        Delete
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="review" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="review" id="review" value="1">
                                        Review
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label for="comment" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="comment" id="comment" value="1">
                                        Comment
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('admin.projects.users.index', $project) }}">Back to Project</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
