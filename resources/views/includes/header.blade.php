<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <i class="c-icon c-icon-lg cil-menu"></i>
    </button>

    <a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
    </a>

    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <i class="c-icon c-icon-lg cil-menu"></i>
    </button>

    <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>

    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item dropdown d-md-down-none mx-2">
            <a class="c-header-nav-link" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="c-icon cil-bell"></i> {{ auth()->user()->unreadNotifications->count() }}
            </a>
            @include('includes.notifications')
        </li>

        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar">
                    <img class="c-avatar-img" src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->email }}">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2">
                    <strong>Account</strong></div>
                <a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                    </svg> Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg> Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                    </svg> Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                    </svg> Comments<span class="badge badge-warning ml-auto">42</span></a>
                <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div><a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> Profile</a><a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                    </svg> Settings</a><a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                    </svg> Projects<span class="badge badge-primary ml-auto">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                    <svg class="c-icon mr-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg> Lock Account</a>
                    <a class="dropdown-item" href="#">
                        <i class="c-icon mr-2 cil-account-logout"></i>
                        Logout
                    </a>
            </div>
        </li>
    </ul>
    @yield('breadcrumb')
</header>

