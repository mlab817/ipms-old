@extends('layouts.auth')

@section('content')
    <div class="col-12">
        <div class="text-center">
            <h1 class="sign-in-header p-0">{{ __('Reset your password') }}</h1>
        </div>

        <div class="px-3">
            <!-- /.login-logo -->
            <div class="Box mt-3">
                <div class="Box-body color-bg-tertiary">
                    @if (session('status'))
                        <div class="flash my-3 flash-success" role="alert">
                            <!-- <%= octicon "shield-check" %> -->
                            <svg class="octicon octicon-shield-check v-align-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9275 3.55567C11.9748 3.54134 12.0252 3.54134 12.0725 3.55567L19.3225 5.75264C19.4292 5.78497 19.5 5.88157 19.5 5.99039V11C19.5 13.4031 18.7773 15.3203 17.5164 16.847C16.246 18.3853 14.3925 19.5706 12.0703 20.4278C12.0253 20.4444 11.9746 20.4444 11.9297 20.4278C9.60747 19.5706 7.75398 18.3853 6.48358 16.847C5.2227 15.3203 4.5 13.4031 4.5 11L4.5 5.9904C4.5 5.88158 4.57082 5.78496 4.6775 5.75264L11.9275 3.55567ZM12.5075 2.12013C12.1766 2.01985 11.8234 2.01985 11.4925 2.12013L4.24249 4.3171C3.50587 4.54032 3 5.21807 3 5.9904L3 11C3 13.7306 3.83104 15.9908 5.32701 17.8022C6.81347 19.6021 8.91996 20.9157 11.4102 21.835C11.7904 21.9753 12.2095 21.9753 12.5897 21.835C15.08 20.9157 17.1865 19.6021 18.673 17.8022C20.169 15.9908 21 13.7306 21 11V5.99039C21 5.21804 20.4941 4.54031 19.7575 4.3171L12.5075 2.12013ZM16.2803 9.78033C16.5732 9.48744 16.5732 9.01256 16.2803 8.71967C15.9874 8.42678 15.5126 8.42678 15.2197 8.71967L11 12.9393L9.28033 11.2197C8.98744 10.9268 8.51256 10.9268 8.21967 11.2197C7.92678 11.5126 7.92678 11.9874 8.21967 12.2803L10.4697 14.5303C10.7626 14.8232 11.2374 14.8232 11.5303 14.5303L16.2803 9.78033Z"></path></svg>
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <label>
                            Enter your user account's verified email address and we will send you a password reset link.
                        </label>

                        <div class="form-group @error('email') errored @enderror">
                            <input type="email" placeholder="Enter email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                            <p class="note error" id="email-validation">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
