<!-- Main Sidebar Container -->
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

    <div class="c-sidebar-brand d-lg-down-none">
        <img src="{{ asset('images/logo_with_da_dark.png') }}" class="c-sidebar-brand-full" height="46" alt="Logo">
    </div>

{{--    <!-- Brand Logo -->--}}
{{--    <a href="/" class="brand-link">--}}
{{--        <div class="brand-image img-circle">--}}
{{--            <img src="{{ asset('images/logo-dark.png') }}" class="text-info" alt="AdminLTE Logo" width="35px">--}}
{{--        </div>--}}
{{--        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>--}}
{{--    </a>--}}

<!-- Sidebar -->
    <ul class="c-sidebar-nav">

        <li class="c-sidebar-nav-item">
            <div class="c-sidebar-nav-link">
                <div class="c-avatar mr-2">
                    <img src="{{ auth()->user()->avatar }}" class="c-avatar-img" alt="User Image">
                </div>
                {{ auth()->user()->full_name }}
            </div>
        </li>

        <!-- Project Menu -->
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

        <li class="c-sidebar-nav-item">
            <a href="{{ route('dashboard') }}"
               class="c-sidebar-nav-link @if(Route::current()->getName() == 'dashboard') active @endif">
                <!-- Heroicon: document-report -->
                <i class="c-sidebar-nav-icon cil-speedometer"></i>
                Dashboard
            </a>
        </li>

        @can('projects.create')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('projects.create') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.create') active @endif">
                    <i class="c-sidebar-nav-icon cil-pen"></i>
                    Create New PAP
                </a>
            </li>
        @endcan

        @if(auth()->user()->can('projects.view_office') || auth()->user()->can('projects.view_own') || auth()->user()->can('projects.view_assigned'))
            {{--                    <div class="dropdown-divider"></div>--}}

            @can('projects.view_own')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('projects.own') }}"
                       class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.own') active @endif">
                        <i class="c-sidebar-nav-icon cil-list-numbered"></i>
                        View Own PAPs
                        <span
                            class="badge badge-info right">{{ \App\Models\Project::where('created_by', auth()->id())->count() }}</span>
                    </a>
                </li>
            @endcan

            @can('projects.view_office')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('projects.office') }}"
                       class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.office') active @endif">
                        <svg class="c-sidebar-nav-icon" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>

                        View My Office PAPs
                        <span
                            class="badge badge-info right">{{ \App\Models\Project::whereNotNull('office_id')->where('office_id', auth()->user()->office_id)->count() }}</span>

                    </a>
                </li>
            @endcan

            @can('projects.view_assigned')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('projects.assigned') }}"
                       class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.assigned') active @endif">
                        <i class="c-sidebar-nav-icon cil-list-rich"></i>
                        View Assigned PAPs
                        <span class="badge badge-info right">{{ auth()->user()->assigned_projects->count() }}</span>
                    </a>
                </li>
            @endcan
        @endcan

        @can('projects.manage')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('projects.deleted') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.deleted') active @endif">
                    <i class="c-sidebar-nav-icon cil-trash">
                    </i>
                    Deleted Projects
                    <span class="badge badge-info right">{{ \App\Models\Project::onlyTrashed()->count()  }}</span>
                </a>
            </li>
        @endcan

        @can('reviews.view_index')
            {{--                    <div class="dropdown-divider"></div>--}}

            <li class="c-sidebar-nav-item">
                <a href="{{ route('reviews.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'reviews.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-speech"></i>
                    Review PAPs
                    <span class="badge badge-info right">{{ \App\Models\Project::count()  }}</span>
                </a>
            </li>
        @endcan

        <li class="c-sidebar-nav-item">
            <a href="{{ route('reports.index') }}"
               class="c-sidebar-nav-link {{ request()->routeIs('reports') ? 'active' : '' }}">
                <i class="c-sidebar-nav-icon cil-bar-chart"></i> Reports
                <span class="badge badge-danger right">New</span>

            </a>
        </li>

        @canany('projects.manage','users.view_index','teams.view_index','roles.view_index','permissions.view_index','libraries.view_index','audit_logs.view_index')
            <li class="c-sidebar-nav-title">Admin</li>
        @endcanany

        @can('projects.manage')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.projects.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.projects.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-line-spacing"></i>

                    Manage Projects
                    <span class="badge badge-info right">{{ \App\Models\Project::count()  }}</span>

                </a>
            </li>
        @endcan

        @can('projects.manage')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('pipols.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'pipols.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-walk"></i>
                    PIPOL Tracker
                    <span class="badge badge-info right">{{ \App\Models\Pipol::count()  }}</span>

                </a>
            </li>
        @endcan

        @can('users.view_index')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.users.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.users.index') active @endif">
                    <svg class="c-sidebar-nav-icon" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path
                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>

                    Manage Users
                    <span class="badge badge-info right">{{ \App\Models\User::count()  }}</span>

                </a>
            </li>
        @endcan

        {{--        @can('teams.view_index')--}}
        {{--            <li class="c-sidebar-nav-item">--}}
        {{--                <a href="{{ route('admin.teams.index') }}"--}}
        {{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.teams.index') active @endif">--}}
        {{--                    <svg  class="c-sidebar-nav-icon" viewBox="0 0 20 20"--}}
        {{--                         fill="currentColor">--}}
        {{--                        <path--}}
        {{--                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>--}}
        {{--                    </svg>--}}

        {{--                    Manage Teams--}}

        {{--                </a>--}}
        {{--            </li>--}}
        {{--        @endcan--}}

        @can('roles.view_index')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.roles.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.roles.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-group"></i>
                    Manage Roles
                    <span class="badge badge-info right">{{ \App\Models\Role::count()  }}</span>
                </a>
            </li>
        @endcan

        @can('permissions.view_index')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.permissions.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.permissions.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-lock-locked">
                    </i>
                    Manage Permissions
                    <span class="badge badge-info right">{{ \App\Models\Permission::count()  }}</span>
                </a>
            </li>
        @endcan

        @can('libraries.view_index')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-playlist-add">
                    </i>
                    Manage Libraries
                </a>
            </li>
        @endcan

        @can('exports.view_index')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('exports.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'exports.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-cloud-download"></i>
                    Export Data
                </a>
            </li>
        @endcan

        <li class="c-sidebar-nav-item">
            <a href="{{ route('links.index') }}"
               class="c-sidebar-nav-link @if(Route::current()->getName() == 'links.index') active @endif">
                <i class="c-sidebar-nav-icon cil-link">
                </i>
                Links
            </a>
        </li>

        @can('audit_logs.view_index')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('audit_logs.index') }}"
                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'audit_logs.index') active @endif">
                    <i class="c-sidebar-nav-icon cil-history">
                    </i>
                    Audit Logs
                    <span class="badge badge-info right">{{ \App\Models\AuditLog::count()  }}</span>
                </a>
            </li>
        @endcan

        @auth
            <li class="c-sidebar-nav-item">
                <a href="{{ route('settings') }}"
                   class="c-sidebar-nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                    <i class="c-sidebar-nav-icon cil-cog">
                    </i>
                    Settings
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>

                <a href="#" class="c-sidebar-nav-link" role="button" onClick="confirmLogout()">
                    <!-- Heroicon: Logout icon -->
                    <i class="c-sidebar-nav-icon cil-account-logout">
                    </i>
                    Logout
                </a>
            </li>
        @endauth
    </ul>
    <!-- /.sidebar-menu -->
    <!-- /.sidebar -->
</div>

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
