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
                    <span class="info-box-icon bg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </span>

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
                    <span class="info-box-icon bg-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                        </svg>
                    </span>

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
                    <span class="info-box-icon bg-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                            <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                            <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                        </svg>
                    </span>

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
                    <span class="info-box-icon bg-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </span>

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
                                        <div class="progress-bar bg-success" style="width: {{ $projectCount ? $reviewCount / $projectCount * 100 : 0  }}%"></div>
                                    </div>
                                </div>

                                <div class="progress-group">
                                    PIPOL Encoded
                                    <span class="float-right"><b>{{$encodedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: {{ $projectCount ? $encodedCount / $projectCount * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    PIPOL Finalized
                                    <span class="float-right"><b>{{$finalizedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: {{ $projectCount ? $finalizedCount / $projectCount * 100 : 0 }}%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    PIPOL Endorsed
                                    <span class="float-right"><b>{{$endorsedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" style="width: {{ $projectCount ? $endorsedCount / $projectCount * 100 : 0 }}%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    PIPOL Validated
                                    <span class="float-right"><b>{{$validatedCount}}</b>/{{$projectCount}}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-secondary" style="width: {{ $projectCount ? $validatedCount / $projectCount * 100 : 0 }}%"></div>
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
                                @forelse($latestProjects as $project)
                                <tr>
                                    <td class="text-sm"><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>
                                    <td class="text-center text-sm">
                                        {{ $project->creator->office->name ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        @if(strtolower($project->pap_type->name ?? '') == 'project')
                                        <span class="badge badge-success">Project</span>
                                        @elseif(strtolower($project->pap_type->name ?? '') == 'program')
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
                                @empty
                                    <tr>
                                        <td colspan="100%">No projects found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        @can('projects.view_own')
                        <a href="{{ route('projects.own') }}" class="btn btn-sm btn-secondary float-right ml-1">View Own PAPs</a>
                        @endcan

                        @can('projects.view_office')
                            <a href="{{ route('projects.office') }}" class="btn btn-sm btn-secondary float-right ml-1">View Office PAPs</a>
                        @endcan

                        @can('reviews.view_index')
                        <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-secondary float-right">Review PAPs</a>
                        @endcan
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

            @can('reviews.view_index')
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
                                @forelse($reviews as $review)
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
                                @empty
                                    <tr>
                                        <td colspan="100%">No reviews found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        @can('reviews.view_index')
                        <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-secondary float-right">View All Reviews</a>
                        @endcan
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
            @endcan

        </div>

    </section>
@endsection

@push('scripts')
    {!! $chart->script() !!}
@endpush
