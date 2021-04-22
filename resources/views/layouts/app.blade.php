<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            @include('partials.navbar')

            @include('partials.sidebar')

            <div class="content-wrapper">

                @include('partials.header', ['pageTitle' => $pageTitle ?? 'Page Title',])

                <section class="content">

                    <div class="container-fluid">

                        @yield('content')

                    </div>

                </section>

            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.0-alpha
                </div>
                <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
            </footer>

        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        @stack('scripts')
    </body>
</html>
