@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
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

        <div id="repo-content-pjax-container" class="repository-content ">

            <div>
                <div class="d-none d-lg-block mt-6 mr-3 Popover top-0 right-0 color-shadow-medium col-3">

                </div>

                <div data-view-component="true" class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                    <div data-view-component="true" class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">

                        <div class="file-navigation mb-3 d-flex flex-items-start">

                            <div class="position-relative">
                                <details class="details-reset details-overlay mr-0 mb-0 " id="branch-select-menu">
                                    <summary class="btn css-truncate" data-hotkey="w" title="Switch branches or tags">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             data-view-component="true" height="16" width="16"
                                             class="octicon octicon-tag text-gray">
                                            <path fill-rule="evenodd"
                                                  d="M2.5 7.775V2.75a.25.25 0 01.25-.25h5.025a.25.25 0 01.177.073l6.25 6.25a.25.25 0 010 .354l-5.025 5.025a.25.25 0 01-.354 0l-6.25-6.25a.25.25 0 01-.073-.177zm-1.5 0V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 010 2.474l-5.026 5.026a1.75 1.75 0 01-2.474 0l-6.25-6.25A1.75 1.75 0 011 7.775zM6 5a1 1 0 100 2 1 1 0 000-2z"></path>
                                        </svg>
                                        <span class="css-truncate-target" data-menu-button="">1.0.0</span>
                                        <span class="dropdown-caret"></span>
                                    </summary>


                                    <div class="SelectMenu">
                                        <div class="SelectMenu-modal">
                                            <header class="SelectMenu-header">
                                                <span class="SelectMenu-title">Switch branches/tags</span>
                                                <button class="SelectMenu-closeButton" type="button"
                                                        data-toggle-for="branch-select-menu">
                                                    <svg aria-label="Close menu" aria-hidden="false" role="img"
                                                         viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                                         height="16" width="16" class="octicon octicon-x">
                                                        <path fill-rule="evenodd"
                                                              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                            </header>

                                            <input-demux
                                                data-action="tab-container-change:input-demux#storeInput tab-container-changed:input-demux#updateInput"
                                                data-catalyst="">
                                                <tab-container class="d-flex flex-column js-branches-tags-tabs"
                                                               style="min-height: 0;">
                                                    <div class="SelectMenu-filter">
                                                        <input data-target="input-demux.source"
                                                               id="context-commitish-filter-field"
                                                               class="SelectMenu-input form-control"
                                                               aria-owns="ref-list-branches"
                                                               data-controls-ref-menu-id="ref-list-branches"
                                                               autofocus="" autocomplete="off"
                                                               aria-label="Find or create a branch…"
                                                               placeholder="Find or create a branch…" type="text">
                                                    </div>

                                                    <div class="SelectMenu-tabs" role="tablist"
                                                         data-target="input-demux.control">
                                                        <button class="SelectMenu-tab" type="button" role="tab"
                                                                aria-selected="true" tabindex="0">Branches
                                                        </button>
                                                        <button class="SelectMenu-tab" type="button" role="tab"
                                                                aria-selected="false" tabindex="-1">Tags
                                                        </button>
                                                    </div>

                                                    <div role="tabpanel" id="ref-list-branches"
                                                         data-filter-placeholder="Find or create a branch…"
                                                         class="d-flex flex-column flex-auto overflow-auto" tabindex="">
                                                        <ref-selector type="branch" data-targets="input-demux.sinks"
                                                                      data-action="
              input-entered:ref-selector#inputEntered
              tab-selected:ref-selector#tabSelected
              focus-list:ref-selector#focusFirstListMember
            " query-endpoint="/mlab817/pips/refs" current-user-can-push="" cache-key="v0:1624630184.7799659"
                                                                      current-committish="MS4wLjA="
                                                                      default-branch="bWFpbg=="
                                                                      name-with-owner="bWxhYjgxNy9waXBz"
                                                                      data-catalyst="">

                                                            <template data-target="ref-selector.fetchFailedTemplate">
                                                                <div class="SelectMenu-message" data-index="">Could not
                                                                    load branches
                                                                </div>
                                                            </template>

                                                            <template data-target="ref-selector.noMatchTemplate">
                                                                <!-- '"` --><!-- </textarea></xmp> -->
                                                                <form action="/mlab817/pips/branches"
                                                                      accept-charset="UTF-8" method="post"><input
                                                                        type="hidden" name="authenticity_token"
                                                                        value="9Nvg/gSOf4EW18TZApgyEBOLAJpKh8RX5NJtJfZ8RMMuYUN5BO67TmVpYh0JBNh1bWrFRRummeaSVCVZcrNb6w==">
                                                                    <input type="hidden" name="name" value="">
                                                                    <input type="hidden" name="branch" value="1.0.0">
                                                                    <input type="hidden" name="path_binary" value="">

                                                                    <button class="SelectMenu-item break-word"
                                                                            type="submit" role="menuitem" data-index="">
                                                                        <svg aria-hidden="true" viewBox="0 0 16 16"
                                                                             version="1.1" data-view-component="true"
                                                                             height="16" width="16"
                                                                             class="octicon octicon-git-branch SelectMenu-icon flex-self-baseline">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M11.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122V6A2.5 2.5 0 0110 8.5H6a1 1 0 00-1 1v1.128a2.251 2.251 0 11-1.5 0V5.372a2.25 2.25 0 111.5 0v1.836A2.492 2.492 0 016 7h4a1 1 0 001-1v-.628A2.25 2.25 0 019.5 3.25zM4.25 12a.75.75 0 100 1.5.75.75 0 000-1.5zM3.5 3.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0z"></path>
                                                                        </svg>
                                                                        <div>
                                                                            <span
                                                                                class="text-bold">Create branch: </span>
                                                                            <span class="color-text-tertiary">from ‘1.0.0’</span>
                                                                        </div>
                                                                    </button>
                                                                </form>
                                                            </template>


                                                            <!-- TODO: this max-height is necessary or else the branch list won't scroll.  why? -->
                                                            <div data-target="ref-selector.listContainer" role="menu"
                                                                 class="SelectMenu-list " style="max-height: 330px"
                                                                 data-pjax="#repo-content-pjax-container">
                                                                <div class="SelectMenu-loading pt-3 pb-0"
                                                                     aria-label="Menu is loading">
                                                                    <svg
                                                                        style="box-sizing: content-box; color: var(--color-icon-primary);"
                                                                        viewBox="0 0 16 16" fill="none"
                                                                        data-view-component="true" width="32"
                                                                        height="32" class="anim-rotate">
                                                                        <circle cx="8" cy="8" r="7"
                                                                                stroke="currentColor"
                                                                                stroke-opacity="0.25" stroke-width="2"
                                                                                vector-effect="non-scaling-stroke"></circle>
                                                                        <path d="M15 8a7.002 7.002 0 00-7-7"
                                                                              stroke="currentColor" stroke-width="2"
                                                                              stroke-linecap="round"
                                                                              vector-effect="non-scaling-stroke"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>

                                                            <template data-target="ref-selector.itemTemplate">
                                                                <a href="https://github.com/mlab817/pips/tree/"
                                                                   class="SelectMenu-item" role="menuitemradio"
                                                                   rel="nofollow" aria-checked="" data-index="">
                                                                    <svg aria-hidden="true" viewBox="0 0 16 16"
                                                                         version="1.1" data-view-component="true"
                                                                         height="16" width="16"
                                                                         class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                                        <path fill-rule="evenodd"
                                                                              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                                    </svg>
                                                                    <span
                                                                        class="flex-1 css-truncate css-truncate-overflow "></span>
                                                                    <span hidden=""
                                                                          class="Label Label--secondary flex-self-start">default</span>
                                                                </a>
                                                            </template>


                                                            <footer class="SelectMenu-footer"><a
                                                                    href="/mlab817/pips/branches">View all branches</a>
                                                            </footer>
                                                        </ref-selector>

                                                    </div>

                                                    <div role="tabpanel" id="tags-menu"
                                                         data-filter-placeholder="Find a tag"
                                                         class="d-flex flex-column flex-auto overflow-auto" tabindex=""
                                                         hidden="">
                                                        <ref-selector type="tag" data-action="
              input-entered:ref-selector#inputEntered
              tab-selected:ref-selector#tabSelected
              focus-list:ref-selector#focusFirstListMember
            " data-targets="input-demux.sinks" query-endpoint="/mlab817/pips/refs" cache-key="v0:1624630184.7799659"
                                                                      current-committish="MS4wLjA="
                                                                      default-branch="bWFpbg=="
                                                                      name-with-owner="bWxhYjgxNy9waXBz"
                                                                      data-catalyst="">

                                                            <template data-target="ref-selector.fetchFailedTemplate">
                                                                <div class="SelectMenu-message" data-index="">Could not
                                                                    load tags
                                                                </div>
                                                            </template>

                                                            <template data-target="ref-selector.noMatchTemplate">
                                                                <div class="SelectMenu-message" data-index="">Nothing to
                                                                    show
                                                                </div>
                                                            </template>

                                                            <template data-target="ref-selector.itemTemplate">
                                                                <a href="https://github.com/mlab817/pips/tree/"
                                                                   class="SelectMenu-item" role="menuitemradio"
                                                                   rel="nofollow" aria-checked="" data-index="">
                                                                    <svg aria-hidden="true" viewBox="0 0 16 16"
                                                                         version="1.1" data-view-component="true"
                                                                         height="16" width="16"
                                                                         class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                                                        <path fill-rule="evenodd"
                                                                              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                                    </svg>
                                                                    <span
                                                                        class="flex-1 css-truncate css-truncate-overflow"></span>
                                                                    <span hidden=""
                                                                          class="Label Label--secondary flex-self-start">default</span>
                                                                </a>
                                                            </template>


                                                            <div data-target="ref-selector.listContainer" role="menu"
                                                                 class="SelectMenu-list" style="max-height: 330px"
                                                                 data-pjax="#repo-content-pjax-container">
                                                                <div class="SelectMenu-loading pt-3 pb-0"
                                                                     aria-label="Menu is loading">
                                                                    <svg
                                                                        style="box-sizing: content-box; color: var(--color-icon-primary);"
                                                                        viewBox="0 0 16 16" fill="none"
                                                                        data-view-component="true" width="32"
                                                                        height="32" class="anim-rotate">
                                                                        <circle cx="8" cy="8" r="7"
                                                                                stroke="currentColor"
                                                                                stroke-opacity="0.25" stroke-width="2"
                                                                                vector-effect="non-scaling-stroke"></circle>
                                                                        <path d="M15 8a7.002 7.002 0 00-7-7"
                                                                              stroke="currentColor" stroke-width="2"
                                                                              stroke-linecap="round"
                                                                              vector-effect="non-scaling-stroke"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <footer class="SelectMenu-footer"><a
                                                                    href="/mlab817/pips/tags">View all tags</a></footer>
                                                        </ref-selector>
                                                    </div>
                                                </tab-container>
                                            </input-demux>
                                        </div>
                                    </div>

                                </details>

                            </div>


                            <div
                                class="flex-self-center ml-3 flex-self-stretch d-none d-lg-flex flex-items-center lh-condensed-ultra">
                                <a data-pjax="" href="/mlab817/pips/branches" class="Link--primary no-underline">
                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                         height="16" width="16" class="octicon octicon-git-branch text-gray">
                                        <path fill-rule="evenodd"
                                              d="M11.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122V6A2.5 2.5 0 0110 8.5H6a1 1 0 00-1 1v1.128a2.251 2.251 0 11-1.5 0V5.372a2.25 2.25 0 111.5 0v1.836A2.492 2.492 0 016 7h4a1 1 0 001-1v-.628A2.25 2.25 0 019.5 3.25zM4.25 12a.75.75 0 100 1.5.75.75 0 000-1.5zM3.5 3.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0z"></path>
                                    </svg>
                                    <strong>22</strong>
                                    <span class="color-text-tertiary">branches</span>
                                </a>
                                <a data-pjax="" href="/mlab817/pips/tags" class="ml-3 Link--primary no-underline">
                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                         height="16" width="16" class="octicon octicon-tag text-gray">
                                        <path fill-rule="evenodd"
                                              d="M2.5 7.775V2.75a.25.25 0 01.25-.25h5.025a.25.25 0 01.177.073l6.25 6.25a.25.25 0 010 .354l-5.025 5.025a.25.25 0 01-.354 0l-6.25-6.25a.25.25 0 01-.073-.177zm-1.5 0V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 010 2.474l-5.026 5.026a1.75 1.75 0 01-2.474 0l-6.25-6.25A1.75 1.75 0 011 7.775zM6 5a1 1 0 100 2 1 1 0 000-2z"></path>
                                    </svg>
                                    <strong>1</strong>
                                    <span class="color-text-tertiary">tag</span>
                                </a>
                            </div>

                            <div class="flex-auto"></div>

                            <include-fragment data-test-selector="overview-actions-fragment"
                                              src="/mlab817/pips/overview_actions/1.0.0"
                                              class="is-error"></include-fragment>


                            <span class="d-none d-md-flex ml-2">

<get-repo data-catalyst="">
  <details class="position-relative details-overlay details-reset" data-action="toggle:get-repo#onDetailsToggle">
    <summary class="btn btn-primary"
             data-hydro-click="{&quot;event_type&quot;:&quot;repository.click&quot;,&quot;payload&quot;:{&quot;repository_id&quot;:380256079,&quot;target&quot;:&quot;CLONE_OR_DOWNLOAD_BUTTON&quot;,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
             data-hydro-click-hmac="cb161c28fb761ad801275bcda9eef6e9bb7778d063fde375ef96d5d402a8de22">
      <svg class="octicon octicon-download mr-1" viewBox="0 0 16 16" version="1.1" width="16" height="16"
           aria-hidden="true"><path fill-rule="evenodd"
                                    d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>
      Download
      <span class="dropdown-caret"></span>
</summary>    <div class="position-relative">
      <div class="dropdown-menu dropdown-menu-sw p-0" style="top:6px;width:378px;">
          <div data-target="get-repo.modal">
            <div class="border-bottom p-3">
              <a class="Link--muted float-right tooltipped tooltipped-s"
                 href="https://docs.github.com/articles/which-remote-url-should-i-use" target="_blank"
                 aria-label="Which remote URL should I use?">
  <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
       class="octicon octicon-question">
    <path fill-rule="evenodd"
          d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm9 3a1 1 0 11-2 0 1 1 0 012 0zM6.92 6.085c.081-.16.19-.299.34-.398.145-.097.371-.187.74-.187.28 0 .553.087.738.225A.613.613 0 019 6.25c0 .177-.04.264-.077.318a.956.956 0 01-.277.245c-.076.051-.158.1-.258.161l-.007.004a7.728 7.728 0 00-.313.195 2.416 2.416 0 00-.692.661.75.75 0 001.248.832.956.956 0 01.276-.245 6.3 6.3 0 01.26-.16l.006-.004c.093-.057.204-.123.313-.195.222-.149.487-.355.692-.662.214-.32.329-.702.329-1.15 0-.76-.36-1.348-.863-1.725A2.76 2.76 0 008 4c-.631 0-1.155.16-1.572.438-.413.276-.68.638-.849.977a.75.75 0 101.342.67z"></path>
</svg>
</a>

<div class="text-bold">
  <svg class="octicon octicon-terminal mr-3" viewBox="0 0 16 16" version="1.1" width="16" height="16"
       aria-hidden="true"><path fill-rule="evenodd"
                                d="M0 2.75C0 1.784.784 1 1.75 1h12.5c.966 0 1.75.784 1.75 1.75v10.5A1.75 1.75 0 0114.25 15H1.75A1.75 1.75 0 010 13.25V2.75zm1.75-.25a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V2.75a.25.25 0 00-.25-.25H1.75zM7.25 8a.75.75 0 01-.22.53l-2.25 2.25a.75.75 0 11-1.06-1.06L5.44 8 3.72 6.28a.75.75 0 111.06-1.06l2.25 2.25c.141.14.22.331.22.53zm1.5 1.5a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"></path></svg>
  Clone
</div>

<tab-container>

  <div class="UnderlineNav my-2 box-shadow-none">
    <div class="UnderlineNav-body" role="tablist">
          <!-- '"` --><!-- </textarea></xmp> --><form data-remote="true" action="/users/set_protocol?protocol_type=push"
                                                      accept-charset="UTF-8" method="post"><input type="hidden"
                                                                                                  name="authenticity_token"
                                                                                                  value="uvWQrQ44defftN/yIv0gRqGtwdjwuPBF3KqgrXYbYYR2hvbc301BNcdPUjCIUr+gzYdyZN4DP9e/RLOiJEk0fQ==">
            <button name="protocol_selector" type="submit" role="tab"
                    class="UnderlineNav-item lh-default f6 py-0 px-0 mr-2 position-relative" value="http"
                    data-hydro-click="{&quot;event_type&quot;:&quot;clone_or_download.click&quot;,&quot;payload&quot;:{&quot;feature_clicked&quot;:&quot;USE_HTTPS&quot;,&quot;git_repository_type&quot;:&quot;REPOSITORY&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
                    data-hydro-click-hmac="93abfc91d25207035481a1a4af5579f5c670ffddc388821762b65f0078c487d7"
                    aria-selected="false" tabindex="-1">
              HTTPS
</button></form>          <!-- '"` --><!-- </textarea></xmp> --><form data-remote="true"
                                                                      action="/users/set_protocol?protocol_type=push"
                                                                      accept-charset="UTF-8" method="post"><input
                type="hidden" name="authenticity_token"
                value="TlvyKPTZajMPdnzptnpJ3Q9qzZykqF7u35mNd3hyw92CKJRZJaxe4ReN8Ssc1dY7Y0B+IIoTkXy8d554KiCWJA==">
            <button name="protocol_selector" type="submit" role="tab"
                    class="UnderlineNav-item lh-default f6 py-0 px-0 mr-2 position-relative" aria-selected="true"
                    value="ssh"
                    data-hydro-click="{&quot;event_type&quot;:&quot;clone_or_download.click&quot;,&quot;payload&quot;:{&quot;feature_clicked&quot;:&quot;USE_SSH&quot;,&quot;git_repository_type&quot;:&quot;REPOSITORY&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
                    data-hydro-click-hmac="4153365ed3fa85f2b3143d1ab69b9c15683d0628387289e444b450aa18473afe"
                    tabindex="0">
              SSH
</button></form>          <!-- '"` --><!-- </textarea></xmp> --><form data-remote="true"
                                                                      action="/users/set_protocol?protocol_type=push"
                                                                      accept-charset="UTF-8" method="post"><input
                type="hidden" name="authenticity_token"
                value="XC6rxoKE6hnBvx8jL8rMJyPrCE+qSDaSsZQ1v5Wr9IqQXc23U/Hey9lEkuGFZVPBT8G784Tz+QDSeiawx/mhcw==">
            <button name="protocol_selector" type="submit" role="tab"
                    class="UnderlineNav-item lh-default f6 py-0 px-0 mr-2 position-relative" value="gh_cli"
                    data-hydro-click="{&quot;event_type&quot;:&quot;clone_or_download.click&quot;,&quot;payload&quot;:{&quot;feature_clicked&quot;:&quot;USE_GH_CLI&quot;,&quot;git_repository_type&quot;:&quot;REPOSITORY&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
                    data-hydro-click-hmac="a86af549d477390b31be85f62789e8448563b62a33c097aada19352373ba6a67"
                    aria-selected="false" tabindex="-1">
              GitHub CLI
</button></form>    </div>
  </div>

  <div role="tabpanel" hidden="">
    <div class="input-group">
  <input type="text" class="form-control input-monospace input-sm color-bg-secondary" data-autoselect=""
         value="https://github.com/mlab817/pips.git" aria-label="https://github.com/mlab817/pips.git" readonly="">
  <div class="input-group-button">
    <clipboard-copy value="https://github.com/mlab817/pips.git" aria-label="Copy to clipboard"
                    class="btn btn-sm js-clipboard-copy tooltipped-no-delay ClipboardButton"
                    data-copy-feedback="Copied!" data-tooltip-direction="n"
                    data-hydro-click="{&quot;event_type&quot;:&quot;clone_or_download.click&quot;,&quot;payload&quot;:{&quot;feature_clicked&quot;:&quot;COPY_URL&quot;,&quot;git_repository_type&quot;:&quot;REPOSITORY&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
                    data-hydro-click-hmac="2c74296ad62b77db3095f52508037f169c6eb84ce6b330b62bc8cfed2ffe27b9"
                    tabindex="0" role="button"><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                    data-view-component="true" height="16" width="16"
                                                    class="octicon octicon-clippy js-clipboard-clippy-icon d-inline-block">
    <path fill-rule="evenodd"
          d="M5.75 1a.75.75 0 00-.75.75v3c0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75v-3a.75.75 0 00-.75-.75h-4.5zm.75 3V2.5h3V4h-3zm-2.874-.467a.75.75 0 00-.752-1.298A1.75 1.75 0 002 3.75v9.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-9.5a1.75 1.75 0 00-.874-1.515.75.75 0 10-.752 1.298.25.25 0 01.126.217v9.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-9.5a.25.25 0 01.126-.217z"></path>
</svg><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
           class="octicon octicon-check js-clipboard-check-icon color-text-success d-inline-block d-sm-none">
    <path fill-rule="evenodd"
          d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
</svg></clipboard-copy>
  </div>
</div>

    <p class="mt-2 mb-0 f6 color-text-secondary">
        Use Git or checkout with SVN using the web URL.
    </p>
  </div>

  <div role="tabpanel">

    <div class="input-group">
  <input type="text" class="form-control input-monospace input-sm color-bg-secondary" data-autoselect=""
         value="git@github.com:mlab817/pips.git" aria-label="git@github.com:mlab817/pips.git" readonly="">
  <div class="input-group-button">
    <clipboard-copy value="git@github.com:mlab817/pips.git" aria-label="Copy to clipboard"
                    class="btn btn-sm js-clipboard-copy tooltipped-no-delay ClipboardButton"
                    data-copy-feedback="Copied!" data-tooltip-direction="n"
                    data-hydro-click="{&quot;event_type&quot;:&quot;clone_or_download.click&quot;,&quot;payload&quot;:{&quot;feature_clicked&quot;:&quot;COPY_URL&quot;,&quot;git_repository_type&quot;:&quot;REPOSITORY&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
                    data-hydro-click-hmac="2c74296ad62b77db3095f52508037f169c6eb84ce6b330b62bc8cfed2ffe27b9"
                    tabindex="0" role="button"><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                    data-view-component="true" height="16" width="16"
                                                    class="octicon octicon-clippy js-clipboard-clippy-icon d-inline-block">
    <path fill-rule="evenodd"
          d="M5.75 1a.75.75 0 00-.75.75v3c0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75v-3a.75.75 0 00-.75-.75h-4.5zm.75 3V2.5h3V4h-3zm-2.874-.467a.75.75 0 00-.752-1.298A1.75 1.75 0 002 3.75v9.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-9.5a1.75 1.75 0 00-.874-1.515.75.75 0 10-.752 1.298.25.25 0 01.126.217v9.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-9.5a.25.25 0 01.126-.217z"></path>
</svg><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
           class="octicon octicon-check js-clipboard-check-icon color-text-success d-inline-block d-sm-none">
    <path fill-rule="evenodd"
          d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
</svg></clipboard-copy>
  </div>
</div>

    <p class="mt-2 mb-0 f6 color-text-secondary">
        Use a password-protected SSH key.
    </p>
  </div>

  <div role="tabpanel" hidden="">
    <div class="input-group">
  <input type="text" class="form-control input-monospace input-sm color-bg-secondary" data-autoselect=""
         value="gh repo clone mlab817/pips" aria-label="gh repo clone mlab817/pips" readonly="">
  <div class="input-group-button">
    <clipboard-copy value="gh repo clone mlab817/pips" aria-label="Copy to clipboard"
                    class="btn btn-sm js-clipboard-copy tooltipped-no-delay ClipboardButton"
                    data-copy-feedback="Copied!" data-tooltip-direction="n"
                    data-hydro-click="{&quot;event_type&quot;:&quot;clone_or_download.click&quot;,&quot;payload&quot;:{&quot;feature_clicked&quot;:&quot;COPY_URL&quot;,&quot;git_repository_type&quot;:&quot;REPOSITORY&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
                    data-hydro-click-hmac="2c74296ad62b77db3095f52508037f169c6eb84ce6b330b62bc8cfed2ffe27b9"
                    tabindex="0" role="button"><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                    data-view-component="true" height="16" width="16"
                                                    class="octicon octicon-clippy js-clipboard-clippy-icon d-inline-block">
    <path fill-rule="evenodd"
          d="M5.75 1a.75.75 0 00-.75.75v3c0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75v-3a.75.75 0 00-.75-.75h-4.5zm.75 3V2.5h3V4h-3zm-2.874-.467a.75.75 0 00-.752-1.298A1.75 1.75 0 002 3.75v9.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-9.5a1.75 1.75 0 00-.874-1.515.75.75 0 10-.752 1.298.25.25 0 01.126.217v9.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-9.5a.25.25 0 01.126-.217z"></path>
</svg><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
           class="octicon octicon-check js-clipboard-check-icon color-text-success d-inline-block d-sm-none">
    <path fill-rule="evenodd"
          d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
</svg></clipboard-copy>
  </div>
</div>

    <p class="mt-2 mb-0 f6 color-text-secondary">
      Work fast with our official CLI.
      <a href="https://cli.github.com" target="_blank">Learn more</a>.
    </p>
  </div>
</tab-container>

            </div>
            <ul class="list-style-none">

              <li class="Box-row Box-row--hover-gray p-0">
                <a class="d-flex flex-items-center color-text-primary text-bold no-underline p-3" rel="nofollow"
                   data-hydro-click="{&quot;event_type&quot;:&quot;clone_or_download.click&quot;,&quot;payload&quot;:{&quot;feature_clicked&quot;:&quot;DOWNLOAD_ZIP&quot;,&quot;git_repository_type&quot;:&quot;REPOSITORY&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips/tree/1.0.0?_pjax=%23js-repo-pjax-container&quot;,&quot;user_id&quot;:29625844}}"
                   data-hydro-click-hmac="ef43040508c67fdeb5cdff3d87bf0152e1a85404ff284e2a93d862f6dc62d88b"
                   data-ga-click="Repository, download zip, location:repo overview" data-open-app="link"
                   href="/mlab817/pips/archive/refs/tags/1.0.0.zip">
                  <svg class="octicon octicon-file-zip mr-3" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                       aria-hidden="true"><path fill-rule="evenodd"
                                                d="M3.5 1.75a.25.25 0 01.25-.25h3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h2.086a.25.25 0 01.177.073l2.914 2.914a.25.25 0 01.073.177v8.586a.25.25 0 01-.25.25h-.5a.75.75 0 000 1.5h.5A1.75 1.75 0 0014 13.25V4.664c0-.464-.184-.909-.513-1.237L10.573.513A1.75 1.75 0 009.336 0H3.75A1.75 1.75 0 002 1.75v11.5c0 .649.353 1.214.874 1.515a.75.75 0 10.752-1.298.25.25 0 01-.126-.217V1.75zM8.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM6 5.25a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 016 5.25zm2 1.5A.75.75 0 018.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 018 6.75zm-1.25.75a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM8 9.75A.75.75 0 018.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 018 9.75zm-.75.75a1.75 1.75 0 00-1.75 1.75v3c0 .414.336.75.75.75h2.5a.75.75 0 00.75-.75v-3a1.75 1.75 0 00-1.75-1.75h-.5zM7 12.25a.25.25 0 01.25-.25h.5a.25.25 0 01.25.25v2.25H7v-2.25z"></path></svg>
                  Download ZIP
</a>              </li>
            </ul>
          </div>

        <div class="p-3" data-targets="get-repo.platforms" data-platform="mac" hidden="">
          <h4 class="lh-condensed mb-3">Launching GitHub Desktop<span class="AnimatedEllipsis"></span></h4>
          <p class="color-text-secondary">If nothing happens, <a href="https://desktop.github.com/">download GitHub Desktop</a> and try again.</p>
          <button data-action="click:get-repo#onDetailsToggle" type="button" data-view-component="true"
                  class="btn-link">

  Go back


</button>
        </div>

        <div class="p-3" data-targets="get-repo.platforms" data-platform="windows" hidden="">
          <h4 class="lh-condensed mb-3">Launching GitHub Desktop<span class="AnimatedEllipsis"></span></h4>
          <p class="color-text-secondary">If nothing happens, <a href="https://desktop.github.com/">download GitHub Desktop</a> and try again.</p>
          <button data-action="click:get-repo#onDetailsToggle" type="button" data-view-component="true"
                  class="btn-link">

  Go back


</button>
        </div>

        <div class="p-3" data-targets="get-repo.platforms" data-platform="xcode" hidden="">
          <h4 class="lh-condensed mb-3">Launching Xcode<span class="AnimatedEllipsis"></span></h4>
          <p class="color-text-secondary">If nothing happens, <a href="https://developer.apple.com/xcode/">download Xcode</a> and try again.</p>
          <button data-action="click:get-repo#onDetailsToggle" type="button" data-view-component="true"
                  class="btn-link">

  Go back


</button>
        </div>

        <div class="p-3 " data-targets="get-repo.platforms"
             data-target="new-codespace.loadingVscode prefetch-pane.loadingVscode" data-platform="vscode" hidden="">
  <poll-include-fragment data-target="get-repo.vscodePoller new-codespace.vscodePoller prefetch-pane.vscodePoller">
    <h4 class="lh-condensed mb-3">Launching Visual Studio Code<span class="AnimatedEllipsis"
                                                                    data-hide-on-error=""></span></h4>
    <p class="color-text-secondary" data-hide-on-error="">Your codespace will open once ready.</p>
    <p class="color-text-secondary" data-show-on-error="" hidden="">There was a problem preparing your codespace, please try again.</p>
  </poll-include-fragment>
</div>

      </div>
    </div>
  </details>
</get-repo>



    </span>
                        </div>

                        <div data-catalyst="">

                            <livewire:project-edit :project="$project" />

                        </div>


                    </div>

                    <div data-view-component="true" class="flex-shrink-0 col-12 col-md-3">

                        <div class="BorderGrid BorderGrid--spacious" data-pjax="">
                            <div class="BorderGrid-row hide-sm hide-md">
                                <div class="BorderGrid-cell">
                                    <details class="details-reset details-overlay details-overlay-dark ">
                                        <summary class="float-right" role="button">
                                            <div class="Link--secondary pt-1 pl-2">
                                                <svg aria-label="Edit repository metadata" role="img"
                                                     viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                                     height="16" width="16" class="octicon octicon-gear float-right">
                                                    <path fill-rule="evenodd"
                                                          d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                        </summary>

                                        <details-dialog class="Box d-flex flex-column anim-fade-in fast Box--overlay "
                                                        aria-label="Edit repository details" role="dialog"
                                                        aria-modal="true">
                                            <div class="Box-header">
                                                <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                                        aria-label="Close dialog" data-close-dialog="">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                         data-view-component="true" height="16" width="16"
                                                         class="octicon octicon-x">
                                                        <path fill-rule="evenodd"
                                                              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                                <h1 class="Box-title">Edit repository details</h1>
                                            </div>
                                            <div class="Box-body overflow-auto">
                                                <div class="js-topic-form-area">
                                                    <!-- '"` --><!-- </textarea></xmp> -->
                                                    <form id="repo_metadata_form"
                                                          action="/mlab817/pips/settings/update_meta"
                                                          accept-charset="UTF-8" method="post"><input type="hidden"
                                                                                                      name="_method"
                                                                                                      value="put"><input
                                                            type="hidden" name="authenticity_token"
                                                            value="+oQLKPOp8nZnuvU6I9ZffVw6aj9WjROJyAH7sElQ1Dlp9PNnkrAugtGSSUQF7x+DQWMzG5Exy1HAj7F6zQ8zqw==">
                                                        <div class="form-group mt-0 mb-3">
                                                            <div class="mb-2">
                                                                <label for="repo_description">Description</label>
                                                            </div>
                                                            <textarea type="text" id="repo_description"
                                                                      style="min-height:4em;height:6em;"
                                                                      class="form-control input-contrast width-full"
                                                                      name="repo_description"
                                                                      placeholder="Short description of this repository"
                                                                      autofocus=""></textarea>
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <div class="mb-2">
                                                                <label for="repo_homepage">Website</label>
                                                            </div>
                                                            <input type="url" id="repo_homepage"
                                                                   class="form-control input-contrast width-full"
                                                                   name="repo_homepage" value=""
                                                                   placeholder="https://mlab817.github.io/pips/">
                                                        </div>
                                                        <div
                                                            class="width-full tag-input-container topic-input-container d-inline-block js-tag-input-container">
                                                            <div class="js-tag-input-wrapper">
                                                                <div class="form-group my-0">
                                                                    <div class="mb-2">
                                                                        <label for="repo_topics" class="d-block">Topics
                                                                            <span
                                                                                class="text-normal color-text-tertiary">(separate with spaces)</span></label>
                                                                    </div>
                                                                    <div
                                                                        class="tag-input form-control d-inline-block color-bg-primary py-0 position-relative">
                                                                        <ul class="js-tag-input-selected-tags d-inline">
                                                                            <li class="d-none topic-tag-action my-1 mr-1 f6 float-left js-tag-input-tag js-template">
                                                                                <span
                                                                                    class="js-placeholder-tag-name"></span>
                                                                                <button type="button"
                                                                                        class="delete-topic-button f5 no-underline ml-1 js-remove"
                                                                                        tabindex="-1">
                                                                                    <svg aria-label="Remove topic"
                                                                                         role="img" viewBox="0 0 16 16"
                                                                                         version="1.1"
                                                                                         data-view-component="true"
                                                                                         height="16" width="16"
                                                                                         class="octicon octicon-x">
                                                                                        <path fill-rule="evenodd"
                                                                                              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                                                    </svg>
                                                                                </button>
                                                                                <input type="hidden"
                                                                                       name="repo_topics[]"
                                                                                       class="js-topic-input" value="">
                                                                            </li>

                                                                        </ul>

                                                                        <auto-complete
                                                                            src="/mlab817/pips/topic_autocomplete"
                                                                            for="repo-topic-popup">
                                                                            <input type="text" id="repo_topics"
                                                                                   class="tag-input-inner form-control color-bg-primary shorter d-inline-block p-0 my-1 border-0"
                                                                                   autocomplete="off" autofocus=""
                                                                                   role="combobox"
                                                                                   aria-controls="repo-topic-popup"
                                                                                   aria-expanded="false"
                                                                                   aria-autocomplete="list"
                                                                                   aria-haspopup="listbox"
                                                                                   spellcheck="false">
                                                                            <ul class="suggester border width-full color-bg-primary left-0"
                                                                                id="repo-topic-popup" style="top: 100%;"
                                                                                hidden="" role="listbox"></ul>
                                                                        </auto-complete>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="js-topic-suggestions-container"
                                                             data-url="/mlab817/pips/topic_suggestions?async_topics=false">

                                                        </div>

                                                        <div class="form-group mt-3 mb-0" role="group"
                                                             aria-labelledby="hidden_sidebar_options">
                                                            <div class="text-bold mb-2" id="hidden_sidebar_options">
                                                                Include in the home page
                                                            </div>
                                                            <label class="d-block mb-2 text-normal">
                                                                <input name="repo_sections[releases]" type="hidden"
                                                                       value="0"><input class="mr-1" type="checkbox"
                                                                                        value="1" checked="checked"
                                                                                        name="repo_sections[releases]"
                                                                                        id="repo_sections_releases">
                                                                Releases
                                                            </label>
                                                            <label class="d-block mb-2 text-normal">
                                                                <input name="repo_sections[packages]" type="hidden"
                                                                       value="0"><input class="mr-1" type="checkbox"
                                                                                        value="1" checked="checked"
                                                                                        name="repo_sections[packages]"
                                                                                        id="repo_sections_packages">
                                                                Packages
                                                            </label>
                                                            <label class="d-block text-normal">
                                                                <input name="repo_sections[environments]" type="hidden"
                                                                       value="0"><input class="mr-1" type="checkbox"
                                                                                        value="1" checked="checked"
                                                                                        name="repo_sections[environments]"
                                                                                        id="repo_sections_environments">
                                                                Environments
                                                            </label>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                            <div class="Box-footer">
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary"
                                                            form="repo_metadata_form">Save changes
                                                    </button>
                                                    <button type="reset" class="btn" data-close-dialog=""
                                                            form="repo_metadata_form">Cancel
                                                    </button>
                                                </div>

                                            </div>
                                        </details-dialog>
                                    </details>
                                    <h2 class="mb-3 h4">About</h2>

                                    <div class="f4 mt-3 color-text-secondary text-italic">
                                        No description, website, or topics provided.
                                    </div>

                                    <h3 class="sr-only">Topics</h3>
                                    <div class="mt-3">

                                    </div>

                                    <h3 class="sr-only">Resources</h3>
                                    <div class="mt-3">
                                        <a class="Link--muted" href="#readme">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                 data-view-component="true" height="16" width="16"
                                                 class="octicon octicon-book mr-2">
                                                <path fill-rule="evenodd"
                                                      d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                                            </svg>
                                            Readme
                                        </a></div>


                                </div>
                            </div>
                            <div class="BorderGrid-row">
                                <div class="BorderGrid-cell">
                                    <h2 class="h4 mb-3">
                                        <a href="/mlab817/pips/releases" data-view-component="true"
                                           class="Link--primary no-underline">
                                            Releases
                                            <span title="1" data-view-component="true" class="Counter">1</span>
                                        </a></h2>

                                    <a class="Link--primary d-flex no-underline"
                                       href="/mlab817/pips/releases/tag/1.0.0">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             data-view-component="true" height="16" width="16"
                                             class="octicon octicon-tag flex-shrink-0 mt-1 color-text-success">
                                            <path fill-rule="evenodd"
                                                  d="M2.5 7.775V2.75a.25.25 0 01.25-.25h5.025a.25.25 0 01.177.073l6.25 6.25a.25.25 0 010 .354l-5.025 5.025a.25.25 0 01-.354 0l-6.25-6.25a.25.25 0 01-.073-.177zm-1.5 0V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 010 2.474l-5.026 5.026a1.75 1.75 0 01-2.474 0l-6.25-6.25A1.75 1.75 0 011 7.775zM6 5a1 1 0 100 2 1 1 0 000-2z"></path>
                                        </svg>
                                        <div class="ml-2 min-width-0">
                                            <div class="d-flex">
                                                <span class="css-truncate css-truncate-target text-bold mr-2"
                                                      style="max-width: none;">1.0.0</span>
                                                <span title="Label: Latest" data-view-component="true"
                                                      class="Label Label--success flex-shrink-0">
          Latest
</span></div>
                                            <div class="text-small color-text-secondary">
                                                <relative-time datetime="2021-06-27T07:27:53Z" class="no-wrap"
                                                               title="Jun 27, 2021, 3:27 PM GMT+8">21 seconds ago
                                                </relative-time>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="BorderGrid-row">
                                <div class="BorderGrid-cell">
                                    <h2 class="h4 mb-3">
                                        <a href="/users/mlab817/packages?repo_name=pips" data-view-component="true"
                                           class="Link--primary no-underline">
                                            Packages <span title="0" hidden="hidden" data-view-component="true"
                                                           class="Counter">0</span>
                                        </a></h2>


                                    <div class="text-small color-text-secondary">
                                        No packages published <br>
                                        <a href="/mlab817/pips/packages">Publish your first package</a>
                                    </div>


                                </div>
                            </div>
                            <div class="BorderGrid-row">
                                <div class="BorderGrid-cell">
                                    <h2 class="h4 mb-3">Languages</h2>
                                    <div class="mb-2">
  <span data-view-component="true" class="Progress">
    <span itemprop="keywords" aria-label="HTML 46.2" style="background-color: #e34c26;width: 46.2%;"
          data-view-component="true" class="Progress-item"></span>
    <span itemprop="keywords" aria-label="PHP 34.7" style="background-color: #4F5D95;width: 34.7%;"
          data-view-component="true" class="Progress-item"></span>
    <span itemprop="keywords" aria-label="Blade 19.1" style="background-color: #f7523f;width: 19.1%;"
          data-view-component="true" class="Progress-item"></span>
</span></div>
                                    <ul class="list-style-none">
                                        <li class="d-inline">
                                            <a class="d-inline-flex flex-items-center flex-nowrap Link--secondary no-underline text-small mr-3"
                                               href="/mlab817/pips/search?l=html"
                                               data-ga-click="Repository, language stats search click, location:repo overview">
                                                <svg class="octicon octicon-dot-fill mr-2" style="color:#e34c26;"
                                                     viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8z"></path>
                                                </svg>
                                                <span class="color-text-primary text-bold mr-1">HTML</span>
                                                <span>46.2%</span>
                                            </a>
                                        </li>
                                        <li class="d-inline">
                                            <a class="d-inline-flex flex-items-center flex-nowrap Link--secondary no-underline text-small mr-3"
                                               href="/mlab817/pips/search?l=php"
                                               data-ga-click="Repository, language stats search click, location:repo overview">
                                                <svg class="octicon octicon-dot-fill mr-2" style="color:#4F5D95;"
                                                     viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8z"></path>
                                                </svg>
                                                <span class="color-text-primary text-bold mr-1">PHP</span>
                                                <span>34.7%</span>
                                            </a>
                                        </li>
                                        <li class="d-inline">
                                            <a class="d-inline-flex flex-items-center flex-nowrap Link--secondary no-underline text-small mr-3"
                                               href="/mlab817/pips/search?l=blade"
                                               data-ga-click="Repository, language stats search click, location:repo overview">
                                                <svg class="octicon octicon-dot-fill mr-2" style="color:#f7523f;"
                                                     viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8z"></path>
                                                </svg>
                                                <span class="color-text-primary text-bold mr-1">Blade</span>
                                                <span>19.1%</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ./ Github -->

    <div class="d-flex mb-3 px-3 px-md-4 px-lg-5">
        <div data-view-component="true" class="flex-shrink-0 col-12 col-lg-9 mb-4 mb-md-0">
            <div id="options_bucket">
                <div data-view-component="true" class="Subhead hx_Subhead--responsive">
                    <h2 data-view-component="true" class="Subhead-heading">Profile</h2>


                </div>      <!-- '"` --><!-- </textarea></xmp> -->


                <dl class="form-group d-inline-block my-0">
                    <dt class="input-label">
                        <label for="title">PAP Title</label>
                    </dt>
                    <dd>
                        {{ $project->title }}
                    </dd>
                </dl>

                <!-- '"` --><!-- </textarea></xmp> -->
                <form class="js-repo-features-form" data-autosubmit="true" action="/mlab817/ipms-v2/settings/update"
                      accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input
                        type="hidden" name="authenticity_token"
                        value="uHcMThx0EKTtIcCglTJ9arjZhHa1zEqvTC/0wHwUGkWQ1TZw+stxF+WlF9YKoiS7DkKimyBYHgEaIqUvY3gesg==">
                    <div class="form-checkbox js-repo-option">
                        <input type="hidden" name="template" value="0">
                        <input type="checkbox" name="template" value="1" id="template-feature">
                        <label for="template-feature">Template repository</label>
                        <span class="status-indicator ml-1 js-status-indicator">
          <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
               class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
          <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
               class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
        </span>
                        <p class="note">
                            Template repositories let users generate new repositories with the same directory structure
                            and files.
                            <a href="https://docs.github.com/articles/creating-a-repository-from-a-template/">Learn
                                more</a>.
                        </p>
                    </div>
                    <noscript>
                        <button type="submit" data-view-component="true" class="btn-primary btn">

                            Save changes


                        </button>
                    </noscript>
                </form>


                <!-- '"` --><!-- </textarea></xmp> -->
                <form data-remote="true" action="/mlab817/ipms-v2/settings/open-graph-image" accept-charset="UTF-8"
                      method="post"><input type="hidden" name="_method" value="put"><input type="hidden"
                                                                                           name="authenticity_token"
                                                                                           value="mg7tBdYwhnr6Kx/k6ESlYkGnWJ/5yGGb9aJu4kjVl/9tPaGrW8Ng8WjSyLyHnm46m0VqiARjzEhukwUi2DymaQ==">
                    <file-attachment input="repo-image-file-input" class="js-upload-repository-image is-default"
                                     data-upload-repository-id="323900739" novalidate="novalidate"
                                     data-upload-policy-url="/upload/policies/repository-images"><input type="hidden"
                                                                                                        value="mXNJPco+BgghxpxrLjwyKEO1WrrxkDsOUQT5f+zNmLNN5ICE31HS4Gm24d1FA8wr/DmlPztSDL7ioR5zPiPxsw=="
                                                                                                        data-csrf="true"
                                                                                                        class="js-data-upload-policy-url-csrf">
                        <input type="file" id="repo-image-file-input" style="display: none">
                        <dl class="form-group d-inline-block mb-0 mt-6">
                            <dt class="input-label">
                                <label>Social preview</label>
                            </dt>
                            <dd class="avatar-upload-container">
                                <p>
                                    Upload an image to customize your repository’s social media preview.
                                </p>
                                <p>
                                    Images should be at least 640×320px (1280×640px for best display).<br>
                                    <a href="/mlab817/ipms-v2/settings/og-template" class="text-bold">Download
                                        template</a>
                                </p>
                                <div class="avatar-upload position-relative">
                                    <div class="upload-state pt-0 loading position-absolute width-full text-center">
                                        <svg style="box-sizing: content-box; color: var(--color-icon-primary);"
                                             viewBox="0 0 16 16" fill="none" data-view-component="true" width="16"
                                             height="16" class="v-align-text-bottom anim-rotate">
                                            <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25"
                                                    stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                        </svg>
                                        Uploading...
                                    </div>
                                    <div class="upload-state pt-0 color-text-danger file-empty">
                                        This file is empty.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger too-big">
                                        Please upload a picture smaller than 1 MB.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger bad-dimensions">
                                        Please upload a picture smaller than 10,000x10,000.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger bad-file">
                                        We only support PNG, GIF, or JPG pictures.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger failed-request">
                                        Something went really wrong and we can’t process that picture.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger bad-format">
                                        File contents don’t match the file extension.
                                    </div>
                                </div>
                            </dd>
                        </dl>
                    </file-attachment>
                </form>
                <div class="avatar-upload position-relative">
                    <details class="dropdown details-reset details-overlay">
                        <summary aria-haspopup="menu" role="button">
                            <div class="border rounded-2 repository-og-image js-repository-image-container"
                                 style="background-image: url('https://repository-images.githubusercontent.com/323900739/cc688500-d5b9-11eb-9160-46a50909a0c1')"></div>
                            <div
                                class="position-absolute color-bg-primary rounded-2 color-text-primary px-2 py-1 left-0 bottom-0 ml-2 mb-2 border">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                     height="16" width="16" class="octicon octicon-pencil">
                                    <path fill-rule="evenodd"
                                          d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path>
                                </svg>
                                Edit
                            </div>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-se" style="z-index: 99" role="menu">
                            <label for="repo-image-file-input" class="dropdown-item btn-link text-normal"
                                   role="menuitem" tabindex="0">
                                Upload an image…
                            </label>

                            <!-- '"` --><!-- </textarea></xmp> -->
                            <form action="/mlab817/ipms-v2/settings/open-graph-image" accept-charset="UTF-8"
                                  method="post"><input type="hidden" name="_method" value="delete"><input type="hidden"
                                                                                                          name="authenticity_token"
                                                                                                          value="YON+Dd06yvjwV4JDyOV47sw8uIZb42D+h5AvsNKo4aMCb2JHgNLu/s4LurUBpIxYdcDBEbZg6G+x85kUO4pCEQ==">
                                <input type="hidden" name="id" class="js-repository-image-id" value="596584">
                                <button class="dropdown-item btn-link js-remove-repository-image-button" role="menuitem"
                                        type="submit" data-disable-with=""
                                        data-confirm="Are you sure you want to remove mlab817/ipms-v2's promotional image?">
                                    Remove image
                                </button>
                            </form>
                        </details-menu>
                    </details>
                </div>


                <div data-view-component="true"
                     class="Subhead hx_Subhead--responsive Subhead--spacious border-bottom-0 mb-0">
                    <h2 id="features" data-view-component="true" class="Subhead-heading">Features</h2>


                </div>
                <div class="Box">
                    <!-- '"` --><!-- </textarea></xmp> -->
                    <form class="js-repo-features-form" data-autosubmit="true" action="/mlab817/ipms-v2/settings/update"
                          accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input
                            type="hidden" name="authenticity_token"
                            value="xl01v43Xz/XAoFwwUvmZlDY9xNanhYQmJUtDVJKM223u/w+Ba2iuRsgki0bNacBFgKbiOzIR0IhzRhK7jeDfmg==">
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="has_wiki" value="0">
                                <input type="checkbox" name="has_wiki" value="1" id="wiki-feature" checked="">
                                <label for="wiki-feature">Wikis</label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                            </div>
                        </div>

                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="wiki_access_to_pushers" value="0">
                                <input type="checkbox" name="wiki_access_to_pushers" value="1" id="wiki-pusher-access"
                                       checked="">
                                <label for="wiki-pusher-access">Restrict editing to collaborators only</label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">Public wikis will still be readable by everyone.</p>
                            </div>
                        </div>

                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="has_issues" value="0">
                                <input type="checkbox" name="has_issues" value="1" id="issue-feature" checked="">
                                <label for="issue-feature">Issues</label>
                                <span class="status-indicator ml-1 js-status-indicator">
              <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                   width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
              <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                   width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
            </span>
                                <p class="note">
                                    Issues integrate lightweight task tracking into your repository.
                                    Keep projects on track with issue labels and milestones, and reference them in
                                    commit messages.
                                </p>

                                <div class="flash my-3">
                                    <div class="d-flex flex-md-row flex-column flex-md-items-center flex-items-start">
                                        <div class="mb-md-0 mb-3">
                                            <strong class="mb-2">Get organized with issue templates</strong>
                                            <p class="pr-6 mb-0">Give contributors issue templates that help you cut
                                                through the noise and help them push your project forward.</p>
                                        </div>
                                        <div>
                                            <a href="/mlab817/ipms-v2/issues/templates/edit" class="btn btn-primary">
                                                Set up templates
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="enable_repository_funding_links" value="0">
                                <input type="checkbox" name="enable_repository_funding_links"
                                       id="repository-funding-links-feature" value="1">
                                <label for="repository-funding-links-feature">Sponsorships</label>
                                &nbsp;
                                <span class="status-indicator v-align-top ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">
                                    Sponsorships help your community know how to financially support this repository.
                                </p>
                                <div class="flash my-3">
                                    <div class="d-flex flex-md-row flex-column flex-md-items-center flex-items-start">
                                        <div class="mb-md-0 mb-3">
                                            <strong class="mb-2">
                                                Display a "Sponsor" button
                                            </strong>
                                            <p class="pr-6 mb-0">
                                                Add links to GitHub Sponsors or third-party methods your repository
                                                accepts for financial contributions to your project.
                                            </p>
                                        </div>

                                        <div>
                                            <a class="btn btn-primary"
                                               data-hydro-click="{&quot;event_type&quot;:&quot;sponsors.repo_funding_links_button_click&quot;,&quot;payload&quot;:{&quot;platforms&quot;:[],&quot;repo_id&quot;:323900739,&quot;owner_id&quot;:29625844,&quot;user_id&quot;:29625844,&quot;is_mobile&quot;:false,&quot;originating_url&quot;:&quot;https://github.com/mlab817/ipms-v2/settings&quot;}}"
                                               data-hydro-click-hmac="e17d9178081c89fd10c4d4de1539a227e7e02034dd298bf11c4a64ddcbda5f25"
                                               href="/mlab817/ipms-v2/new/main?repository_funding=1">Set up sponsor
                                                button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="projects_enabled" value="0">
                                <input type="checkbox" name="projects_enabled" id="projects-feature" value="1"
                                       checked="">
                                <label for="projects-feature">Projects</label>
                                <span class="status-indicator v-align-top ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">
                                    Project boards on GitHub help you organize and prioritize your work.
                                    You can create project boards for specific feature work,
                                    comprehensive roadmaps, or even release checklists.
                                </p>
                            </div>
                        </div>
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="archive_program_opt_out_enabled" value="1">
                                <input type="checkbox" name="archive_program_opt_out_enabled" value="0"
                                       id="archive-program-opt-out-feature" checked="">
                                <label for="archive-program-opt-out-feature">
                                    Preserve this repository
                                </label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note color-text-tertiary">
                                    Include this code in the <a href="https://archiveprogram.github.com/faq/">GitHub
                                        Archive Program</a>.
                                </p>
                            </div>
                        </div>

                        <noscript>
                            <button type="submit" data-view-component="true" class="btn-primary btn">

                                Save changes


                            </button>
                        </noscript>
                    </form>
                    <!-- '"` --><!-- </textarea></xmp> -->
                    <form class="border-top js-repo-features-form" data-autosubmit="true"
                          action="/mlab817/ipms-v2/settings/update_readme_toc_settings" accept-charset="UTF-8"
                          method="post"><input type="hidden" name="_method" value="put"><input type="hidden"
                                                                                               name="authenticity_token"
                                                                                               value="NBMeu+uTFY2FFhRsSOAsdizPP3LCslJO8JD1dn0C8EPS/WidCYya0cJQ10bIT+/P4UYTNxio+tUdBs66fsrSwQ==">
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="readme_toc_opt_out_enabled" value="1">
                                <input type="checkbox" name="readme_toc_opt_out_enabled" value="0"
                                       id="readme-toc-opt-out-feature" checked="">
                                <label for="readme-toc-opt-out-feature">
                                    Table of contents
                                </label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note color-text-tertiary">
                                    Autogenerate table of contents for Markdown files in this repository. The table of
                                    contents will be displayed near the top of the file.
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- '"` --><!-- </textarea></xmp> -->
                    <form class="border-top js-repo-features-form" data-autosubmit="true"
                          action="/mlab817/ipms-v2/settings/update_discussions_settings" accept-charset="UTF-8"
                          method="post"><input type="hidden" name="_method" value="put"><input type="hidden"
                                                                                               name="authenticity_token"
                                                                                               value="2HftU1jn2EPtPm8pcGGdLdiMKn1KiQ2wkUYKK9QqaDMerY8cvk1QIP72wXSsOgBE8MdoBMLDArv6cMc9YwQdsw==">
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="has_discussions" value="0">
                                <input type="checkbox" name="has_discussions" value="1" id="discussions-feature"
                                       checked="">
                                <label for="discussions-feature">Discussions</label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">
                                    Discussions is the space for your community to have conversations,
                                    ask questions and post answers without opening issues.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>


                <div data-view-component="true" class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 id="merge-button-settings" data-view-component="true" class="Subhead-heading">Merge button</h2>


                </div>
                <p id="merge-button-settings-desc">
                    When merging pull requests, you can allow any combination of merge commits, squashing, or rebasing.
                    At least one option must be enabled.
                    If you have linear history requirement enabled on any protected branch, you must enable squashing or
                    rebasing.
                </p>
                <!-- '"` --><!-- </textarea></xmp> -->
                <form class="repository-merge-features js-merge-features-form" data-autosubmit="true"
                      action="/mlab817/ipms-v2/settings/update_merge_settings" accept-charset="UTF-8" method="post">
                    <input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token"
                                                                           value="OvgoJNbzoR7TISK+7na5yUl15RBsR9O7QgypRyjL032kG1RnQWcyf7daFSZJeJ+tVbnpyMA4DUQPzyeSLDWDig==">
                    <div class="Box">
                        <div hidden="" class="flash flash-full flash-warn js-select-one-warning">
                            You must select at least one option
                        </div>
                        <div hidden="" class="flash flash-full flash-warn js-no-merge-commit-warning">
                            You must select squashing or rebasing option.
                            This is because linear history is required on at least one protected branch.
                        </div>

                        <ul aria-labelledby="merge-button-settings" aria-describedby="merge-button-settings-desc">
                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_merge_commit">Allow merge commits</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="merge_commit"
                                               id="merge_types_merge_commit" checked="">
                                        <p class="note">Add all commits from the head branch to the base branch with a
                                            merge commit.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_squash">Allow squash merging</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="squash_merge"
                                               id="merge_types_squash" checked="">
                                        <p class="note">Combine all commits from the head branch into a single commit in
                                            the base branch.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_rebase">Allow rebase merging</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="rebase_merge"
                                               id="merge_types_rebase" checked="">
                                        <p class="note">Add all commits from the head branch onto the base branch
                                            individually.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <p class="mt-3">
                        You can allow setting pull requests to merge automatically once all required reviews and status
                        checks have passed.
                    </p>
                    <div class="Box">
                        <ul>
                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_auto_merge">Allow auto-merge</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="auto_merge"
                                               id="merge_types_auto_merge">
                                        <p class="note">
                                            Waits for merge requirements to be met and then merges automatically.
                                            <a class="small" target="_blank" rel="noopener noreferrer"
                                               href="https://docs.github.com/github/collaborating-with-issues-and-pull-requests/automatically-merging-a-pull-request">Learn
                                                more</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>

                <div data-view-component="true" class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 id="archive-settings" data-view-component="true" class="Subhead-heading">Archives</h2>


                </div>
                <p id="archive-settings-desc">
                    When creating source code archives, you can choose to include files stored using Git LFS in the
                    archive.
                </p>
                <!-- '"` --><!-- </textarea></xmp> -->
                <form data-autosubmit="true" action="/mlab817/ipms-v2/settings/update_archive_settings"
                      accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input
                        type="hidden" name="authenticity_token"
                        value="yqZjNBznvSByM/eZcOkrd3peRpecDW2x+S6I/ka5YLLjUjKGLw0+jrfz49+Gi/O6HQt8R1eYWFy3j6uncestqg==">

                    <div class="Box">
                        <ul>
                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="archive_include_lfs_objects">Include Git LFS objects in
                                            archives</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="include_lfs_objects" value="1"
                                               id="archive_include_lfs_objects">
                                        <p class="note">Git LFS usage in archives is billed at the same rate as usage
                                            with the client.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <noscript>
                        <button type="submit" data-view-component="true" class="btn-primary btn">

                            Save changes


                        </button>
                    </noscript>
                </form>


                <div data-view-component="true" class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 data-view-component="true" class="Subhead-heading">GitHub Pages</h2>


                </div>
                <div class="Box">
                    <div class="Box-row flash flash-full flash-warn mt-0">
                        <p>Pages settings now has its own dedicated tab! <a href="/mlab817/ipms-v2/settings/pages">Check
                                it out here!</a></p>
                    </div>
                </div>


            </div><!-- /#options_bucket -->
        </div>
    </div>

    <section class="content">
        <!-- Default box -->

        <div class="callout callout-info">
            <div class="row">
                <div class="col">
                    <p>Title: <strong>{{ $project->title  }}</strong></p>
                    <p>Office: <strong>{{ $project->office->name ?? '' }}</strong></p>
                </div>
                <div class="col">
                    <p>Created by: <img src="{{ $project->creator->avatar }}" width="20" height="20" class="img-circle">
                        <strong>{{ $project->creator->name ?? '' }}</strong> on
                        <strong>{{ $project->created_at->format('M d, Y') }}</strong></p>
                    <p>Last Updated: <strong>{{ $project->updated_at->format('M d, Y') }}</strong></p>
                </div>
            </div>
        </div>

        @include('projects.project-details', ['project' => $project , 'pdp_indicators' => \App\Models\PdpIndicator::with('children.children')->whereNull('parent_id')->get()])

        @includeWhen($project->has_infra, 'projects.trip-info', ['project' => $project])

        <div class="row">
            <div class="col-12 mb-3">
                @if(auth()->user()->can('update', $project))
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
                @endif
                <a href="{{ route('projects.own') }}" class="btn ml-1 float-right">Back to List</a>
            </div>
        </div>

        <!-- Include review result if it exists -->
{{--        @includeWhen($project->review()->exists(), 'reviews.result', ['review' => $project->review])--}}

        <a id="back-to-top" href="#" class="btn btn-info back-to-top" role="button" aria-label="Scroll to top">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </a>

    </section>
@endsection
