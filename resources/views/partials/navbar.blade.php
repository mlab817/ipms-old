<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>

            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input id="search" name="search" class="form-control form-control-navbar" aria-label="Search" type="text" list="search-results">

                        <div class="input-group-append">
                            <a class="btn btn-navbar" href="#">
                                <i class="fas fa-search"></i>
                            </a>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        @include('partials.notifications')

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous"></script>
    <script>
        $('input[name=search]').on('keyup', $.debounce(250, function(evt) {
            let searchTerm = evt.target.value
            let searchUrl = '{{ route('search') }}'

            if (searchTerm) {
                // run ajax call
                $.post(searchUrl, { search: searchTerm, _token: '{{ csrf_token() }}' }, function (data, status) {
                    console.log(data)
                    console.log(status)
                })
            }
        }));
    </script>
@endpush
