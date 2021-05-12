@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $pageTitle }}</h3>
                </div>
                <form action="{{ route('admin.regions.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="label">Label</label>
                            <input class="form-control @error('label') is-invalid @enderror" type="text" name="label" id="label" placeholder="Label" value="{{ old('label') }}">
                            @error('label')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input class="form-control @error('order') is-invalid @enderror" type="number" name="order" id="order" placeholder="Order" value="{{ old('order') }}">
                            @error('order')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.regions.index') }}" class="btn mr-2">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
