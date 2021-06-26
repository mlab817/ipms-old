@extends('layouts.auth')

@section('content')
    <div class="col-12">
        <div class="text-center">
            <h1 class="sign-in-header">{{ __('Change Password') }}</h1>
        </div>

        <div class="Box mt-3 color-bg-tertiary">

            <div class="Box-body">
                <form method="POST" action="{{ route('change_password_update') }}">
                    @csrf

                    <div class="form-group @error('password') errored @enderror">
                        <div class="form-group-header">
                            <label>New Password</label>
                        </div>
                        <div class="form-group-body">
                            <input type="password" placeholder="Password" class="form-control input-block" name="password" autocomplete="current-password" aria-describedby="password-validation">
                            @error('password')
                                <p class="note error" id="password-validation">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group-header">
                            <label>Confirm Password</label>
                        </div>
                        <div class="form-group-body">
                            <input type="password" placeholder="Password" class="form-control input-block" name="password_confirmation" autocomplete="current-password">
                            @error('password')
                            <p class="note error" id="password-validation">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Change Password') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
