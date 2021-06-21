<div class="dropdown-menu dropdown-menu-right pt-0" style="min-width: 360px;">
    <div class="dropdown-header bg-light py-2">
        <strong>Notifications</strong>
    </div>
    <div class="list-group">
        <a class="list-group-item list-group-item-action flex-column align-items-start active" href="#">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5><small>3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p><small>Donec id elit non mi porta.</small>
        </a><a class="list-group-item list-group-item-action flex-column align-items-start" href="#">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5><small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p><small class="text-muted">Donec id elit non mi porta.</small>
        </a><a class="list-group-item list-group-item-action flex-column align-items-start" href="#">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5><small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p><small class="text-muted">Donec id elit non mi porta.</small>
        </a></div>
    <a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
        </svg> Updates
    </a>
</div>

{{--<li class="nav-item dropdown">--}}
{{--    <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">--}}
{{--            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />--}}
{{--        </svg>--}}
{{--        <span class="badge badge-danger navbar-badge"></span>--}}
{{--    </a>--}}
{{--    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">--}}
{{--        <span class="dropdown-header">{{ auth()->user()->unreadNotifications->count() }} Notifications</span>--}}
{{--        <div class="dropdown-divider"></div>--}}
{{--        @foreach(auth()->user()->unreadNotifications->take(5) as $notification)--}}
{{--        <a href="{{ route('notifications.show', $notification) }}" class="dropdown-item">--}}
{{--            <div class="media">--}}
{{--                <img src="{{ $notification->data['sender']['avatar'] ?? '' }}" alt="User Avatar" class="mr-3 img-circle" width="35" height="35">--}}
{{--                <div class="media-body">--}}
{{--                    <h3 class="dropdown-item-title">--}}
{{--                        {{ $notification->data['subject'] ?? '' }}--}}
{{--                    </h3>--}}
{{--                    <!-- TODO: Fix problem with overflowing text -->--}}
{{--                    <p class="text-sm text-truncate">{!! $notification->data['message'] ?? '' !!}</p>--}}
{{--                    <p class="text-xs text-muted">--}}
{{--                        <i class="far fa-clock mr-1"></i>--}}
{{--                        {{ $notification->created_at ? $notification->created_at->diffForHumans(null, null, true) : '' }}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--        <div class="dropdown-divider"></div>--}}
{{--        @endforeach--}}
{{--        <a href="{{ route('notifications.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--    </div>--}}
{{--</li>--}}
