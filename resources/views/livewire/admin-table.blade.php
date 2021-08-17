<div class="container-xl clearfix">
    <div>
        <div class="labels-list js-details-container Details ">
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
                                            <a class="dropdown-item" href="{{ route('admin.index', ['label' => $key])  }}">{{ $key }}</a>
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
                    <details class="details-reset details-overlay details-overlay-dark">
                        <summary class="btn" aria-haspopup="dialog" role="button">New Label</summary>
                        <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                            <div class="Box-header">
                                <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                    <!-- <%= octicon "x" %> -->
                                    <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                </button>
                                <h3 class="Box-title">Create New Label</h3>
                            </div>
                            <form action="{{ route('admin.create-label') }}" method="POST" accept-charset="UTF-8">
                                @csrf
                                @method('PUT')
                                <div class="Box-body">
                                    <dl class="form-group">
                                        <dt class="input-label">
                                            <label for="name">Label</label>
                                        </dt>
                                        <dd>
                                            <input type="text" data-maxlength="50" autocomplete="off" required=""
                                               id="name" name="name"
                                               class="js-new-label-name-input js-characters-remaining-field form-control width-full"
                                               placeholder="Label name" value="" aria-describedby="label--name-error">
                                        </dd>
                                    </dl>
                                    <dl class="form-group">
                                        <dt class="input-label">
                                            <label for="description">Description</label>
                                        </dt>
                                        <dd>
                                            <textarea name="description" type="text" id="description"
                                               class="form-control width-full"
                                               style="resize: none;"
                                               placeholder="Description (optional)"
                                               rows="4" maxlength="100"></textarea>
                                        </dd>
                                    </dl>
                                    <dl class="form-group">
                                        <dt class="input-label">
                                            <label for="labelType">Type</label>
                                        </dt>
                                        <dd>
                                            <select class="form-select" name="labelType" id="labelType" aria-label="Label type" required>
                                                <option value="">Select Type</option>
                                                @foreach ($labelTypes as $key => $option)
                                                    <option value="{{ $key }}" @if(request()->query('label') == $key) selected @endif>{{ ucfirst(str_replace('_',' ', $option)) }}</option>
                                                @endforeach
                                            </select>
                                        </dd>
                                    </dl>
                                </div>
                                <div class="Box-footer">
                                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                </div>
                            </form>
                        </details-dialog>
                    </details>
                </div>
            </div>

            @if(! $labels->count())
            <!-- Blankslate -->
            <div class="blankslate blankslate-large blankslate-spacious">
                <svg aria-hidden="true" viewBox="0 0 24 24" version="1.1" height="24"
                     width="24" class="octicon octicon-tag blankslate-icon">
                    <path d="M7.75 6.5a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"></path>
                    <path fill-rule="evenodd"
                          d="M2.5 1A1.5 1.5 0 001 2.5v8.44c0 .397.158.779.44 1.06l10.25 10.25a1.5 1.5 0 002.12 0l8.44-8.44a1.5 1.5 0 000-2.12L12 1.44A1.5 1.5 0 0010.94 1H2.5zm0 1.5h8.44l10.25 10.25-8.44 8.44L2.5 10.94V2.5z"></path>
                </svg>

                <h3 class="mb-1">No labels!</h3>

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

                </div>
                <!-- /. Table Header -->

                <div aria-label="Labels" role="group">
                    <div class="js-label-list">
                        @foreach($labels as $label)
                        <div
                            class="Box-row Box-row--focus-gray Details p-3 m-0 d-flex flex-justify-between flex-md-items-baseline flex-items-center flex-wrap js-navigation-item js-labels-list-item js-label-preview-container">

                            <div class="col-md-3 col-9">
                                <span>{{ $label->name }}</span>
                            </div>

                            <div class="d-md-block d-none col-4 f6 color-text-secondary pr-3 js-hide-on-label-edit">
                                <span>{{ $label->description }}</span>
                            </div>

                            <div class="col-md-2 col-3 f6 d-flex flex-justify-end">
                                <div class="d-lg-block d-none">

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
