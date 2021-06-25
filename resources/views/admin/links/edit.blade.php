@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
        'breadcrumbs' => [
            'Dashboard' => route('dashboard'),
            'Admin' => route('admin.index'),
            'Links' => route('links.index'),
            'Edit' => null
]
    ])
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.links.update', $link) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="required">Title</label>
                            <input type="text" class="form-control @error('title'){{ 'is-invalid' }}@enderror" name="title" id="title" placeholder="Title" value="{{ old('title', $link->title) }}">
                            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="required">Description</label>
                            <textarea class="form-control @error('description'){{ 'is-invalid' }}@enderror" name="description" id="description" placeholder="Description">{{ old('description', $link->description) }}</textarea>
                            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="name" class="required">URL Address</label>
                            <input class="form-control @error('url'){{ 'is-invalid' }}@enderror" name="url" id="url" placeholder="URL Address" value="{{ old('url', $link->url) }}">
                            @error('url')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col">
                            <div class="row justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn mr-2" href="{{ route('links.index') }}">Back to List</a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('modal')
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                    <form action="{{ route('admin.links.destroy', $link) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
