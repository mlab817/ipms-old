<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    @favicon

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @livewireStyles
    @yield('styles')
</head>
<body>

@include('includes.header')

<div class="Layout">
    <div class="Layout-main">
        @yield('content')
    </div>
    <div class="Layout-sidebar border" style="min-height: calc(100vh - 64px);">
        @include('includes.sidebar')
    </div>
</div>

{{--<div class="Layout color-bg-tertiary">--}}
{{--    <div class="Layout-main">--}}
{{--        @yield('content')--}}
{{--    </div>--}}

{{--    <div class="Layout-sidebar color-bg-canvas border-right">--}}
{{--        @include('includes.sidebar')--}}
{{--    </div>--}}
{{--</div>--}}

<script src="{{ mix('js/app.js') }}"></script>
@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
@stack('scripts')

</body>
</html>
