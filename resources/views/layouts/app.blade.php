<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

    @yield('styles')
</head>
<body>
<div class="container clearfix">
    <div class="col-3 mx-auto" style="max-width: 320px;">
        <div class="text-center pt-5 pb-4">
            <img src="{{ asset('images/logo_with_da.svg') }}" width="48px" alt="ipms-logo">
        </div>
    </div>

    <div class="col-3 mx-auto pt-3" style="max-width: 320px;">
        @yield('content')
    </div>

    <div class="Box text-center mt-3 py-3">
        <span class="text-muted text-sm">
            &copy; 2021 Investment Programming Division
        </span>
    </div>
</div>

</body>
</html>
