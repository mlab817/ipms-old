@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Add User</li>
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
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name" class="required">First Name </label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name"
                                   id="first_name" placeholder="Juan" value="{{ old('first_name') }}">
                            @error('first_name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="required">Last Name </label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name"
                                   id="last_name" placeholder="dela Cruz" value="{{ old('last_name') }}">
                            @error('last_name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="example@email.com">
                            @error('email')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check-inline">
                                <label for="activated" class="check-form-label">
                                    <input type="checkbox" name="activated" id="activated" @if(old('activated'))  checked @endif }}>
                                    <span class="ml-1">Activate</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="office_id" class="required">Office </label>
                            <select class="form-control select2 @error('office_id') is-invalid @enderror" name="office_id" id="office_id">
                                <option value="" selected disabled>Select Office</option>
                                @foreach($offices as $office)
                                    <option value="{{ $office->id }}" @if(old('office_id') == $office->id) selected @endif>{{ $office->name }}</option>
                                @endforeach
                            </select>
                            @error('office_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            @foreach ($roles as $role)
                            <div class="form-check">
                                <label for="role_{{ $role->id }}" class="form-check-label">
                                    <input id="role_{{ $role->id }}" name="roles[]" type="checkbox" class="form-check-input" value="{{ $role->id }}" @if(in_array($role->id, old('roles') ?? [])) checked @endif>
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
                                        <input id="permission_{{ $option->id }}" name="permissions[]" type="checkbox" class="form-check-input permissions" value="{{ $option->id }}" @if(in_array($option->id, old('permissions') ?? [])) checked @endif>
                                        {{ $option->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.users.index') }}" class="btn mr-2">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
