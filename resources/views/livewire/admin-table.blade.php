<div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
    <div class="repository-content ">

        <div>

            <div class="labels-list js-details-container Details ">
                @if($showForm)
                    <div
                        class="p-3 mb-3 color-bg-tertiary border color-border-primary rounded-1 Details-content--hidden js-create-label js-label-form js-label-preview-container"
                        id="new_label" action="/mlab817/pips/labels" accept-charset="UTF-8" method="post">

                        <div class="clearfix d-flex flex-md-row flex-column flex-md-items-end flex-items-start mb-n2 ">

                            <!--new label name-->
                            <dl class="form-group col-md-3 col-12 pr-md-3 pr-0 my-2 my-md-3 js-characters-remaining-container js-label-error-container">
                                <dt class=" d-flex flex-justify-between flex-items-center">
                                    <label for="label-name-" class="f5">Label name</label>
                                    <span class="text-small d-none label-characters-remaining js-characters-remaining"
                                          data-suffix="remaining">
          50 remaining
        </span>
                                </dt>
                                <dd class="position-relative">
                                    <input type="text" data-maxlength="50" autocomplete="off" required=""
                                           wire:model="name"
                                           id="name" name="name"
                                           class="js-new-label-name-input js-characters-remaining-field form-control width-full"
                                           placeholder="Label name" value="" aria-describedby="label--name-error">
                                </dd>
                                <dd class="error js-label-name-error" hidden="" id="label--name-error"></dd>
                            </dl><!--END new label name-->

                            <!--new label description-->
                            <dl class="form-group my-2 my-md-3 col-lg-4 col-md-3 col-12 pr-md-3 pr-0 js-characters-remaining-container js-label-error-container flex-auto">
                                <dt class="d-flex flex-justify-between flex-items-center ">
                                    <label for="label-description-" class="f5">Description</label>
                                    <span class="text-small label-characters-remaining d-none js-characters-remaining"
                                          data-suffix="remaining">
          100 remaining
        </span>
                                </dt>
                                <dd>
                                    <input wire:model="description" type="text" id="label-description-" name="label[description]"
                                           class="form-control width-full js-characters-remaining-field js-new-label-description-input"
                                           placeholder="Description (optional)" value=""
                                           aria-describedby="label--description-error" maxlength="100">
                                </dd>
                                <dd class="error js-label-description-error" hidden="" id="label--description-error"></dd>
                            </dl><!--END new label description-->

                            <!--new label color-->
                            <dl class="form-group my-2 my-md-3 col-md-2 col-12 js-label-error-container">
                                <dt>
                                    <label for="label-color-" class="f5">Label Type</label>
                                </dt>
                                <dd class="d-flex">
                                    <div class="position-relative flex-1">
                                        {{--                                    <input required="" aria-describedby="label--color-error" value="#c2e0c6" type="text"--}}
                                        {{--                                           name="label[color]" id="label-color-"--}}
                                        {{--                                           class="form-control input-monospace pb-1 mr-0 js-new-label-color-input width-full">--}}
                                        <select class="form-select" wire:model="labelType" name="labelType" id="labelType" aria-label="Label type">
                                            <option selected>Select</option>
                                            @foreach ($labelTypes as $key => $option)
                                                <option value="{{ $key }}">{{ ucfirst(str_replace('_',' ', $option)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </dd>
                                <dd class="error js-label-color-error" hidden="" id="label--color-error"></dd>
                            </dl><!--END new label color-->

                            <!--new label actions-->
                            <div
                                class="form-group my-2 my-md-3 ml-md-5 ml-0 col-lg-3 col-md-4 col-12 d-flex flex-md-justify-end flex-justify-start">
                                <button class="btn btn-primary flex-order-1 flex-md-order-2 mr-md-0 mr-2" wire:click="submit">
                                    @if($labelId) Update @else Create @endif label
                                </button>
                            </div>
                            <!--END new label actions-->

                        </div>

                    </div>

                @endif

                <div class="subnav d-flex flex-md-row flex-column" data-pjax="">
                    <div class="d-flex">

                        <nav class="subnav-links float-left d-flex no-wrap" aria-label="Issue">
                            <div>
                                <details class="dropdown details-reset details-overlay d-inline-block">
                                    <summary class="btn" aria-haspopup="true">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                             height="16" width="16" class="octicon octicon-tag">
                                            <path fill-rule="evenodd"
                                                  d="M2.5 7.775V2.75a.25.25 0 01.25-.25h5.025a.25.25 0 01.177.073l6.25 6.25a.25.25 0 010 .354l-5.025 5.025a.25.25 0 01-.354 0l-6.25-6.25a.25.25 0 01-.073-.177zm-1.5 0V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 010 2.474l-5.026 5.026a1.75 1.75 0 01-2.474 0l-6.25-6.25A1.75 1.75 0 011 7.775zM6 5a1 1 0 100 2 1 1 0 000-2z"></path>
                                        </svg>
                                        {{ $label }}
                                        <div class="dropdown-caret"></div>
                                    </summary>

                                    <div class="dropdown-menu dropdown-menu-se">
                                        <div class="dropdown-header">
                                            Choose Label Type
                                        </div>
                                        <ul>
                                            @foreach($labelTypes as $key => $label)
                                            <li>
                                                <a class="dropdown-item" href="{{ route('test', ['label' => $key])  }}">{{ $key }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </details>
                            </div>
                        </nav>

                        <div class="position-relative d-md-none d-inline-block" style="margin-left: auto;">
                            <button class="btn btn-primary js-details-target js-details-target-new-label" type="button"
                                    aria-expanded="false" wire:click="create">New label
                            </button>
                        </div>
                    </div>

                    <div class="pl-md-2 pl-0 pr-md-4 pr-0 mt-md-0 mt-3" role="search">
                        <form class="ml-0 subnav-search float-left position-relative" data-pjax="true" role="search"
                              aria-label="Labels" action="/mlab817/pips/labels" accept-charset="UTF-8" method="get">

                            <input type="text" wire:model="q" name="q" id="js-issues-search" value=""
                                       class="form-control form-control subnav-search-input input-contrast col-md-6 col-12"
                                       placeholder="Search all labels" autocomplete="off" aria-label="Search all labels"
                                       data-hotkey="/">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                 height="16" width="16" class="octicon octicon-search subnav-search-icon">
                                <path fill-rule="evenodd"
                                      d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm-.82 4.74a6 6 0 111.06-1.06l3.04 3.04a.75.75 0 11-1.06 1.06l-3.04-3.04z"></path>
                            </svg>
                        </form>
                    </div>

                    <div class="position-relative d-md-block d-none" style="margin-left: auto;">
                        <button class="btn btn-primary js-details-target js-details-target-new-label" type="button"
                                aria-expanded="false" wire:click="create">New label
                        </button>
                    </div>
                </div>

                @if(! $labels->count())
                <!-- Blankslate -->
                <div data-view-component="true" class="blankslate blankslate-large blankslate-spacious">
                    <svg aria-hidden="true" viewBox="0 0 24 24" version="1.1" data-view-component="true" height="24"
                         width="24" class="octicon octicon-tag blankslate-icon">
                        <path d="M7.75 6.5a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"></path>
                        <path fill-rule="evenodd"
                              d="M2.5 1A1.5 1.5 0 001 2.5v8.44c0 .397.158.779.44 1.06l10.25 10.25a1.5 1.5 0 002.12 0l8.44-8.44a1.5 1.5 0 000-2.12L12 1.44A1.5 1.5 0 0010.94 1H2.5zm0 1.5h8.44l10.25 10.25-8.44 8.44L2.5 10.94V2.5z"></path>
                    </svg>

                    <h3 data-view-component="true" class="mb-1">No labels!</h3>

                    <p>There aren’t any labels for this repository quite yet. Click on the "New Label" button above to
                        create one.</p>

                </div>
                <!-- /. Blankslate -->

                @else
                <div class="Box">
                    <!-- Table Header -->
                    <div class="Box-header d-flex flex-justify-between">

                        <h3 class="Box-title f5">
                            <span class="js-labels-count">{{ $labels->count() }}</span>
                            <span class="js-labels-label" data-singular-string="label" data-plural-string="labels">labels</span>
                        </h3>

                        <!-- Sort -->
                        <details class="details-reset details-overlay select-menu position-relative">
                            <summary class="btn-link color-text-secondary select-menu-button" aria-haspopup="menu"
                                     role="button">
                                Sort
                            </summary>
                            <details-menu class="select-menu-modal position-absolute right-0" style="z-index: 99;"
                                          role="menu">
                                <div class="select-menu-header">
                                    <span class="select-menu-title">Sort</span>
                                </div>
                                <div class="select-menu-list">
                                    <a class="select-menu-item" href="?sort=name-asc" aria-checked="true"
                                       role="menuitemradio">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             data-view-component="true" height="16" width="16"
                                             class="octicon octicon-check select-menu-item-icon">
                                            <path fill-rule="evenodd"
                                                  d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                        </svg>
                                        <div class="select-menu-item-text">Alphabetically</div>
                                    </a>
                                    <a class="select-menu-item" href="?sort=name-desc" aria-checked="false"
                                       role="menuitemradio">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             data-view-component="true" height="16" width="16"
                                             class="octicon octicon-check select-menu-item-icon">
                                            <path fill-rule="evenodd"
                                                  d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                        </svg>
                                        <div class="select-menu-item-text">Reverse alphabetically</div>
                                    </a>
                                    <a class="select-menu-item" href="?sort=count-desc" aria-checked="false"
                                       role="menuitemradio">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             data-view-component="true" height="16" width="16"
                                             class="octicon octicon-check select-menu-item-icon">
                                            <path fill-rule="evenodd"
                                                  d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                        </svg>
                                        <div class="select-menu-item-text">Most issues</div>
                                    </a>
                                    <a class="select-menu-item" href="?sort=count-asc" aria-checked="false"
                                       role="menuitemradio">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             data-view-component="true" height="16" width="16"
                                             class="octicon octicon-check select-menu-item-icon">
                                            <path fill-rule="evenodd"
                                                  d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                        </svg>
                                        <div class="select-menu-item-text">Fewest issues</div>
                                    </a>
                                </div>
                            </details-menu>
                        </details>
                        <!-- /. Sort -->


                    </div>
                    <!-- /. Table Header -->

                    <div aria-label="Labels" role="group">
                        <div class="js-label-list">
                            @foreach($labels as $label)
                            <div
                                class="Box-row Box-row--focus-gray Details p-3 m-0 d-flex flex-justify-between flex-md-items-baseline flex-items-center flex-wrap js-navigation-item js-labels-list-item js-label-preview-container">

                                <div class="col-md-3 col-9">
                                    <span href="/mlab817/pips/labels/bug" title="Something isn't working" data-name="bug"
                                       style="--label-r:215;--label-g:58;--label-b:74;--label-h:353;--label-s:66;--label-l:53;"
                                       data-view-component="true"
                                       class="IssueLabel hx_IssueLabel IssueLabel--big lh-condensed js-label-link d-inline-block v-align-top">
                                        <span>{{ $label->name }}</span>
                                    </span>
                                </div>

                                <div class="d-md-block d-none col-4 f6 color-text-secondary pr-3 js-hide-on-label-edit">
                                    <span>{{ $label->description }}</span>
                                </div>

                                <div class="col-3 f6 color-text-secondary pr-3 d-md-block d-none js-hide-on-label-edit">
                                </div>

                                <div class="col-md-2 col-3 f6 d-flex flex-justify-end">
                                    <div class="BtnGroup d-block d-lg-none">
                                        <details class="dropdown details-reset details-overlay BtnGroup-item">
                                            <summary aria-haspopup="true" role="button" data-view-component="true"
                                                     class="btn-outline btn-sm btn">


                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                     data-view-component="true" height="16" width="16"
                                                     class="octicon octicon-kebab-horizontal">
                                                    <path
                                                        d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                                </svg>

                                            </summary>
                                            <ul class="dropdown-menu dropdown-menu-sw">
                                                <li>
                                                    <button
                                                        class="dropdown-item btn-link js-edit-label js-hide-on-label-edit"
                                                        type="button">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <!-- '"` --><!-- </textarea></xmp> -->
                                                    <button type="submit" class="dropdown-item btn-link" data-confirm="Are you sure? Deleting a label will remove it from all issues and pull requests.">
                                                        Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </details>
                                    </div>
                                    <div class="d-lg-block d-none">

                                        <button
                                            class="Link--secondary btn-link ml-3 js-edit-label js-hide-on-label-edit"
                                            type="button"
                                            wire:click="edit({{ $label }})">
                                            Edit
                                        </button>

                                        <!-- '"` --><!-- </textarea></xmp> -->
                                        <button type="button" onclick="return confirm('Are you sure?') ? @this.delete({{$label->id}}) : false" class="btn-link Link--secondary ml-3"
                                                data-confirm="Are you sure? Deleting a label will remove it from all issues and pull requests.">
                                            <svg hidden="hidden"
                                                 style="box-sizing: content-box; color: var(--color-icon-primary);"
                                                 viewBox="0 0 16 16" fill="none" data-view-component="true"
                                                 width="16" height="16"
                                                 class="js-label-delete-spinner mr-1 v-align-top anim-rotate">
                                                <circle cx="8" cy="8" r="7" stroke="currentColor"
                                                        stroke-opacity="0.25" stroke-width="2"
                                                        vector-effect="non-scaling-stroke"></circle>
                                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor"
                                                      stroke-width="2" stroke-linecap="round"
                                                      vector-effect="non-scaling-stroke"></path>
                                            </svg>
                                            Delete
                                        </button>

                                    </div>

                                    <!-- '"` --><!-- </textarea></xmp> -->
                                    <form class="d-lg-inline d-none js-delete-label js-hide-on-label-edit"
                                          hidden="hidden" action="/mlab817/pips/labels/3116585488"
                                          accept-charset="UTF-8" method="post">
                                        <button type="submit" class="btn-link Link--secondary ml-3"
                                                data-confirm="Are you sure? Deleting a label will remove it from all issues and pull requests.">
                                            <svg hidden="hidden"
                                                 style="box-sizing: content-box; color: var(--color-icon-primary);"
                                                 viewBox="0 0 16 16" fill="none" data-view-component="true" width="16"
                                                 height="16"
                                                 class="js-label-delete-spinner mr-1 v-align-top anim-rotate">
                                                <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25"
                                                        stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor"
                                                      stroke-width="2" stroke-linecap="round"
                                                      vector-effect="non-scaling-stroke"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>

                            </div>
                            @endforeach

                        </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
