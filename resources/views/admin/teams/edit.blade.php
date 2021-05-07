@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $pageTitle }}</h3>
                </div>
                <form action="{{ route('admin.teams.update', $team) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $team->id }}">
                        <div class="form-group">
                            <label for="name">Name <i class="text-danger fas fa-flag"></i></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Admin" value="{{ old('name', $team->name) }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description <i class="text-danger fas fa-flag"></i></label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Short description" value="{{ old('description', $team->description) }}">
                            @error('description')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="owner_id">Owner <i class="text-danger fas fa-flag"></i></label>
                            <select id="owner_id" name="owner_id" class="form-control">
                                <option value="" selected disabled>Select Owner</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($user->id == old('owner_id', $team->owner_id)) selected @endif>{{ $user->name . '(' . $user->email . ')' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="users">Members <i class="text-danger fas fa-flag"></i></label>
                            @foreach ($users as $option)
                                <div class="form-check">
                                    <label for="user_{{ $option->id }}" class="form-check-label">
                                        <input id="user_{{ $option->id }}" name="users[]" type="checkbox" class="form-check-input" value="{{ $option->id }}" @if(in_array($option->id, old('users', $team->users->pluck('id')->toArray() ?? []) ?? [])) checked @endif>
                                        {{ $option->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.teams.index') }}" class="btn mr-2">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
