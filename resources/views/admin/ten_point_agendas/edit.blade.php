@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Ten Point Agenda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.ten_point_agendas.index') }}">Ten Point Agenda</a></li>
                        <li class="breadcrumb-item active">Edit Ten Point Agenda</li>
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
                <form action="{{ route('admin.ten_point_agendas.update', $tenPointAgenda) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name" id="name" placeholder="Name" value="{{ old('name', $tenPointAgenda->name) }}">
                            @error('name')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <textarea class="form-control @error('description'){{ 'is-invalid' }}@enderror" name="name" id="description" placeholder="Description">{{ old('description', $tenPointAgenda->description) }}</textarea>
                            @error('description')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col">
                            <div class="row justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn mr-2" href="{{ route('admin.ten_point_agendas.index') }}">Back to List</a>
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
                    <form action="{{ route('admin.ten_point_agendas.destroy', $tenPointAgenda) }}" method="POST">
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
