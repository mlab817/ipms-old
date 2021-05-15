@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $pageTitle }}</h3>
                </div>
                <form action="{{ route('admin.teams.store') }}" method="POST">
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
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <label for="permission_{{ $permission->id }}" class="form-check-label">
                                        <input id="permission_{{ $permission->id }}" name="permissions[]" type="checkbox" class="form-check-input" value="{{ $permission->id }}" @if(in_array($permission->id, old('permissions') ?? [])) checked @endif>
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
