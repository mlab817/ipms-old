@extends('layouts.auth')

@section('content')
    <div class="col-12">
        <div class="text-center">
            <h1 class="sign-in-header p-0">Sign in to {{ config('app.name','Laravel') }}</h1>
        </div>

        @if(session()->has('error'))
            <div x-data="{ show: true }">
                <div class="px-3" x-show="show">
                    <div class="flash my-3 flash-error ">
                        <div class="container-lg">
                            <button class="flash-close js-flash-close" type="button" aria-label="Dismiss this message" @click="show = false">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-x">
                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                </svg>
                            </button>
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="px-3">
            <!-- /.login-logo -->
            <div class="Box mt-3">

                <div class="Box-body color-bg-tertiary">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group mt-0 @error('username') errored @enderror">
                            <div class="form-group-header">
                                <label for="username">Email address or username</label>
                            </div>
                            <div class="form-group-body">
                                <input
                                    class="form-control input-block"
                                    type="text"
                                    name="username"
                                    value="{{ old('username') }}"
                                    id="username"
                                    aria-describedby="username-validation"
                                    tabindex="1"
                                    autofocus
                                />
                            </div>
                            @error('email')
                            <p class="note error" id="username-validation">{{ $message }}</p>
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

                    <div class="text-center border-bottom mt-3" style="line-height: 0.1em; margin: 10px 20px">
                        <span class="f6 color-text-secondary color-bg-tertiary" style="padding: 0 10px;">OR</span>
                    </div>

                    <a href="{{ route('auth.google') }}" role="button" type="submit" class="btn btn-danger btn-block mt-3" tabindex="3">Sign In with Google</a>

                </div>
                <!-- /.Box-body -->
            </div>
            <!-- /.Box -->

        </div>

    </div>
    <!-- /.login-box -->

@endsection
