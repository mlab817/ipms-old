<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @livewireStyles
    @yield('styles')
</head>
<body>

@include('includes.header')

<script src="{{ mix('js/app.js') }}"></script>
@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
@stack('scripts')

</body>
</html>
