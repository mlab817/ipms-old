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

@include('includes.header')

<div class="Layout Layout--gutter-none" style="min-height: 100vh;">
    <div class="Layout-main color-bg-tertiary">
        <div class="px-3 px-md-4 px-lg-5 py-3 mt-3 mb-4">
            @include('includes.navigation-tab')

            @yield('content')
        </div>
    </div>

    @include('includes.sidebar')
</div>

</body>
</html>
