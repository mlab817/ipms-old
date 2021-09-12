@extends('layouts.project')

@section('title', 'Profile | ' . str_limit($baseProject->title) )

@section('content')
    <div class="gutter-condensed"></div>
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
@endsection
