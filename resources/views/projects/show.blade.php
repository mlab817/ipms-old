@extends('layouts.project')

@section('title', 'Profile | ' . str_limit($project->title) )

@section('content')
    <div class="gutter-condensed"></div>
        <div>
            <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                <div class="flex-shrink-0 col-12 mb-4 mb-md-0">
                    <div class="flash @if($project->isCurrent()) flash-success @else flash-error @endif mb-3">
                        @if($project->isCurrent())
                            This project is proposed to be included into {{ $project->updating_period->name ?? '' }}
                        @else
                            This project was set to be included into {{ $project->updating_period->name ?? 'No updating period selected' }}.
                            It cannot be edited. Clone this program/project instead to include in the current updating period.
                            @if($currentVersion) The current version is <a href="{{ route('projects.show', $currentVersion) }}">#{{ $currentVersion->id }}</a>. @endif
                        @endif

                        <div class="flash-action">
                            <details class="details-reset details-overlay details-overlay-dark">
                                <summary role="button" class="btn btn-sm" aria-haspopup="dialog">Learn More</summary>
                                <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast" role="dialog" aria-modal="true" tabindex="-1">
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                            <!-- <%= octicon "x" %> -->
                                            <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                        </button>
                                        <h3 class="Box-title">PAPs and Updating Period</h3>
                                    </div>
                                    <div class="Box-body">
                                        <p>
                                            In order to keep track of information every PIP/TRIP updating,
                                            the system now requires that PAPs be cloned (duplicated) prior
                                            to editing/updating. This would allow the system to keep track
                                            of changes in PAP information across updating period which is
                                            quite common in prior experiences.
                                        </p>
                                        <p>
                                            Note also that PAPs for dropping need to be cloned for tracking
                                            purposes.
                                        </p>
                                    </div>
                                </details-dialog>
                            </details>
                        </div>
                    </div>

                    <div class="mb-3 d-flex flex-items-start">
                        <div>
                            <details class="dropdown details-reset details-overlay d-inline-block">
                                <summary class="btn" aria-haspopup="true">
                                    {{ '#' . $project->id }}
                                    <div class="dropdown-caret"></div>
                                </summary>
                                <ul class="dropdown-menu dropdown-menu-se">
                                    <div class="dropdown-header">
                                        Select version
                                    </div>
                                    @foreach($project->original->clones as $projectClone)
                                        <li>
                                            <a href="{{ route('projects.show', $projectClone) }}" class="dropdown-item">
                                                @if($project->id == $projectClone->id)
                                                <strong>
                                                    #{{ $projectClone->id }}
                                                </strong>
                                                @else
                                                <span>
                                                    #{{ $projectClone->id }}
                                                </span>
                                                @endif

                                                @if($projectClone->updating_period_id == config('ipms.current_updating_period'))
                                                    <div class="float-right">
                                                        <svg class="octicon octicon-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path></svg>
                                                    </div>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </details>
                        </div>
                        <div class="flex-auto"></div>
                        <details class="details-reset details-overlay details-overlay-dark">
                            <summary class="btn btn-primary" aria-haspopup="dialog">
                                <svg class="octicon octicon-clone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M15 0H9v7c0 .55.45 1 1 1h1v1h1V8h3c.55 0 1-.45 1-1V1c0-.55-.45-1-1-1zm-4 7h-1V6h1v1zm4 0h-3V6h3v1zm0-2h-4V1h4v4zM4 5H3V4h1v1zm0-2H3V2h1v1zM2 1h6V0H1C.45 0 0 .45 0 1v12c0 .55.45 1 1 1h2v2l1.5-1.5L6 16v-2h5c.55 0 1-.45 1-1v-3H2V1zm9 10v2H6v-1H3v1H1v-2h10zM3 8h1v1H3V8zm1-1H3V6h1v1z"></path></svg>
                                <span>Clone</span>
                            </summary>

                            <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                                <form action="{{ route('projects.clone', $project) }}" method="POST" accept-charset="UTF-8">
                                    @csrf
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                            <!-- <%= octicon "x" %> -->
                                            <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                        </button>
                                        <h3 class="Box-title">Clone this Project/Program</h3>
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
                                                    <option value="">Select Updating Period</option>
                                                    @foreach(\App\Models\UpdatingPeriod::where('id', config('ipms.current_updating_period'))->get() as $option)
                                                        <option value="{{ $option->id }}">{{ $option->name }}</option>
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

                    <div @if($project->isArchived() || $project->updating_period_id != config('ipms.current_updating_period')) style="pointer-events: none;" @endif>

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
@endsection
