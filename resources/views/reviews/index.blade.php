@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Review PAPs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Review PAPs</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="mt-3"></div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fas fa-sitemap"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">PIP</span>
                            <span class="info-box-number">{{ $pipCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-secondary"><i class="fas fa-landmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">TRIP</span>
                            <span class="info-box-number">{{ $tripCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-tasks"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Reviewed Projects</span>
                            <span class="info-box-number">{{ $reviewedCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-database"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Projects</span>
                            <span class="info-box-number">{{ $projectCount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>

            <div class="card card-primary">
                <div class="card-body">
                    {{ $dataTable->table(['width' => '100%']) }}
                </div>
                <div class="card-footer">
                    <p class="text-muted text-sm">
                        <b>Note:</b> All projects added will appear here but only those who are authorized to review projects (reviews.create permission) and assigned user (projects.users.review) can add/edit reviews.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
