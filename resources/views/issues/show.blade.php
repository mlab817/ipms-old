@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        @if(session()->has('errors'))
            <div class="flash my-3 flash-error" id="error">
                {{ $errors->first('comment') }}
                <button class="flash-close js-flash-close" type="button" aria-label="Close" onclick="hideMessage()">
                    <!-- <%= octicon "x" %> -->
                    <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path></svg>
                </button>
            </div>
        @endif

        <div id="repo-content-pjax-container" class="repository-content ">

            <div class="js-check-all-container">

                <div id="show_issue" class="js-issues-results js-socket-channel js-updatable-content">

                    <div id="partial-discussion-header" class="gh-header border-bottom pb-3 mb-3 js-details-container Details js-socket-channel js-updatable-content issue">
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

                                    <h1 class="gh-header-title mb-2 lh-condensed f1 mr-2 flex-auto break-word">
                                        <div x-show="!isEditing">
                                            <span class="markdown-title" x-text="title"></span>
                                            <span class="f1-light color-text-tertiary">#{{ $issue->id }}</span>
                                        </div>
                                        <input x-show="isEditing" name="title" id="title" x-ref="title" type="text" x-model="title" class="form-control input-contrast input-sm width-full" x-cloak>
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
                            <div class="TimelineItem">
                                <div class="TimelineItem-avatar">
                                    <img class="avatar" height="40" width="40" alt="{{ '@' . $issue->creator->username ?? '' }}"
                                         src="{{ $issue->creator->avatar }}" />
                                </div>
                                <div class="TimelineItem-body my-0" x-data="{ isEditing: false, description: '{{ $issue->description }}' }">
                                    <div class="Box Box--blue" x-show="!isEditing">
                                        <div class="Box-header Box-header--blue clearfix p-2 d-block d-flex">
                                            <h3 class="f5 text-normal flex-auto">
                                                <span class="d-inline-block d-md-none">
                                                    <img class="avatar rounded-1 avatar-user" height="20" width="20" alt="{{ '@' . $issue->creator->username ?? '' }}" src="{{ $issue->creator->avatar ?? '' }}">
                                                </span>
                                                <strong class="css-truncate">
                                                    <a class="author Link--primary css-truncate-target width-fit" href="{{ '@' . $issue->creator->username ?? '' }}">{{ $issue->creator->username ?? '' }}</a>
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
                                                <div class="dropdown-menu dropdown-menu-sw show-more-popover color-text-primary anim-scale-in" style="width:185px" src="/mlab817/ipms-v2/issues/24/actions_menu?href=%23issue-930687142&amp;gid=MDU6SXNzdWU5MzA2ODcxNDI%3D" preload="" role="menu">
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
                                    <div class="Box Box--blue" x-show="isEditing" x-cloak>
                                        <form action="{{ route('projects.issues.update', ['project' => $project, 'issue' => $issue]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="Box-header Box-header--blue clearfix p-2 d-block d-flex">
                                                <markdown-toolbar for="description" class="p-1">
                                                    <span class="tooltipped tooltipped-s tooltipped-align-right-1 mx-1" aria-label="Bold">
                                                        <md-bold class="btn-link">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M4 2a1 1 0 00-1 1v10a1 1 0 001 1h5.5a3.5 3.5 0 001.852-6.47A3.5 3.5 0 008.5 2H4zm4.5 5a1.5 1.5 0 100-3H5v3h3.5zM5 9v3h4.5a1.5 1.5 0 000-3H5z"/>
                                                            </svg>
                                                        </md-bold>
                                                    </span>
                                                    <span class="tooltipped tooltipped-s tooltipped-align-right-1 mx-1" aria-label="Heading">
                                                        <md-header class="btn-link">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3.75 2a.75.75 0 01.75.75V7h7V2.75a.75.75 0 011.5 0v10.5a.75.75 0 01-1.5 0V8.5h-7v4.75a.75.75 0 01-1.5 0V2.75A.75.75 0 013.75 2z"/></svg>
                                                        </md-header>
                                                    </span>
                                                    <span class="tooltipped tooltipped-s tooltipped-align-right-1 mx-1" aria-label="Italic">
                                                        <md-italic class="btn-link">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6 2.75A.75.75 0 016.75 2h6.5a.75.75 0 010 1.5h-2.505l-3.858 9H9.25a.75.75 0 010 1.5h-6.5a.75.75 0 010-1.5h2.505l3.858-9H6.75A.75.75 0 016 2.75z"/></svg>
                                                        </md-italic>
                                                    </span>
                                                    <div class="position-relative d-inline-block color-text-secondary border-right">&nbsp;</div>
                                                    <span class="tooltipped tooltipped-s tooltipped-align-right-1 mx-1" aria-label="Unordered List">
                                                        <md-unordered-list class="btn-link">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"/></svg>
                                                        </md-unordered-list>
                                                    </span>
                                                    <span class="tooltipped tooltipped-s tooltipped-align-right-1 mx-1" aria-label="Ordered List">
                                                        <md-ordered-list class="btn-link">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.003 2.5a.5.5 0 00-.723-.447l-1.003.5a.5.5 0 00.446.895l.28-.14V6H.5a.5.5 0 000 1h2.006a.5.5 0 100-1h-.503V2.5zM5 3.25a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 3.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 8.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5a.75.75 0 01-.75-.75zM.924 10.32l.003-.004a.851.851 0 01.144-.153A.66.66 0 011.5 10c.195 0 .306.068.374.146a.57.57 0 01.128.376c0 .453-.269.682-.8 1.078l-.035.025C.692 11.98 0 12.495 0 13.5a.5.5 0 00.5.5h2.003a.5.5 0 000-1H1.146c.132-.197.351-.372.654-.597l.047-.035c.47-.35 1.156-.858 1.156-1.845 0-.365-.118-.744-.377-1.038-.268-.303-.658-.484-1.126-.484-.48 0-.84.202-1.068.392a1.858 1.858 0 00-.348.384l-.007.011-.002.004-.001.002-.001.001a.5.5 0 00.851.525zM.5 10.055l-.427-.26.427.26z"/></svg>
                                                        </md-ordered-list>
                                                    </span>
                                                    <span class="tooltipped tooltipped-s tooltipped-align-right-1 mx-1" aria-label="Task List">
                                                        <md-task-list class="btn-link">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"/></svg>
                                                        </md-task-list>
                                                    </span>
                                                </markdown-toolbar>
                                            </div>
                                            <div class="Box-body p-2 d-flex flex-column">
                                                <div class="d-flex">
                                                    <textarea x-model="description" id="description" name="description" class="width-full form-control input-contrast"></textarea>
                                                </div>
                                                <div class="d-flex flex-row-reverse mt-2">
                                                    <button type="submit" class="btn btn-primary">Update comment</button>
                                                    <button type="button" class="btn btn-danger mr-1" @click="isEditing = false">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- TODO: Loop issue comments here -->
                            @foreach($issue->issue_comments as $comment)
                                <div class="TimelineItem">
                                    <div class="TimelineItem-avatar">
                                        <img class="avatar" height="40" width="40" alt="{{ '@' . $comment->creator->username ?? '' }}"
                                             src="{{ $comment->creator->avatar ?? '' }}" />
                                    </div>
                                    <div class="TimelineItem-body my-0">
                                        <div class="Box Box--blue">
                                            <div class="Box-header Box-header--blue clearfix p-2 d-block d-flex">
                                                <h3 class="f5 text-normal flex-auto">
                                                    <span class="d-inline-block d-md-none">
                                                        <img class="avatar rounded-1 avatar-user" height="20" width="20" alt="{{ '@' . $comment->creator->username ?? '' }}" src="{{ $issue->creator->avatar ?? '' }}">
                                                    </span>
                                                    <strong class="css-truncate">
                                                        <a class="author Link--primary css-truncate-target width-fit" href="{{ '@' . $comment->creator->username ?? '' }}">{{ $comment->creator->username ?? '' }}</a>
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
                                                    <div class="dropdown-menu dropdown-menu-sw show-more-popover color-text-primary anim-scale-in" style="width:185px" src="/mlab817/ipms-v2/issues/24/actions_menu?href=%23issue-930687142&amp;gid=MDU6SXNzdWU5MzA2ODcxNDI%3D" preload="" role="menu">
                                                        <clipboard-copy class="dropdown-item btn-link" role="menuitem" tabindex="0">
                                                            Copy link
                                                        </clipboard-copy>
                                                        <button type="button" class="dropdown-item btn-link " role="menuitem" aria-label="Edit comment">
                                                            Edit
                                                        </button>
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
                                                <img class="avatar avatar-user" height="20" width="20" alt="{{ '@' . $comment->creator->username }}" src="{{ $comment->creator->avatar }}">
                                            </span>
                                            {{ $comment->creator->username }} <strong>{{ ($comment->action == 'reopen' ? 'reopened' : 'closed' ) }}</strong> this on {{ $comment->created_at->format('M d, Y') }}.
                                        </div>
                                    </div>

                                    <div class="TimelineItem-break"></div>
                                @endif
                            @endforeach

                            <!-- Add Comment -->
                            <div class="TimelineItem">
                                <div class="TimelineItem-avatar">
                                    <img class="avatar" height="40" width="40" alt="{{ '@' . auth()->user()->username }}"
                                         src="{{ auth()->user()->avatar }}" />
                                </div>
                                <div class="TimelineItem-body mt-0">
                                    <form action="{{ route('issues.issue_comments.store', $issue) }}" method="POST">
                                        @csrf
                                        <textarea id="comment" name="comment" class="form-control" placeholder="Add comment"></textarea>
                                        <div class="d-flex flex-justify-end">
                                            @if($issue->status == 'closed')
                                            <div class="color-bg-secondary">
                                                <button type="submit" name="comment_and_reopen" value="1" class="btn js-comment-and-button js-quick-submit-alternative" data-comment-text="Reopen and comment" data-disable-with="" formnovalidate="">
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

                            <!--// Add comment -->
                        </div>

                        <!--// Comments end here -->
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop

@push('scripts')
    @include('scripts.easymde')

    <script>
        const MDE = new EasyMDE({
            element: document.getElementById('comment'),
            maxHeight: '120px'
        });

        // hide error alert
        function hideMessage() {
            const el = document.getElementById('error')
            el.style.display = "none";
        }
    </script>
@endpush
