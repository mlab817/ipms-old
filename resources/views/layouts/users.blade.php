@php
    $route = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @favicon

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

    <link href="https://unpkg.com/@github/details-dialog-element/dist/index.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @yield('styles')
</head>
<body>
@include('includes.header')

@if(session()->has('error'))
    <div x-data="{ show: true }">
        <div class="flash flash-full flash-error" x-show="show">
            <div class=" px-2">
                <button @click="show = false" class="flash-close" type="button" aria-label="Dismiss this message">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                    </svg>
                </button>
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif

<header class="border-bottom-0 pt-0 mb-4 color-bg-secondary">

    <div class="container-lg pt-4 pt-lg-0 p-responsive clearfix">

        <div class="d-flex flex-wrap flex-items-start flex-md-items-center my-3">
            <div class="mr-3 mb-md-0 mr-md-4">
                <img itemprop="image" class="avatar flex-shrink-0 mb-1" src="{{ $user->user_avatar() }}"
                     width="100" height="100" alt="{{ $user->username }}">
                @if($user->id != auth()->id())
                <form action="{{ route('users.follow', $user) }}" method="POST">
                    @csrf
                    <button class="btn btn-block mb-1" type="submit" role="button">
                        @if(auth()->user()->isFollowing($user->id))
                            Unfollow
                        @else
                            Follow
                        @endif
                    </button>
                </form>
                @else
                <details class="details-reset details-overlay details-overlay-dark">
                    <summary class="btn btn-block" aria-haspopup="dialog" role="button">
                        Upload
                    </summary>
                    <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                        <div class="Box-header">
                            <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                    aria-label="Close dialog" data-close-dialog>
                                <!-- <%= octicon "x" %> -->
                                <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12"
                                     height="16" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
                                </svg>
                            </button>
                            <h3 class="Box-title">Upload/Update Avatar</h3>
                        </div>
                        <form action="{{ route('users.upload_avatar', $user) }}" method="POST" accept-charset="UTF-8"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="Box-body overflow-auto">
                                <p>
                                    <label for="">Select Avatar</label>
                                </p>
                                <input type="file" class="form-control-file" name="avatar" accept="image/*" required>
                            </div>
                            <div class="Box-footer">
                                <button type="submit" role="button" class="btn btn-block">Upload</button>
                            </div>
                        </form>
                    </details-dialog>
                </details>
                @endif
            </div>

            <div class="flex-1">
                <h1 class="h2 lh-condensed" x-data="{
                    isEditing: false,
                    first_name: '{{ $user->first_name }}',
                    last_name: '{{ $user->last_name }}'
                    }">
                    <div x-show="!isEditing">
                        {{ $user->full_name }}
                        @if(auth()->id() == $user->id)
                            <button type="button" class="btn btn-sm btn-octicon" @click="isEditing = true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                    <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path>
                                </svg>
                            </button>
                        @endif
                    </div>
                    @if(auth()->id() == $user->id)
                    <div class="my-2 no-wrap" x-cloak x-show="isEditing">
                        <form action="{{ route('users.update_name', $user) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="First Name">
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="Last Name">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" @click="isEditing = false">Cancel</button>
                        </form>
                    </div>
                    @endif
                </h1>

                <div class="lh-condensed">
                    {{ $user->office->name ?? '_' }}
                </div>

                <div class="color-text-tertiary">
                    <div>
                        {{ $user->email }}
                        <span class="tooltipped tooltipped-n tooltipped-no-delay" aria-label="Users can no longer update their email.">
                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm9 3a1 1 0 11-2 0 1 1 0 012 0zM6.92 6.085c.081-.16.19-.299.34-.398.145-.097.371-.187.74-.187.28 0 .553.087.738.225A.613.613 0 019 6.25c0 .177-.04.264-.077.318a.956.956 0 01-.277.245c-.076.051-.158.1-.258.161l-.007.004a7.728 7.728 0 00-.313.195 2.416 2.416 0 00-.692.661.75.75 0 001.248.832.956.956 0 01.276-.245 6.3 6.3 0 01.26-.16l.006-.004c.093-.057.204-.123.313-.195.222-.149.487-.355.692-.662.214-.32.329-.702.329-1.15 0-.76-.36-1.348-.863-1.725A2.76 2.76 0 008 4c-.631 0-1.155.16-1.572.438-.413.276-.68.638-.849.977a.75.75 0 101.342.67z"></path></svg>
                        </span>
                    </div>
                </div>

                <div class="d-flex color-text-tertiary" x-data="{ isEditing: false }">
                    <div x-show="!isEditing">
                        {{ '@' . $user->username }}
                        @if($user->id == auth()->id())
                        <button type="submit" class="btn btn-sm btn-octicon" @click="isEditing = true; $nextTick(() => $refs.username.focus());">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path>
                            </svg>
                        </button>
                        @endif
                    </div>
                    @if($user->id == auth()->id())
                    <div x-cloak x-show="isEditing" >
                        <form x-ref="edit_username" action="{{ route('users.update_username', $user) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            @method('PUT')
                            <input id="username" aria-describedby="help-text-for-username" x-ref="username" type="text" class="form-control input-sm" name="username" value="{{ $user->username }}" @keyup.enter="$refs.edit_username.submit()" @keyup.escape="isEditing = false">
                            <p class="note" id="help-text-for-username">
                                Press enter to save or escape to cancel
                            </p>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="position-relative">
        <nav
            class="UnderlineNav hx_UnderlineNav js-responsive-underlinenav overflow-visible">
            <div class="width-full d-flex position-relative container-lg">
                <ul class="list-style-none UnderlineNav-body width-full p-responsive overflow-hidden">

                    <li class="d-flex">
                        <a class="UnderlineNav-item @if($route == 'users.show') selected @endif" href="{{ route('users.show', $user) }}">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-home UnderlineNav-octicon">
                                <path fill-rule="evenodd" d="M8.156 1.835a.25.25 0 00-.312 0l-5.25 4.2a.25.25 0 00-.094.196v7.019c0 .138.112.25.25.25H5.5V8.25a.75.75 0 01.75-.75h3.5a.75.75 0 01.75.75v5.25h2.75a.25.25 0 00.25-.25V6.23a.25.25 0 00-.094-.195l-5.25-4.2zM6.906.664a1.75 1.75 0 012.187 0l5.25 4.2c.415.332.657.835.657 1.367v7.019A1.75 1.75 0 0113.25 15h-3.5a.75.75 0 01-.75-.75V9H7v5.25a.75.75 0 01-.75.75h-3.5A1.75 1.75 0 011 13.25V6.23c0-.531.242-1.034.657-1.366l5.25-4.2h-.001z"></path>
                            </svg>
                            Overview
                        </a>
                    </li>

                    <li class="d-flex">
                        <a class="UnderlineNav-item @if($route == 'users.projects') selected @endif" href="{{ route('users.projects', $user) }}">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                            </svg>
                            Projects
                            <span title="0" hidden="hidden" class="Counter">{{ $user->projects->count() }}</span>
                        </a>
                    </li>

                    <li class="d-flex">
                        <a class="UnderlineNav-item @if($route == 'users.projects') selected @endif" href="{{ route('users.projects', $user) }}">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                            </svg>
                            Follow
                            <span title="0" hidden="hidden" class="Counter">{{ $user->projects->count() }}</span>
                        </a>
                    </li>

                    @if($user->id == auth()->id())
                    <li class="d-flex">
                        <a class="UnderlineNav-item @if($route == 'users.settings') selected @endif" href="{{ route('users.settings', $user) }}">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-gear UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                            <span title="0" hidden="hidden" class="Counter"></span>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>

</header>

<main>
    <div class="container-lg">
        @yield('content')
    </div>
</main>

<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
<script defer src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
</body>
</html>
