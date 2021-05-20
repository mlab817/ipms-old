<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <div class="brand-image img-circle">
            <img src="{{ asset('images/logo-dark.png') }}" class="text-info" alt="AdminLTE Logo" width="35px">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
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
                        <!-- Heroicon: document-report -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                        </svg>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('projects.create')
                    <li class="nav-item">
                        <a href="{{ route('projects.create') }}" class="nav-link @if(Route::current()->getName() == 'projects.create') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Create New PAP
                            </p>
                        </a>
                    </li>
                @endcan

                @if(auth()->user()->can('projects.view_office') || auth()->user()->can('projects.view_own') || auth()->user()->can('projects.view_assigned'))
                    <div class="dropdown-divider"></div>

                    @can('projects.view_office')
                    <li class="nav-item">
                        <a href="{{ route('projects.office') }}" class="nav-link @if(Route::current()->getName() == 'projects.office') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            <p>
                                View My Office PAPs
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('projects.view_own')
                    <li class="nav-item">
                        <a href="{{ route('projects.own') }}" class="nav-link @if(Route::current()->getName() == 'projects.own') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
                            </svg>
                            <p>
                                View Own PAPs
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('projects.view_assigned')
                        <li class="nav-item">
                            <a href="{{ route('projects.assigned') }}" class="nav-link @if(Route::current()->getName() == 'projects.assigned') active @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
                                </svg>
                                <p>
                                    View Assigned PAPs
                                </p>
                            </a>
                        </li>
                    @endcan
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                                <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Review PAPs
                            </p>
                        </a>
                    </li>
                @endcan

                @canany('projects.manage','users.view_index','teams.view_index','roles.view_index','permissions.view_index','libraries.view_index','audit_logs.view_index')
                <div class="dropdown-divider"></div>
                <li class="nav-header">Admin</li>
                @endcanany

                @can('projects.manage')
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.projects.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 12a1 1 0 102 0V6.414l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L5 6.414V12zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                        </svg>
                        <p>
                            Manage Projects
                        </p>
                    </a>
                </li>
                @endcan

                @can('users.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.users.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        <p>
                            Manage Users
                        </p>
                    </a>
                </li>
                @endcan

                @can('teams.view_index')
                    <li class="nav-item">
                        <a href="{{ route('admin.teams.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.teams.index') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            <p>
                                Manage Teams
                            </p>
                        </a>
                    </li>
                @endcan

                @can('roles.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.roles.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>
                        <p>
                            Manage Roles
                        </p>
                    </a>
                </li>
                @endcan

                @can('permissions.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.permissions.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <p>
                            Manage Permissions
                        </p>
                    </a>
                </li>
                @endcan

                @can('libraries.view_index')
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.496 2.132a1 1 0 00-.992 0l-7 4A1 1 0 003 8v7a1 1 0 100 2h14a1 1 0 100-2V8a1 1 0 00.496-1.868l-7-4zM6 9a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1zm3 1a1 1 0 012 0v3a1 1 0 11-2 0v-3zm5-1a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <p>
                            Manage Libraries
                        </p>
                    </a>
                </li>
                @endcan

                @can('audit_logs.view_index')
                    <li class="nav-item">
                        <a href="{{ route('admin.audit_logs.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.audit_logs.index') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Audit Logs
                            </p>
                        </a>
                    </li>
                @endcan

                @auth
                    <div class="dropdown-divider"></div>

                    <li class="nav-item">
                        <a href="{{ route('settings') }}" class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
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
                            <!-- Heroicon: Logout icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                            </svg>
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
