@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Permission</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                        <li class="breadcrumb-item active">Add Permission</li>
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
                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <p class="text-info">
                            <i class="fas fa-info"></i>
                            Note: Use plural for models for consistent naming convention.
                        </p>

                        <div class="form-group">
                            <label for="name" class="required">Name </label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Admin" value="{{ old('name') }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="guard_name" class="required">Guard Name </label>
                            <select class="form-control @error('guard_name') is-invalid @enderror" name="guard_name" id="guard_name">
                                @foreach ($guards as $guard)
                                    <option value="{{ $guard }}" @if(old('guard_name') == $guard) selected @endif>{{ $guard }}</option>
                                @endforeach
                            </select>
                            @error('guard_name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description </label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Description" value="{{ old('description') }}">
                            @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
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
