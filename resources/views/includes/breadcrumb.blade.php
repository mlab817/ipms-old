<div class="c-subheader">
    <ol class="breadcrumb border-0 m-0 bg-white">
        @forelse($breadcrumbs as $key => $link)
            {!! $link ? '<li class="breadcrumb-item"><a href="' . $link .'">' . $key . '</a></li>' : '<li class="breadcrumb-item">' . $key .'</li>' !!}
        @empty
            <li class="breadcrumb-item active">Dashboard</li>
        @endforelse
    </ol>
</div>
