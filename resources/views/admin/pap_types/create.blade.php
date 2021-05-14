@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add PAP Type</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pap_types.index') }}">PAP Types</a></li>
                        <li class="breadcrumb-item active">Add PAP Type</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.pap_types.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="required">Name</label>
                            <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control @error('description'){{ 'is-invalid' }}@enderror" name="description" id="description" placeholder="Description" value="{{ old('description') }}">
                            @error('description')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('admin.pap_types.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
