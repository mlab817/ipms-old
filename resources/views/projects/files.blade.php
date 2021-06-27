@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div id="repo-content-pjax-container" class="repository-content ">

            <div>

                <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                    <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">


                        <div class="js-socket-channel js-updatable-content">
                        </div>

                        <div class="file-navigation mb-3 d-flex flex-items-start">
                            <!-- Top left -->
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
                            <!-- ./ Top left -->

                            <div class="flex-auto"></div>

                            <span class="d-none d-md-flex ml-2"></span>
                        </div>


                        <div class="Box mb-3">

                            <h2 id="files" class="sr-only">Files</h2>

                            <div class="js-details-container Details">
                                <div role="grid" aria-labelledby="files"
                                     class="Details-content--hidden-not-important js-navigation-container js-active-navigation-container d-md-block"
                                     data-pjax="">
                                    <div class="sr-only" role="row">
                                        <div role="columnheader">Type</div>
                                        <div role="columnheader">Name</div>
                                        <div role="columnheader" class="d-none d-md-block">Latest commit message</div>
                                        <div role="columnheader">Commit time</div>
                                    </div>

                                    <!-- row -->
                                    <div role="row"
                                         class="Box-row Box-row--focus-gray py-2 d-flex position-relative js-navigation-item ">
                                        <div role="gridcell" class="mr-3 flex-shrink-0" style="width: 16px;">
                                            <svg aria-label="File" aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                 height="16" width="16"
                                                 class="octicon octicon-file color-icon-tertiary">
                                                <path fill-rule="evenodd"
                                                      d="M3.75 1.5a.25.25 0 00-.25.25v11.5c0 .138.112.25.25.25h8.5a.25.25 0 00.25-.25V6H9.75A1.75 1.75 0 018 4.25V1.5H3.75zm5.75.56v2.19c0 .138.112.25.25.25h2.19L9.5 2.06zM2 1.75C2 .784 2.784 0 3.75 0h5.086c.464 0 .909.184 1.237.513l3.414 3.414c.329.328.513.773.513 1.237v8.086A1.75 1.75 0 0112.25 15h-8.5A1.75 1.75 0 012 13.25V1.75z"></path>
                                            </svg>
                                        </div>

                                        <div role="rowheader" class="flex-auto min-width-0 col-md-2 mr-3">
                                            <!-- TODO: Add download link -->
                                            <span class="css-truncate css-truncate-target d-block width-fit"><a
                                                    class="js-navigation-open Link--primary" title="README.md"
                                                    data-pjax="#repo-content-pjax-container"
                                                    href="/mlab817/pips/blob/1.0.0/README.md">README.md</a></span>
                                        </div>

                                        <div role="gridcell" class="flex-auto min-width-0 d-none d-md-block col-5 mr-3">
                                              <span
                                                  class="css-truncate css-truncate-target d-block width-fit markdown-title">
                                                    <a data-pjax="true"
                                                       title="updated readme with deployment instructions"
                                                       class="Link--secondary"
                                                       href="/mlab817/pips/commit/b336ac10cb180391f03679dbaf131bb974b74f6f">updated readme with deployment instructions</a>
                                              </span>
                                        </div>

                                        <div role="gridcell" class="color-text-tertiary text-right"
                                             style="width:100px;">
                                            <time-ago datetime="2021-05-17T01:19:42Z" data-view-component="true"
                                                      class="no-wrap" title="May 17, 2021, 9:19 AM GMT+8">last month
                                            </time-ago>
                                        </div>

                                    </div>
                                    <!-- /. row -->
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
@stop
