@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-tasks"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">PIP</span>
                        <span class="info-box-number">{{ $pipCount }}</span>
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
                    <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{ $userCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->


        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Overall Updating Report</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Sales Chart Canvas -->
                                {!! $chart->container() !!}
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Overall Status</strong>
                                </p>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Projects Reviewed</span>
                                    <span class="float-right"><b>{{$reviewCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: {{ $reviewCount / $projectCount * 100  }}%"></div>
                                    </div>
                                </div>

                                <div class="progress-group">
                                    PIPOL Encoded
                                    <span class="float-right"><b>{{$encodedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: {{ $encodedCount / $projectCount * 100 }}%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    PIPOL Finalized
                                    <span class="float-right"><b>{{$finalizedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: {{ $finalizedCount / $projectCount * 100  }}%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    PIPOL Endorsed
                                    <span class="float-right"><b>{{$endorsedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" style="width: {{ $endorsedCount / $projectCount * 100 }}%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    PIPOL Validated
                                    <span class="float-right"><b>{{$validatedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-secondary" style="width: {{ $validatedCount / $projectCount * 100 }}%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Projects</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm m-0">
                                <thead>
                                <tr>
                                    <th>Project Title</th>
                                    <th class="text-center">Office</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Project Status</th>
                                    <th class="text-center text-nowrap">Added By</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestProjects as $project)
                                <tr>
                                    <td class="text-sm"><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>
                                    <td class="text-center text-sm">
                                        {{ $project->creator->office->name ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        @if(strtolower($project->pap_type->name) == 'project')
                                        <span class="badge badge-success">Project</span>
                                        @elseif(strtolower($project->pap_type->name) == 'program')
                                        <span class="badge badge-danger">Program</span>
                                        @endif
                                    </td>
                                    <td class="text-center text-sm">
                                        {{ $project->project_status->name ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ $project->creator->avatar ?? '' }}" class="img-avatar img-circle" alt="{{ $project->creator->name ?? '' }}" width="50" height="50">
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        @can('projects.view_own')
                        <a href="{{ route('projects.own') }}" class="btn btn-sm btn-secondary float-right ml-1">View Own Projects</a>
                        @endcan
                        @can('reviews.view_index')
                        <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-secondary float-right">Review PAPs</a>
                        @endcan
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Reviews</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm m-0">
                                <thead>
                                <tr>
                                    <th>Project Title</th>
                                    <th>Office</th>
                                    <th class="text-center">Reviewed By</th>
                                    <th>Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                <tr>
                                    <td class="text-sm">
                                        <a href="{{ route('projects.show', $review->project) }}">{{ $review->project->title }}</a>
                                    </td>
                                    <td class="text-sm">
                                        {{ $review->project->creator->office->name ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ $review->user->avatar ?? '' }}" alt="{{ $review->user->name ?? '' }}" height="50" width="50" class="img-avatar img-circle">
                                    <td class="text-sm">
                                        {{ $review->comments }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-secondary float-right">View All Reviews</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

        </div>

    </section>
@endsection

@push('scripts')
    {!! $chart->script() !!}
@endpush
