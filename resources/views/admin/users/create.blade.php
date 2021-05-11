@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name <i class="text-danger fas fa-flag"></i></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Juan dela Cruz" value="{{ old('name') }}">
                            @error('name')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email <i class="text-danger fas fa-flag"></i></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="example@email.com">
                            @error('email')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="office_id">Office <i class="text-danger fas fa-flag"></i></label>
                            <select class="form-control select2 @error('office_id') is-invalid @enderror" name="office_id" id="office_id">
                                <option value="" selected disabled>Select Office</option>
                                @foreach($offices as $office)
                                    <option value="{{ $office->id }}" @if(old('office_id') == $office->id) selected @endif>{{ $office->name }}</option>
                                @endforeach
                            </select>
                            @error('office_id')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            @foreach ($roles as $role)
                            <div class="form-check">
                                <label for="role_{{ $role->id }}" class="form-check-label">
                                    <input id="role_{{ $role->id }}" name="roles[]" type="checkbox" class="form-check-input" value="{{ $role->id }}" @if(in_array($role->id, old('roles') ?? [])) checked @endif>
                                    {{ $role->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            @foreach ($permissions as $option)
                                <div class="form-check">
                                    <label for="permission_{{ $option->id }}" class="form-check-label">
                                        <input id="permission_{{ $option->id }}" name="permissions[]" type="checkbox" class="form-check-input" value="{{ $option->id }}" @if(in_array($option->id, old('permissions') ?? [])) checked @endif>
                                        {{ $option->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.users.index') }}" class="btn mr-2">Back to List</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
