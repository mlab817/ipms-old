@extends('layouts.project')

@section('content')
    <div class="container-md clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <livewire:project-pipol :project="$project" />
    </div>

    {{--    <div class="row">--}}
    {{--        <div class="col-6 col-lg-3">--}}
    {{--            <div class="card overflow-hidden">--}}
    {{--                <div class="card-body p-0 d-flex align-items-center">--}}
    {{--                    <div class="bg-primary p-4 mfe-3">--}}
    {{--                        <svg class="c-icon c-icon-xl">--}}
    {{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>--}}
    {{--                        </svg>--}}
    {{--                    </div>--}}
    {{--                    <div>--}}
    {{--                        <div class="text-value text-primary">--}}
    {{--                            {{ \App\Models\Pipol::where('submission_status','Draft')->count() }}--}}
    {{--                        </div>--}}
    {{--                        <div class="text-muted text-uppercase font-weight-bold small">Draft</div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-6 col-lg-3">--}}
    {{--            <div class="card overflow-hidden">--}}
    {{--                <div class="card-body p-0 d-flex align-items-center">--}}
    {{--                    <div class="bg-info p-4 mfe-3">--}}
    {{--                        <i class="c-icon c-icon-xl cil-laptop">--}}
    {{--                        </i>--}}
    {{--                    </div>--}}
    {{--                    <div>--}}
    {{--                        <div class="text-value text-danger">--}}
    {{--                            {{ \App\Models\Pipol::where('submission_status', 'Endorsed')->where('category','Dropped')->count() }}--}}
    {{--                        </div>--}}
    {{--                        <div class="text-muted text-uppercase font-weight-bold small">Dropped</div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-6 col-lg-3">--}}
    {{--            <div class="card overflow-hidden">--}}
    {{--                <div class="card-body p-0 d-flex align-items-center">--}}
    {{--                    <div class="bg-warning p-4 mfe-3">--}}
    {{--                        <svg class="c-icon c-icon-xl">--}}
    {{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>--}}
    {{--                        </svg>--}}
    {{--                    </div>--}}
    {{--                    <div>--}}
    {{--                        <div class="text-value text-warning">$1.999,50</div>--}}
    {{--                        <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-6 col-lg-3">--}}
    {{--            <div class="card overflow-hidden">--}}
    {{--                <div class="card-body p-0 d-flex align-items-center">--}}
    {{--                    <div class="bg-danger p-4 mfe-3">--}}
    {{--                        <svg class="c-icon c-icon-xl">--}}
    {{--                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>--}}
    {{--                        </svg>--}}
    {{--                    </div>--}}
    {{--                    <div>--}}
    {{--                        <div class="text-value text-danger">$1.999,50</div>--}}
    {{--                        <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}

    {{--    <div class="row">--}}
    {{--        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">--}}
    {{--            <div class="info-box">--}}
    {{--            <span class="info-box-icon bg-primary">--}}
    {{--                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">--}}
    {{--                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />--}}
    {{--                </svg>--}}
    {{--            </span>--}}

    {{--                <div class="info-box-content">--}}
    {{--                    <span class="info-box-text">Draft</span>--}}
    {{--                    <span class="info-box-number">--}}

    {{--                    </span>--}}
    {{--                </div>--}}
    {{--                <!-- /.info-box-content -->--}}
    {{--            </div>--}}
    {{--            <!-- /.info-box -->--}}
    {{--        </div>--}}
    {{--        <!-- /.col -->--}}

    {{--        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">--}}
    {{--            <div class="info-box">--}}
    {{--            <span class="info-box-icon bg-info">--}}
    {{--                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">--}}
    {{--                    <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />--}}
    {{--                    <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />--}}
    {{--                    <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />--}}
    {{--                </svg>--}}
    {{--            </span>--}}

    {{--                <div class="info-box-content">--}}
    {{--                    <span class="info-box-text">Endorsed as Dropped (with reason)</span>--}}
    {{--                    <span class="info-box-number">--}}
    {{--                        ({{ \App\Models\Pipol::where('submission_status', 'Endorsed')->where('category','Dropped')->whereNotNull('reason_id')->count() }})--}}
    {{--                    </span>--}}
    {{--                </div>--}}
    {{--                <!-- /.info-box-content -->--}}
    {{--            </div>--}}
    {{--            <!-- /.info-box -->--}}
    {{--        </div>--}}
    {{--        <!-- /.col -->--}}
    {{--        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">--}}
    {{--            <div class="info-box">--}}
    {{--            <span class="info-box-icon bg-success">--}}
    {{--                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">--}}
    {{--                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />--}}
    {{--                </svg>--}}
    {{--            </span>--}}

    {{--                <div class="info-box-content">--}}
    {{--                    <span class="info-box-text">Endorsed (Proposed/Ongoing/Completed)</span>--}}
    {{--                    <span class="info-box-number">--}}
    {{--                        {{ \App\Models\Pipol::where('submission_status','Endorsed')->where('category','<>','Dropped')->count() }}--}}
    {{--                    </span>--}}
    {{--                </div>--}}
    {{--                <!-- /.info-box-content -->--}}
    {{--            </div>--}}
    {{--            <!-- /.info-box -->--}}
    {{--        </div>--}}
    {{--        <!-- /.col -->--}}

    {{--        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">--}}
    {{--            <div class="info-box">--}}
    {{--                <span class="info-box-icon bg-danger">--}}
    {{--                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">--}}
    {{--                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />--}}
    {{--                    </svg>--}}
    {{--                </span>--}}

    {{--                <div class="info-box-content">--}}
    {{--                    <span class="info-box-text">IPMS/PIPOL Endorsed Matched</span>--}}
    {{--                    <span class="info-box-number">--}}
    {{--                        {{ \App\Models\Pipol::where('category','<>','Dropped')->where('submission_status','Endorsed')->whereNotNull('ipms_id')->count() }}--}}
    {{--                    </span>--}}
    {{--                </div>--}}
    {{--                <!-- /.info-box-content -->--}}
    {{--            </div>--}}
    {{--            <!-- /.info-box -->--}}
    {{--        </div>--}}
    {{--        <!-- /.col -->--}}

    {{--    </div>--}}

    {{--    <livewire:pipols-table />--}}
@stop
