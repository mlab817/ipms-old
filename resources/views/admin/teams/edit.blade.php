@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Team</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.teams.index') }}">Teams</a></li>
                        <li class="breadcrumb-item active">Edit Team</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('admin.teams.update', $team) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $team->id }}">
                        <div class="form-group">
                            <label for="name" class="required">Name </label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Admin" value="{{ old('name', $team->name) }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="required">Description </label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Short description" value="{{ old('description', $team->description) }}">
                            @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="owner_id" class="required">Owner </label>
                            <select id="owner_id" name="owner_id" class="form-control">
                                <option value="" selected disabled>Select Owner</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($user->id == old('owner_id', $team->owner_id)) selected @endif>{{ $user->name . '(' . $user->email . ')' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="users" class="required">Members </label>
                            @foreach ($users as $option)
                                <div class="form-check">
                                    <label for="user_{{ $option->id }}" class="form-check-label">
                                        <input id="user_{{ $option->id }}" name="users[]" type="checkbox" class="form-check-input" value="{{ $option->id }}" @if(in_array($option->id, old('users', $team->users->pluck('id')->toArray() ?? []) ?? [])) checked @endif>
                                        {{ $option->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col">
                            <div class="row justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn mr-2" href="{{ route('admin.teams.index') }}">Back to List</a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('modal')
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                    <form action="{{ route('admin.teams.destroy', $team) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
