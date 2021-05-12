@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $pageTitle }}</h3>
                </div>
                <form action="{{ route('admin.regions.update', $region) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ old('id', $region->id) }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Name" value="{{ old('name', $region->name) }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="label">Label</label>
                            <input class="form-control @error('label') is-invalid @enderror" type="text" name="label" id="label" placeholder="Label" value="{{ old('label', $region->label) }}">
                            @error('label')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input class="form-control @error('order') is-invalid @enderror" type="number" name="order" id="order" placeholder="Order" value="{{ old('order', $region->order) }}">
                            @error('order')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-between mx-0">
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.regions.index') }}" class="btn mr-2">Back to List</a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                    Delete
                                </button>
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
                    <form action="{{ route('admin.regions.destroy', $region) }}" method="POST">
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
