@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
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
                <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <div class="form-group">
                            <label for="name" class="required">Name </label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Admin" value="{{ old('name', $role->name) }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="guard_name" class="required">Guard Name </label>
                            <select class="form-control @error('guard_name') is-invalid @enderror" name="guard_name" id="guard_name">
                                @foreach ($guards as $key => $guard)
                                    <option value="{{ $key }}" @if(old('guard_name', $role->guard_name) == $key) selected @endif>{{ $guard }}</option>
                                @endforeach
                            </select>
                            @error('email')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description </label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Description" value="{{ old('description', $role->description) }}">
                            @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="permissions" class="required">Permissions </label>
                            <div class="row">
                                <button type="button" id="check" class="btn btn-flat btn-sm btn-secondary">Check All</button>
                                <button type="button" id="uncheck" class="btn btn-flat btn-sm btn-danger">Clear</button>
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <label for="permission_{{ $permission->id }}" class="form-check-label">
                                        <input id="permission_{{ $permission->id }}" name="permissions[]" type="checkbox" class="form-check-input permissions" value="{{ $permission->id }}" @if(in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()) ?? [])) checked @endif>
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-between mx-0">
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.roles.index') }}" class="btn mr-2">Back to List</a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                    Delete
                                </button>
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
                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
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

@push('scripts')
    <script>
        $('#check').click(function() {
            let checkPermissions = $('.permissions')
            checkPermissions.attr({ checked: true })
        })

        $('#uncheck').click(function() {
            let checkPermissions = $('.permissions')
            checkPermissions.attr({ checked: false })
        })
    </script>
@endpush
