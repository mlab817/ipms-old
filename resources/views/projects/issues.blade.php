@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div id="repo-content-pjax-container" class="repository-content ">



            <div class="js-check-all-container" data-pjax="">






                <div class="d-flex flex-justify-between mb-md-3 flex-column-reverse flex-md-row flex-items-end">
                    <div class="d-flex flex-justify-start flex-auto width-full my-4 my-md-0" role="search">
                        <details class="details-reset details-overlay subnav-search-context" id="filters-select-menu">
                            <summary role="button" data-view-component="true" class="btn" aria-haspopup="menu">


                                Filters
                                <span class="dropdown-caret"></span>



                            </summary>        <details-menu class="SelectMenu" role="menu">
                                <div class="SelectMenu-modal">
                                    <div class="SelectMenu-header">
                                        <h3 class="SelectMenu-title">Filter Issues</h3>
                                        <button class="SelectMenu-closeButton" type="button" data-toggle-for="filters-select-menu">
                                            <svg aria-label="Close menu" aria-hidden="false" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
                                                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="SelectMenu-list">
                                        <a class="SelectMenu-item" role="menuitemradio" aria-checked="false" href="/mlab817/pips/issues?q=is%3Aopen" data-ga-click="Issues, Search filter, Open issues and pull requests">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                            </svg>
                                            Open issues and pull requests
                                        </a>
                                        <a class="SelectMenu-item" role="menuitemradio" aria-checked="false" href="/mlab817/pips/issues?q=is%3Aopen+is%3Aissue+author%3A%40me" data-ga-click="Issues, Search filter, Your issues">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                            </svg>
                                            Your issues
                                        </a>
                                        <a class="SelectMenu-item" role="menuitemradio" aria-checked="false" href="/mlab817/pips/issues?q=is%3Aopen+is%3Apr+author%3A%40me" data-ga-click="Issues, Search filter, Your pull requests">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                            </svg>
                                            Your pull requests
                                        </a>
                                        <a class="SelectMenu-item" role="menuitemradio" aria-checked="false" href="/mlab817/pips/issues?q=is%3Aopen+assignee%3A%40me" data-ga-click="Issues, Search filter, Everything assigned to you">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                            </svg>
                                            Everything assigned to you
                                        </a>
                                        <a class="SelectMenu-item" role="menuitemradio" aria-checked="false" href="/mlab817/pips/issues?q=is%3Aopen+mentions%3A%40me" data-ga-click="Issues, Search filter, Everything mentioning you">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                            </svg>
                                            Everything mentioning you
                                        </a>
                                        <a class="SelectMenu-item" role="menuitemradio" href="https://docs.github.com/articles/searching-issues" target="_blank">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-link-external mr-2">
                                                <path fill-rule="evenodd" d="M10.604 1h4.146a.25.25 0 01.25.25v4.146a.25.25 0 01-.427.177L13.03 4.03 9.28 7.78a.75.75 0 01-1.06-1.06l3.75-3.75-1.543-1.543A.25.25 0 0110.604 1zM3.75 2A1.75 1.75 0 002 3.75v8.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 12.25v-3.5a.75.75 0 00-1.5 0v3.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-8.5a.25.25 0 01.25-.25h3.5a.75.75 0 000-1.5h-3.5z"></path>
                                            </svg>
                                            <strong>View advanced search syntax</strong>
                                        </a>
                                    </div>
                                </div>
                            </details-menu>
                        </details>

                        <!-- '"` --><!-- </textarea></xmp> --><form class="subnav-search width-full " data-pjax="true" role="search" aria-label="Issues" action="/mlab817/pips/issues" accept-charset="UTF-8" method="get">
                            <input type="text" name="q" id="js-issues-search" value="is:issue is:open " class="form-control form-control subnav-search-input input-contrast width-full" placeholder="Search all issues" aria-label="Search all issues" data-hotkey="Control+/,Meta+/">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-search subnav-search-icon">
                                <path fill-rule="evenodd" d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm-.82 4.74a6 6 0 111.06-1.06l3.04 3.04a.75.75 0 11-1.06 1.06l-3.04-3.04z"></path>
                            </svg>
                        </form>    <div class="ml-2 pl-2 d-none d-md-flex">

                            <nav class="subnav-links float-left d-flex no-wrap" aria-label="Issue">
                                <a selected_link="repo_issues" class="js-selected-navigation-item subnav-item" data-selected-links="repo_labels /mlab817/pips/labels" href="/mlab817/pips/labels">
                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-tag">
                                        <path fill-rule="evenodd" d="M2.5 7.775V2.75a.25.25 0 01.25-.25h5.025a.25.25 0 01.177.073l6.25 6.25a.25.25 0 010 .354l-5.025 5.025a.25.25 0 01-.354 0l-6.25-6.25a.25.25 0 01-.073-.177zm-1.5 0V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 010 2.474l-5.026 5.026a1.75 1.75 0 01-2.474 0l-6.25-6.25A1.75 1.75 0 011 7.775zM6 5a1 1 0 100 2 1 1 0 000-2z"></path>
                                    </svg>
                                    Labels
                                    <span title="9" data-view-component="true" class="Counter d-none d-md-inline">9</span>
                                </a>  <a selected_link="repo_issues" class="js-selected-navigation-item subnav-item" data-selected-links="repo_milestones /mlab817/pips/milestones" href="/mlab817/pips/milestones">
                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-milestone">
                                        <path fill-rule="evenodd" d="M7.75 0a.75.75 0 01.75.75V3h3.634c.414 0 .814.147 1.13.414l2.07 1.75a1.75 1.75 0 010 2.672l-2.07 1.75a1.75 1.75 0 01-1.13.414H8.5v5.25a.75.75 0 11-1.5 0V10H2.75A1.75 1.75 0 011 8.25v-3.5C1 3.784 1.784 3 2.75 3H7V.75A.75.75 0 017.75 0zm0 8.5h4.384a.25.25 0 00.161-.06l2.07-1.75a.25.25 0 000-.38l-2.07-1.75a.25.25 0 00-.161-.06H2.75a.25.25 0 00-.25.25v3.5c0 .138.112.25.25.25h5z"></path>
                                    </svg>
                                    Milestones
                                    <span title="0" data-view-component="true" class="Counter d-none d-md-inline">0</span>
                                </a></nav>

                        </div>
                    </div>
                    <div class="ml-3 d-flex flex-justify-between width-full width-md-auto" data-pjax="">
    <span class="d-md-none">

<nav class="subnav-links float-left d-flex no-wrap" aria-label="Issue">
  <a selected_link="repo_issues" class="js-selected-navigation-item subnav-item" data-selected-links="repo_labels /mlab817/pips/labels" href="/mlab817/pips/labels">
    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-tag">
    <path fill-rule="evenodd" d="M2.5 7.775V2.75a.25.25 0 01.25-.25h5.025a.25.25 0 01.177.073l6.25 6.25a.25.25 0 010 .354l-5.025 5.025a.25.25 0 01-.354 0l-6.25-6.25a.25.25 0 01-.073-.177zm-1.5 0V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 010 2.474l-5.026 5.026a1.75 1.75 0 01-2.474 0l-6.25-6.25A1.75 1.75 0 011 7.775zM6 5a1 1 0 100 2 1 1 0 000-2z"></path>
</svg>
    Labels
      <span title="9" data-view-component="true" class="Counter d-none d-md-inline">9</span>
</a>  <a selected_link="repo_issues" class="js-selected-navigation-item subnav-item" data-selected-links="repo_milestones /mlab817/pips/milestones" href="/mlab817/pips/milestones">
    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-milestone">
    <path fill-rule="evenodd" d="M7.75 0a.75.75 0 01.75.75V3h3.634c.414 0 .814.147 1.13.414l2.07 1.75a1.75 1.75 0 010 2.672l-2.07 1.75a1.75 1.75 0 01-1.13.414H8.5v5.25a.75.75 0 11-1.5 0V10H2.75A1.75 1.75 0 011 8.25v-3.5C1 3.784 1.784 3 2.75 3H7V.75A.75.75 0 017.75 0zm0 8.5h4.384a.25.25 0 00.161-.06l2.07-1.75a.25.25 0 000-.38l-2.07-1.75a.25.25 0 00-.161-.06H2.75a.25.25 0 00-.25.25v3.5c0 .138.112.25.25.25h5z"></path>
</svg>
    Milestones
      <span title="0" data-view-component="true" class="Counter d-none d-md-inline">0</span>
</a></nav>

    </span>
                        <a href="/mlab817/pips/issues/new/choose" class="btn btn-primary" role="button" data-hotkey="c" data-skip-pjax="">
                            <span class="d-none d-md-block">New issue</span>
                            <span class="d-block d-md-none">New</span>
                        </a>
                    </div>
                </div>



                <div class="d-block d-lg-none no-wrap">

                    <div class="table-list-header-toggle states flex-auto pl-0">
                        <a href="/mlab817/pips/issues?q=is%3Aopen+is%3Aissue" class="btn-link selected" data-ga-click="Issues, Table state, Open">
                            <svg class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                            5 Open
                        </a>

                        <a href="/mlab817/pips/issues?q=is%3Aissue+is%3Aclosed" class="btn-link " data-ga-click="Issues, Table state, Closed">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check">
                                <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                            </svg>
                            1 Closed
                        </a>
                    </div>

                </div>

                <div class="Box mt-3 Box--responsive hx_Box--firstRowRounded0">
                    <div class="Box-header d-flex flex-justify-between" id="js-issues-toolbar">
                        <div class="mr-3 d-none d-md-block">
                            <input type="checkbox" data-check-all="" aria-label="Select all issues" autocomplete="off">
                        </div>

                        <div class="table-list-filters flex-auto d-flex min-width-0">
                            <div class="flex-auto d-none d-lg-block no-wrap">

                                <div class="table-list-header-toggle states flex-auto pl-0">
                                    <a href="/mlab817/pips/issues?q=is%3Aopen+is%3Aissue" class="btn-link selected" data-ga-click="Issues, Table state, Open">
                                        <svg class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                                        5 Open
                                    </a>

                                    <a href="/mlab817/pips/issues?q=is%3Aissue+is%3Aclosed" class="btn-link " data-ga-click="Issues, Table state, Closed">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check">
                                            <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                        </svg>
                                        1 Closed
                                    </a>
                                </div>

                            </div>

                            <div class="table-list-header-toggle no-wrap d-flex flex-auto flex-justify-between flex-sm-justify-start flex-lg-justify-end">

                                <details class="details-reset details-overlay d-inline-block position-relative px-3" id="author-select-menu">
                                    <summary class="btn-link" title="Author" data-hotkey="u" aria-haspopup="menu" data-ga-click="Issues, Table filter, Author" role="button">
                                        Author
                                        <span class="dropdown-caret hide-sm"></span>
                                    </summary>
                                    <details-menu class="SelectMenu SelectMenu--hasFilter right-lg-0" role="menu" src="/mlab817/pips/issues/show_menu_content?partial=issues%2Ffilters%2Fauthors_content&amp;q=is%3Aissue+is%3Aopen" preload="">
                                        <div class="SelectMenu-modal">
                                            <header class="SelectMenu-header">
                                                <span class="SelectMenu-title">Filter by author</span>
                                                <button class="SelectMenu-closeButton" type="button" data-toggle-for="author-select-menu">
                                                    <svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
                                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                            </header>
                                            <div class="SelectMenu-filter">
                                                <input class="SelectMenu-input form-control js-filterable-field" id="author-filter-field" type="text" placeholder="Filter users" aria-label="Filter users" autocomplete="off" spellcheck="false" autofocus="">
                                            </div>
                                            <div class="SelectMenu-list select-menu-list" data-filter="author">
                                                <div data-filterable-for="author-filter-field" data-filterable-type="substring">
                                                    <a class="SelectMenu-item" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+author%3Amlab817">
                                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                            <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                        </svg>
                                                        <img class="avatar flex-shrink-0 mr-2 avatar-user" src="https://avatars.githubusercontent.com/u/29625844?s=40&amp;v=4" width="20" height="20" alt="@mlab817">
                                                        <strong class="mr-2">mlab817</strong>
                                                        <span class="color-text-tertiary css-truncate css-truncate-overflow">Mark Lester Bolotaolo</span>
                                                    </a>

                                                    <include-fragment class="SelectMenu-loading">
                                                        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" data-view-component="true" width="32" height="32" class="mx-auto d-block anim-rotate">
                                                            <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                        </svg>
                                                    </include-fragment>
                                                </div>
                                                <!-- '"` --><!-- </textarea></xmp> --><form class="select-menu-new-item-form js-new-item-form" action="/mlab817/pips/issues?q=is%3Aopen+is%3Aissue" accept-charset="UTF-8" method="get">
                                                    <input type="hidden" name="q" value="is:issue is:open">
                                                    <button class="SelectMenu-item d-block js-new-item-value" type="submit" name="author" role="menuitem">
                                                        <div class="text-bold f5">author:<span class="js-new-item-name"></span></div>
                                                        <div class="color-text-tertiary">Filter by this user</div>
                                                    </button>
                                                </form>        </div>
                                        </div>
                                    </details-menu>
                                </details>


                                <details class="details-reset details-overlay d-inline-block position-relative px-3" id="label-select-menu">
                                    <summary class="btn-link" title="Label" data-hotkey="l" aria-haspopup="menu" data-ga-click="Issues, Table filter, Label" role="button">
                                        Label
                                        <span class="dropdown-caret hide-sm"></span>
                                    </summary>
                                    <details-menu class="SelectMenu SelectMenu--hasFilter right-lg-0" role="menu" src="/mlab817/pips/issues/show_menu_content?partial=issues%2Ffilters%2Flabels_content&amp;q=is%3Aissue+is%3Aopen" preload="">
                                        <div class="SelectMenu-modal">
                                            <header class="SelectMenu-header">
                                                <span class="SelectMenu-title">Filter by label</span>
                                                <button class="SelectMenu-closeButton" type="button" data-toggle-for="label-select-menu">
                                                    <svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
                                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                            </header>
                                            <div class="SelectMenu-filter">
                                                <input type="text" id="label-filter-field" class="SelectMenu-input form-control js-filterable-field" placeholder="Filter labels" aria-label="Filter labels" autocomplete="off" autofocus="">
                                            </div>
                                            <include-fragment class="SelectMenu-loading">
                                                <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" data-view-component="true" width="32" height="32" class="mx-auto d-block anim-rotate">
                                                    <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                </svg>
                                            </include-fragment>
                                            <footer class="SelectMenu-footer">
                                                <span>Use <kbd class="js-modifier-key">alt</kbd> + <kbd>click/return</kbd> to exclude labels.</span>
                                            </footer>
                                        </div>
                                    </details-menu>
                                </details>

                                <span class="d-none d-md-inline">

<details class="details-reset details-overlay d-inline-block position-relative px-3" id="project-select-menu">
  <summary class="btn-link" data-hotkey="p" aria-haspopup="menu" data-ga-click="Issues, Table filter, Projects" role="button">
    Projects
    <span class="dropdown-caret hide-sm"></span>
  </summary>
  <details-menu class="SelectMenu SelectMenu--hasFilter right-lg-0" role="menu" src="/mlab817/pips/issues/show_menu_content?partial=issues%2Ffilters%2Fprojects_content&amp;pulls_only=false&amp;q=is%3Aissue+is%3Aopen" preload="">
    <div class="SelectMenu-modal">
      <header class="SelectMenu-header">
        <span class="SelectMenu-title">Filter by project</span>
        <button class="SelectMenu-closeButton" type="button" data-toggle-for="project-select-menu">
          <svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
</svg>
        </button>
      </header>
      <include-fragment class="SelectMenu-loading">
        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" data-view-component="true" width="32" height="32" class="mx-auto d-block anim-rotate">
  <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
  <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
</svg>
      </include-fragment>
     </div>
  </details-menu>
</details>


<details class="details-reset details-overlay d-inline-block position-relative px-3" id="milestones-select-menu">
  <summary class="btn-link" data-hotkey="m" aria-haspopup="menu" data-ga-click="Issues, Table filter, Milestones" role="button">
    Milestones
    <span class="dropdown-caret hide-sm"></span>
  </summary>
  <details-menu class="SelectMenu SelectMenu--hasFilter right-lg-0" role="menu" src="/mlab817/pips/issues/show_menu_content?partial=issues%2Ffilters%2Fmilestones_content&amp;q=is%3Aissue+is%3Aopen" preload="">
    <div class="SelectMenu-modal">
      <header class="SelectMenu-header">
        <span class="SelectMenu-title">Filter by milestone</span>
        <button class="SelectMenu-closeButton" type="button" data-toggle-for="milestones-select-menu">
          <svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
</svg>
        </button>
      </header>
      <div class="SelectMenu-filter">
        <input class="SelectMenu-input form-control js-filterable-field" id="milestones-filter-field" type="text" placeholder="Filter milestones" aria-label="Filter milestones" autocomplete="off" autofocus="">
      </div>
      <include-fragment class="SelectMenu-loading">
        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" data-view-component="true" width="32" height="32" class="mx-auto d-block anim-rotate">
  <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
  <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
</svg>
      </include-fragment>
    </div>
  </details-menu>
</details>

        </span>

                                <details class="details-reset details-overlay d-inline-block position-relative px-3" id="assignees-select-menu">
                                    <summary class="btn-link" title="Assignees" data-hotkey="a" aria-haspopup="menu" data-ga-click="Issues, Table filter, Assignee" role="button">
                                        Assignee
                                        <span class="dropdown-caret hide-sm"></span>
                                    </summary>
                                    <details-menu class="SelectMenu SelectMenu--hasFilter right-md-0" role="menu" src="/mlab817/pips/issues/show_menu_content?partial=issues%2Ffilters%2Fassigns_content&amp;q=is%3Aissue+is%3Aopen" preload="">
                                        <div class="SelectMenu-modal">
                                            <header class="SelectMenu-header">
                                                <span class="SelectMenu-title">Filter by who’s assigned</span>
                                                <button class="SelectMenu-closeButton" type="button" data-toggle-for="assignees-select-menu">
                                                    <svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
                                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                            </header>
                                            <div class="SelectMenu-filter">
                                                <input type="text" id="assigns-filter-field" class="SelectMenu-input form-control js-filterable-field" placeholder="Filter users" aria-label="Filter users" autocomplete="off" autofocus="">
                                            </div>
                                            <include-fragment class="SelectMenu-loading">
                                                <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" data-view-component="true" width="32" height="32" class="mx-auto d-block anim-rotate">
                                                    <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                </svg>
                                            </include-fragment>
                                        </div>
                                    </details-menu>
                                </details>


                                <details class="details-reset details-overlay d-inline-block position-relative pr-3 pr-sm-0 px-3" id="sort-select-menu">
                                    <summary class="btn-link" title="Sort" aria-haspopup="menu" data-ga-click="Issues, Table filter, Sort" role="button">
                                        Sort<span></span>
                                        <span class="dropdown-caret hide-sm"></span>
                                    </summary>
                                    <details-menu class="SelectMenu SelectMenu--hasFilter right-0" role="menu" aria-label="Sort by">
                                        <div class="SelectMenu-modal">
                                            <header class="SelectMenu-header">
                                                <span class="SelectMenu-title">Sort by</span>
                                                <button class="SelectMenu-closeButton" type="button" data-toggle-for="sort-select-menu">
                                                    <svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
                                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                            </header>

                                            <div class="SelectMenu-list">
                                                <a class="SelectMenu-item" aria-checked="true" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aopen+is%3Aissue">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                    </svg>
                                                    <span>Newest</span>
                                                </a>
                                                <a class="SelectMenu-item" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Acreated-asc">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                    </svg>
                                                    <span>Oldest</span>
                                                </a>
                                                <a class="SelectMenu-item" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Acomments-desc">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                    </svg>
                                                    <span>Most commented</span>
                                                </a>
                                                <a class="SelectMenu-item" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Acomments-asc">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                    </svg>
                                                    <span>Least commented</span>
                                                </a>
                                                <a class="SelectMenu-item" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Aupdated-desc">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                    </svg>
                                                    <span>Recently updated</span>
                                                </a>
                                                <a class="SelectMenu-item" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Aupdated-asc">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                    </svg>
                                                    <span>Least recently updated</span>
                                                </a>

                                                <div class="SelectMenu-divider">Most reactions</div>
                                                <div class="clearfix ws-normal p-3 p-sm-2">
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions-%2B1-desc">
                                                        <g-emoji alias="+1" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44d.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="+1" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f44d.png"></g-emoji>
                                                    </a>
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions--1-desc">
                                                        <g-emoji alias="-1" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44e.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="-1" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f44e.png"></g-emoji>
                                                    </a>
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions-smile-desc">
                                                        <g-emoji alias="smile" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f604.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="smile" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f604.png"></g-emoji>
                                                    </a>
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions-tada-desc">
                                                        <g-emoji alias="tada" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f389.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="tada" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f389.png"></g-emoji>
                                                    </a>
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions-thinking_face-desc">
                                                        <g-emoji alias="thinking_face" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f615.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="thinking_face" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f615.png"></g-emoji>
                                                    </a>
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions-heart-desc">
                                                        <g-emoji alias="heart" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="heart" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png"></g-emoji>
                                                    </a>
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions-rocket-desc">
                                                        <g-emoji alias="rocket" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f680.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="rocket" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f680.png"></g-emoji>
                                                    </a>
                                                    <a class="reaction-sort-item width-auto m-0 px-3 py-2" aria-checked="false" role="menuitemradio" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+sort%3Areactions-eyes-desc">
                                                        <g-emoji alias="eyes" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f440.png" class="emoji m-0 v-align-baseline"><img class="emoji" alt="eyes" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f440.png"></g-emoji>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </details-menu>
                                </details>

                            </div>
                        </div>

                        <div class="table-list-triage flex-auto js-issues-toolbar-triage">
      <span class="color-text-secondary">
        <span data-check-all-count="">0</span> selected
      </span>

                            <div class="table-list-header-toggle float-right">
        <span class="js-issue-triage-spinner" hidden="">
          <svg aria-label="Saving" style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" data-view-component="true" width="16" height="16" class="v-align-text-bottom anim-rotate">
  <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
  <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
</svg>
        </span>
                                <span class="color-text-danger f6 js-issue-triage-error" hidden="">Something went wrong.</span>
                                <details class="details-reset details-overlay select-menu d-inline-block js-issue-triage-menu" data-url="/mlab817/pips/issues/show_menu_content?partial=issues%2Ftriage%2Factions_content">
                                    <summary class="btn-link select-menu-button" aria-haspopup="menu" role="button">
                                        Mark as
                                    </summary>
                                    <details-menu class="SelectMenu-modal position-absolute right-0" style="z-index: 99;" role="menu">
                                        <!-- '"` --><!-- </textarea></xmp> --><form action="/mlab817/pips/issues/triage" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="7PsyDnIfrMTNNMovWhxL380shjayVTI46Wb1sNxcER2LTBrdF1aCz9gk/lTyQcAEJxwE4HFJTC7J5UhaO2plow==">
                                            <div class="SelectMenu-header">
                                                <span class="SelectMenu-title">Actions</span>
                                            </div>
                                            <div class="js-triage-deferred-content"></div>
                                        </form>  </details-menu>
                                </details>

                                <details class="details-reset details-overlay select-menu label-select-menu d-inline-block js-issue-triage-menu" data-url="/mlab817/pips/issues/show_menu_content?partial=issues%2Ftriage%2Flabels_content">
                                    <summary class="btn-link select-menu-button" aria-haspopup="menu" role="button">
                                        Label
                                    </summary>
                                    <details-menu class="SelectMenu-modal position-absolute right-0" style="z-index: 99;" role="menu">
                                        <!-- '"` --><!-- </textarea></xmp> --><form action="/mlab817/pips/issues/triage" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="V6hN9W5/yXmvdGTF2UfAjW9tNjp/BlJ6Z/fUNp6D7jgwH2UmCzbncrpkUL5xGktWhV207LwaLGxHdGncebWahg==">
                                            <div class="SelectMenu-header">
                                                <span class="SelectMenu-title">Apply labels</span>
                                            </div>

                                            <div class="select-menu-filters">
                                                <div class="SelectMenu-filter">
                                                    <input type="text" id="triage-label-filter-field" class="SelectMenu-input form-control js-filterable-field" placeholder="Filter labels" aria-label="Filter labels" autocomplete="off" autofocus="">
                                                </div>
                                            </div>

                                            <div class="js-triage-deferred-content"></div>
                                        </form>  </details-menu>
                                </details>

                                <details class="details-reset details-overlay select-menu d-inline-block js-issue-triage-menu" data-url="/mlab817/pips/issues/show_menu_content?partial=issues%2Ftriage%2Fmilestones_content">
                                    <summary class="btn-link select-menu-button" aria-haspopup="menu" role="button">
                                        Milestone
                                    </summary>
                                    <details-menu class="SelectMenu-modal position-absolute right-0" style="z-index: 99;" role="menu">
                                        <!-- '"` --><!-- </textarea></xmp> --><form action="/mlab817/pips/issues/triage" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="kDrRDGP1qDw29NGP4oOVcA8OeOPFBxQh/ZV+3c79QNz3jfnfBryGNyPk5fRK3h6r5T76NQYbajfdFsM3Kcs0Yg==">
                                            <div class="SelectMenu-header">
                                                <span class="SelectMenu-title">Set milestone</span>
                                            </div>

                                            <div class="select-menu-filters">
                                                <div class="SelectMenu-filter">
                                                    <input type="text" id="triage-milestones-filter-field" class="SelectMenu-input form-control js-filterable-field" placeholder="Filter milestones" aria-label="Filter milestones" autocomplete="off" autofocus="">
                                                </div>
                                            </div>

                                            <div class="js-triage-deferred-content"></div>
                                        </form>  </details-menu>
                                </details>

                                <details class="details-reset details-overlay select-menu d-inline-block js-issue-triage-menu" data-url="/mlab817/pips/issues/show_menu_content?partial=issues%2Ftriage%2Fassigns_content">
                                    <summary class="btn-link select-menu-button" aria-haspopup="menu" role="button">
                                        Assign
                                    </summary>
                                    <details-menu class="SelectMenu-modal position-absolute right-0" style="z-index: 99;" role="menu">
                                        <!-- '"` --><!-- </textarea></xmp> --><form action="/mlab817/pips/issues/triage" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="nL0yyLFZKqA9P+z1Q9UP5f17qgcLI/K2GInfPCYhNC/7Chob1BAEqygv2I7riIQ+F0so0cg/jKA4CmLWwRdAkQ==">
                                            <div class="SelectMenu-header">
                                                <span class="SelectMenu-title">Assign someone</span>
                                            </div>
                                            <div class="select-menu-filters">
                                                <div class="SelectMenu-filter">
                                                    <input type="text" id="triage-assigns-filter-field" class="SelectMenu-input form-control js-filterable-field" placeholder="Filter users" aria-label="Filter users" autocomplete="off" autofocus="">
                                                </div>
                                            </div>

                                            <div class="js-triage-deferred-content"></div>
                                        </form>  </details-menu>
                                </details>

                                <template class="js-triage-loader-template">
                                    <include-fragment class="SelectMenu-loading">
                                        <div data-hide-on-error="">
                                            <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" data-view-component="true" width="32" height="32" class="mx-auto d-block anim-rotate">
                                                <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                            </svg>
                                        </div>
                                        <div class="text-center p-3" data-show-on-error="" hidden="">
                                            <p>Something went wrong.</p>
                                            <button data-retry-button="" type="button" data-view-component="true" class="btn-sm btn">

                                                Retry


                                            </button>
                                        </div>
                                    </include-fragment>
                                </template>
                            </div>
                        </div>
                    </div>


                    <div aria-label="Issues" role="group" data-issue-and-pr-hovercards-enabled="">
                        <div class="js-navigation-container js-active-navigation-container">

                            <div id="issue_5" class="Box-row Box-row--focus-gray p-0 mt-0 js-navigation-item js-issue-row" data-id="930687289">
                                <div class="d-flex Box-row--drag-hide position-relative">

                                    <label class="flex-shrink-0 py-2 pl-3  d-none d-md-block">
                                        <input type="checkbox" data-check-all-item="" class="js-issues-list-check" name="issues[]" value="5" aria-labelledby="issue_5_link" autocomplete="off">
                                    </label>

                                    <div class="flex-shrink-0 pt-2 pl-3">
      <span class="tooltipped tooltipped-e" aria-label="Open issue">
        <svg class="octicon octicon-issue-opened open" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
      </span>
                                    </div>

                                    <!-- Issue title column -->
                                    <div class="flex-auto min-width-0 p-2 pr-3 pr-md-2">

                                        <a id="issue_5_link" class="Link--primary v-align-middle no-underline h4 js-navigation-open markdown-title" data-hovercard-type="issue" data-hovercard-url="/mlab817/pips/issues/5/hovercard" href="/mlab817/pips/issues/5">Add Issue Tracker per PAP</a>
                                        <div class="d-flex mt-1 text-small color-text-secondary">
        <span class="opened-by">
          #5
            opened <relative-time datetime="2021-06-26T12:38:43Z" class="no-wrap" title="Jun 26, 2021, 8:38 PM GMT+8">19 hours ago</relative-time> by
            <a class="Link--muted" title="Open issues created by mlab817" data-hovercard-type="user" data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+author%3Amlab817">mlab817</a>

        </span>

                                            <span class="d-none d-md-inline-flex">


        <span class="d-inline-flex flex-row flex-items-center ml-2"><tracked-issues-progress data-total="5" data-completed="0" data-type="other" data-catalyst="">
  <div class="d-inline-flex flex-row flex-items-center text-small">
      <span data-target="tracked-issues-progress.checklist" style="display: inline">
        <svg style="display: inline" aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-checklist">
    <path fill-rule="evenodd" d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
</svg>
      </span>
      <span style="transform:rotate(-90deg); width:12px; height:12px; display: none">
  <svg width="12" height="12" data-target="tracked-issues-progress.progress" data-circumference="31">
    <circle stroke="var(--color-border-primary)" stroke-width="2" fill="transparent" cx="50%" cy="50%" r="5"></circle>
    <circle style="transition: stroke-dashoffset 0.35s;" stroke="var(--color-border-info)" stroke-width="2" stroke-dasharray="31" 31="" stroke-dashoffset="31" stroke-linecap="round" fill="transparent" cx="50%" cy="50%" r="5"></circle>
  </svg>
</span>

    <span class="text-normal no-wrap mr-1 ml-1" data-target="tracked-issues-progress.label">5 tasks</span>
  </div>
</tracked-issues-progress>
</span>
        </span>

                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 col-3 pt-2 text-right pr-3 no-wrap d-flex hide-sm ">

      <span class="ml-2 flex-1 flex-shrink-0">
      </span>

                                        <span class="ml-2 flex-1 flex-shrink-0">
        <div class="AvatarStack AvatarStack--right ml-2 flex-1 flex-shrink-0 ">
          <div class="AvatarStack-body tooltipped tooltipped-sw tooltipped-multiline tooltipped-align-right-1 mt-1" aria-label="Assigned to ">
          </div>
        </div>
      </span>

                                        <span class="ml-2 flex-1 flex-shrink-0">
          <a href="/mlab817/pips/issues/5" class="Link--muted" aria-label="1 comment">
            <svg class="octicon octicon-comment v-align-middle" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M2.75 2.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 01.75.75v2.19l2.72-2.72a.75.75 0 01.53-.22h4.5a.25.25 0 00.25-.25v-7.5a.25.25 0 00-.25-.25H2.75zM1 2.75C1 1.784 1.784 1 2.75 1h10.5c.966 0 1.75.784 1.75 1.75v7.5A1.75 1.75 0 0113.25 12H9.06l-2.573 2.573A1.457 1.457 0 014 13.543V12H2.75A1.75 1.75 0 011 10.25v-7.5z"></path></svg>
            <span class="text-small text-bold">1</span>
          </a>
      </span>
                                    </div>
                                    <a class="d-block d-md-none position-absolute top-0 bottom-0 left-0 right-0" aria-label="Link to Issue. Add Issue Tracker per PAP" href="/mlab817/pips/issues/5"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="paginate-container d-none d-sm-flex flex-sm-justify-center">

                </div>

                <div class="paginate-container d-sm-none mb-5">

                </div>

                <div class="protip">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-light-bulb color-text-secondary">
                        <path fill-rule="evenodd" d="M8 1.5c-2.363 0-4 1.69-4 3.75 0 .984.424 1.625.984 2.304l.214.253c.223.264.47.556.673.848.284.411.537.896.621 1.49a.75.75 0 01-1.484.211c-.04-.282-.163-.547-.37-.847a8.695 8.695 0 00-.542-.68c-.084-.1-.173-.205-.268-.32C3.201 7.75 2.5 6.766 2.5 5.25 2.5 2.31 4.863 0 8 0s5.5 2.31 5.5 5.25c0 1.516-.701 2.5-1.328 3.259-.095.115-.184.22-.268.319-.207.245-.383.453-.541.681-.208.3-.33.565-.37.847a.75.75 0 01-1.485-.212c.084-.593.337-1.078.621-1.489.203-.292.45-.584.673-.848.075-.088.147-.173.213-.253.561-.679.985-1.32.985-2.304 0-2.06-1.637-3.75-4-3.75zM6 15.25a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zM5.75 12a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5z"></path>
                    </svg>
                    <strong>ProTip!</strong>
                    Add <a href="/mlab817/pips/issues?q=is%3Aissue+is%3Aopen+no%3Aassignee">no:assignee</a> to see everything that’s not assigned.
                </div>

            </div>


        </div>
    </div>
@stop
