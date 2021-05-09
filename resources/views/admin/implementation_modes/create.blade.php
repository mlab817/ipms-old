@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.implementation_modes.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
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
                        <a class="btn mr-2" href="{{ route('admin.implementation_modes.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
