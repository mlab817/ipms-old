@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div id="repo-content-pjax-container" class="repository-content ">


            <div class="js-check-all-container" data-pjax="">


                <div class="d-flex flex-justify-between mb-md-3 flex-column-reverse flex-md-row flex-items-end">
                    <div class="d-flex flex-justify-start flex-auto width-full my-4 my-md-0" role="search">
                        <details class="details-reset details-overlay subnav-search-context" id="filters-select-menu">
                            <summary disabled="" class="btn" aria-haspopup="menu">
                                Search
                            </summary>
                        </details>

                        <!-- '"` --><!-- </textarea></xmp> -->
                        <form class="subnav-search width-full" role="search" aria-label="Issues"
                              action="{{ route('projects.issues.index', $project) }}" accept-charset="UTF-8" method="get">
                            <input type="text" name="q" id="js-issues-search" value="{{ request()->get('q') }}"
                                   class="form-control form-control subnav-search-input input-contrast width-full"
                                   placeholder="Search all issues" aria-label="Search all issues">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                 height="16" width="16" class="octicon octicon-search subnav-search-icon">
                                <path fill-rule="evenodd"
                                      d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm-.82 4.74a6 6 0 111.06-1.06l3.04 3.04a.75.75 0 11-1.06 1.06l-3.04-3.04z"></path>
                            </svg>
                        </form>
                        <div class="ml-2 pl-2 d-none d-md-flex">

                        </div>
                    </div>
                    <div class="d-flex flex-justify-between width-full width-md-auto" data-pjax="">
                        <a href="{{ route('projects.issues.create', $project)  }}" class="btn btn-primary"
                           role="button">
                            <span class="d-none d-md-block">New issue</span>
                            <span class="d-block d-md-none">New</span>
                        </a>
                    </div>
                </div>


                <div class="d-block d-lg-none no-wrap">

                    <div class="table-list-header-toggle states flex-auto pl-0">
                        <a href="{{ route('projects.issues.index', ['project' => $project, 'status' => 'open']) }}" class="btn-link selected">
                            <svg class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1" width="16"
                                 height="16" aria-hidden="true">
                                <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                <path fill-rule="evenodd"
                                      d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                            </svg>
                            {{ $openIssues }}
                        </a>

                        <a href="{{ route('projects.issues.index', ['project' => $project, 'status' => 'closed']) }}" class="btn-link">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                 height="16" width="16" class="octicon octicon-check">
                                <path fill-rule="evenodd"
                                      d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                            </svg>
                            {{ $closedIssues }} Closed
                        </a>
                    </div>

                </div>

                <div class="Box mt-3 Box--responsive hx_Box--firstRowRounded0">
                    <div class="Box-header d-flex flex-justify-between">

                        <div class="table-list-filters flex-auto d-flex min-width-0">
                            <div class="flex-auto d-none d-lg-block no-wrap">

                                <div class="table-list-header-toggle states flex-auto pl-0">
                                    <a href="{{ route('projects.issues.index', ['project' => $project, 'status' => 'open']) }}" class="btn-link"
                                       data-ga-click="Issues, Table state, Open">
                                        <svg class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1"
                                             width="16" height="16" aria-hidden="true">
                                            <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                            <path fill-rule="evenodd"
                                                  d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                        </svg>
                                        {{ $openIssues }} Open
                                    </a>

                                    <a href="{{ route('projects.issues.index', ['project' => $project, 'status' => 'closed']) }}" class="btn-link "
                                       data-ga-click="Issues, Table state, Closed">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             height="16" width="16"
                                             class="octicon octicon-check">
                                            <path fill-rule="evenodd"
                                                  d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                        </svg>
                                        {{ $closedIssues }} Closed
                                    </a>
                                </div>

                            </div>

                            <div
                                class="table-list-header-toggle no-wrap d-flex flex-auto flex-justify-between flex-sm-justify-start flex-lg-justify-end">

                                <details
                                    class="details-reset details-overlay d-inline-block position-relative pr-3 pr-sm-0 px-3"
                                    id="sort-select-menu">
                                    <summary class="btn-link" title="Sort" aria-haspopup="menu"
                                             data-ga-click="Issues, Table filter, Sort" role="button">
                                        Sort<span></span>
                                        <span class="dropdown-caret hide-sm"></span>
                                    </summary>
                                    <details-menu class="SelectMenu SelectMenu--hasFilter right-0" role="menu"
                                                  aria-label="Sort by">
                                        <div class="SelectMenu-modal">
                                            <header class="SelectMenu-header">
                                                <span class="SelectMenu-title">Sort by</span>
                                                <button class="SelectMenu-closeButton" type="button"
                                                        data-toggle-for="sort-select-menu">
                                                    <svg aria-label="Close menu" role="img" viewBox="0 0 16 16"
                                                         version="1.1" height="16" width="16"
                                                         class="octicon octicon-x">
                                                        <path fill-rule="evenodd"
                                                              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                            </header>

                                            <div class="SelectMenu-list">

                                            </div>
                                        </div>
                                    </details-menu>
                                </details>

                            </div>
                        </div>
                    </div>

                    <div aria-label="Issues" role="group">
                        <div class="js-navigation-container js-active-navigation-container">

                            @forelse($issues as $issue)
                            <div class="Box-row Box-row--focus-gray p-0 mt-0 js-navigation-item js-issue-row">
                                <div class="d-flex Box-row--drag-hide position-relative">

                                    <div class="flex-shrink-0 pt-2 pl-3">
                                        <span class="tooltipped tooltipped-e">
                                            @if(in_array($issue->status,['','open']))
                                            <svg class="octicon octicon-issue-opened open color-text-danger" fill="currentColor" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                 aria-hidden="true">
                                                <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                                <path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                            </svg>
                                            @endif
                                            @if($issue->status == 'closed')
                                            <svg class="octicon octicon-issue-closed closed color-text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"/>
                                                <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"/>
                                            </svg>
                                            @endif
                                        </span>
                                    </div>

                                    <!-- Issue title column -->
                                    <div class="flex-auto min-width-0 p-2 pr-3 pr-md-2">

                                        <a id="issue_5_link"
                                           class="Link--primary v-align-middle no-underline h4 js-navigation-open markdown-title"
                                           data-hovercard-type="issue"
                                           data-hovercard-url="/mlab817/pips/issues/5/hovercard"
                                           href="{{ route('issues.show', $issue) }}">
                                            {{ $issue->title ? $issue->title : 'Untitled' }}
                                        </a>
                                        <div class="d-flex mt-1 text-small color-text-secondary">
                                            <span class="opened-by">
                                              #{{ $issue->id }}
                                                opened
                                                <relative-time datetime="{{ $issue->created_at }}" class="no-wrap">
                                                    {{ $issue->created_at->diffForHumans(null, null, true) }}
                                                </relative-time> by
                                                <span class="Link--muted">
                                                    {{ $issue->creator->username }}
                                                </span>

                                            </span>

                                            <span class="d-none d-md-inline-flex"></span>

                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 col-3 pt-2 text-right pr-3 no-wrap d-flex hide-sm ">
                                        <span class="ml-2 flex-1 flex-shrink-0"></span>

                                        <span class="ml-2 flex-1 flex-shrink-0">
                                              <a href="{{ route('issues.show', $issue) }}" class="Link--muted" aria-label="{{ $issue->issue_comments->count() }} comment">
                                                <svg class="octicon octicon-comment v-align-middle" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M2.75 2.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 01.75.75v2.19l2.72-2.72a.75.75 0 01.53-.22h4.5a.25.25 0 00.25-.25v-7.5a.25.25 0 00-.25-.25H2.75zM1 2.75C1 1.784 1.784 1 2.75 1h10.5c.966 0 1.75.784 1.75 1.75v7.5A1.75 1.75 0 0113.25 12H9.06l-2.573 2.573A1.457 1.457 0 014 13.543V12H2.75A1.75 1.75 0 011 10.25v-7.5z"></path>
                                                </svg>
                                                <span class="text-small text-bold">{{ $issue->issue_comments->count() }}</span>
                                              </a>
                                        </span>
                                    </div>
                                    <a class="d-block d-md-none position-absolute top-0 bottom-0 left-0 right-0"  aria-label="{{ $issue->title }}"  href="{{ route('issues.show', $issue) }}"></a>
                                </div>
                            </div>
                            @empty
                                <div class="container-md">
                                    <div  class="blankslate blankslate-large blankslate-spacious">
                                        <svg aria-hidden="true" viewBox="0 0 24 24" version="1.1"  height="24" width="24" class="octicon octicon-issue-opened blankslate-icon">
                                            <path fill-rule="evenodd" d="M2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0zM12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 13a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>

                                        <h3>There aren’t {{ request()->get('status') ?? 'open' }} issues here.</h3>
                                        <p>You can either move on or <a href="{{ route('projects.issues.create', $project) }}">create</a> a new issue.</p>

                                    </div>
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div>

                <!-- Pagination -->

                <div class="paginate-container d-none d-sm-flex flex-sm-justify-center">

                </div>

                <div class="paginate-container d-sm-none mb-5">

                </div>

                <!--./ Pagination -->

            </div>

        </div>
    </div>
@stop
