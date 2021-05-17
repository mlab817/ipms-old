@php
    $error_number = 403;
@endphp

@php
    $default_error_message = "Please <a href='javascript:history.back()''>go back</a> or return to <a href='".url('')."'>our homepage</a>.";
@endphp

@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row align-items-center" style="min-height: calc(100vh - 100px);">
                <div class="error-page">
                    <h2 class="headline text-danger"> {{ $error_number }}</h2>

                    <div class="error-content">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Forbidden
                        </h3>

                        <p>
                            {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
                            Meanwhile, you may <a href="{{ route('dashboard') }}">return to dashboard</a>. Or click
                            <a href="{{ URL::previous() }}">here</a> to go back to previous page.
                        </p>
                        <p>
                            If you think this is a mistake, take a screenshot of this page and email to <strong>{{ config('ipms.email') }}</strong> along
                            with the expected behavior.
                        </p>

                    </div>
                    <!-- /.error-content -->
                </div>
            </div>
        </div>

    </section>

@endsection
