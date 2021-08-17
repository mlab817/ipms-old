@extends('layouts.app')

@section('content')
    <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
        <div>

            <div class="position-relative">

                <div class="mt-4">
                    <div class="js-pinned-items-reorder-container">
                        <h2 class="f4 mb-2 text-normal">
                            Pinned PAPs
                        </h2>

                        @if(count($pinnedProjects))
                            <!-- Projects boxes -->
                            <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4">
                                @foreach($pinnedProjects as $project)
                                <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                    <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                        <div class="pinned-item-list-item-content">
                                            <div class="d-flex width-full flex-items-center position-relative">
                                                <a href="{{ route('projects.show', $project) }}" class="text-bold flex-auto min-width-0">
                                                    <span class="repo" title="ipms-docs">{{ $project->title }}</span>
                                                </a>
                                                <span class="Label Label--secondary v-align-middle">
                                                    {{ $project->submission_status->name ?? '' }}
                                                </span>
                                            </div>

                                            <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">
                                                {!! strip_tags(Str::limit($project->description->description, 180)) !!}
                                            </p>

                                            <p class="mb-0 f6 color-text-secondary">
                                                <span class="d-inline-block mr-3">
                                                    <span class="repo-language-color" style="background-color: #f1e05a"></span>
                                                    <span itemprop="programmingLanguage">
                                                        {{ $project->pap_type->name ?? '' }}
                                                    </span>
                                                </span>
                                                <span href="/mlab817/lighthouse-graphql-permission/stargazers" class="pinned-item-meta Link--muted ">
                                                    PhP
                                                    {{ number_format($project->total_project_cost, 2) }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="Box">
                                <x-blankslate message="You have not pinned any program/projects. Pin projects for easier and faster access." />
                            </div>
                        @endif

                        <!-- ./ Projects boxes -->
                    </div>

                </div>

                <div class="mt-4">
                    <div class="js-pinned-items-reorder-container">
                        <h2 class="f4 mb-2 text-normal">
                            My PAPs
                        </h2>

                    @if(count($ownedProjects))
                        <!-- Projects boxes -->
                            <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4">
                                @foreach($ownedProjects as $project)
                                    <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                        <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                            <div class="pinned-item-list-item-content">
                                                <div class="d-flex width-full flex-items-center position-relative">
                                                    <a href="{{ route('projects.show', $project) }}" class="text-bold flex-auto min-width-0">
                                                        <span class="repo" title="ipms-docs">{{ $project->title }}</span>
                                                    </a>
                                                    <span class="Label Label--secondary v-align-middle">
                                                    {{ $project->submission_status->name ?? '' }}
                                                </span>
                                                </div>

                                                <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">
                                                    {!! strip_tags(Str::limit($project->description->description, 180)) !!}
                                                </p>

                                                <p class="mb-0 f6 color-text-secondary">
                                                <span class="d-inline-block mr-3">
                                                    <span class="repo-language-color" style="background-color: #f1e05a"></span>
                                                    <span itemprop="programmingLanguage">
                                                        {{ $project->pap_type->name ?? '' }}
                                                    </span>
                                                </span>
                                                    <span href="/mlab817/lighthouse-graphql-permission/stargazers" class="pinned-item-meta Link--muted ">
                                                    PhP
                                                    {{ number_format($project->total_project_cost, 2) }}
                                                </span>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <div class="Box">
                                <x-blankslate message="You have not pinned any program/projects. Pin projects for easier and faster access." />
                            </div>
                    @endif

                    <!-- ./ Projects boxes -->
                    </div>

                </div>

            </div>
        </div>
    </div>

{{--    <div class="alert alert-success" role="alert">--}}
{{--        Link to Master List Tracker:--}}
{{--        <a href="http://bit.ly/2021PIPMasterlist" style="text-decoration: none;" target="_blank">FY 2021 PIP UPDATING_PAP MASTERLIST_052021</a>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-6 col-lg-3">--}}
{{--            <div class="card overflow-hidden">--}}
{{--                <div class="card-body p-0 d-flex align-items-center">--}}
{{--                    <div class="bg-primary p-4 mfe-3">--}}
{{--                        <i class="c-icon c-icon-xl cil-settings">--}}
{{--                        </i>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-value text-primary">{{ $pipCount }}</div>--}}
{{--                        <div class="text-muted text-uppercase font-weight-bold small">PIP</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-6 col-lg-3">--}}
{{--            <div class="card overflow-hidden">--}}
{{--                <div class="card-body p-0 d-flex align-items-center">--}}
{{--                    <div class="bg-info p-4 mfe-3">--}}
{{--                        <i class="c-icon c-icon-xl cil-laptop"></i>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-value text-info">{{ $tripCount }}</div>--}}
{{--                        <div class="text-muted text-uppercase font-weight-bold small">TRIP</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-6 col-lg-3">--}}
{{--            <div class="card overflow-hidden">--}}
{{--                <div class="card-body p-0 d-flex align-items-center">--}}
{{--                    <div class="bg-warning p-4 mfe-3">--}}
{{--                        <i class="c-icon c-icon-xl cil-grid">--}}
{{--                        </i>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-value text-warning">{{ $projectCount }}</div>--}}
{{--                        <div class="text-muted text-uppercase font-weight-bold small">Projects</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-6 col-lg-3">--}}
{{--            <div class="card overflow-hidden">--}}
{{--                <div class="card-body p-0 d-flex align-items-center">--}}
{{--                    <div class="bg-danger p-4 mfe-3">--}}
{{--                        <i class="c-icon c-icon-xl cil-user">--}}
{{--                        </i>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-value text-danger">--}}
{{--                            {{ $userCount }}--}}
{{--                        </div>--}}
{{--                        <div class="text-muted text-uppercase font-weight-bold small">Users</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <strong>Overall Updating Report</strong>--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-8">--}}
{{--                            <!-- Sales Chart Canvas -->--}}

{{--                            <!-- /.chart-responsive -->--}}
{{--                        </div>--}}
{{--                        <!-- /.col -->--}}
{{--                        <div class="col-md-4">--}}
{{--                            <p class="text-center">--}}
{{--                                <strong>Overall Status</strong>--}}
{{--                            </p>--}}

{{--                            <!-- /.progress-group -->--}}
{{--                            <div class="progress-group">--}}
{{--                                <span class="progress-text">PAPs Reviewed</span>--}}
{{--                                <span class="float-right"><b>{{$reviewCount}}</b>/{{$projectCount}}</span>--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-success" style="width: {{ $projectCount ? $reviewCount / $projectCount * 100 : 0  }}%"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="progress-group">--}}
{{--                                PAPs tagged as PIP--}}
{{--                                <span class="float-right"><b>{{$pipCount}}</b>/{{$reviewCount}}</span>--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-primary" style="width: {{ $reviewCount ? $pipCount / $reviewCount * 100 : 0 }}%"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.progress-group -->--}}

{{--                            <div class="progress-group">--}}
{{--                                PIP PAPs with PIPOL Entry--}}
{{--                                <span class="float-right"><b>{{$encodedCount}}</b>/{{$pipCount}}</span>--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-primary" style="width: {{ $pipCount ? $encodedCount / $pipCount * 100 : 0 }}%"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.progress-group -->--}}

{{--                            <!-- /.progress-group -->--}}
{{--                            <div class="progress-group">--}}
{{--                                PIP PAPs Endorsed in PIPOL--}}
{{--                                <span class="float-right"><b>{{ $endorsedCount }}</b>/{{ $encodedCount }}</span>--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-warning" style="width: {{ $encodedCount ? $endorsedCount / $encodedCount * 100 : 0 }}%"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.progress-group -->--}}

{{--                            <!-- /.progress-group -->--}}
{{--                            <div class="progress-group">--}}
{{--                                PIP PAPs still Draft in PIPOL--}}
{{--                                <span class="float-right"><b>{{ $draftCount }}</b>/{{ $encodedCount }}</span>--}}
{{--                                <div class="progress progress-sm">--}}
{{--                                    <div class="progress-bar bg-warning" style="width: {{ $encodedCount ? $draftCount / $encodedCount * 100 : 0 }}%"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.progress-group -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.row -->--}}
{{--                </div>--}}
{{--                <!-- ./card-body -->--}}
{{--            </div>--}}
{{--            <!-- /.card -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- /.row -->--}}

{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            <strong>Progress by Staff</strong>--}}
{{--        </div>--}}
{{--        <!-- /.card-header -->--}}
{{--        <div class="card-body table-responsive p-0">--}}
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th style="width: 30px">#</th>--}}
{{--                    <th>User</th>--}}
{{--                    <th>Total Projects Added</th>--}}
{{--                    <th>Total Projects Reviewed</th>--}}
{{--                    <th>Progress</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @php--}}
{{--                    $i = 1;--}}
{{--                @endphp--}}
{{--                @forelse($users as $user)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $i++ }}</td>--}}
{{--                        <td>{{ $user->name }}</td>--}}
{{--                        <td>{{ $user->projects_count }}</td>--}}
{{--                        <td>{{ $user->projects()->has('review')->count() }}</td>--}}
{{--                        <td>--}}
{{--                            <div class="progress progress-xs">--}}
{{--                                <div class="progress-bar bg-warning" style="width: {{ $user->projects_count > 0 ? round($user->reviews_count / $user->projects_count * 100) : 0 }}%"></div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <span class="badge bg-danger">{{ $user->projects_count > 0 ? round($user->projects()->has('review')->count() / $user->projects_count * 100) : 0 }}%</span>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <tr>--}}
{{--                        <td colspan="100%">No users found.</td>--}}
{{--                    </tr>--}}
{{--                @endforelse--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--        <!-- /.card-body -->--}}
{{--        <div class="card-footer">--}}
{{--            <p class="text-sm text-muted">Note: This will only be used during this updating since the reviewers are expected to encode and review their own PAPs.</p>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}

{{--        <div class="col-lg-6">--}}
{{--            <div class="card h-100">--}}
{{--                <div class="card-header border-transparent">--}}
{{--                    <strong>Latest Projects</strong>--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <div class="card-body p-0">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-sm m-0">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Project Title</th>--}}
{{--                                <th class="text-center">Office</th>--}}
{{--                                    <th class="text-center">Type</th>--}}
{{--                                    <th class="text-center">Project Status</th>--}}
{{--                                <th class="text-center text-nowrap">Added By</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @forelse($latestProjects as $project)--}}
{{--                            <tr>--}}
{{--                                <td class="text-sm"><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>--}}
{{--                                <td class="text-center text-sm">--}}
{{--                                    {{ $project->office->acronym ?? '' }}--}}
{{--                                </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        @if(strtolower($project->pap_type->name ?? '') == 'project')--}}
{{--                                        <span class="badge badge-success">Project</span>--}}
{{--                                        @elseif(strtolower($project->pap_type->name ?? '') == 'program')--}}
{{--                                        <span class="badge badge-danger">Program</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center text-sm">--}}
{{--                                        {{ $project->project_status->name ?? '' }}--}}
{{--                                    </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <img src="{{ $project->creator->avatar ?? '' }}" class="img-avatar img-circle" alt="{{ $project->creator->name ?? '' }}" width="50" height="50">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            @empty--}}
{{--                                <tr>--}}
{{--                                    <td colspan="100%">No projects found.</td>--}}
{{--                                </tr>--}}
{{--                            @endforelse--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <!-- /.table-responsive -->--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--                <div class="card-footer">--}}
{{--                    @can('projects.view_own')--}}
{{--                    <a href="{{ route('projects.own') }}" class="btn btn-sm btn-secondary float-right ml-1">View Own PAPs</a>--}}
{{--                    @endcan--}}

{{--                    @can('projects.view_office')--}}
{{--                        <a href="{{ route('projects.office') }}" class="btn btn-sm btn-secondary float-right ml-1">View Office PAPs</a>--}}
{{--                    @endcan--}}

{{--                    @can('reviews.view_index')--}}
{{--                    <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-secondary float-right">Review PAPs</a>--}}
{{--                    @endcan--}}
{{--                </div>--}}
{{--                <!-- /.card-footer -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @can('reviews.view_index')--}}
{{--        <div class="col-lg-6">--}}
{{--            <div class="card h-100">--}}
{{--                <div class="card-header border-transparent">--}}
{{--                    <strong>Latest Reviews</strong>--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <div class="card-body p-0">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-sm m-0">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Project Title</th>--}}
{{--                                <th>Office</th>--}}
{{--                                <th class="text-center">Reviewed By</th>--}}
{{--                                    <th>Comments</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @forelse($reviews as $review)--}}
{{--                            <tr>--}}
{{--                                <td class="text-sm">--}}
{{--                                    <a href="{{ route('projects.show', $review->project) }}">{{ $review->project->title }}</a>--}}
{{--                                </td>--}}
{{--                                <td class="text-sm">--}}
{{--                                    {{ $review->project->office->acronym ?? '' }}--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <img src="{{ $review->user->avatar ?? '' }}" alt="{{ $review->user->name ?? '' }}" height="50" width="50" class="img-avatar img-circle">--}}
{{--                                    <td class="text-sm">--}}
{{--                                        {{ $review->comments }}--}}
{{--                                    </td>--}}
{{--                            </tr>--}}
{{--                            @empty--}}
{{--                                <tr>--}}
{{--                                    <td colspan="100%">No reviews found.</td>--}}
{{--                                </tr>--}}
{{--                            @endforelse--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <!-- /.table-responsive -->--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--                <div class="card-footer">--}}
{{--                    @can('reviews.view_index')--}}
{{--                    <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-secondary float-right">View All Reviews</a>--}}
{{--                    @endcan--}}
{{--                </div>--}}
{{--                <!-- /.card-footer -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @endcan--}}

{{--    </div>--}}
@endsection
