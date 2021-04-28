@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $pageTitle }}</h3>
                </div>

                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <p class="text-info">
                            <i class="fas fa-info"></i>
                            Note: Use plural for models for consistent naming convention.
                        </p>
                        <input type="hidden" name="id" value="{{ $permission->id }}">
                        <div class="form-group">
                            <label for="name">Name <i class="text-danger fas fa-flag"></i></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Admin" value="{{ old('name', $permission->name) }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="guard_name">Guard Name <i class="text-danger fas fa-flag"></i></label>
                            <select class="form-control @error('guard_name') is-invalid @enderror" name="guard_name" id="guard_name">
                                @foreach ($guards as $guard)
                                    <option value="{{ $guard }}" @if(old('guard_name', $permission->guard_name) == $guard) selected @endif>{{ $guard }}</option>
                                @endforeach
                            </select>
                            @error('guard_name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.permissions.index') }}" class="btn mr-2">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
