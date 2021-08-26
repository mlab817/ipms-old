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

                    <li data-tab-item="org-header-projects-tab" class="d-flex js-responsive-underlinenav-item">
                        <a class="UnderlineNav-item @if($route == 'offices.show') selected @endif" href="{{ route('offices.show', $office) }}">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                 height="16" width="16" class="octicon octicon-project UnderlineNav-octicon">
                                <path fill-rule="evenodd"
                                      d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                            </svg>
                            Overview
                        </a>
                    </li>

                    <li data-tab-item="org-header-people-tab" class="d-flex js-responsive-underlinenav-item">
                        <a class="UnderlineNav-item @if($route == 'offices.projects') selected @endif" href="{{ route('offices.projects', $office) }}">
                            <svg aria-hidden="true" role="img" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo UnderlineNav-octicon">
                                <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                            </svg>
                            Projects
                            <span title="Not available"
                                  class="Counter js-profile-member-count">{{ $office->projects->count() }}</span>
                        </a>
                    </li>

                    <li data-tab-item="org-header-people-tab" class="d-flex js-responsive-underlinenav-item">
                        <a class="UnderlineNav-item @if($route == 'offices.users') selected @endif" href="{{ route('offices.users', $office) }}">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                 height="16" width="16" class="octicon octicon-person UnderlineNav-octicon">
                                <path fill-rule="evenodd"
                                      d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                            </svg>
                            Users
                            <span title="Not available"
                                  class="Counter js-profile-member-count">{{ $office->users->count() }}</span>
                        </a>
                    </li>

                    <li data-tab-item="org-header-settings-tab" class="d-flex js-responsive-underlinenav-item">
                        <a class="UnderlineNav-item " href="/organizations/da-pms/settings/profile">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                 height="16" width="16" class="octicon octicon-gear UnderlineNav-octicon">
                                <path fill-rule="evenodd"
                                      d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
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
