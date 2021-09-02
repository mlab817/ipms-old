@extends('layouts.office')

@section('content')
    <div class="Box">
        @forelse($projects as $project)
            <ul>
                <li class="Box-row">
                    <div class="d-block">
                        <div class="d-flex flex-justify-between">
                            <div class="mb-1 flex-auto">
                                <a href="{{ route('projects.show', $project) }}" class="f4 d-inline-block text-bold mr-1">
                                    {{ $project->title }}
                                </a>
                                <p class="break-word color-text-secondary mb-3">
                                    {{ first_sentence($project->description->description) ?? 'No description' }}
                                </p>
                            </div>
                            <div>
                                <details class="details-reset details-overlay dropdown">
                                    <summary class="color-text-secondary position-relative right-0 top-0" aria-label="Project menu" aria-haspopup="menu" role="button">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-kebab-horizontal">
                                            <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                        </svg>
                                    </summary>

                                    <ul class="dropdown-menu dropdown-menu-sw position-absolute" role="menu">
                                        <li>
                                            <a href="{{ route('projects.show', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('projects.generatePdf', $project) }}" target="_blank" class="btn-link dropdown-item" role="menuitem">
                                                Print
                                            </a>
                                        </li>
                                    </ul>
                                </details>
                            </div>
                        </div>

                        <div class="color-text-secondary f6">
                            <span class="no-wrap mr-3">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-star mr-1">
                                    <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                </svg>
                                {{ $project->submission_status->name }}
                            </span>
                            <a href="{{ route('projects.issues.index', ['project' => $project]) }}" class="no-wrap Link--muted mr-3">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-issue-opened mr-1">
                                    <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                </svg>
                                {{ $project->issues->count() }}
                            </a>
                            <span class="no-wrap">
                                 Updated {{ $project->updated_at->diffForHumans(null, null, true) }}
                            </span>
                        </div>
                        <div class="color-text-secondary f6 mt-2">
                            Added by:
                            <a href="{{ route('users.show', $project->creator) }}" class="btn-link" role="button">
                                {{ $project->creator->full_name ?? '_' }}
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        @empty
            <div class="blankslate">
                <svg aria-hidden="true" viewBox="0 0 24 24" version="1.1"
                     height="24" width="24" class="octicon octicon-repo blankslate-icon">
                    <path fill-rule="evenodd"
                          d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path>
                    <path
                        d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                </svg>

                <h3 class="mb-1">This office does not own any PAP.</h3>

                <p>Create a new PAP and select the office as owner of the PAP.</p>

                <a class="btn btn-primary my-3" href="{{ route('projects.create') }}">Create a new PAP</a>

            </div>
        @endforelse
    </div>

    <div class="my-3 text-center">
        {!! $projects->links() !!}
    </div>
@stop
