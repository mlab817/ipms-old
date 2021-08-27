@extends('layouts.users')

@section('content')
    <div class="border-bottom color-border-secondary py-3">

        <div class="d-flex flex-items-start">
            <div class="d-flex flex-column flex-lg-row flex-auto">
                <div class="mb-1 flex-auto">
                    <form action="{{ route('users.projects', $user) }}" method="GET" accept-charset="UTF-8" id="search">
                        <input type="search" name="q" class="form-control width-full" placeholder="Find a PAP title…" autocomplete="off" value="{{ request()->query('q') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach($projects as $project)
        <div class="Box-row clearfix position-relative pr-6">
            <details class="details-reset details-overlay dropdown position-static">
                <summary class="color-text-secondary position-absolute right-0 top-0 mt-3 px-3" aria-label="Project menu" aria-haspopup="menu" role="button">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-kebab-horizontal">
                        <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                </summary>

                <ul class="dropdown-menu dropdown-menu-sw mt-6 mr-1 top-0" role="menu">
                    <li>
                        @if(auth()->user()->can('update', $project))
                        <a href="{{ route('projects.show', $project) }}" class="btn-link dropdown-item" role="menuitem">
                            Edit
                        </a>
                        @else
                        <a href="{{ route('projects.show', $project) }}" class="btn-link dropdown-item" role="menuitem">
                            View
                        </a>
                        @endif
                    </li>
                    <li>
                        <a href="{{ route('projects.generatePdf', $project) }}" target="_blank" class="btn-link dropdown-item" role="menuitem">
                            Print
                        </a>
                    </li>
                    <li class="dropdown-divider" role="separator"></li>
                    <li>
                        @if(auth()->user()->pinned_projects->contains($project))
                            <button wire:click="unpinProject({{ $project->id }})" type="button" class="btn-link dropdown-item" role="menuitem">
                                Unpin
                            </button>
                        @else
                            <button wire:click="pinProject({{ $project->id }})" type="button" class="btn-link dropdown-item" role="menuitem">
                                Pin
                            </button>
                        @endif
                    </li>
                </ul>
            </details>

            <div class="col-12 col-md-6 col-lg-5 pr-2 float-left">
                <h4 class="mb-1">
                    <a href="{{ route('projects.show', $project) }}" class="Link--primary mr-1">
                        {{ $project->title }}
                    </a>
                    <div class="d-inline no-wrap">
                        <span class="Label Label--secondary v-align-middle mr-1 mb-1">
                            {{ optional($project->pap_type)->name }}
                        </span>
                    </div>
                </h4>

                <div class="f6 pr-sm-5 mb-2 mb-md-0 color-text-tertiary">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-clock">
                        <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.5 4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 00.471.696l2.5 1a.75.75 0 00.557-1.392L8.5 7.742V4.75z"></path>
                    </svg> Updated on {{ $project->updated_at->format('M d, Y') }}
                </div>

                {{--                            <div class="mt-1 pr-5 mb-2 mb-md-0">--}}
                {{--                                <div class="tooltipped tooltipped-n" aria-label="tasks: 80 done, 14 in progress, 6 open">--}}
                {{--                                        <span class="Progress">--}}
                {{--                                            <span class="Progress-item color-bg-success-inverse" style="width: 50%;"></span>--}}
                {{--                                            <span class="Progress-item color-bg-warning-inverse" style="width: 25%;"></span>--}}
                {{--                                            <span class="Progress-item color-bg-danger-inverse" style="width: 15%;"></span>--}}
                {{--                                            <span class="Progress-item color-bg-info-inverse" style="width: 10%;"></span>--}}
                {{--                                        </span>--}}
                {{--                                </div>--}}

                {{--                            </div>--}}

            </div>

            <div class="col-12 col-md-6 col-lg-7 float-left">
                <p class="text-muted text-sm color-text-tertiary">
                    {!! strip_tags(Str::limit($project->description->description ?? 'No description', 160)) !!}
                </p>
                @if($project->original && count($project->original->clones) > 1)
                    <p class="f5">
                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-link">
                            <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                        </svg> Linked PAPs:
                        @foreach($project->original->clones as $clone)
                            @if($clone->id != $project->id)
                                <a href="{{ route('projects.show', $clone) }}" class="btn-link">
                                    <span class="branch-name">{{ '#' . $clone->id }}</span>
                                </a>
                            @endif
                        @endforeach
                    </p>
                @endif
            </div>
        </div>
    @endforeach
@stop
