@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
        'breadcrumbs' => [
            'Dashboard' => route('dashboard'),
            'Admin' => route('admin.index'),
            'Links' => route('links.index'),
            'Create' => null
]
    ])
@stop

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
                            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="required">Description</label>
                            <textarea class="form-control @error('description'){{ 'is-invalid' }}@enderror" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="required">URL Address</label>
                            <input class="form-control @error('url'){{ 'is-invalid' }}@enderror" name="url" id="url" placeholder="URL Address" value="{{ old('url') }}">
                            @error('url')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('links.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
