@extends('layouts.admin')

@section('breadcrumb')
    @include('includes.breadcrumb', [
        'breadcrumbs' => [
            'Dashboard' => null
        ]
    ])
@stop

@section('content')
    <div class="alert alert-success" role="alert">
        Link to Master List Tracker:
        <a href="http://bit.ly/2021PIPMasterlist" style="text-decoration: none;" target="_blank">FY 2021 PIP UPDATING_PAP MASTERLIST_052021</a>
    </div>

    <div class="row">
        <div class="col-6 col-lg-3">
            <div class="card overflow-hidden">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-primary p-4 mfe-3">
                        <i class="c-icon c-icon-xl cil-settings"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">{{ $projectCount }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Own Projects</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card overflow-hidden">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-info p-4 mfe-3">
                        <i class="c-icon c-icon-xl cil-laptop"></i>
                    </div>
                    <div>
                        <div class="text-value text-info">{{ $officeProjectsCount }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Office Projects</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card overflow-hidden">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-success p-4 mfe-3">
                        <i class="c-icon c-icon-xl cil-grid">
                        </i>
                    </div>
                    <div>
                        <div class="text-value text-success">{{ $endorsedOfficeProjectsCount }} ({{ $endorsedOwnProjectsCount }})</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Endorsed Office (Own) Projects</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card overflow-hidden">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-danger p-4 mfe-3">
                        <i class="c-icon c-icon-xl cil-user">
                        </i>
                    </div>
                    <div>
                        <div class="text-value text-danger">
                            {{ $userCount }}
                        </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Users</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card h-100">
        <div class="card-header border-transparent">
            <strong>Latest Projects</strong>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm m-0">
                    <thead>
                    <tr>
                        <th>Project Title</th>
                        <th class="text-center">Office</th>
                        {{--                                    <th class="text-center">Type</th>--}}
                        {{--                                    <th class="text-center">Project Status</th>--}}
                        <th class="text-center text-nowrap">Submission Status</th>
                        <th class="text-center text-nowrap">Added On</th>
                        <th class="text-center text-nowrap">Added By</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($latestProjects as $project)
                        <tr>
                            <td class="text-sm"><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>
                            <td class="text-center text-sm">
                                {{ $project->office->acronym ?? '' }}
                            </td>
                            <td class="text-center text-sm">
                                {{ $project->submission_status->name ?? '' }}
                            </td>
                            <td class="text-center text-sm">
                                {{ $project->created_at->diffForHumans(null, null, true) ?? '' }}
                            </td>
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
                            <td class="text-center">
                                <div class="c-avatar">
                                    <img src="{{ $project->creator->avatar ?? '' }}" class="c-avatar-img" alt="{{ $project->creator->name ?? '' }}" width="50" height="50">
                                </div>
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
@endsection
