@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit PDP Indicator</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pdp_indicators.index') }}">PDP Indicators</a></li>
                        <li class="breadcrumb-item active">Edit PDP Indicator</li>
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
                <form action="{{ route('admin.pdp_indicators.update', $pdpIndicator) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name <i class="text-danger fas fa-flag"></i></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Name" value="{{ old('name', $pdpIndicator->name) }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="level">Level <i class="text-danger fas fa-flag"></i></label>
                            <select class="form-control @error('level') is-invalid @enderror" name="level" id="level">
                                <option value="" selected disabled>Select Level</option>
                                @foreach($levels as $key => $level)
                                    <option value="{{ $key }}" {{ old('level', $pdpIndicator->level) == $key ? 'selected' : '' }}>{{ $level }}</option>
                                @endforeach
                            </select>
                            @error('level')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Parent</label>
                            <select class="form-control @error('label') is-invalid @enderror" name="parent_id" id="parent_id">
                                <option value="" selected disabled>Select Parent Indicator</option>
                                @foreach($pdp_indicators as $option)
                                    <option value="{{ $option->id }}" {{ old('parent_id', $pdpIndicator->parent_id) == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                @endforeach
                                {{ old('parent_id') }}
                            </select>
                            @error('parent_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col">
                            <div class="row justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn mr-2" href="{{ route('admin.pdp_indicators.index') }}">Back to List</a>
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
                    <form action="{{ route('admin.pdp_indicators.destroy', $pdpIndicator) }}" method="POST">
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
