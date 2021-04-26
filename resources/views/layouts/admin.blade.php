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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body class="layout-fixed">
    <div class="wrapper">
        @include('partials.sidebar')

        @include('partials.navbar')

        <div class="content-wrapper">
            @include('partials.header', ['pageTitle' => $pageTitle ?? 'Default Page Title'])

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    @stack('scripts')
    <!--/. Scripts -->
</body>
</html>
