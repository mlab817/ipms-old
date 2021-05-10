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
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if(Route::current()->getName() == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('projects.create')
                    <li class="nav-item">
                        <a href="{{ route('projects.create') }}" class="nav-link @if(Route::current()->getName() == 'projects.create') active @endif">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>
                                Create New PAP
                            </p>
                        </a>
                    </li>
                @endcan

                <div class="dropdown-divider"></div>

                <li class="nav-header">Projects</li>

                @can('projects.view_office')
                <li class="nav-item">
                    <a href="{{ route('projects.office') }}" class="nav-link @if(Route::current()->getName() == 'projects.office') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            View My Office PAPs
                        </p>
                    </a>
                </li>
                @endcan

                @can('projects.view_own')
                <li class="nav-item">
                    <a href="{{ route('projects.own') }}" class="nav-link @if(Route::current()->getName() == 'projects.own') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            View Own PAPs
                        </p>
                    </a>
                </li>
                @endcan

{{--                @can('subprojects.view_index')--}}
{{--                <div class="dropdown-divider"></div>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('subprojects.index') }}" class="nav-link @if(Route::current()->getName() == 'subprojects.index') active @endif">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Subprojects--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @endcan--}}

                @can('reviews.view_index')
                <div class="dropdown-divider"></div>

                <li class="nav-item">
                    <a href="{{ route('reviews.index') }}" class="nav-link @if(Route::current()->getName() == 'reviews.index') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Review PAPs
                        </p>
                    </a>
                </li>
                @endcan

                <div class="dropdown-divider"></div>

                <li class="nav-header">Admin</li>

                @can('projects.manage')
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.projects.index') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Manage Projects
                        </p>
                    </a>
                </li>
                @endcan

                @can('users.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.users.index') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Manage Users
                        </p>
                    </a>
                </li>
                @endcan

                @can('teams.view_index')
                    <li class="nav-item">
                        <a href="{{ route('admin.teams.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.teams.index') active @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Manage Teams
                            </p>
                        </a>
                    </li>
                @endcan

                @can('roles.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.roles.index') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Manage Roles
                        </p>
                    </a>
                </li>
                @endcan

                @can('permissions.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.permissions.index') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Manage Permissions
                        </p>
                    </a>
                </li>
                @endcan

                @can('libraries.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.index') active @endif">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Manage Libraries
                        </p>
                    </a>
                </li>
                @endcan

                @auth
                <div class="dropdown-divider"></div>

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
        $('[data-widget="sidebar-search"]').SidebarSearch({
            minLength: 3,
            maxResults: 10,
            notFoundText: 'Nothing found'
        })

        $('[data-widget="sidebar-search"]').SidebarSearch('search')

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
