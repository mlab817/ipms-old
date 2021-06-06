@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name" class="required">First Name </label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name"
                                   id="first_name" placeholder="Juan" value="{{ old('first_name', $user->first_name) }}">
                            @error('first_name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="required">Last Name </label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name"
                                   id="last_name" placeholder="dela Cruz" value="{{ old('last_name', $user->last_name) }}">
                            @error('last_name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="required">Email <small>(Email can no longer be modified.)</small> </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   id="email" value="{{ old('email', $user->email) }}" disabled>
                            @error('email')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="office_id" class="required">Office </label>
                            <select class="form-control @error('office_id') is-invalid @enderror" name="office_id" id="office_id">
                                <option value="" selected disabled>Select Office</option>
                                @foreach($offices as $office)
                                    <option value="{{ $office->id }}" @if(old('office_id', $user->office_id) == $office->id) selected @endif>{{ $office->name }}</option>
                                @endforeach
                            </select>
                            @error('office_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check-inline">
                                <label for="activated" class="check-form-label">
                                    <input type="checkbox" name="activated" id="activated" @if(old('activated', !is_null($user->activated_at)))  checked @endif }}>
                                    <span class="ml-1">Activate</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <label for="role_{{ $role->id }}" class="form-check-label">
                                        <input id="role_{{ $role->id }}" name="roles[]" type="checkbox"
                                               class="form-check-input" value="{{ $role->id }}"
                                               @if(in_array($role->id, old('roles', $user->assigned_roles->pluck('id')->toArray()) ?? [])) checked @endif>
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="permissions" class="required">Permissions</label>
                            <div class="row">
                                <button type="button" id="check" class="btn btn-flat btn-sm btn-secondary">Check All</button>
                                <button type="button" id="uncheck" class="btn btn-flat btn-sm btn-danger">Clear</button>
                            </div>
                            @foreach ($permissions->sortBy('name', -1) as $option)
                                <div class="form-check">
                                    <label for="permission_{{ $option->id }}" class="form-check-label">
                                        <input id="permission_{{ $option->id }}" name="permissions[]" type="checkbox" class="form-check-input permissions" value="{{ $option->id }}" @if(in_array($option->id, old('permissions', $user->permissions->pluck('id')->toArray() ?? []) ?? [])) checked @endif>
                                        {{ $option->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn mr-2" href="{{ route('admin.users.index') }}">Back to List</a>
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
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <label class="col-form-label required" for="reason">Reason for deletion</label>
                        <input type="text" id="reason" name="reason" class="form-control" placeholder="Reason for deletion (e.g. inactive, unauthorized, change of focal)" required autofocus>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>
                </form>
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
