@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Link</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.links.index') }}">Links</a></li>
                        <li class="breadcrumb-item active">Add Link</li>
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
                <form action="{{ route('admin.links.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="required">Title</label>
                            <input type="text" class="form-control @error('title'){{ 'is-invalid' }}@enderror" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                            @error('title')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="required">Description</label>
                            <textarea class="form-control @error('description'){{ 'is-invalid' }}@enderror" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="required">URL Address</label>
                            <input class="form-control @error('url'){{ 'is-invalid' }}@enderror" name="url" id="url" placeholder="URL Address" value="{{ old('url') }}">
                            @error('url')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('admin.links.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
