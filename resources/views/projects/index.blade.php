@extends('layouts.app')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                {!! $dataTable->table(['class' => 'projects-table table table-bordered table-hover dataTable dtr-inline', 'role' => 'grid', 'width' => '100%'], false) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}

    <script>
        function confirmDelete(slug) {
            let response = confirm('Are you sure you want to delete this project?')
            if (response) {
                // create a fake url using route helper
                let url = '{{ route("projects.destroy", ":id") }}'
                // replace id with the project slug
                url = url.replace(':id', slug);

                $.ajax({
                    url: url,
                    type: 'delete',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        // prompt user of success
                        alert(data.message)
                        let oTable = $('.projects-table').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                })
            }
        }
    </script>
@endpush
