<div class="position-relative">
    <header class="Header px-3 px-md-4 px-lg-5 flex-wrap flex-md-nowrap">
        <div class="Header-item">
            PIPS
        </div>

        <div class="Header-item Header-item--full">
            <input class="form-control input-dark mr-3" type="search" name="search" id="search" role="searchbox" autocomplete="off">
            <nav class="d-flex flex-column flex-md-row flex-self-stretch flex-md-self-auto" aria-label="Global">
                <a class="Header-link d-flex d-block d-xs-none position-relative px-2" data-ga-click="Header, click, Nav menu - item:dashboard:user" aria-label="Dashboard" href="/dashboard">
                    Dashboard
                </a>
                <a class="Header-link d-flex d-block d-xs-none position-relative px-2" data-hotkey="g p" data-ga-click="Header, click, Nav menu - item:pulls context:user" aria-label="Pull requests you created" data-selected-links="/pulls /pulls/assigned /pulls/mentioned /pulls" href="/pulls">
                    PAPs
                </a>
                <a class="Header-link d-flex d-block d-xs-none position-relative px-2" data-hotkey="g i" data-ga-click="Header, click, Nav menu - item:issues context:user" aria-label="Issues you created" data-selected-links="/issues /issues/assigned /issues/mentioned /issues" href="/issues">
                    Reviews
                </a>
                <a class="Header-link d-flex d-block d-xs-none position-relative">
                    PIPOL Tracker
                </a>
            </nav>
        </div>

        <div class="Header-item mr-0 mr-md-3 flex-order-1 flex-md-order-none">
            <a href="{{ route('notifications.index') }}" class="Header-link notification-indicator position-relative tooltipped tooltipped-sw" aria-label="You have unread notifications" data-hotkey="g n" data-ga-click="Header, go to notifications, icon:unread" data-target="notification-indicator.link">
                <span class="mail-status unread " data-target="notification-indicator.modifier"></span>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-bell">
                    <path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path>
                </svg>
            </a>
        </div>

        <div class="Header-item mr-0">
            <img class="avatar" height="20" alt="@octocat" src="https://github.com/octocat.png" width="20">
        </div>
    </header>
</div>

{{--<header class="c-header c-header-light c-header-fixed c-header-with-subheader">--}}
{{--    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">--}}
{{--        <i class="c-icon c-icon-lg cil-menu"></i>--}}
{{--    </button>--}}

{{--    <a class="c-header-brand d-lg-none" href="#">--}}
{{--        <svg width="118" height="46" alt="CoreUI Logo">--}}
{{--            <use xlink:href="assets/brand/coreui.svg#full"></use>--}}
{{--        </svg>--}}
{{--    </a>--}}

{{--    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">--}}
{{--        <i class="c-icon c-icon-lg cil-menu"></i>--}}
{{--    </button>--}}

{{--    <ul class="c-header-nav d-md-down-none">--}}
{{--        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>--}}
{{--    </ul>--}}

{{--    <ul class="c-header-nav ml-auto mr-4">--}}
{{--        <li class="c-header-nav-item dropdown d-md-down-none mx-2">--}}
{{--            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                {{ auth()->user()->currentRole->name ?? 'Switch Role' }}--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right pt-0">--}}
{{--                <div class="dropdown-header bg-light py-2">--}}
{{--                    <strong>Switch Role</strong>--}}
{{--                </div>--}}
{{--                <form action="{{ route('roles.switch') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @foreach(auth()->user()->assigned_roles as $role)--}}
{{--                        <button type="submit" name="roleId" value="{{ $role->id }}" class="dropdown-item">--}}
{{--                            <i class="c-icon mr-2 cil-check @if($role->id == auth()->user()->currentRole->id ?? null) text-success @else text-white @endif"></i>--}}
{{--                            {{ $role->name }}--}}
{{--                        </button>--}}
{{--                    @endforeach--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <li class="c-header-nav-item dropdown d-md-down-none mx-2">--}}
{{--            <a class="c-header-nav-link" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="c-icon cil-bell"></i> <small>{{ auth()->user()->unreadNotifications->count() }}</small>--}}
{{--            </a>--}}
{{--            @include('includes.notifications')--}}
{{--        </li>--}}

{{--        <li class="c-header-nav-item dropdown">--}}
{{--            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                <div class="c-avatar">--}}
{{--                    <img class="c-avatar-img" src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->email }}">--}}
{{--                </div>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right pt-0">--}}
{{--                <div class="dropdown-header bg-light py-2">--}}
{{--                    <strong>Account</strong></div>--}}
{{--                <a class="dropdown-item" href="{{ route('account.logins') }}">--}}
{{--                    <svg class="c-icon mr-2">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>--}}
{{--                    </svg> Login Activity</a>--}}
{{--                <a class="dropdown-item" href="{{ route('notifications.index') }}">--}}
{{--                    <svg class="c-icon mr-2">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>--}}
{{--                    </svg> Notifications<span class="badge badge-success ml-auto">{{ auth()->user()->unreadNotifications->count() }}</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div><a class="dropdown-item" href="#">--}}
{{--                    <svg class="c-icon mr-2">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>--}}
{{--                    </svg> Profile</a><a class="dropdown-item" href="{{ route('settings') }}">--}}
{{--                    <svg class="c-icon mr-2">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>--}}
{{--                    </svg> Settings</a><a class="dropdown-item" href="#">--}}
{{--                    <svg class="c-icon mr-2">--}}
{{--                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>--}}
{{--                    </svg> Projects<span class="badge badge-primary ml-auto">42</span></a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#">--}}
{{--                    <i class="c-icon mr-2 cil-account-logout"></i>--}}
{{--                    Logout--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    @yield('breadcrumb')--}}
{{--</header>--}}

