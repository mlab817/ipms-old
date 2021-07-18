<div class="position-relative">
    <div id="user-projects-list" class="mt-3">
        <!-- Top menu -->
        <div class="container-lg clearfix mb-3">
            <div class="d-none d-md-block col-6 float-right mb-2 mb-md-0">
                <a href="{{ route('projects.create') }}" class="btn btn-primary d-block d-md-inline-block float-right text-center">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-repo">
                        <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                    </svg>
                    New
                </a>
                <details class="dropdown details-reset details-overlay float-right mr-1 d-inline-block">
                    <summary class="btn" aria-haspopup="true">
                        Updating Period
                        <div class="dropdown-caret"></div>
                    </summary>
                    <ul class="dropdown-menu dropdown-menu-se" role="menu">
                        @foreach(\App\Models\UpdatingPeriod::all() as $option)
                        <li>
                            <a role="button" href="javascript:void(0)" wire:click="setUpdatingPeriodId({{ $option->id }})" class="dropdown-item">{{ $option->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </details>
            </div>
            <div class="col-12 col-md-6">
                <div class="auto-search-group float-left width-full">
                    <input type="text" wire:model.debounce.250ms="search" name="search" id="search" class="form-control form-control subnav-search-input input-contrast width-full" placeholder="Search all projects" aria-label="Search all projects">
                    <svg class="octicon octicon-search color-text-tertiary" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm-.82 4.74a6 6 0 111.06-1.06l3.04 3.04a.75.75 0 11-1.06 1.06l-3.04-3.04z"></path></svg>
                </div>
            </div>
        </div>
        <!-- /. Top menu -->

        @if($search || $updating_period_id)
        <div class="container-lg mt-2 mb-3">
            <div class="issues-reset-query-wrapper">
                <button role="button" class="btn-link" wire:click="resetFilterSort">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x issues-reset-query-icon">
                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                    </svg>
                    Clear current search query, filters, and sorts
                </button>
            </div>
        </div>
        @endif
    </div>

    @if($projects->total() > 0)
        <div class="container-lg clearfix border rounded-1 color-bg-canvas">
            <div class="color-bg-tertiary p-3 border-bottom">
                <div class="float-right table-list-header-toggle states">
                    <details class="dropdown details-reset details-overlay d-inline-block">
                        <summary class="btn-link" aria-haspopup="true">
                            Sort
                            <div class="dropdown-caret"></div>
                        </summary>

                        <div class="dropdown-menu dropdown-menu-sw">
                            <div class="dropdown-header">
                                Sort by
                            </div>
                            <ul>
                                @foreach ($sortOptions as $key => $label)
                                    <div class="form-checkbox p-0 pl-2">
                                        <label class="btn-link text-normal" for="{{ $key }}">
                                            <input id="{{ $key }}" type="radio" wire:model="sort" value="{{ $key }}" class="d-none">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-check select-menu-item-icon @if($sort == $key) color-text-primary @else color-text-white @endif">
                                                <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                            </svg>
                                            {{ $label }}
                                        </label>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </details>
                </div>

                <div class="states">
                    @foreach ($submission_statuses as $status)
                        <a href="{{ route('projects.index', ['status' => $status->name, 'updating_period_id' => $updating_period_id]) }}" class="btn-link mr-1">
                            @if($status->name == 'Draft')
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-project">
                                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                </svg>
                            @elseif ($status->name == 'Endorsed')
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                            @elseif ($status->name == 'Dropped')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" class="octicon octicon-diff-removed">
                                    <path fill-rule="evenodd" d="M2.75 2.5h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75a.25.25 0 01.25-.25zM13.25 1H2.75A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1zm-2 7.75a.75.75 0 000-1.5h-6.5a.75.75 0 000 1.5h6.5z"></path>
                                </svg>
                            @endif
                            {{ $status->name }}
                            <span class="Counter">{{ $updating_period_id ? $status->projects->where('updating_period_id', $updating_period_id)->count() : $status->projects->count() }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div id="projects-results">
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
                                    <a href="{{ route('projects.edit', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                        Edit
                                    </a>
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

                        <div class="col-12 col-md-6 col-lg-4 pr-2 float-left">
                            <h4 class="mb-1">
                                <a href="{{ route('projects.show', $project) }}" class="Link--primary mr-1">
                                    {{ $project->title }}
                                </a>
                                <div class="d-inline no-wrap">
                                        <span class="Label Label--secondary v-align-middle mr-1 mb-1">
                                            {{ optional($project->pap_type)->name }}
                                        </span>
                                </div>
                                <div class="d-inline-flex flex-row flex-items-center text-small">
                                        <span data-target="tracked-issues-progress.checklist" style="display: none">
                                            <svg style="display: inline" aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-checklist">
                                                <path fill-rule="evenodd" d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
                                            </svg>
                                        </span>
                                    @if($project->project_checklists->sum('checked') < $project->project_checklists->count())
                                        <span style="transform:rotate(-90deg); width:12px; height:12px; display: inline-flex">
                                            <svg width="12" height="12">
                                                <circle stroke="var(--color-border-primary)" stroke-width="2" fill="transparent" cx="50%" cy="50%" r="5"></circle>
                                                <circle
                                                    style="transition: stroke-dashoffset 0.35s;"
                                                    stroke="var(--color-border-info)"
                                                    stroke-width="2"
                                                    stroke-dasharray="{{ round(2 * pi() * 5) }}"
                                                    stroke-dashoffset="{{ (1 - $project->project_checklists->sum('checked')/$project->project_checklists->count()) * round(2 * pi() * 5) }}"
                                                    stroke-linecap="round"
                                                    fill="transparent"
                                                    cx="50%"
                                                    cy="50%"
                                                    r="5"></circle>
                                            </svg>
                                        </span>
                                    @else
                                        <svg style="display: inline" aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-checklist">
                                            <path fill-rule="evenodd" d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
                                        </svg>
                                    @endif
                                    <span class="text-normal no-wrap mr-1 ml-1" data-target="tracked-issues-progress.label">
                                            {{ $project->project_checklists->sum('checked') }} of {{ $project->project_checklists->count() }} checks
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

                        <div class="col-12 col-md-6 col-lg-8 float-left">
                            <p class="text-muted text-sm color-text-tertiary">
                                {!! strip_tags(Str::limit($project->description->description ?? 'No description', 160)) !!}
                            </p>
                            @if(count($project->original->clones) > 1)
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
            </div>
        </div>

        <div class="paginate-container d-none d-sm-flex flex-sm-justify-center">
            {!! $projects->appends(request()->except(['page','_token']))->links('includes.primer-pagination') !!}
        </div>

    @else

        <div class="blankslate">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="octicon octicon-octoface blankslate-icon">
                <path d="M7.25 6a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5A.75.75 0 007.25 6zM12 6a.75.75 0 00-.75.75v4.5a.75.75 0 001.5 0v-4.5A.75.75 0 0012 6zm4 .75a.75.75 0 011.5 0v9.5a.75.75 0 01-1.5 0v-9.5z"/><path fill-rule="evenodd" d="M3.75 2A1.75 1.75 0 002 3.75v16.5c0 .966.784 1.75 1.75 1.75h16.5A1.75 1.75 0 0022 20.25V3.75A1.75 1.75 0 0020.25 2H3.75zM3.5 3.75a.25.25 0 01.25-.25h16.5a.25.25 0 01.25.25v16.5a.25.25 0 01-.25.25H3.75a.25.25 0 01-.25-.25V3.75z"/>
            </svg>
            <h3 class="mb-1">You don’t seem to have any programs/projects.</h3>
            <p>Programs and projects added to {{ config('app.name','Laravel') }} are reviewed and evaluated
                for inclusion in the NEDA PIP Online (PIPOL) System. Add your program/project now.</p>
            <a class="btn btn-primary my-3" role="button" href="{{ route('projects.create') }}">New PAP</a>
        </div>

    @endif
</div>
