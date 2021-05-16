@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Operating Unit Type</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.operating_unit_types.index') }}">Operating Unit Types</a></li>
                        <li class="breadcrumb-item active">Edit Operating Unit Type</li>
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
                <form action="{{ route('admin.offices.update', $office) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="required">Name</label>
                            <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name" id="name" placeholder="Name" value="{{ old('name', $office->name) }}">
                            @error('name')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="operating_unit_id" class="required">Operating Unit</label>
                            <select class="form-control select2 @error('name'){{ 'is-invalid' }}@enderror" name="operating_unit_id" id="operating_unit_id">
                                <option value="" selected disabled>Select OU</option>
                                @foreach($operating_units as $option)
                                    <option value="{{ $option->id }}" @if(old('operating_unit_id', $office->operating_unit_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                @endforeach
                            </select>
                            @error('operating_unit_id')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="acronym" class="required">Acronym</label>
                            <input type="text" class="form-control @error('acronym'){{ 'is-invalid' }}@enderror" name="acronym" id="acronym" placeholder="Acronym" value="{{ old('acronym', $office->acronym) }}">
                            @error('acronym')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="required">Email</label>
                            <input type="email" class="form-control @error('email'){{ 'is-invalid' }}@enderror" name="email" id="email" placeholder="Email (main email only)" value="{{ old('email', $office->email) }}">
                            @error('email')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="contact_numbers" class="required">Contact Nos.</label>
                            <input type="text" class="form-control @error('contact_numbers'){{ 'is-invalid' }}@enderror" name="contact_numbers" id="contact_numbers" placeholder="Contact Nos." value="{{ old('contact_numbers', $office->contact_numbers) }}">
                            @error('contact_numbers')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="office_head_name" class="required">Name of Office Head</label>
                            <input type="text" class="form-control @error('office_head_name'){{ 'is-invalid' }}@enderror" name="office_head_name" id="office_head_name" placeholder="Name of Office Head" value="{{ old('office_head_name', $office->office_head_name) }}">
                            @error('office_head_name')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="office_head_position" class="required">Position of Office Head</label>
                            <input type="text" class="form-control @error('office_head_position'){{ 'is-invalid' }}@enderror" name="office_head_position" id="office_head_position" placeholder="Position of Office Head" value="{{ old('office_head_position', $office->office_head_position) }}">
                            @error('office_head_position')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="col">
                            <div class="row justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn mr-2" href="{{ route('admin.offices.index') }}">Back to List</a>
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
                    <form action="{{ route('admin.offices.destroy', $office) }}" method="POST">
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
