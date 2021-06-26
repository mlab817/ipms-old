@extends('layouts.auth')

@section('content')
    <div class="col-12">
        <div class="text-center">
            <h1 class="sign-in-header p-0">Sign in to {{ config('app.name','Laravel') }}</h1>
        </div>

        <div class="px-3">
            <!-- /.login-logo -->
            <div class="Box mt-3">

                <div class="Box-body color-bg-tertiary">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group mt-0 @error('email') errored @enderror">
                            <div class="form-group-header">
                                <label for="email">Email address or username</label>
                            </div>
                            <div class="form-group-body">
                                <input
                                    class="form-control input-block"
                                    type="text"
                                    name="email"
                                    value="{{ old('email') }}"
                                    id="email"
                                    aria-describedby="email-validation"
                                    tabindex="1"
                                    autofocus
                                />
                            </div>
                            @error('email')
                            <p class="note error" id="email-validation">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group @error('password') errored @enderror">
                            <div class="form-group-header">
                                <label for="password">Password</label>

                                <!-- /.social-auth-links -->
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="label-link float-right">Forgot password?</a>
                                @endif
                            </div>
                            <div class="form-group-body">
                                <input
                                    class="form-control input-block"
                                    type="password"
                                    name="password"
                                    value="{{ old('password') }}"
                                    id="password"
                                    aria-describedby="password-validation"
                                    tabindex="2"
                                />
                            </div>
                            @error('password')
                            <p class="note error" id="password-validation">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- /.col -->
                        <button type="submit" class="btn btn-primary btn-block" tabindex="3">Sign In</button>
                        <!-- /.col -->
                    </form>

                </div>
                <!-- /.Box-body -->
            </div>
            <!-- /.Box -->

        </div>

    </div>
    <!-- /.login-box -->

@endsection
