<div class="dropdown-menu dropdown-menu-right pt-0" style="min-width: 360px;">
    <div class="dropdown-header bg-light py-2">
        <strong>Notifications</strong>
        <span class="float-right">
            <a href="{{ route('notifications.index') }}">
                View All
            </a>
        </span>
    </div>
    <div class="list-group">
        @foreach(auth()->user()->unreadNotifications->take(5) as $notification)
        <a class="list-group-item list-group-item-action flex-column align-items-start" href="{{ route('notifications.show', $notification) }}">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $notification->data['subject'] ?? '' }}</h5>
                <small>{{ $notification->created_at ? $notification->created_at->diffForHumans(null, null, true) : '' }}</small>
            </div>
            <p class="mb-1">{!! $notification->data['message'] ?? '' !!}</p>
        </a>
        @endforeach
    </div>
</div>
