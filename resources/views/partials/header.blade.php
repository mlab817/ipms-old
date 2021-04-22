<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $pageTitle }}</h1>
            </div><!-- /.col -->
            @isset ($breadcrumbs)
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumbs as $bc)
                        <li class="breadcrumb-item"><a href="{{ $bc->link }}">{{ $bc->label }}</a></li>
                    @endforeach
                </ol>
            </div><!-- /.col -->
            @endif
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
