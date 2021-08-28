@php
    $route = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @favicon

    <link href="https://unpkg.com/@github/details-dialog-element/dist/index.css" rel="stylesheet" />

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @livewireStyles
    @yield('styles')
</head>
<body>

@include('includes.header')

<header class="border-bottom-0 pt-0 mb-4">

    <div class="container-lg pt-4 pt-lg-0 p-responsive clearfix">

        <div class="d-flex flex-wrap flex-items-start flex-md-items-center my-3">
            <div class="mr-3 mb-md-0 mr-md-4">
                <img itemprop="image" class="avatar flex-shrink-0 mb-1" src="{{ Storage::url($office->logo) }}"
                     width="100" height="100" alt="{{ $office->acronym }}">
                <details class="details-reset details-overlay details-overlay-dark">
                    <summary class="btn btn-block" aria-haspopup="dialog" role="button">
                        Upload
                    </summary>
                    <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                        <div class="Box-header">
                            <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                    aria-label="Close dialog" data-close-dialog>
                                <!-- <%= octicon "x" %> -->
                                <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12"
                                     height="16" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
                                </svg>
                            </button>
                            <h3 class="Box-title">Upload/Update Logo</h3>
                        </div>
                        <form action="{{ route('offices.update', $office) }}" method="POST" accept-charset="UTF-8"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="Box-body overflow-auto">
                                <p>
                                    <label for="">Select Logo</label>
                                </p>
                                <input type="file" class="form-control-file" name="logo" accept="image/*" required>
                            </div>
                            <div class="Box-footer">
                                <button type="submit" role="button" class="btn btn-block">Upload</button>
                            </div>
                        </form>
                    </details-dialog>
                </details>
            </div>
            <div class="flex-1">
                <h1 class="h2 lh-condensed">
                    {{ $office->name }}
                </h1>

                <div class="color-text-tertiary">
                    <div></div>
                </div>

                <div class="d-md-flex flex-items-center mt-2">

                </div>
            </div>

            <div class="flex-self-start mt-3">

            </div>
        </div>
    </div>

    <div class="position-relative">
        <nav
            class="js-profile-tab-count-container UnderlineNav hx_UnderlineNav js-responsive-underlinenav overflow-visible"
            data-url="/users/da-pms/tab_counts" aria-label="Organization">
            <div class="width-full d-flex position-relative container-lg">
                <ul class="list-style-none UnderlineNav-body width-full p-responsive overflow-hidden">

                    <li class="d-flex">
                        <a class="UnderlineNav-item @if($route == 'offices.index') selected @endif" href="{{ route('offices.index', $office) }}">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-home UnderlineNav-octicon">
                                <path fill-rule="evenodd" d="M8.156 1.835a.25.25 0 00-.312 0l-5.25 4.2a.25.25 0 00-.094.196v7.019c0 .138.112.25.25.25H5.5V8.25a.75.75 0 01.75-.75h3.5a.75.75 0 01.75.75v5.25h2.75a.25.25 0 00.25-.25V6.23a.25.25 0 00-.094-.195l-5.25-4.2zM6.906.664a1.75 1.75 0 012.187 0l5.25 4.2c.415.332.657.835.657 1.367v7.019A1.75 1.75 0 0113.25 15h-3.5a.75.75 0 01-.75-.75V9H7v5.25a.75.75 0 01-.75.75h-3.5A1.75 1.75 0 011 13.25V6.23c0-.531.242-1.034.657-1.366l5.25-4.2h-.001z"></path>
                            </svg>
                            Overview
                        </a>
                    </li>

                    <li class="d-flex">
                        <a class="UnderlineNav-item @if($route == 'offices.projects') selected @endif" href="{{ route('offices.projects', $office) }}">
                            <svg aria-hidden="true" role="img" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo UnderlineNav-octicon">
                                <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                            </svg>
                            Projects
                            <span title="Not available"
                                  class="Counter">{{ $office->projects->count() }}</span>
                        </a>
                    </li>

                    <li class="d-flex">
                        <a class="UnderlineNav-item @if($route == 'offices.users') selected @endif" href="{{ route('offices.users', $office) }}">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                 height="16" width="16" class="octicon octicon-person UnderlineNav-octicon">
                                <path fill-rule="evenodd"
                                      d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                            </svg>
                            Users
                            <span title="Not available"
                                  class="Counter">{{ $office->users->count() }}</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

</header>

<div class="container-lg p-responsive clearfix mb-5">
    <!-- Left side -->
    <div class="col-12 col-md-8 d-md-inline-block">
        @yield('content')
    </div>
    <!--./ Left side -->

    <!-- Right side -->
    <div class="col-12 col-md-4 pl-md-4 float-right">

        <div class="Box mb-3">
            <div class="Box-body">
                    <span class="d-block color-text-primary">
                        <span class="float-right f5 color-text-secondary">
                            <span class="Label">{{ $office->users->count() }}</span>
                        </span>
                        <h4 class="f4 text-normal mb-3">Users</h4>
                    </span>
                <div class="clearfix d-flex flex-wrap" style="margin: -1px">
                    @foreach($office->users as $user)
                        <a class="member-avatar"
                           href="{{ route('users.show', $user) }}">
                                <span class="tooltipped tooltipped-nw" aria-label="{{ $user->full_name }}">
                                    <img class="avatar avatar-user" src="{{ $user->user_avatar() }}" width="48" height="48" alt="{{ '@' . $user->username }}">
                                </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--./ Right side -->

</div>

<script src="{{ mix('js/app.js') }}"></script>
@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
@stack('scripts')

</body>
</html>
