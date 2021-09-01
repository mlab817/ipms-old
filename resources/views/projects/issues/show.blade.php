@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div>

            <div class="border-bottom pb-3 mb-3 Details">
                <div class="gh-header-show ">
                    <form action="{{ route('projects.issues.update', ['project' => $project, 'issue' => $issue]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column flex-md-row" x-data="{ isEditing: false, title: '{{ $issue->title }}' }">
                            <div
                                class="gh-header-actions mt-0 mt-md-2 mb-3 mb-md-0 ml-0 flex-md-order-1 flex-shrink-0 d-flex flex-items-start">
                                <button role="button"
                                    type="button"
                                    x-show="!isEditing"
                                    @click="isEditing = true; $nextTick(() => $refs.title.focus());"
                                    class="btn btn-sm float-none m-0 mr-md-0"
                                    aria-label="Edit Issue">Edit</button>

                                <a href="{{ route('projects.issues.create', $project) }}"
                                    x-show="!isEditing"
                                    class="btn btn-sm btn-primary m-0 ml-2 ml-md-2">
                                    New issue
                                </a>

                                <button role="button"
                                        type="submit"
                                        x-show="isEditing"
                                        @click="isEditing = true; $nextTick(() => $refs.title.focus());"
                                        class="btn btn-sm float-none m-0 mr-md-0"
                                        aria-label="Edit Issue">Save</button>

                                <a @click="isEditing = false"
                                    x-show="isEditing"
                                    class="btn-link text-small m-0 ml-2 ml-md-2 mt-1">
                                    Cancel
                                </a>
                            </div>

                            <h1 class="gh-header-title mb-2 f1 mr-2 flex-auto break-word">
                                <div x-show="!isEditing">
                                    <span class="markdown-title" x-text="title"></span>
                                    <span class="f1-light color-text-tertiary">#{{ $issue->id }}</span>
                                </div>
                                <input x-show="isEditing" name="title" id="title" x-ref="title" type="text" x-model="title" class="form-control input-contrast width-full" x-cloak>
                            </h1>
                        </div>
                    </form>
                </div>

                <div class="d-flex flex-items-center flex-wrap mt-0 gh-header-meta">
                    <div class="flex-shrink-0 mb-2 flex-self-start flex-md-self-center">
                        @if($issue->status == 'open')
                        <span title="Status: Open" class="State State--open">
                            <svg height="16" class="octicon octicon-issue-opened" viewBox="0 0 16 16"
                                 version="1.1" width="16" aria-hidden="true">
                                <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                <path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                            </svg> Open
                        </span>
                        @endif
                        @if($issue->status == 'closed')
                            <span title="Status: Closed" class="State State--closed">
                                <svg height="16" class="octicon octicon-issue-closed" viewBox="0 0 16 16" version="1.1" width="16" aria-hidden="true"><path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path></svg> Closed
                            </span>
                        @endif
                    </div>

                    <div class="mb-2 flex-shrink-0">
                        <div>

                        </div>
                    </div>

                    <div class="flex-shrink-0 mb-2 flex-self-start flex-md-self-center">

                    </div>

                    <div class="flex-auto min-width-0 mb-2 ml-2">
                        <span class="author text-bold Link--secondary">{{ $issue->creator->username }}</span> opened this issue
                        <span>
                            {{ $issue->created_at ? $issue->created_at->diffForHumans(null, null, true) : '' }}
                        </span>
                        · {{ $issue->issue_comments->count() }} comments
                    </div>
                </div>
            </div>

            <h2 class="sr-only">Comments</h2>

            <div>
                <!-- Comments begin here -->
                <div class="ml-6 pl-3">
                    <!-- Actual body of the Issue -->
                    <div class="TimelineItem" id="issue-{{$issue->id}}">
                        <div class="TimelineItem-avatar">
                            <img class="avatar" height="40" width="40" alt="{{ '@' . $issue->creator->username ?? '' }}"
                                 src="{{ $issue->creator->user_avatar() }}" />
                        </div>

                        <div class="TimelineItem-badge">
                            <!-- octicon("flame") -->
                            <svg class="octicon octicon-flame" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M5.05.31c.81 2.17.41 3.38-.52 4.31C3.55 5.67 1.98 6.45.9 7.98c-1.45 2.05-1.7 6.53 3.53 7.7-2.2-1.16-2.67-4.52-.3-6.61-.61 2.03.53 3.33 1.94 2.86 1.39-.47 2.3.53 2.27 1.67-.02.78-.31 1.44-1.13 1.81 3.42-.59 4.78-3.42 4.78-5.56 0-2.84-2.53-3.22-1.25-5.61-1.52.13-2.03 1.13-1.89 2.75.09 1.08-1.02 1.8-1.86 1.33-.67-.41-.66-1.19-.06-1.78C8.18 5.31 8.68 2.45 5.05.32L5.03.3l.02.01z"></path></svg>
                        </div>

                        <div class="TimelineItem-body my-0" x-data="{ isEditing: false, description: `{{ $issue->description }}` }">
                            <div class="Box Box--blue" x-show="!isEditing">
                                <div class="Box-header Box-header--blue clearfix p-2 d-block d-flex">
                                    <h3 class="f5 text-normal flex-auto">
                                        <span class="d-inline-block d-md-none">
                                            <img class="avatar rounded-1 avatar-user" height="20" width="20" alt="{{ '@' . $issue->creator->username ?? '' }}" src="{{ $issue->creator->avatar ?? '' }}">
                                        </span>
                                        <strong class="css-truncate">
                                            <a class="author Link--primary css-truncate-target width-fit" href="{{ route('users.show', $issue->creator) }}">{{ $issue->creator->username ?? '' }}</a>
                                        </strong>
                                        commented
                                        <span class="Link--secondary">
                                            {{ $issue->created_at ? $issue->created_at->diffForHumans(null, null, true) : '' }}
                                        </span>
                                    </h3>
                                    <details class="details-overlay details-reset position-relative float-right">
                                        <summary class="btn-link timeline-comment-action Link--secondary" aria-haspopup="menu" role="button">
                                            <svg aria-label="Show options" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-kebab-horizontal">
                                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                            </svg>
                                        </summary>
                                        <div class="dropdown-menu dropdown-menu-sw show-more-popover color-text-primary anim-scale-in" style="width:185px" role="menu">
                                            <clipboard-copy class="dropdown-item btn-link" for="issue-930687142-permalink" role="menuitem" tabindex="0">
                                                Copy link
                                            </clipboard-copy>
                                            <button @click="isEditing = true" type="button" class="dropdown-item btn-link " role="menuitem" aria-label="Edit comment">
                                                Edit
                                            </button>
                                        </div>
                                    </details>
                                </div>
                                <div class="Box-body p-2">
                                    @markdown($issue->description ?? '_No description provided_')
                                </div>
                            </div>
                            <div class="Box p-2" x-show="isEditing" x-cloak>
                                <form action="{{ route('projects.issues.update', ['project' => $project, 'issue' => $issue]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <x-md-textarea id="description" name="description" value="{{ $issue->description }}"></x-md-textarea>
                                    <div class="d-flex flex-row-reverse mt-2">
                                        <button type="submit" class="btn btn-primary">Update comment</button>
                                        <button type="button" class="btn btn-danger mr-1" @click="isEditing = false">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- TODO: Loop issue comments here -->
                    @foreach($issue->issue_comments as $comment)
                        <div class="TimelineItem" id="comment-{{ $comment->id }}">
                            <div class="TimelineItem-avatar">
                                <img class="avatar" height="40" width="40" alt="{{ '@' . $comment->creator->username ?? '' }}"
                                     src="{{ $comment->creator->user_avatar() ?? '' }}" />
                            </div>

                            <div class="TimelineItem-badge">
                                <!-- octicon("flame") -->
                                <svg class="octicon octicon-flame" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M5.05.31c.81 2.17.41 3.38-.52 4.31C3.55 5.67 1.98 6.45.9 7.98c-1.45 2.05-1.7 6.53 3.53 7.7-2.2-1.16-2.67-4.52-.3-6.61-.61 2.03.53 3.33 1.94 2.86 1.39-.47 2.3.53 2.27 1.67-.02.78-.31 1.44-1.13 1.81 3.42-.59 4.78-3.42 4.78-5.56 0-2.84-2.53-3.22-1.25-5.61-1.52.13-2.03 1.13-1.89 2.75.09 1.08-1.02 1.8-1.86 1.33-.67-.41-.66-1.19-.06-1.78C8.18 5.31 8.68 2.45 5.05.32L5.03.3l.02.01z"></path></svg>
                            </div>

                            <div class="TimelineItem-body my-0">
                                <div class="Box Box--blue">
                                    <div class="Box-header Box-header--blue clearfix p-2 d-block d-flex">
                                        <h3 class="f5 text-normal flex-auto">
                                            <span class="d-inline-block d-md-none">
                                                <img class="avatar rounded-1 avatar-user" height="20" width="20" alt="{{ '@' . $comment->creator->username ?? '' }}" src="{{ $issue->creator->avatar ?? '' }}">
                                            </span>
                                            <strong class="css-truncate">
                                                <a class="author Link--primary css-truncate-target width-fit" href="{{ route('users.show', $comment->creator) }}">{{ $comment->creator->username ?? '' }}</a>
                                            </strong>
                                            commented
                                            <span class="Link--secondary">
                                            {{ $comment->created_at ? $comment->created_at->diffForHumans(null, null, true) : '' }}
                                        </span>
                                        </h3>
                                        <details class="details-overlay details-reset position-relative d-inline-block float-right">
                                            <summary class="btn-link timeline-comment-action Link--secondary" aria-haspopup="menu" role="button">
                                                <svg aria-label="Show options" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-kebab-horizontal">
                                                    <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                                </svg>
                                            </summary>
                                            <div class="dropdown-menu dropdown-menu-sw color-text-primary anim-scale-in" style="width:185px" role="menu">
                                                <clipboard-copy class="dropdown-item btn-link" role="menuitem" value="{{ route('projects.issues.show', ['project' => $project, 'issue' => $issue]) . '#comment-' . $comment->id }}" data-dismiss="menu">
                                                    Copy Link
                                                </clipboard-copy>
                                                <button type="button" class="dropdown-item btn-link " role="menuitem" aria-label="Edit comment">
                                                    Edit
                                                </button>
                                                <div class="dropdown-divider"></div>

                                                <form action="{{ route('issues.issue_comments.destroy', ['issue' => $issue, 'issue_comment' => $comment]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item btn-link">
                                                        <span class="color-text-danger">
                                                            Delete
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </details>
                                    </div>
                                    <div class="Box-body p-2">
                                        @markdown($comment->comment)
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($comment->action)
                            <div class="TimelineItem">
                                <div class="TimelineItem-avatar"></div>
                                @if($comment->action == 'reopen')
                                <div class="TimelineItem-badge color-text-white color-bg-success-inverse">
                                    <svg class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                                </div>
                                @endif
                                @if($comment->action == 'close')
                                <div class="TimelineItem-badge color-text-white color-bg-danger-inverse">
                                    <svg class="octicon octicon-issue-closed" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path></svg>
                                </div>
                                @endif
                                <div class="TimelineItem-body">
                                    <span class="d-inline-block">

                                    </span>
                                    <span class="d-inline-block">
                                        <img class="avatar avatar-user" height="20" width="20" alt="{{ '@' . $comment->creator->username }}" src="{{ $comment->creator->user_avatar() }}">
                                    </span>
                                    {{ $comment->creator->username }} <strong>{{ ($comment->action == 'reopen' ? 'reopened' : 'closed' ) }}</strong> this on {{ $comment->created_at->format('M d, Y') }}.
                                </div>
                            </div>

                        @endif
                    @endforeach

                    <div class="TimelineItem-break"></div>

                    <!-- Add Comment -->
                    <div class="TimelineItem">
                        <div class="TimelineItem-avatar">
                            <img class="avatar" height="40" width="40" alt="{{ '@' . auth()->user()->username }}"
                                 src="{{ auth()->user()->user_avatar() }}" />
                        </div>

                        <div class="TimelineItem-badge">
                            <!-- octicon("comment") -->
                            <svg class="octicon octicon-comment"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.75 2.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 01.75.75v2.19l2.72-2.72a.75.75 0 01.53-.22h4.5a.25.25 0 00.25-.25v-7.5a.25.25 0 00-.25-.25H2.75zM1 2.75C1 1.784 1.784 1 2.75 1h10.5c.966 0 1.75.784 1.75 1.75v7.5A1.75 1.75 0 0113.25 12H9.06l-2.573 2.573A1.457 1.457 0 014 13.543V12H2.75A1.75 1.75 0 011 10.25v-7.5z"></path></svg>
                        </div>

                        <div class="TimelineItem-body mt-0">
                            <div class="Box">
                                <form action="{{ route('issues.issue_comments.store', $issue) }}" method="POST">
                                    @csrf
                                    <div class="p-2">
                                        <x-md-textarea id="comment" name="comment" placeholder="Leave a comment"></x-md-textarea>
                                    </div>

                                    <div class="d-flex flex-justify-end mt-2 p-2">
                                        @if($issue->status == 'closed')
                                        <div class="color-bg-secondary">
                                            <button type="submit" name="comment_and_reopen" value="1" class="btn" formnovalidate="">
                                                <span class="js-form-action-text" data-default-action-text="Reopen issue">Reopen issue</span>
                                            </button>
                                        </div>
                                        @endif

                                        @if(in_array($issue->status, ['','open']))
                                        <div class="color-bg-secondary">
                                            <button type="submit" name="comment_and_close" value="1" class="btn js-comment-and-button js-quick-submit-alternative" data-comment-text="Close with comment" data-disable-with="" formnovalidate="">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-issue-closed color-text-danger">
                                                    <path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path>
                                                </svg>
                                                <span class="js-form-action-text" data-default-action-text="Close issue">Close issue</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="color-bg-secondary ml-1">
                                            <button type="submit" class="btn-primary btn">
                                                Comment
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--// Add comment -->
                </div>

                <!--// Comments end here -->
            </div>
        </div>
    </div>

    <div class="mt-5"></div>
@stop
