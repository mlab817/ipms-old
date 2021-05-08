<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="layout-fixed">
    <div class="wrapper" id="app">
        @include('partials.sidebar')

        @include('partials.navbar')

        <div class="content-wrapper">
            @include('partials.header', ['pageTitle' => $pageTitle ?? 'Default Page Title'])

            @yield('content')
        </div>
    </div>

    @yield('modal')

    <!-- Scripts -->
    @stack('scripts')
    <!--/. Scripts -->
</body>
</html>
