<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">{{ auth()->user()->unreadNotifications->count() }} Notifications</span>
        <div class="dropdown-divider"></div>
        @foreach(auth()->user()->unreadNotifications as $notification)
        <a href="{{ route('notifications.show', $notification) }}" class="dropdown-item">
            <div class="media">
                <img src="{{ $notification->data['sender']['avatar'] }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        {{ $notification->data['subject'] }}
                    </h3>
                    <!-- TODO: Fix problem with overflowing text -->
                    <p class="text-sm text-truncate">{{ $notification->data['message'] }}</p>
                    <p class="text-xs text-muted">
                        <i class="far fa-clock mr-1"></i>
                        {{ $notification->created_at->diffForHumans(null, null, true) }}
                    </p>
                </div>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        @endforeach
        <a href="{{ route('notifications.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>
