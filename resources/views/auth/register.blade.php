@extends('layouts.auth')

@section('content')
    <div class="col-12">
        <div class="text-center">
            <h1 class="sign-in-header p-0">Register to {{ config('app.name','Laravel') }}</h1>
            <p class="color-text-secondary">using email <strong>{{ $invitation->email }}</strong></p>
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
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $invitation->invitation_token }}">
                        <div class="form-group mt-0 @error('first_name') errored @enderror">
                            <div class="form-group-header">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="form-group-body">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="first_name"
                                    value="{{ old('first_name') }}"
                                    tabindex="1"
                                    autofocus
                                    aria-describedby="first-name-validation"
                                />
                                @error('first_name')
                                <p class="note error" id="first-name-validation">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-0 @error('last_name') errored @enderror">
                            <div class="form-group-header">
                                <label for="last_name">Last Name</label>
                            </div>
                            <div class="form-group-body">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="last_name"
                                    value="{{ old('last_name') }}"
                                    tabindex="2"
                                />
                                @error('last_name')
                                <p class="note error" id="last-name-validation">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group @error('password') errored @enderror">
                            <div class="form-group-header">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-group-body">
                                <input
                                    class="form-control"
                                    type="password"
                                    name="password"
                                    value=""
                                    id="password"
                                    aria-describedby="password-validation"
                                    tabindex="3"
                                />
                                @error('password')
                                <p class="note error" id="password-validation">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group @error('password') errored @enderror">
                            <div class="form-group-header">
                                <label for="password_confirmation">Confirm Password</label>
                            </div>
                            <div class="form-group-body">
                                <input
                                    class="form-control"
                                    type="password"
                                    name="password_confirmation"
                                    value=""
                                    id="password_confirmation"
                                    aria-describedby="password-validation"
                                    tabindex="4"
                                />
                            </div>
                        </div>

                        <!-- /.col -->
                        <button type="submit" class="btn btn-primary btn-block" tabindex="5">Register</button>
                        <!-- /.col -->
                    </form>

                </div>
                <!-- /.Box-body -->
            </div>
            <!-- /.Box -->

        </div>

    </div>
    <!-- /.login-box -->
@stop
