@extends('layouts.app')

@section('content')
    <!-- Top Navigation -->
    <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
        <div class="UnderlineNav width-full box-shadow-none">
            <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
                <a aria-current="page" class="UnderlineNav-item selected" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_OVERVIEW&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="959844c3a75fd2f13efac672e162b683628209284258b3ceba6c3803ab4b3521" href="/mlab817">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-book UnderlineNav-octicon hide-sm">
                        <path fill-rule="evenodd" d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                    </svg>
                    Overview
                </a>
                <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_PROJECTS&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="bbc9d8f193423d498386859c88af239662898b6bfceb0ba134c0fbf29f34a50b" href="/mlab817?tab=projects">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                        <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                    </svg>
                    Projects
                    <span title="1" data-view-component="true" class="Counter">1</span>
                </a>
                <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="e833faa90508c3f719d379c705750a41656063ef985fff9f575786be012f2fe9" href="/mlab817?tab=packages">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-package UnderlineNav-octicon hide-sm">
                        <path fill-rule="evenodd" d="M8.878.392a1.75 1.75 0 00-1.756 0l-5.25 3.045A1.75 1.75 0 001 4.951v6.098c0 .624.332 1.2.872 1.514l5.25 3.045a1.75 1.75 0 001.756 0l5.25-3.045c.54-.313.872-.89.872-1.514V4.951c0-.624-.332-1.2-.872-1.514L8.878.392zM7.875 1.69a.25.25 0 01.25 0l4.63 2.685L8 7.133 3.245 4.375l4.63-2.685zM2.5 5.677v5.372c0 .09.047.171.125.216l4.625 2.683V8.432L2.5 5.677zm6.25 8.271l4.625-2.683a.25.25 0 00.125-.216V5.677L8.75 8.432v5.516z"></path>
                    </svg>
                    Reviews
                </a>
            </nav>

        </div>
    </div>
    <!-- ./ Tab Navigation -->

    <div data-view-component="true" class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
        <div>

            <div class="position-relative">

                <div class="mt-4">
                    <div class="js-pinned-items-reorder-container">
                        <h2 class="f4 mb-2 text-normal">
                            Programs and Projects
                        </h2>

                        <!-- Projects boxes -->
                        <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4">
                            <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                    <div class="pinned-item-list-item-content">
                                        <div class="d-flex width-full flex-items-center position-relative">
                                            <a href="/mlab817/ipms-docs" class="text-bold flex-auto min-width-0">
                                                <span class="repo" title="ipms-docs">ipms-docs</span>
                                            </a>
                                            <span class="Label Label--secondary v-align-middle ">Template</span>
                                        </div>


                                        <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">
                                            Documentation for IPMS frontend
                                        </p>

                                        <p class="mb-0 f6 color-text-secondary">
                                            <span class="d-inline-block mr-3">
                                                <span class="repo-language-color" style="background-color: #f1e05a"></span>
                                                <span itemprop="programmingLanguage">JavaScript</span>
                                            </span>

                                            <a href="/mlab817/ipms-docs/stargazers" class="pinned-item-meta Link--muted ">
                                                <svg aria-label="star" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-star">
                                                    <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                                </svg>
                                                1
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ol>

                        <!-- ./ Projects boxes -->
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="alert alert-success" role="alert">
        Link to Master List Tracker:
        <a href="http://bit.ly/2021PIPMasterlist" style="text-decoration: none;" target="_blank">FY 2021 PIP UPDATING_PAP MASTERLIST_052021</a>
    </div>

    <div class="row">
        <div class="col-6 col-lg-3">
            <div class="card overflow-hidden">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-primary p-4 mfe-3">
                        <i class="c-icon c-icon-xl cil-settings">
                        </i>
                    </div>
                    <div>
                        <div class="text-value text-primary">{{ $pipCount }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">PIP</div>
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
                        <div class="text-value text-info">{{ $tripCount }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">TRIP</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card overflow-hidden">
                <div class="card-body p-0 d-flex align-items-center">
                    <div class="bg-warning p-4 mfe-3">
                        <i class="c-icon c-icon-xl cil-grid">
                        </i>
                    </div>
                    <div>
                        <div class="text-value text-warning">{{ $projectCount }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Projects</div>
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


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Overall Updating Report</strong>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Sales Chart Canvas -->

                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Overall Status</strong>
                            </p>

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">PAPs Reviewed</span>
                                <span class="float-right"><b>{{$reviewCount}}</b>/{{$projectCount}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: {{ $projectCount ? $reviewCount / $projectCount * 100 : 0  }}%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                PAPs tagged as PIP
                                <span class="float-right"><b>{{$pipCount}}</b>/{{$reviewCount}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: {{ $reviewCount ? $pipCount / $reviewCount * 100 : 0 }}%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->

                            <div class="progress-group">
                                PIP PAPs with PIPOL Entry
                                <span class="float-right"><b>{{$encodedCount}}</b>/{{$pipCount}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: {{ $pipCount ? $encodedCount / $pipCount * 100 : 0 }}%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                PIP PAPs Endorsed in PIPOL
                                <span class="float-right"><b>{{ $endorsedCount }}</b>/{{ $encodedCount }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: {{ $encodedCount ? $endorsedCount / $encodedCount * 100 : 0 }}%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->

                            <!-- /.progress-group -->
                            <div class="progress-group">
                                PIP PAPs still Draft in PIPOL
                                <span class="float-right"><b>{{ $draftCount }}</b>/{{ $encodedCount }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" style="width: {{ $encodedCount ? $draftCount / $encodedCount * 100 : 0 }}%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

    <div class="card">
        <div class="card-header">
            <strong>Progress by Staff</strong>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 30px">#</th>
                    <th>User</th>
                    <th>Total Projects Added</th>
                    <th>Total Projects Reviewed</th>
                    <th>Progress</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @forelse($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->projects_count }}</td>
                        <td>{{ $user->projects()->has('review')->count() }}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-warning" style="width: {{ $user->projects_count > 0 ? round($user->reviews_count / $user->projects_count * 100) : 0 }}%"></div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-danger">{{ $user->projects_count > 0 ? round($user->projects()->has('review')->count() / $user->projects_count * 100) : 0 }}%</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">No users found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <p class="text-sm text-muted">Note: This will only be used during this updating since the reviewers are expected to encode and review their own PAPs.</p>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
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
                    <strong>Latest Reviews</strong>
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
{{--                                    <th>Comments</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($reviews as $review)
                            <tr>
                                <td class="text-sm">
                                    <a href="{{ route('projects.show', $review->project) }}">{{ $review->project->title }}</a>
                                </td>
                                <td class="text-sm">
                                    {{ $review->project->office->acronym ?? '' }}
                                </td>
                                <td class="text-center">
                                    <img src="{{ $review->user->avatar ?? '' }}" alt="{{ $review->user->name ?? '' }}" height="50" width="50" class="img-avatar img-circle">
{{--                                    <td class="text-sm">--}}
{{--                                        {{ $review->comments }}--}}
{{--                                    </td>--}}
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
                <div class="card-footer">
                    @can('reviews.view_index')
                    <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-secondary float-right">View All Reviews</a>
                    @endcan
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        @endcan

    </div>
@endsection
