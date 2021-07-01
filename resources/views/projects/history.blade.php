@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div id="repo-content-pjax-container" class="repository-content ">

            <div  class="compare-show-header Subhead hx_Subhead--responsive">
                <h1  class="Subhead-heading">Comparing changes</h1>
                <div  class="Subhead-description">        Choose two branches to see what’s changed or to start a new pull request.
                    If you need to, you can also <button type="button" class="btn-link js-toggle-range-editor-cross-repo">compare across forks</button>.
                </div>
            </div>
            <div class="Box d-flex range-editor p-3 flex-items-center color-text-secondary js-range-editor ">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"  height="16" width="16" class="octicon octicon-git-compare range-editor-icon">
                    <path fill-rule="evenodd" d="M9.573.677L7.177 3.073a.25.25 0 000 .354l2.396 2.396A.25.25 0 0010 5.646V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5h-1V.854a.25.25 0 00-.427-.177zM6 12v-1.646a.25.25 0 01.427-.177l2.396 2.396a.25.25 0 010 .354l-2.396 2.396A.25.25 0 016 15.146V13.5H5A2.5 2.5 0 012.5 11V5.372a2.25 2.25 0 111.5 0V11a1 1 0 001 1h1zm6.75 0a.75.75 0 100 1.5.75.75 0 000-1.5zM4 3.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"></path>
                </svg>
                <div class="position-relative ml-2">
                    <details class="details-reset details-overlay select-menu commitish-suggester hx_rsm">
                        <summary class="btn btn-sm select-menu-button branch" aria-haspopup="menu" role="button">
                            <i>base:</i>
                            <span class="css-truncate css-truncate-target" data-menu-button="" title="base: current">current</span>
                        </summary>
                        <details-menu class="select-menu-modal position-absolute" style="z-index: 99;" data-pjax="" src="/mlab817/ipms-v2/compare/branch-list?range=actions&amp;type=base" preload="" role="menu">

                        </details-menu>
                    </details>

                </div>

                <span class="position-relative tooltipped tooltipped-n ml-2" aria-label="Diff using three-dot (...) notation">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"  height="16" width="16" class="octicon octicon-arrow-left">
                        <path fill-rule="evenodd" d="M7.78 12.53a.75.75 0 01-1.06 0L2.47 8.28a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 1.06L4.81 7h7.44a.75.75 0 010 1.5H4.81l2.97 2.97a.75.75 0 010 1.06z"></path>
                    </svg>
                </span>

                <div class="position-relative ml-2">
                    <details class="details-reset details-overlay select-menu commitish-suggester hx_rsm">
                        <summary class="btn btn-sm select-menu-button branch" aria-haspopup="menu" role="button">
                            <i>compare:</i>
                            <span class="css-truncate css-truncate-target" data-menu-button="" title="compare: actions">actions</span>
                        </summary>
                        <ul class="dropdown-menu dropdown-menu-se">
                            @foreach ($project->commits as $commit)
                            <li>
                                <a class="dropdown-item" href="#url">#{{ $commit->id }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </details>

                </div>
            </div>

        </div>
    </div>
@stop
