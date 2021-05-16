@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="card">
            <div class="card-header">{{ __('Change Password') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('change_password_update') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Change Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
