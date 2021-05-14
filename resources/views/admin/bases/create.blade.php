@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Implementation Basis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.bases.index') }}">Bases for Implementation</a></li>
                        <li class="breadcrumb-item active">Add Implementation Basis</li>
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
                <form action="{{ route('admin.bases.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="required">Name </label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('label') is-invalid @enderror" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                            @error('label')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-between mx-0">
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.bases.index') }}" class="btn mr-2">Back to List</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
