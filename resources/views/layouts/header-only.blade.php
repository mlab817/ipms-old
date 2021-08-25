<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="shortcut icon" type="image/ico" href="/images/icons/favicon.ico"/>

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

    <link href="https://unpkg.com/@github/details-dialog-element/dist/index.css" rel="stylesheet" />

    @livewireStyles

    @yield('styles')
</head>
<body>
    @include('includes.header')

    @if(session()->has('error'))
        <div x-data="{ show: true }">
            <div class="flash flash-full flash-error" x-show="show">
                <div class=" px-2">
                    <button @click="show = false" class="flash-close" type="button" aria-label="Dismiss this message">
                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                            <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                        </svg>
                    </button>
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @livewireScripts
    <script defer src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
