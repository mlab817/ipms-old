@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">
                    <h1 class="card-title">Profile</h1>
                </div>
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

        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">
                    <h1 class="card-title">Roles &amp; Permissions</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-2">
                        Roles
                    </div>
                    <div class="col-sm-10">
                        @foreach($user->roles as $role)
                            <span class="badge bg-info">
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
                            <span class="badge bg-info">
                                {{ $perm->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Horizontal Form -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form class="form-horizontal" action="{{ route('password.change') }}" method="POST">
                @csrf
                <div class="card-body">
{{--                    <div class="form-group row">--}}
{{--                        <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>--}}
{{--                        <div class="col-sm-10">--}}
{{--                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" placeholder="********" name="current_password">--}}
{{--                            @error('current_password')<span class="text invalid-feedback">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
{{--                    <div class="form-group row">--}}
{{--                        <div class="offset-sm-2 col-sm-10">--}}
{{--                            <div class="form-check">--}}
{{--                                <label class="form-check-label" for="logout_other_devices">--}}
{{--                                <input type="checkbox" class="form-check-input" id="logout_other_devices" name="logout_other_devices" value="1">--}}
{{--                                    Logout Other Devices--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>

    </section>
@endsection
