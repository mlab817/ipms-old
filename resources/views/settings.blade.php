@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
        'breadcrumbs' => [
            'Dashboard' => route('dashboard'),
            'Settings' => null
        ]
    ])
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Profile</strong>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2">
                    Name
                </label>
                <div class="col-sm-10">
                    {{ $user->name }}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">
                    Email
                </label>
                <div class="col-sm-10">
                    {{ $user->email }}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">
                    Office
                </label>
                <div class="col-sm-10">
                    {{ $user->office->name ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">
                    Date Joined
                </label>
                <div class="col-sm-10">
                    {{ $user->created_at->format('M d, Y') }}
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Roles &amp; Permissions</strong>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2">
                    Roles
                </div>
                <div class="col-sm-10">
                    @foreach($user->roles as $role)
                        <span class="badge badge-info">
                            {{ $role->name }}
                        </span>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    Permissions
                </div>
                <div class="col-sm-10">
                    @foreach($user->getAllPermissions() as $perm)
                        <span class="badge badge-info">
                            {{ $perm->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Horizontal Form -->
    <div class="card">
        <div class="card-header">
            <strong>Change Password</strong>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('password.change') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="********" name="password">
                            @error('password')<span class="text invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Retype Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPassword3" placeholder="********" name="password_confirmation">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Change Password</button>
                </form>
            </div>
    </div>
@endsection
