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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
    </section>

    <section class="content">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Horizontal Form -->
        <div class="card card-info">
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
                    <button type="submit" class="btn btn-info">Change Password</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>

{{--        <!-- Horizontal Form -->--}}
{{--        <div class="card card-danger">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">Logout Other Devices</h3>--}}
{{--            </div>--}}
{{--            <!-- /.card-header -->--}}

{{--            <!-- form start -->--}}
{{--            <form class="form-horizontal" action="{{ route('logout_other_devices') }}" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <p>To ensure security of your account, you may logout other devices logged in by pressing the button below.</p>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-2 col-form-label" for="password_logout">--}}
{{--                            Password--}}
{{--                        </label>--}}
{{--                        <div class="col-sm-10">--}}
{{--                            <input id="password_logout" class="form-control @error('password_logout') is-invalid @enderror" type="password" name="password_logout" placeholder="********" >--}}
{{--                            @error('password_logout')<span class="error invalid-feedback">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--                <div class="card-footer">--}}
{{--                    <button type="submit" class="btn btn-danger">Logout Other Devices</button>--}}
{{--                </div>--}}
{{--                <!-- /.card-footer -->--}}
{{--            </form>--}}
{{--        </div>--}}
    </section>
@endsection
