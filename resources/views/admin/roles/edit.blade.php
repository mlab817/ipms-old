@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $pageTitle }}</h3>
                </div>
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <div class="form-group">
                            <label for="name">Name <i class="text-danger fas fa-flag"></i></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Admin" value="{{ old('name', $role->name) }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="guard_name">Guard Name <i class="text-danger fas fa-flag"></i></label>
                            <select class="form-control @error('guard_name') is-invalid @enderror" name="guard_name" id="guard_name">
                                @foreach ($guards as $key => $guard)
                                    <option value="{{ $key }}" @if(old('guard_name', $role->guard_name) == $key) selected @endif>{{ $guard }}</option>
                                @endforeach
                            </select>
                            @error('email')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="permissions">Permissions <i class="text-danger fas fa-flag"></i></label>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <label for="permission_{{ $permission->id }}" class="form-check-label">
                                        <input id="permission_{{ $permission->id }}" name="permissions[]" type="checkbox" class="form-check-input" value="{{ $permission->id }}" @if(in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()) ?? [])) checked @endif>
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn mr-2">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
