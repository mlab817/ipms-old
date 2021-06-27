<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <title></title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    @livewireStyles
</head>
<body>

    @yield('content')

    @livewireScripts
</body>
</html>




{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/apple-touch-icon.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">--}}
{{--    <link rel="manifest" href="{{ asset('images/icons/site.webmanifest') }}">--}}
{{--    <link rel="mask-icon" href="{{ asset('images/icons/safari-pinned-tab.svg') }}" color="#5bbad5">--}}
{{--    <meta name="msapplication-TileColor" content="#da532c">--}}
{{--    <meta name="theme-color" content="#ffffff">--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />--}}

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" />--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs4/2.2.7/responsive.bootstrap4.css" integrity="sha512-9pGwjtjILp7Jzd6yowqHDoDl4YgwA4K0HlN9+r9dYG2V4GhhE8yfYKA/NwsGX1QrF96/RT8BD6NGv1A1wdAjBQ==" crossorigin="anonymous" />--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">--}}

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A==" crossorigin="anonymous" />--}}

{{--    <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}
{{--    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">--}}

{{--    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />--}}

{{--    @stack('styles')--}}

{{--    @livewireStyles--}}
{{--</head>--}}
{{--<body class="c-app" style="height: auto;">--}}

{{--    @include('includes.sidebar')--}}

{{--    <div class="c-wrapper c-fixed-components">--}}
{{--        @include('includes.header')--}}

{{--        <div class="c-body">--}}
{{--            <main class="c-main">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="fade-in">--}}
{{--                        @yield('content')--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </main>--}}

{{--            @include('includes.footer')--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @yield('modal')--}}

{{--    <!-- jQuery -->--}}
{{--    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>--}}
{{--    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>--}}
{{--    <!-- Bootstrap 4 -->--}}
{{--    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--    <!-- DataTables  & Plugins -->--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.10.24/dataTables.bootstrap4.min.js" integrity="sha512-NQ2u+QUFbhI3KWtE0O4rk855o+vgPo58C8vvzxdHXJZu6gLu2aLCCBMdudH9580OmLisCC1lJg2zgjcJbnBMOQ==" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.2.7/dataTables.responsive.min.js" integrity="sha512-4ecidd7I1XWwmLVzfLUN0sA0t2It86ti4qwPAzXW7B0/yIScpiOj7uyvFgu/ieGTEFjO5Ho98RZIqt75+ZZhdA==" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs4/2.2.7/responsive.bootstrap4.min.js" integrity="sha512-OiHNq9acGP68tNJIr1ctDsYv7c2kuEVo2XmB78fh4I+3Wi0gFtZl4lOi9XIGn1f1SHGcXGhn/3VHVXm7CYBFNQ==" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/1.7.0/js/dataTables.buttons.min.js" integrity="sha512-EzaqIDcdBg8g037o9E12U69oY/mfHffJJzUtB6dgd67AB4IXkMi1/7WY6og4fKSVXtqqt35S/R5ClqNHjSIH4g==" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>--}}
{{--    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>--}}
{{--    <!-- AdminLTE App -->--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js" integrity="sha512-AJUWwfMxFuQLv1iPZOTZX0N/jTCIrLxyZjTRKQostNU71MzZTEPHjajSK20Kj1TwJELpP7gl+ShXw5brpnKwEg==" crossorigin="anonymous"></script>--}}

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.select2').select2({--}}
{{--                theme: 'bootstrap4'--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}

{{--    <!-- Chart.js -->--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
{{--    <!--/. Chart.js -->--}}

{{--    <!-- Scripts -->--}}
{{--    @stack('scripts')--}}
{{--    <!--/. Scripts -->--}}

{{--    @livewireScripts--}}
{{--</body>--}}
{{--</html>--}}
