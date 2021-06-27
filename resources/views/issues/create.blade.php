@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div id="repo-content-pjax-container" class="repository-content ">


            <div class="js-check-all-container" data-pjax="">

                <!-- '"` --><!-- </textarea></xmp> -->
                <form class="new_issue" id="new_issue" action="{{ route('projects.issues.store', $project) }}" accept-charset="UTF-8" method="post">
                    @csrf

                    <div>

                        <div
                             class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                            <div  class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">

                                <div class="timeline-comment-wrapper timeline-new-comment composer composer-responsive">
                                    <span class="timeline-comment-avatar d-none d-md-block"></span>

                                    <div class="timeline-comment color-bg-canvas hx_comment-box--tip">
                                        <div class="js-slash-command-surface">
                                            <div class="p-0 p-md-2 mb-3 mb-md-0 rounded-top-2 color-bg-canvas">
                                                <input
                                                    class="form-control input-lg input-block input-contrast required title"
                                                    required="required" autofocus="autofocus" autocomplete="off"
                                                    placeholder="Title" aria-label="Title" type="text"
                                                    name="title" id="title">
                                            </div>

                                            <div class="p-0 p-md-2 mb-3 mb-md-0 rounded-top-2 color-bg-canvas">
                                                    <textarea name="description" id="description"
                                                              placeholder="Leave a comment"
                                                              aria-label="Comment body"
                                                              class="form-control width-full input-contrast comment-form-textarea js-comment-field js-paste-markdown js-task-list-field js-quick-submit js-size-to-fit js-session-resumable js-saved-reply-shortcut-comment-field"></textarea>
                                            </div>


                                            <div
                                                class="flex-items-center flex-justify-end mx-2 mb-2 px-0 d-none d-md-flex">
                                                <div class="d-flex flex-items-center flex-auto">

                                                </div>
                                                <button type="submit" class="btn-primary btn">
                                                    Submit new issue
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
@stop
