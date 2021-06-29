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

    <main>
        <div class="container-md my-6 px-3 px-md-4 px-lg-5">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>
