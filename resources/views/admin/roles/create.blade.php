@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Regions</a></li>
                        <li class="breadcrumb-item active">Add Role</li>
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
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name <i class="text-danger fas fa-flag"></i></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Admin" value="{{ old('name') }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="guard_name">Guard Name <i class="text-danger fas fa-flag"></i></label>
                            <select class="form-control @error('guard_name') is-invalid @enderror" name="guard_name" id="guard_name">
                                @foreach ($guards as $key => $guard)
                                <option value="{{ $key }}" @if(old('guard_name') == $key) selected @endif>{{ $guard }}</option>
                                @endforeach
                            </select>
                            @error('guard_name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description </label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Description" value="{{ old('description') }}">
                            @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="permissions">Permissions <i class="text-danger fas fa-flag"></i></label>
                            <div class="row">
                                <button type="button" id="check" class="btn btn-flat btn-sm btn-secondary">Check All</button>
                                <button type="button" id="uncheck" class="btn btn-flat btn-sm btn-danger">Clear</button>
                            </div>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <label for="permission_{{ $permission->id }}" class="form-check-label">
                                        <input id="permission_{{ $permission->id }}" name="permissions[]" type="checkbox" class="form-check-input permissions" value="{{ $permission->id }}" @if(in_array($permission->id, old('permissions') ?? [])) checked @endif>
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.teams.index') }}" class="btn mr-2">Back to List</a>
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
