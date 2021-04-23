@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ $route  }}" method="POST">
                    @csrf
                    @method($method)
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name" id="name" placeholder="Name" value="{{ old('name', $approval_level->name) }}">
                            @error('name')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="slug" id="slug" placeholder="Slug" value="{{ old('slug', $approval_level->slug) }}">
                            @error('slug')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('admin.approval_levels.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
