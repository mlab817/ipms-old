@extends('layouts.project')

@section('title', 'Profile | ' . str_limit($project->title) )

@section('content')
    @if(session()->has('errors'))
        <div class="flash flash-error mb-3" id="flash">
            {{ $errors->first() }}
            <button class="flash-close js-flash-close" type="button" aria-label="Close" onclick="dismiss()">
                <!-- <%= octicon "x" %> -->
                <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path>
                </svg>
            </button>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="flash flash-success mb-3" id="flash">
            {{ session('message') }}
            <button class="flash-close js-flash-close" type="button" aria-label="Close" onclick="dismiss()">
                <!-- <%= octicon "x" %> -->
                <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path>
                </svg>
            </button>
        </div>
    @endif

        <div class="gutter-condensed"></div>


            <div>
                <div class="d-none d-lg-block mt-6 mr-3 Popover top-0 right-0 color-shadow-medium col-3">

                </div>

                <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                    <div class="flex-shrink-0 col-12 mb-4 mb-md-0">
                        @if(config('ipms.current_updating_period') == $project->updating_period_id)
                        <div class="flash flash-success mb-3 d-flex flex-justify-between flex-column flex-md-row flex-md-items-center">
                            <div class="flex-column mb-2 mb-md-0 mr-0 pr-md-4">
                                <h5 class="mb-1">
                                    <svg class="octicon octicon-check-circle-fill mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 16A8 8 0 108 0a8 8 0 000 16zm3.78-9.72a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path></svg>
                                    This project is proposed to be included into {{ $project->updating_period->name ?? '' }}.
                                </h5>
                            </div>
                        </div>
                            @else
                            <div class="flash flash-error mb-3 d-flex flex-justify-between flex-column flex-md-row flex-md-items-center">
                                <div class="flex-column mb-2 mb-md-0 mr-0 pr-md-4">
                                    <h5 class="mb-1">
                                        <svg class="octicon octicon-alert" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18"><path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path></svg>
                                        This project was set to be included into {{ $project->updating_period->name ?? 'No updating period selected' }}.
                                        It cannot be edited. Clone this program/project instead to include in the current updating period.
                                        @if($currentVersion) The current version is <a href="{{ route('projects.show', $currentVersion) }}">#{{ $currentVersion->id }}</a>. @endif
                                    </h5>
                                </div>
                            </div>
                        @endif

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

                        <div data-catalyst="" @if($project->isArchived() || $project->updating_period_id != config('ipms.current_updating_period')) style="pointer-events: none;" @endif>

                            <div class="Box md js-code-block-container Box--responsive">
                                <!-- Navigator -->
                                <div class="d-flex top-0 border-top-0 border-bottom p-2 flex-items-center flex-justify-between color-bg-primary rounded-top-2 is-stuck" style="position: sticky; z-index: 90; top: 0px !important;" data-original-top="0px">
                                    <div class="d-flex flex-items-center">
                                        <details class="dropdown details-reset details-overlay">
                                            <summary class="btn btn-octicon m-0 mr-2 p-2" aria-haspopup="true" role="button">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"  height="16" width="16" class="octicon octicon-list-unordered">
                                                    <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                </svg>
                                            </summary>

                                            <ul class="dropdown-menu dropdown-menu-e">
                                                <li><a class="dropdown-item" href="#general-information">General Information</a></li>
                                                <li><a class="dropdown-item" href="#url">Dropdown item</a></li>
                                                <li><a class="dropdown-item" href="#url">Dropdown item</a></li>
                                            </ul>
                                        </details>

                                        <h2 class="Box-title">
                                            @livewire('form.edit-text', [
                                            'project' => $project,
                                            'field' => 'title'
                                            ], key($project->id))
                                        </h2>
                                    </div>
                                </div>
                                <!--// Navigator -->
                                <div class="Box-body">
                                    <livewire:show-project :project="$project" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

    <div class="my-3"></div>
@endsection
