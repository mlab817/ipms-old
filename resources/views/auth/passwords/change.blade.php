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
                                <span class="fas fa-lock"></span>
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
                                <span class="fas fa-lock"></span>
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
