@extends('layouts.project')

@section('title', 'Profile | ' . str_limit($baseProject->title) )

@section('content')
    @if(!$project)
        <p>No project found. If this is a newly created base project, please wait while the system generates the branch.</p>
    @else
    <div class="gutter-condensed">
        <div class="container-xl mx-auto clearfix px-3 px-md-4 px-lg-5">
            <div class="mb-3 d-flex flex-items-start">
                <div>
                    <details class="dropdown details-reset details-overlay d-inline-block">
                        <summary class="btn" aria-haspopup="true">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-git-branch">
                                <path fill-rule="evenodd" d="M11.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122V6A2.5 2.5 0 0110 8.5H6a1 1 0 00-1 1v1.128a2.251 2.251 0 11-1.5 0V5.372a2.25 2.25 0 111.5 0v1.836A2.492 2.492 0 016 7h4a1 1 0 001-1v-.628A2.25 2.25 0 019.5 3.25zM4.25 12a.75.75 0 100 1.5.75.75 0 000-1.5zM3.5 3.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0z"></path>
                            </svg>
                            {{ $project->branch->label }}
                            <div class="dropdown-caret"></div>
                        </summary>
                        <ul class="dropdown-menu dropdown-menu-se">
                            <div class="dropdown-header">
                                Select branch
                            </div>
                            @foreach(\App\Models\Branch::all() as $branch)
                                <li>
                                    <a href="{{ route('base-projects.branches.show', ['base_project'=> $baseProject, 'branch' => $branch]) }}" class="dropdown-item">
                                        {{ $branch->label ?? 'N/A' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </details>

                    <a href="{{ route('projects.compare', $project) }}" class="btn">Compare</a>
                </div>
                <div class="flex-auto"></div>
                <details class="details-reset details-overlay details-overlay-dark">
                    <summary class="btn btn-primary" aria-haspopup="dialog">
                        <svg class="octicon octicon-clone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M15 0H9v7c0 .55.45 1 1 1h1v1h1V8h3c.55 0 1-.45 1-1V1c0-.55-.45-1-1-1zm-4 7h-1V6h1v1zm4 0h-3V6h3v1zm0-2h-4V1h4v4zM4 5H3V4h1v1zm0-2H3V2h1v1zM2 1h6V0H1C.45 0 0 .45 0 1v12c0 .55.45 1 1 1h2v2l1.5-1.5L6 16v-2h5c.55 0 1-.45 1-1v-3H2V1zm9 10v2H6v-1H3v1H1v-2h10zM3 8h1v1H3V8zm1-1H3V6h1v1z"></path></svg>
                        <span>Clone</span>
                    </summary>

                    <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                        <form action="{{ route('projects.clones.store', $project) }}" method="POST" accept-charset="UTF-8">
                            @csrf
                            <div class="Box-header">
                                <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                    <!-- <%= octicon "x" %> -->
                                    <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                </button>
                                <h3 class="Box-title">Create a new branch</h3>
                            </div>
                            <div class="overflow-auto">
                                <div class="Box-body overflow-auto">
                                    <p>
                                        To preserve the data for each updating period, users are required to clone the project/program. Cloning a project/program
                                        will copy all its information except <code>Review, Issues and History</code>. The original project/program will be archived
                                        and turned into readonly. Cloning may take some time.
                                    </p>
                                </div>
                                <ul>
                                    <li class="Box-row">
                                        <select name="updating_period_id" id="updating_period_id" class="form-select" required autofocus>
                                            <option value="">Select Branch</option>
                                            @foreach(\App\Models\Branch::all() as $option)
                                                <option value="{{ $option->id }}">{{ $option->label . ' - ' . $option->name }}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="Box-footer">
                                <button type="submit" class="btn btn-block btn-primary">Clone</button>
                            </div>
                        </form>
                    </details-dialog>
                </details>
            </div>
        <div>
            <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                <div class="flex-shrink-0 col-12 mb-4 mb-md-0">
                    <div @if($project->isArchived()) style="pointer-events: none;" @endif>

                        <form action="{{ route('projects.update', $project) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="Box md Box--responsive">
                                <!-- Navigator -->
                                <div class="d-flex top-0 border-top-0 border-bottom p-2 flex-items-center flex-justify-between color-bg-primary rounded-top-2 is-stuck" style="position: sticky; z-index: 90; top: 0px !important;">
                                    <div class="d-flex flex-items-center">
                                        <details class="dropdown details-reset details-overlay">
                                            <summary class="btn btn-octicon m-0 mr-2 p-2" aria-haspopup="true" role="button">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"  height="16" width="16" class="octicon octicon-list-unordered">
                                                    <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                </svg>
                                            </summary>

                                            <ul class="dropdown-menu dropdown-menu-e">
                                                <li><a class="dropdown-item" href="#general-information">General Information</a></li>
                                                <li><a class="dropdown-item" href="#other-pap-information">Other PAP Information</a></li>
                                                <li><a class="dropdown-item" href="#spatial-coverage">Spatial Coverage</a></li>
                                                <li><a href="#implementation-period" class="dropdown-item">Implementation Period</a></li>
                                                <li><a href="#approval-status" class="dropdown-item">Approval Status</a></li>
                                                <li><a href="#regional-development-investment-program" class="dropdown-item">Regional Development Investment Program</a></li>
                                                <li><a href="#project-preparation-details" class="dropdown-item">Project Preparation Details</a></li>
                                                <li><a href="#employment-generation" class="dropdown-item">Employment Generation</a></li>
                                                <li><a href="#pdp-chapter" class="dropdown-item">PDP Chapter</a></li>
                                                <li><a href="#sustainable-development-goals" class="dropdown-item">Sustainable Development Goals</a></li>
                                                <li><a href="#ten-point-agendas" class="dropdown-item">Ten Point Agenda</a></li>
                                                <li><a href="#financial-information" class="dropdown-item">Financial Information</a></li>
                                                <li><a href="#status-and-updates" class="dropdown-item">Status & Updates</a></li>
                                                <li><a href="#investment-required-by-funding-source" class="dropdown-item">Investment Required by Funding Source</a></li>
                                                <li><a href="#investment-required-by-region" class="dropdown-item">Investment Required by Region</a></li>
                                                <li><a href="#financial-status" class="dropdown-item">Financial Status</a></li>
                                            </ul>
                                        </details>

                                        <h2 class="Box-title">
                                            {{ $project->title }}
                                        </h2>
                                    </div>

                                    <button class="float-right btn btn-primary" type="submit">Save Changes</button>
                                </div>
                                <!--// Navigator -->
                                <div class="Box-body">
                                    @include('projects.edit')
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    <div class="my-3"></div>
    @endif
@endsection
