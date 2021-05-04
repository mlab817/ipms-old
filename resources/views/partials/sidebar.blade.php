<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <div class="brand-image img-circle">
            <img src="{{ asset('images/logo.svg') }}" alt="AdminLTE Logo" width="35px">
        </div>
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-sm">
        <!-- Sidebar user panel (optional) -->
        @auth
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        @endauth

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Project Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if(Route::current()->getName() == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{ request()->routeIs('projects.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Projects
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('projects.create')
                        <li class="nav-item">
                            <a href="{{ route('projects.create') }}" class="nav-link @if(Route::current()->getName() == 'projects.create') active @endif">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>
                                    Create New Project
                                </p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('projects.index') }}" class="nav-link @if(Route::current()->getName() == 'projects.index') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    View All
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projects.office') }}" class="nav-link @if(Route::current()->getName() == 'projects.office') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    View Office
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projects.own') }}" class="nav-link @if(Route::current()->getName() == 'projects.own') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    View Own
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projects.assigned') }}" class="nav-link @if(Route::current()->getName() == 'projects.assigned') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    View Assigned
                                </p>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li class="nav-item">
                            <a href="{{ route('reviews.index') }}" class="nav-link @if(Route::current()->getName() == 'reviews.index') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Review Projects
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            @role('admin')
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{ request()->routeIs('admin.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.users.index') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.roles.index') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Roles
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.permissions.index') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Permissions
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.projects.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.permissions.index') active @endif">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Projects
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endrole

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @role('admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Libraries
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach (config('admin.sidebar.menu') as $key => $menu)
                            <li class="nav-item">
                                <a href="{{ route($menu['route'] ?? 'admin.' . $key . '.index') }}" class="nav-link @if(Route::current()->getName() == $menu['route']) active @endif">
                                    <i class="{{ $menu['icon'] ?? 'nav-icon fas fa-th' }}"></i>
                                    <p>
                                        {{ $menu['title'] ?? '' }}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endrole

                @auth
                <li class="nav-item">
                    <a href="{{ route('settings') }}" class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    <a href="#" class="nav-link" role="button" onClick="confirmLogout()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@push('scripts')
    <script type="text/javascript">
        /*
         * Function to confirm and handle logout
         */

        function confirmLogout() {
            let confirmLogout = confirm('Are you sure you want to logout?')

            if (confirmLogout) {
                let logoutForm = document.getElementById('logout')
                logoutForm.submit()
            }
        }
    </script>
@endpush
