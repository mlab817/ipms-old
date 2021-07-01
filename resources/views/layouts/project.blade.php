@php
    $route = Route::currentRouteName()
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css" />
    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    @livewireStyles

    @yield('styles')
</head>
<body>

@include('includes.header')

<main>
    <div class="hx_page-header-bg pt-3 hide-full-screen mb-5">

        <div class="d-flex mb-3 px-3 px-md-4 px-lg-5">

            <div class="flex-auto min-width-0 width-fit mr-3">
                <h1 class=" d-flex flex-wrap flex-items-center break-word f3 text-normal">
                    <svg class="octicon octicon-repo color-text-secondary mr-2" viewBox="0 0 16 16" version="1.1"
                         width="16" height="16" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                    </svg>
                    <span class="author flex-self-stretch" itemprop="author">
                        <a class="url fn" rel="author" data-hovercard-type="user"
                           data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click"
                           data-octo-dimensions="link_type:self" href="{{ route('user.projects', $project->creator->username ?? '#') }}">
                            {{ $project->creator->username ?? $project->creator->first_name }}
                        </a>
                    </span>
                    <span class="mx-1 flex-self-stretch color-text-secondary">/</span>
                    <strong itemprop="name" class="mr-2 flex-self-stretch">
                        <a data-pjax="#js-repo-pjax-container" href="{{ route('projects.show', $project) }}">
                            {{ $project->title }}
                        </a>
                    </strong>

                </h1>

            </div>

        </div>

        <nav data-pjax="#js-repo-pjax-container" aria-label="Repository" data-view-component="true"
             class="js-repo-nav js-sidenav-container-pjax js-responsive-underlinenav overflow-hidden UnderlineNav px-3 px-md-4 px-lg-5">

            <ul data-view-component="true" class="UnderlineNav-body list-style-none">
                <li data-view-component="true" class="d-flex">
                    <a href="{{ route('projects.show', $project) }}" data-tab-item="i0code-tab"
                       data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches repo_packages repo_deployments /mlab817/ipms-v2"
                       data-hotkey="g c" data-ga-click="Repository, Navigation click, Code tab"
                       data-view-component="true"
                       class="UnderlineNav-item hx_underlinenav-item no-wrap js-responsive-underlinenav-item @if($route == 'projects.show') selected @endif">

                        <svg class="octicon octicon-code UnderlineNav-octicon d-none d-sm-inline" viewBox="0 0 16 16"
                             version="1.1" width="16" height="16" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M4.72 3.22a.75.75 0 011.06 1.06L2.06 8l3.72 3.72a.75.75 0 11-1.06 1.06L.47 8.53a.75.75 0 010-1.06l4.25-4.25zm6.56 0a.75.75 0 10-1.06 1.06L13.94 8l-3.72 3.72a.75.75 0 101.06 1.06l4.25-4.25a.75.75 0 000-1.06l-4.25-4.25z"></path>
                        </svg>
                        <span data-content="Code">Profile</span>
                        <span title="Not available" data-view-component="true" class="Counter"></span>

                    </a>
                </li>

                <li data-view-component="true" class="d-flex">
                    <a href="{{ route('projects.files', $project) }}" data-tab-item="i2pull-requests-tab"
                       data-selected-links="repo_pulls checks /mlab817/ipms-v2/pulls" data-hotkey="g p"
                       data-ga-click="Repository, Navigation click, Pull requests tab" data-view-component="true"
                       class="UnderlineNav-item hx_underlinenav-item no-wrap js-responsive-underlinenav-item @if($route == 'projects.files') selected @endif">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-git-pull-request UnderlineNav-octicon d-none d-sm-inline">
                            <path fill-rule="evenodd" d="M3.75 1.5a.25.25 0 00-.25.25v11.5c0 .138.112.25.25.25h8.5a.25.25 0 00.25-.25V6H9.75A1.75 1.75 0 018 4.25V1.5H3.75zm5.75.56v2.19c0 .138.112.25.25.25h2.19L9.5 2.06zM2 1.75C2 .784 2.784 0 3.75 0h5.086c.464 0 .909.184 1.237.513l3.414 3.414c.329.328.513.773.513 1.237v8.086A1.75 1.75 0 0112.25 15h-8.5A1.75 1.75 0 012 13.25V1.75z"/>
                        </svg>
                        <span data-content="Pull requests">Files</span>
                        <span title="0" hidden="hidden" data-view-component="true" class="Counter">0</span>

                    </a>
                </li>

                <li data-view-component="true" class="d-flex">
                    <a href="{{ route('projects.audit_logs', $project) }}" data-tab-item="i2pull-requests-tab"
                       data-selected-links="repo_pulls checks /mlab817/ipms-v2/pulls" data-hotkey="g p"
                       data-ga-click="Repository, Navigation click, Pull requests tab" data-view-component="true"
                       class="UnderlineNav-item hx_underlinenav-item no-wrap js-responsive-underlinenav-item @if($route == 'projects.audit_logs') selected @endif">

                        <svg class="octicon octicon-git-pull-request UnderlineNav-octicon d-none d-sm-inline"
                             viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M7.177 3.073L9.573.677A.25.25 0 0110 .854v4.792a.25.25 0 01-.427.177L7.177 3.427a.25.25 0 010-.354zM3.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122v5.256a2.251 2.251 0 11-1.5 0V5.372A2.25 2.25 0 011.5 3.25zM11 2.5h-1V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5zm1 10.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0zM3.75 12a.75.75 0 100 1.5.75.75 0 000-1.5z"></path>
                        </svg>
                        <span data-content="Pull requests">History</span>
                        <span title="{{ $project->audit_logs->count() }}" data-view-component="true" class="Counter">
                            {{ $project->audit_logs->count() }}
                        </span>
                    </a>
                </li>

                <li data-view-component="true" class="d-flex">
                    <a href="{{ route('projects.issues.index', $project) }}" data-tab-item="i1issues-tab"
                       data-selected-links="repo_issues repo_labels repo_milestones /mlab817/ipms-v2/issues"
                       data-hotkey="g i" data-ga-click="Repository, Navigation click, Issues tab"
                       data-view-component="true"
                       class="UnderlineNav-item hx_underlinenav-item no-wrap js-responsive-underlinenav-item @if($route == 'projects.issues.index') selected @endif">

                        <svg class="octicon octicon-issue-opened UnderlineNav-octicon d-none d-sm-inline"
                             viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                            <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            <path fill-rule="evenodd"
                                  d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                        </svg>
                        <span data-content="Issues">Issues</span>
                        <span title="{{ $project->issues->count() }}" data-view-component="true" class="Counter">
                            {{ $project->issues->count() }}
                        </span>
                    </a>
                </li>

                <li data-view-component="true" class="d-flex">
                    <a href="{{ route('projects.settings', $project) }}" class="UnderlineNav-item hx_underlinenav-item no-wrap js-responsive-underlinenav-item @if($route == 'projects.settings') selected @endif">
                        <!-- TODO: Add Settings page -->

                        <svg class="octicon octicon-gear UnderlineNav-octicon d-none d-sm-inline" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span data-content="Settings">Settings</span>
                        <span title="Not available" data-view-component="true" class="Counter"></span>

                    </a>
                </li>

                <li data-view-component="true" class="d-flex">
                    <a href="/mlab817/ipms-v2/projects" data-tab-item="i5projects-tab"
                       data-selected-links="repo_projects new_repo_project repo_project /mlab817/ipms-v2/projects"
                       data-hotkey="g b" data-ga-click="Repository, Navigation click, Projects tab"
                       data-view-component="true"
                       class="UnderlineNav-item hx_underlinenav-item no-wrap js-responsive-underlinenav-item"
                       style="visibility: hidden;">

                        <svg class="octicon octicon-project UnderlineNav-octicon d-none d-sm-inline" viewBox="0 0 16 16"
                             version="1.1" width="16" height="16" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                        </svg>
                        <span data-content="Projects">Projects</span>
                        <span title="1" data-view-component="true" class="Counter">1</span>


                    </a>
                </li>
            </ul>
        </nav>

    </div>

    @yield('content')
</main>

<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
@include('scripts.easymde')
@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
@stack('scripts')

</body>
</html>
