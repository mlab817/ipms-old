@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.infrastructure_subsectors.update', $infrastructure_subsector->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name" id="name" placeholder="Name" value="{{ old('name', $infrastructure_subsector->name) }}">
                            @error('name')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="infrastructure_sector_id">Infrastructure Sector</label>
                            <select class="form-control" name="infrastructure_sector_id" id="infrastructure_sector_id">
                                <option value="" selected disabled>Select Infrastructure Sector</option>
                                @foreach($infrastructure_sectors as $option)
                                    <option value="{{ $option->id }}" @if(old('infrastructure_sector_id', $infrastructure_subsector->infrastructure_sector_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                @endforeach
                            </select>
                            @error('infrastructure_sector_id')<div class="text-sm text-red py-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn mr-2" href="{{ route('admin.infrastructure_subsectors.index') }}">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
