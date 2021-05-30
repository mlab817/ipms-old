@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Operating Unit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.operating_unit_types.index') }}">Operating Units</a></li>
                        <li class="breadcrumb-item active">Add Operating Unit</li>
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
                <form action="{{ route('admin.operating_units.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="operating_unit_type_id">OU Type</label>
                            <select class="form-control @error('operating_unit_type_id'){{ 'is-invalid' }}@enderror" name="operating_unit_type_id" id="operating_unit_type_id">
                                <option value="" selected disabled>Select Type</option>
                                @foreach($operating_unit_types as $option)
                                    <option value="{{ $option->id }}" @if(old('operating_unit_type_id') == $option->id) selected @endif>{{ $option->name }}</option>
                                @endforeach
                            </select>
                            @error('operating_unit_type_id')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Logo</label>
                            <input type="file" class="form-control @error('image'){{ 'is-invalid' }}@enderror" name="image" id="image">
                            @error('image')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('admin.operating_units.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
