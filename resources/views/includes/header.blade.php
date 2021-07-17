<div class="position-relative">
    <header class="Header px-3 px-md-4 px-lg-5 flex-wrap flex-md-nowrap">
        <div class="Header-item">
            <a href="{{ route('dashboard') }}">
                <svg class="color-text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M0 13C0 6.373 5.373 1 12 1s12 5.373 12 12v8.657a.75.75 0 01-1.5 0V13c0-5.799-4.701-10.5-10.5-10.5S1.5 7.201 1.5 13v8.657a.75.75 0 01-1.5 0V13z"></path><path d="M8 19.75a.75.75 0 01.75-.75h6.5a.75.75 0 010 1.5h-6.5a.75.75 0 01-.75-.75z"></path><path fill-rule="evenodd" d="M5.25 9.5a1.75 1.75 0 00-1.75 1.75v3.5c0 .966.784 1.75 1.75 1.75h13.5a1.75 1.75 0 001.75-1.75v-3.5a1.75 1.75 0 00-1.75-1.75H5.25zm.22 1.47a.75.75 0 011.06 0L9 13.44l2.47-2.47a.75.75 0 011.06 0L15 13.44l2.47-2.47a.75.75 0 111.06 1.06l-3 3a.75.75 0 01-1.06 0L12 12.56l-2.47 2.47a.75.75 0 01-1.06 0l-3-3a.75.75 0 010-1.06z"></path>
                </svg>
            </a>
        </div>

        <div class="Header-item Header-item--full">
            <livewire:project-autocomplete />
        </div>

{{--        <div class="Header-item mr-0 mr-md-3 flex-order-1 flex-md-order-none">--}}
{{--            <a href="{{ route('notifications.index') }}" class="Header-link notification-indicator position-relative tooltipped tooltipped-sw" aria-label="You have unread notifications" data-hotkey="g n" data-ga-click="Header, go to notifications, icon:unread" data-target="notification-indicator.link">--}}
{{--                <span class="mail-status unread " data-target="notification-indicator.modifier"></span>--}}
{{--                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-bell">--}}
{{--                    <path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path>--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </div>--}}

        <div class="Header-item position-relative d-none d-md-flex">
            <details class="details-overlay details-reset">
                <summary class="Header-link" aria-haspopup="menu" role="button">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-plus">
                        <path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"></path>
                    </svg> <span class="dropdown-caret"></span>
                </summary>
                <div class="dropdown-menu dropdown-menu-sw" role="menu">

                    <a role="menuitem" class="dropdown-item" href="{{ route('projects.create') }}">
                        New PAP
                    </a>

                    <a role="menuitem" class="dropdown-item" href="{{ route('projects.new_clone') }}">
                        Clone PAP
                    </a>

                </div>
            </details>

        </div>

        <div class="Header-item mr-0 mr-md-3 flex-order-1 flex-md-order-none" id="user-links">

            <details class="details-overlay details-reset">
                <summary class="Header-link name" aria-label="View profile and more" data-ga-click="Header, show menu, icon:avatar" aria-haspopup="menu" role="button">
                    <img class="avatar avatar-user" src="{{ auth()->user()->avatar }}" width="20" height="20" alt="@mlab817">
                    <span class="dropdown-caret"></span>
                </summary>
                <details-menu class="dropdown-menu dropdown-menu-sw" role="menu">
                    <div class="Truncate">
                        <a role="menuitem" class="color-text-primary no-underline px-3 pt-2 pb-2 mb-n2 mt-n1 d-block">Signed in as
                            <strong class="Truncate-text">
                                {{ auth()->user()->username }}
                            </strong>
                        </a>
                    </div>
                    <div role="none" class="dropdown-divider"></div>
                    <a role="menuitem" class="dropdown-item" href="{{ route('projects.index') }}">
                        Your PAPs
                    </a>
                    <a role="menuitem" class="dropdown-item" href="/mlab817/starred" data-ga-click="Header, go to starred gists, text:starred gists">Starred gists</a>
                    <a role="menuitem" class="dropdown-item" href="https://docs.github.com" data-ga-click="Header, go to help, text:help">Help</a>
                    <div role="none" class="dropdown-divider"></div>
                    <a role="menuitem" class="dropdown-item" href="https://github.com/mlab817">Your profile</a>
                    <div role="none" class="dropdown-divider"></div>
                    <form class="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item dropdown-signout" role="menuitem">
                            Sign out
                        </button>
                    </form>
                </details-menu>
            </details>
        </div>
    </header>
</div>
