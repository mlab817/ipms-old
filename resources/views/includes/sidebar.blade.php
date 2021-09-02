@php
    $user = auth()->user();
@endphp

@auth
    <aside class="px-3 px-md-4 px-lg-5 overflow-auto">

        <div class="border-bottom color-border-secondary py-3 mt-3 mb-4">
            <details id="details-3aa004" class="details-reset details-overlay d-inline-block">
                <summary class="no-underline btn-link color-text-primary text-bold width-full" title="Switch account context" data-ga-click="Dashboard, click, Opened account context switcher - context:user" aria-haspopup="menu" role="button">
                    <img src="{{ auth()->user()->avatar }}" alt="{{ '@' . auth()->user()->username }}" size="20" height="20" width="20" class="avatar-user avatar avatar-small">
                    <span class="css-truncate css-truncate-target ml-1">
                        {{ auth()->user()->username }}
                    </span>
                </summary>
                <details-menu class="SelectMenu" role="menu" aria-label="Switch dashboard context">
                    <div class="SelectMenu-modal">
                        <header class="SelectMenu-header">
                            <div class="SelectMenu-title">View office</div>
                            <button class="SelectMenu-closeButton" type="button" aria-label="Close menu" data-toggle-for="details-91da43">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                </svg>
                            </button>
                        </header>
                        <div class="d-flex flex-column flex-1 overflow-hidden">
                            <div class="SelectMenu-list">
                                @foreach($user->owned_offices as $office)
                                    <a class="SelectMenu-item flex-justify-between" role="menuitem" href="{{ route('offices.show', $office) }}">
                                        <span>
                                            <img src="{{ $office->image }}" alt="{{ '@' . $office->acronym }}" class="avatar avatar-user mr-1" width="20" height="20">
                                            {{ $office->acronym }}
                                        </span>
                                        <svg
                                            width="8"
                                            height="16"
                                            viewBox="0 0 8 16"
                                            class="octicon octicon-primitive-dot color-text-primary ml-2"
                                            aria-hidden="true"
                                        >
                                            <path fill-rule="evenodd" d="M0 8c0-2.2 1.8-4 4-4s4 1.8 4 4-1.8 4-4 4-4-1.8-4-4z" />
                                        </svg>
                                    </a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </details-menu>
            </details>
        </div>

        <a class="btn btn-outline f6 width-full mb-3" href="{{ route('offices.show', auth()->user()->owned_offices->first()) }}">View Office</a>

        <div class="mb-3 Details" role="navigation">

            <h2 class="f4 hide-sm hide-md mb-1 f5 d-flex flex-justify-between flex-items-center">
                Programs and Projects
                <a class="btn btn-sm btn-primary" href="{{ route('projects.create') }}">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-repo">
                        <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                    </svg> New
                </a>
            </h2>

            <div class="mt-2 mb-3" role="search" aria-label="Repositories">
                <livewire:project-autocomplete />
            </div>

            <ul class="list-style-none">
                @forelse(auth()->user()->pinned_projects as $project)
                <li class="d-flex flex-items-baseline">
                    <div class="width-full text-bold">
                        <a href="{{ route('projects.show', $project) }}" class="d-inline-flex flex-items-baseline flex-wrap f5 mb-2 dashboard-underlined-link width-fit" data-hydro-click="{&quot;event_type&quot;:&quot;dashboard.click&quot;,&quot;payload&quot;:{&quot;event_context&quot;:&quot;REPOSITORIES&quot;,&quot;target&quot;:&quot;REPOSITORY&quot;,&quot;record_id&quot;:380256079,&quot;dashboard_context&quot;:&quot;user&quot;,&quot;dashboard_version&quot;:2,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/dashboard/top_repositories?location=left&quot;}}" data-hydro-click-hmac="a3832ac80e6e118231c11bee3a72538539ac9f450e4ddbc286e4a1fb81bd8425" data-ga-click="Dashboard, click, Repo list item click - context:user visibility:public fork:false" data-hovercard-type="repository" data-hovercard-url="/mlab817/pips/hovercard">
                            <div class="color-text-tertiary mr-2">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                </svg>
{{--                                    <svg aria-label="Repository" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-repo flex-shrink-0">--}}
{{--                                        <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>--}}
{{--                                    </svg>--}}
                            </div>

                            <span class="css-truncate css-truncate-target" style="max-width: 200px">
                                {{ $project->title }}
                            </span>

                        </a>
                    </div>
                </li>
                @empty
                <li class="d-flex">
                    <div class="width-full text-bold">
                        No projects to show
                    </div>
                </li>
                @endforelse
            </ul>

            <a href="{{ route('users.projects', auth()->user()) }}" role="button" type="submit" class="width-full text-left btn-link f6 Link--muted text-left mt-2 border-md-0 border-top py-md-0 py-3 px-md-0 px-2">
                Show more
            </a>
        </div>

        <div class="border-top"></div>

        <h2 class="f5 mt-md-3 mt-0">Recent activities</h2>

        <!-- TODO: create recent activity log -->
        <ul class="list-style-none">
            @forelse(auth()->user()->actions()->latest()->take(6)->get() as $activity)
                <li class="d-flex flex-items-baseline mt-2">
                        <span>
                            <svg role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-issue-opened color-text-success mr-2">
                                <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                            </svg>
                        </span>
                    <div class="break-word">
                        <a class="color-text-primary lh-0 mb-2 markdown-title" href="{{ $activity->subject ? (get_class($activity->subject) == 'App\\Models\\Project' ? route('projects.show', $activity->subject) : '#') : '#' }}">
                            {{ $activity->description }}
                        </a>
                    </div>
                </li>
            @empty
                No activity
            @endforelse
        </ul>

        <a href="{{ route('users.activities.index', auth()->user()) }}" role="button" type="submit" class="width-full text-left btn-link f6 Link--muted text-left mt-2 border-md-0 border-top py-md-0 py-3 px-md-0 px-2">
            Show more
        </a>

    </aside>
@endauth
