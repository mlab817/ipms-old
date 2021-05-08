@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-database"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Projects</span>
                        <span class="info-box-number">{{ $projectCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-server"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Programs</span>
                        <span class="info-box-number">{{ $programCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-warehouse"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">TRIP</span>
                        <span class="info-box-number">{{ $tripCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-tasks"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">PIP</span>
                        <span class="info-box-number">{{ $pipCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>

            <div class="dropdown-divider"></div>
            @foreach(auth()->user()->unreadNotifications as $notification)
                {{ json_encode($notification->data['actionUrl']) }}
            @endforeach
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>

    {!! $chart->script() !!}
@endpush
