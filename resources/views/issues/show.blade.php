@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        <div id="repo-content-pjax-container" class="repository-content ">



            <div class="js-check-all-container" data-pjax="">


                <div id="show_issue" class="js-issues-results js-socket-channel js-updatable-content" data-channel="eyJjIjoiaXNzdWU6OTMwODQ0MjE0OnRpbWVsaW5lIiwidCI6MTYyNDc5MDc4OX0=--921fc99b6e562621cf29312627b3ba14a4b53c3419c0709e46c2134f1cb26a1d">

                    <div id="partial-discussion-header" class="gh-header mb-3 js-details-container Details js-socket-channel js-updatable-content issue" data-channel="eyJjIjoiaXNzdWU6OTMwODQ0MjE0IiwidCI6MTYyNDc5MDc4OX0=--209748630f1fc0b5e474ce21385901b22fc8d80bf61ff18122380719487a3a65" data-url="/mlab817/pips/issues/7/show_partial?partial=issues%2Ftitle&amp;sticky=true" data-gid="MDU6SXNzdWU5MzA4NDQyMTQ=">
                        <div class="gh-header-show ">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="gh-header-actions mt-0 mt-md-2 mb-3 mb-md-0 ml-0 flex-md-order-1 flex-shrink-0 d-flex flex-items-start">
                                    <a href="{{ route('issues.edit', $issue) }}" role="button" class="btn btn-sm js-details-target d-inline-block float-none m-0 mr-md-0" aria-label="Edit Issue">Edit</a>

                                    <a href="{{ route('projects.issues.create', $project) }}" class="btn btn-sm btn-primary m-0 ml-2 ml-md-2" data-hotkey="c" data-ga-click="Issues, create new issue, view:issue_show location:issue_header style:button logged_in:true" data-skip-pjax="">
                                        New issue
                                    </a>
                                </div>

                                <h1 class="gh-header-title mb-2 lh-condensed f1 mr-0 flex-auto break-word">
                                    <span class="js-issue-title markdown-title" data-snek-id="issue-title">
                                        {{ $issue->title }}
                                    </span>
                                    <span class="f1-light color-text-tertiary">#{{ $issue->id }}</span>
                                </h1>
                            </div>
                        </div>

                        <div class="d-flex flex-items-center flex-wrap mt-0 gh-header-meta">
                            <div class="flex-shrink-0 mb-2 flex-self-start flex-md-self-center">
                                <span title="Status: Open" class="State State--open">
                                    <svg height="16" class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1" width="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg> Open
                                </span>
                            </div>

                            <div class="mb-2 flex-shrink-0">
                                <div>

                                </div>

                            </div>

                            <div class="flex-shrink-0 mb-2 flex-self-start flex-md-self-center">

                            </div>

                            <div class="flex-auto min-width-0 mb-2 ml-2">
                                <span class="author text-bold Link--secondary">mlab817</span>  opened this issue
                                <relative-time datetime="2021-06-27T04:10:36Z" class="no-wrap" title="Jun 27, 2021, 12:10 PM GMT+8">
                                    {{ $issue->created_at->diffForHumans(null, null, true) }}
                                </relative-time>
                                · 0 comments

                            </div>
                        </div>

                    </div>

                    <h2 class="sr-only">Comments</h2>
                    <div id="discussion_bucket">
                        <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                            <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">            <div class="js-quote-selection-container" data-quote-markdown=".js-comment-body" data-discussion-hovercards-enabled="" data-issue-and-pr-hovercards-enabled="" data-team-hovercards-enabled="">

                                    <div class="js-discussion js-socket-channel ml-0 pl-0 ml-md-6 pl-md-3" data-channel="eyJjIjoibWFya2VkLWFzLXJlYWQ6Mjk2MjU4NDQiLCJ0IjoxNjI0NzkwNzg5fQ==--064d5539973390f876d7a8e3d16f7fcf43255cb35c341e82729fe9814a28cca7" data-channel-target="MDU6SXNzdWU5MzA4NDQyMTQ=">

                                        <div class="TimelineItem pt-0 js-comment-container js-socket-channel js-updatable-content" data-gid="MDU6SXNzdWU5MzA4NDQyMTQ=" data-url="/_render_node/MDU6SXNzdWU5MzA4NDQyMTQ=/issues/body?variables%5BdeferredCommentActions%5D=true" data-channel="eyJjIjoiaXNzdWU6OTMwODQ0MjE0IiwidCI6MTYyNDc5MDc4OX0=--209748630f1fc0b5e474ce21385901b22fc8d80bf61ff18122380719487a3a65">


                                            <div class="avatar-parent-child TimelineItem-avatar d-none d-md-block">
                                                <a class="d-inline-block" data-hovercard-type="user" data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/mlab817"><img class="avatar rounded-1 avatar-user" height="40" width="40" alt="@mlab817" src="https://avatars.githubusercontent.com/u/29625844?s=88&amp;u=d91e78d8a141a611c4a71d49987e46541f951b00&amp;v=4"></a>

                                            </div>

                                            <div class="js-convert-task-to-issue-enabled convert-to-issue-enabled timeline-comment-group js-minimizable-comment-group js-targetable-element TimelineItem-body my-0 " id="issue-930844214">
                                                <div class="js-convert-task-to-issue-spinner loading-spinner ml-1 d-inline-block" hidden="">
                                                    <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="16" height="16" class="v-align-text-bottom anim-rotate">
                                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                    </svg>
                                                </div>
                                                <!-- '"` --><!-- </textarea></xmp> --><form class="js-inline-convert-to-issue-form" action="/mlab817/pips/issues" accept-charset="UTF-8" data-remote="true" method="post"><input type="hidden" name="authenticity_token" value="BBQECqFpBYNh5kazgudr7BRESlIQDf03Hlz1zbzV/rt/t7RRSMuiVo9JLwlZ0IVKkLJ4ExQ1Y8msI0X+7IHQjw==">
                                                    <input hidden="" id="js-inline-convert-to-issue-title" name="issue[title]" value="">
                                                    <input hidden="" name="convert_from_task" value="true">
                                                    <input hidden="" name="id" value="7">
                                                    <input id="js-inline-convert-to-issue-position" type="hidden" name="position" value="">
                                                </form>    <button class="js-convert-to-issue-button convert-to-issue-button btn-link show-on-focus d-block position-absolute tooltipped tooltipped-n tooltipped-no-delay" aria-label="Convert to issue" type="button" hidden="">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-issue-opened open">
                                                        <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                                    </svg>
                                                </button>
                                                <div class="js-convert-task-to-issue-data" data-tooltip-label-inline="Convert to issue" data-tooltip-label-open="Open convert to issue" data-tooltip-label-open-same-tab="Open convert to issue in current tab" data-url="/mlab817/pips/issues/new" data-parent-issue-number="7" hidden=""></div>
                                                <div class="ml-n3 timeline-comment unminimized-comment comment previewable-edit js-task-list-container editable-comment js-comment timeline-comment--caret reorderable-task-lists current-user" data-body-version="e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855" data-unfurl-hide-url="/content_reference_attachments/hide">
                                                    <input type="hidden" value="lfEpUj48IQOjeOJyPx1AN1ADL8fgjdfQI//J2s3p84a4ZsPhWz/NTD3zLCzAgLtttV0+eFXAr7gz80T7kqJ+EA==" data-csrf="true" class="js-data-unfurl-hide-url-csrf">


                                                    <div class="timeline-comment-header clearfix d-block d-sm-flex">
                                                        <div class="timeline-comment-actions flex-shrink-0">




                                                            <details class="details-overlay details-reset position-relative js-reaction-popover-container js-comment-header-reaction-button d-none d-md-inline-block">
                                                                <summary class="btn-link Link--secondary timeline-comment-action" aria-label="Add your reaction" aria-haspopup="menu" role="button">
                                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-smiley">
                                                                        <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path>
                                                                    </svg>
                                                                </summary>

                                                                <details-menu class="js-add-reaction-popover anim-scale-in dropdown-menu dropdown-menu-sw mr-n1 mt-n1" aria-label="Pick your reaction" style="width: 150px" role="menu">
                                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="js-pick-reaction" action="/mlab817/pips/reactions" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="N+vpaYtPNAe61iGUAsSx3lIkif18zUMkYtCGLOihutRGnuk0Pn1xrS1FrOithAJ995vGP53BudwuaiNPqFX2Zw==">
                                                                        <p class="color-text-secondary mx-2 my-1">
                                                                            <span class="js-reaction-description">Pick your reaction</span>
                                                                        </p>

                                                                        <div role="none" class="dropdown-divider"></div>

                                                                        <div class="clearfix d-flex flex-wrap m-1 ml-2 mt-0">
                                                                            <input type="hidden" name="input[subjectId]" value="MDU6SXNzdWU5MzA4NDQyMTQ=">

                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="+1" name="input[content]" aria-label="React with thumbs up emoji" value="THUMBS_UP react">
                                                                                <g-emoji alias="+1" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44d.png" class="emoji"><img class="emoji" alt="+1" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f44d.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="-1" name="input[content]" aria-label="React with thumbs down emoji" value="THUMBS_DOWN react">
                                                                                <g-emoji alias="-1" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44e.png" class="emoji"><img class="emoji" alt="-1" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f44e.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Laugh" name="input[content]" aria-label="React with laugh emoji" value="LAUGH react">
                                                                                <g-emoji alias="smile" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f604.png" class="emoji"><img class="emoji" alt="smile" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f604.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Hooray" name="input[content]" aria-label="React with hooray emoji" value="HOORAY react">
                                                                                <g-emoji alias="tada" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f389.png" class="emoji"><img class="emoji" alt="tada" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f389.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Confused" name="input[content]" aria-label="React with confused emoji" value="CONFUSED react">
                                                                                <g-emoji alias="thinking_face" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f615.png" class="emoji"><img class="emoji" alt="thinking_face" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f615.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Heart" name="input[content]" aria-label="React with heart emoji" value="HEART react">
                                                                                <g-emoji alias="heart" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png" class="emoji"><img class="emoji" alt="heart" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Rocket" name="input[content]" aria-label="React with rocket emoji" value="ROCKET react">
                                                                                <g-emoji alias="rocket" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f680.png" class="emoji"><img class="emoji" alt="rocket" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f680.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Eyes" name="input[content]" aria-label="React with eyes emoji" value="EYES react">
                                                                                <g-emoji alias="eyes" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f440.png" class="emoji"><img class="emoji" alt="eyes" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f440.png"></g-emoji>
                                                                            </button>
                                                                        </div>
                                                                    </form></details-menu>

                                                            </details>


                                                            <details class="details-overlay details-reset position-relative d-inline-block">
                                                                <summary class="btn-link timeline-comment-action Link--secondary" aria-haspopup="menu" role="button">
                                                                    <svg aria-label="Show options" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-kebab-horizontal">
                                                                        <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                                                    </svg>
                                                                </summary>
                                                                <details-menu class="dropdown-menu dropdown-menu-sw show-more-popover color-text-primary anim-scale-in" style="width:185px" src="/mlab817/pips/issues/7/actions_menu?href=%23issue-930844214&amp;gid=MDU6SXNzdWU5MzA4NDQyMTQ%3D" preload="" role="menu">
                                                                    <include-fragment>
                                                                        <p class="text-center mt-3" data-hide-on-error="">
                                                                            <svg aria-label="Loading..." style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="anim-rotate">
                                                                                <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                                            </svg>
                                                                        </p>
                                                                        <p class="ml-1 mb-2 mt-2" data-show-on-error="" hidden="">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-alert">
                                                                                <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                                                            </svg>
                                                                            Sorry, something went wrong.
                                                                        </p>
                                                                    </include-fragment>
                                                                </details-menu>
                                                            </details>


                                                        </div>

                                                        <div class="d-none d-sm-flex flex-items-center">







    <span class="timeline-comment-label text-bold tooltipped tooltipped-multiline tooltipped-s" aria-label="You are the owner of the pips repository.">
      Owner
    </span>




                                                        </div>

                                                        <h3 class="timeline-comment-header-text f5 text-normal">


                                                            <a class="d-inline-block d-md-none" data-hovercard-type="user" data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/mlab817"><img class="avatar rounded-1 avatar-user" height="20" width="20" alt="@mlab817" src="https://avatars.githubusercontent.com/u/29625844?s=60&amp;u=d91e78d8a141a611c4a71d49987e46541f951b00&amp;v=4"></a>

                                                            <strong class="css-truncate">


                                                                <a class="author Link--primary css-truncate-target width-fit" show_full_name="false" data-hovercard-type="user" data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/mlab817">mlab817</a>


                                                            </strong>


                                                            commented


                                                            <a href="#issue-930844214" id="issue-930844214-permalink" class="Link--secondary js-timestamp"><relative-time datetime="2021-06-27T04:10:36Z" class="no-wrap" title="Jun 27, 2021, 12:10 PM GMT+8">7 hours ago</relative-time></a>


                                                            <span class="js-comment-edit-history">
    </span>
                                                        </h3>
                                                    </div>


                                                    <div class="edit-comment-hide">


                                                        <task-lists sortable="">
                                                            <table class="d-block" data-paste-markdown-skip="">
                                                                <tbody class="d-block">
                                                                <tr class="d-block">
                                                                    <td class="d-block comment-body markdown-body  js-comment-body">
                                                                        <p class="color-text-secondary">
                                                                            <em>No description provided.</em>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr class="d-block pl-3 pr-3 pb-3 js-comment-body-error" hidden="">
                                                                    <td class="d-block">
                                                                        <div class="flash flash-warn" role="alert">
                                                                            <p class="mb-1">
                                                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-info">
                                                                                    <path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                                                </svg>
                                                                                The text was updated successfully, but these errors were encountered:
                                                                            </p>
                                                                            <ol class="mb-0 pl-4 ml-4">
                                                                            </ol>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </task-lists>




                                                        <div class="comment-reactions flex-items-center border-top  js-reactions-container">

                                                            <details class="details-overlay details-reset dropdown hx_dropdown-fullscreen position-relative float-left d-inline-block reaction-popover-container reactions-menu js-reaction-popover-container">
                                                                <summary class="btn-link reaction-summary-item add-reaction-btn" aria-label="Add your reaction" aria-haspopup="menu" role="button">
                                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-smiley">
                                                                        <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path>
                                                                    </svg>
                                                                </summary>

                                                                <details-menu class="js-add-reaction-popover anim-scale-in dropdown-menu dropdown-menu-ne ml-2 mb-0" aria-label="Pick your reaction" style="width: 150px" role="menu">
                                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="js-pick-reaction" action="/mlab817/pips/reactions" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="OIF034UFI5KjKBOQ/lA1GLZSxbK0ja2l2zcHYyhXmjhJ9HSCMDdmODS7nuxREIa7E+2KcFWBV12XjaIAaKPWiw==">
                                                                        <p class="color-text-secondary mx-2 my-1">
                                                                            <span class="js-reaction-description">Pick your reaction</span>
                                                                        </p>

                                                                        <div role="none" class="dropdown-divider"></div>

                                                                        <div class="clearfix d-flex flex-wrap m-1 ml-2 mt-0">
                                                                            <input type="hidden" name="input[subjectId]" value="MDU6SXNzdWU5MzA4NDQyMTQ=">

                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="+1" name="input[content]" aria-label="React with thumbs up emoji" value="THUMBS_UP react">
                                                                                <g-emoji alias="+1" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44d.png" class="emoji"><img class="emoji" alt="+1" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f44d.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="-1" name="input[content]" aria-label="React with thumbs down emoji" value="THUMBS_DOWN react">
                                                                                <g-emoji alias="-1" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44e.png" class="emoji"><img class="emoji" alt="-1" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f44e.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Laugh" name="input[content]" aria-label="React with laugh emoji" value="LAUGH react">
                                                                                <g-emoji alias="smile" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f604.png" class="emoji"><img class="emoji" alt="smile" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f604.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Hooray" name="input[content]" aria-label="React with hooray emoji" value="HOORAY react">
                                                                                <g-emoji alias="tada" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f389.png" class="emoji"><img class="emoji" alt="tada" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f389.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Confused" name="input[content]" aria-label="React with confused emoji" value="CONFUSED react">
                                                                                <g-emoji alias="thinking_face" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f615.png" class="emoji"><img class="emoji" alt="thinking_face" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f615.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Heart" name="input[content]" aria-label="React with heart emoji" value="HEART react">
                                                                                <g-emoji alias="heart" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png" class="emoji"><img class="emoji" alt="heart" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/2764.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Rocket" name="input[content]" aria-label="React with rocket emoji" value="ROCKET react">
                                                                                <g-emoji alias="rocket" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f680.png" class="emoji"><img class="emoji" alt="rocket" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f680.png"></g-emoji>
                                                                            </button>
                                                                            <button type="submit" role="menuitem" class="btn-link col-3 flex-content-center flex-items-center no-underline add-reactions-options-item js-reaction-option-item" data-reaction-label="Eyes" name="input[content]" aria-label="React with eyes emoji" value="EYES react">
                                                                                <g-emoji alias="eyes" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f440.png" class="emoji"><img class="emoji" alt="eyes" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f440.png"></g-emoji>
                                                                            </button>
                                                                        </div>
                                                                    </form></details-menu>

                                                            </details>

                                                        </div>

                                                    </div>

                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="js-comment-update" id="issue-930844214-edit-form" action="/mlab817/pips/issues/7" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="93d9BCa4IIKH+eUo0ncUg65jwN2nQZMkI35mEEYm8Ls5huTWAbmm7QWjnsC8qDwLXMjBsFYyBTraUDTZl10dDQ==">
                                                        <div class="js-previewable-comment-form previewable-comment-form write-selected" data-preview-url="/preview?issue=930844214&amp;markdown_unsupported=false&amp;repository=380256079">
                                                            <input type="hidden" value="duMJt/OT6RrBjNTiBrOqo3e6RVMNsuL2NAzN/89CAE+s0XoVRkGsVfwFLqdv077Tyl8VjJcCjiY/R5WuxrM7Nw==" data-csrf="true" class="js-data-preview-url-csrf">

                                                            <div class="comment-form-head tabnav d-flex flex-justify-between mb-2 tabnav--responsive px-0 px-lg-2 d-flex flex-column border-bottom-0 flex-items-stretch border-lg-bottom color-border-primary flex-lg-items-center flex-lg-row">
                                                                <nav class="tabnav-tabs mx-2 mx-lg-0 no-wrap d-flex flex-auto d-md-block" role="tablist">
                                                                    <button type="button" class="btn-link tabnav-tab write-tab js-write-tab selected  px-3 px-sm-6 px-md-3 flex-1 flex-md-auto" role="tab" aria-selected="true">Write</button>
                                                                    <button type="button" class="btn-link tabnav-tab preview-tab js-preview-tab flex-1 flex-md-auto" role="tab">Preview</button>
                                                                </nav>

                                                                <div class="border-top d-md-none"></div>
                                                                <markdown-toolbar role="toolbar" aria-label="Composition" for="issue-930844214-body" class="js-details-container Details toolbar-commenting no-wrap border-md-top border-lg-top-0 d-flex px-2 pt-2 pt-lg-0 flex-items-start flex-wrap" tabindex="0">
                                                                    <div class="d-block d-md-none flex-auto">
                                                                        <button data-md-button="" tabindex="-1" type="button" aria-label="Toggle text tools" aria-expanded="false" class="js-details-target btn-link toolbar-item no-underline py-2 mr-1">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-typography">
                                                                                <path fill-rule="evenodd" d="M6.21 8.5L4.574 3.594 2.857 8.5H6.21zm.5 1.5l.829 2.487a.75.75 0 001.423-.474L5.735 2.332a1.216 1.216 0 00-2.302-.018l-3.39 9.688a.75.75 0 001.415.496L2.332 10H6.71zm3.13-4.358C10.53 4.374 11.87 4 13 4c1.5 0 3 .939 3 2.601v5.649a.75.75 0 01-1.448.275C13.995 12.82 13.3 13 12.5 13c-.77 0-1.514-.231-2.078-.709-.577-.488-.922-1.199-.922-2.041 0-.694.265-1.411.887-1.944C11 7.78 11.88 7.5 13 7.5h1.5v-.899c0-.54-.5-1.101-1.5-1.101-.869 0-1.528.282-1.84.858a.75.75 0 11-1.32-.716zM14.5 9H13c-.881 0-1.375.22-1.637.444-.253.217-.363.5-.363.806 0 .408.155.697.39.896.249.21.63.354 1.11.354.732 0 1.26-.209 1.588-.449.35-.257.412-.495.412-.551V9z"></path>
                                                                            </svg>
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-chevron-up Details-content--shown">
                                                                                <path fill-rule="evenodd" d="M3.22 9.78a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L8 6.06 4.28 9.78a.75.75 0 01-1.06 0z"></path>
                                                                            </svg>
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-chevron-down Details-content--hidden">
                                                                                <path fill-rule="evenodd" d="M12.78 6.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.22 7.28a.75.75 0 011.06-1.06L8 9.94l3.72-3.72a.75.75 0 011.06 0z"></path>
                                                                            </svg>
                                                                        </button>
                                                                    </div>


                                                                    <div class="flex-nowrap d-none d-md-inline-block mr-3">
                                                                        <md-header tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add header text" data-ga-click="Markdown Toolbar, click, header" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-heading">
                                                                                <path fill-rule="evenodd" d="M3.75 2a.75.75 0 01.75.75V7h7V2.75a.75.75 0 011.5 0v10.5a.75.75 0 01-1.5 0V8.5h-7v4.75a.75.75 0 01-1.5 0V2.75A.75.75 0 013.75 2z"></path>
                                                                            </svg>
                                                                        </md-header>

                                                                        <md-bold tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1 js-modifier-label-key" aria-label="Add bold text <ctrl+b>" data-ga-click="Markdown Toolbar, click, bold" role="button" hotkey="b">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-bold">
                                                                                <path fill-rule="evenodd" d="M4 2a1 1 0 00-1 1v10a1 1 0 001 1h5.5a3.5 3.5 0 001.852-6.47A3.5 3.5 0 008.5 2H4zm4.5 5a1.5 1.5 0 100-3H5v3h3.5zM5 9v3h4.5a1.5 1.5 0 000-3H5z"></path>
                                                                            </svg>
                                                                        </md-bold>

                                                                        <md-italic tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1 js-modifier-label-key" aria-label="Add italic text <ctrl+i>" data-ga-click="Markdown Toolbar, click, italic" role="button" hotkey="i">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-italic">
                                                                                <path fill-rule="evenodd" d="M6 2.75A.75.75 0 016.75 2h6.5a.75.75 0 010 1.5h-2.505l-3.858 9H9.25a.75.75 0 010 1.5h-6.5a.75.75 0 010-1.5h2.505l3.858-9H6.75A.75.75 0 016 2.75z"></path>
                                                                            </svg>
                                                                        </md-italic>
                                                                    </div>

                                                                    <div class="d-flex d-md-inline-block mr-0 mr-md-3">
                                                                        <md-quote tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 p-md-1 mx-1" aria-label="Insert a quote" data-ga-click="Markdown Toolbar, click, quote" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-quote">
                                                                                <path fill-rule="evenodd" d="M1.75 2.5a.75.75 0 000 1.5h10.5a.75.75 0 000-1.5H1.75zm4 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM2.5 7.75a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6z"></path>
                                                                            </svg>
                                                                        </md-quote>

                                                                        <md-code tabindex="-1" class="toolbar-item tooltipped tooltipped-sw js-modifier-label-key p-2 p-md-1 mx-1" aria-label="Insert code <ctrl+e>" data-ga-click="Markdown Toolbar, click, code" role="button" hotkey="e">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-code">
                                                                                <path fill-rule="evenodd" d="M4.72 3.22a.75.75 0 011.06 1.06L2.06 8l3.72 3.72a.75.75 0 11-1.06 1.06L.47 8.53a.75.75 0 010-1.06l4.25-4.25zm6.56 0a.75.75 0 10-1.06 1.06L13.94 8l-3.72 3.72a.75.75 0 101.06 1.06l4.25-4.25a.75.75 0 000-1.06l-4.25-4.25z"></path>
                                                                            </svg>
                                                                        </md-code>

                                                                        <button type="button" data-md-button="" tabindex="-1" class="toolbar-item text-center menu-target p-2 mx-1 d-md-none js-markdown-link-button" aria-label="Add a link" data-ga-click="Markdown Toolbar, click, saved reply">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-link">
                                                                                <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                                                                            </svg>
                                                                        </button>
                                                                        <template class="js-markdown-link-dialog">
                                                                            <div class="Box-header">
                                                                                <h3 class="Box-title">Insert Link</h3>
                                                                            </div>
                                                                            <div class="Box-body overflow-auto">
                                                                                <div>
                                                                                    <label class="d-block mb-1" for="js-dialog-link-text">Link Text</label>
                                                                                    <input type="text" class="mb-3 form-control input-block" id="js-dialog-link-text" autofocus="">
                                                                                </div>
                                                                                <div>
                                                                                    <label class="d-block mb-1" for="js-dialog-link-href">URL</label>
                                                                                    <input type="url" class="mb-3 form-control input-block" id="js-dialog-link-href">
                                                                                </div>
                                                                                <div class="pt-3 border-top">
                                                                                    <button type="button" class="btn btn-primary btn-block js-markdown-link-insert" data-close-dialog="" data-for-textarea="issue-930844214-body">
                                                                                        Add
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </template>

                                                                        <md-link tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 p-md-1 d-none d-md-block mx-1 js-modifier-label-key" aria-label="Add a link <ctrl+k>" data-ga-click="Markdown Toolbar, click, link" role="button" hotkey="k">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-link">
                                                                                <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                                                                            </svg>
                                                                        </md-link>
                                                                    </div>

                                                                    <div class="d-none d-md-inline-block mr-3">
                                                                        <md-unordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add a bulleted list" data-ga-click="Markdown Toolbar, click, unordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-unordered">
                                                                                <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                                            </svg>
                                                                        </md-unordered-list>

                                                                        <md-ordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add a numbered list" data-ga-click="Markdown Toolbar, click, ordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-ordered">
                                                                                <path fill-rule="evenodd" d="M2.003 2.5a.5.5 0 00-.723-.447l-1.003.5a.5.5 0 00.446.895l.28-.14V6H.5a.5.5 0 000 1h2.006a.5.5 0 100-1h-.503V2.5zM5 3.25a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 3.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 8.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5a.75.75 0 01-.75-.75zM.924 10.32l.003-.004a.851.851 0 01.144-.153A.66.66 0 011.5 10c.195 0 .306.068.374.146a.57.57 0 01.128.376c0 .453-.269.682-.8 1.078l-.035.025C.692 11.98 0 12.495 0 13.5a.5.5 0 00.5.5h2.003a.5.5 0 000-1H1.146c.132-.197.351-.372.654-.597l.047-.035c.47-.35 1.156-.858 1.156-1.845 0-.365-.118-.744-.377-1.038-.268-.303-.658-.484-1.126-.484-.48 0-.84.202-1.068.392a1.858 1.858 0 00-.348.384l-.007.011-.002.004-.001.002-.001.001a.5.5 0 00.851.525zM.5 10.055l-.427-.26.427.26z"></path>
                                                                            </svg>
                                                                        </md-ordered-list>

                                                                        <md-task-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add a task list" data-ga-click="Markdown Toolbar, click, task list" role="button" hotkey="L">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-tasklist">
                                                                                <path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path>
                                                                            </svg>
                                                                        </md-task-list>
                                                                    </div>

                                                                    <div class="d-flex d-xs-inline-block">
                                                                        <md-mention tabindex="-1" class="flex-auto text-center toolbar-item tooltipped tooltipped-sw p-2 p-md-1 mx-1" aria-label="Directly mention a user or team" data-ga-click="Markdown Toolbar, click, mention" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-mention">
                                                                                <path fill-rule="evenodd" d="M4.75 2.37a6.5 6.5 0 006.5 11.26.75.75 0 01.75 1.298 8 8 0 113.994-7.273.754.754 0 01.006.095v1.5a2.75 2.75 0 01-5.072 1.475A4 4 0 1112 8v1.25a1.25 1.25 0 002.5 0V7.867a6.5 6.5 0 00-9.75-5.496V2.37zM10.5 8a2.5 2.5 0 10-5 0 2.5 2.5 0 005 0z"></path>
                                                                            </svg>
                                                                        </md-mention>

                                                                        <label for="fc-issue-930844214-body" data-md-button="" tabindex="-1" class="d-block d-md-none btn-link flex-auto text-center toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Attach an image or video">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-image">
                                                                                <path fill-rule="evenodd" d="M1.75 2.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h.94a.76.76 0 01.03-.03l6.077-6.078a1.75 1.75 0 012.412-.06L14.5 10.31V2.75a.25.25 0 00-.25-.25H1.75zm12.5 11H4.81l5.048-5.047a.25.25 0 01.344-.009l4.298 3.889v.917a.25.25 0 01-.25.25zm1.75-.25V2.75A1.75 1.75 0 0014.25 1H1.75A1.75 1.75 0 000 2.75v10.5C0 14.216.784 15 1.75 15h12.5A1.75 1.75 0 0016 13.25zM5.5 6a.5.5 0 11-1 0 .5.5 0 011 0zM7 6a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                                            </svg>
                                                                        </label>

                                                                        <md-ref tabindex="-1" class="flex-auto text-center toolbar-item tooltipped tooltipped-sw p-2 p-md-1 mx-1" aria-label="Reference an issue or pull request" data-ga-click="Markdown Toolbar, click, reference" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-cross-reference">
                                                                                <path fill-rule="evenodd" d="M16 1.25v4.146a.25.25 0 01-.427.177L14.03 4.03l-3.75 3.75a.75.75 0 11-1.06-1.06l3.75-3.75-1.543-1.543A.25.25 0 0111.604 1h4.146a.25.25 0 01.25.25zM2.75 3.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 01.75.75v2.19l2.72-2.72a.75.75 0 01.53-.22h4.5a.25.25 0 00.25-.25v-2.5a.75.75 0 111.5 0v2.5A1.75 1.75 0 0113.25 13H9.06l-2.573 2.573A1.457 1.457 0 014 14.543V13H2.75A1.75 1.75 0 011 11.25v-7.5C1 2.784 1.784 2 2.75 2h5.5a.75.75 0 010 1.5h-5.5z"></path>
                                                                            </svg>
                                                                        </md-ref>

                                                                        <details class="details-reset details-overlay flex-auto toolbar-item select-menu select-menu-modal-right js-saved-reply-container hx_rsm" tabindex="-1">
                                                                            <summary data-md-button="" tabindex="-1" class="text-center tooltipped tooltipped-sw menu-target py-2 p-md-1 hx_rsm-trigger ml-1" aria-label="Insert a reply" data-ga-click="Markdown Toolbar, click, saved reply" aria-haspopup="menu" role="button">
                                                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-reply">
                                                                                    <path fill-rule="evenodd" d="M6.78 1.97a.75.75 0 010 1.06L3.81 6h6.44A4.75 4.75 0 0115 10.75v2.5a.75.75 0 01-1.5 0v-2.5a3.25 3.25 0 00-3.25-3.25H3.81l2.97 2.97a.75.75 0 11-1.06 1.06L1.47 7.28a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0z"></path>
                                                                                </svg>
                                                                                <span class="dropdown-caret hide-sm"></span>
                                                                            </summary>

                                                                            <details-menu style="z-index: 99;" class="select-menu-modal position-absolute right-0 js-saved-reply-menu hx_rsm-modal" data-menu-input="issue-930844214-body_saved_reply_id" src="/settings/replies?context=none" preload="" role="menu">
                                                                                <div class="select-menu-header d-flex">
                                                                                    <span class="select-menu-title flex-auto">Select a reply</span>
                                                                                    <code><span class="border rounded p-1 mr-2">ctrl .</span></code>
                                                                                </div>

                                                                                <include-fragment role="menuitem" aria-label="Loading">
                                                                                    <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="my-6 mx-auto d-block anim-rotate">
                                                                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                                                    </svg>
                                                                                </include-fragment>

                                                                            </details-menu>
                                                                        </details>


                                                                    </div>


                                                                    <div class="Details-content--hidden d-block d-md-none width-full">
                                                                        <md-header tabindex="-1" class="toolbar-item tooltipped tooltipped-sw py-2 pr-2 pl-1 mr-1" aria-label="Add header text" data-ga-click="Markdown Toolbar, click, header" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-heading">
                                                                                <path fill-rule="evenodd" d="M3.75 2a.75.75 0 01.75.75V7h7V2.75a.75.75 0 011.5 0v10.5a.75.75 0 01-1.5 0V8.5h-7v4.75a.75.75 0 01-1.5 0V2.75A.75.75 0 013.75 2z"></path>
                                                                            </svg>
                                                                        </md-header>

                                                                        <md-bold tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1 js-modifier-label-key" aria-label="Add bold text <ctrl+b>" data-ga-click="Markdown Toolbar, click, bold" role="button" hotkey="b">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-bold">
                                                                                <path fill-rule="evenodd" d="M4 2a1 1 0 00-1 1v10a1 1 0 001 1h5.5a3.5 3.5 0 001.852-6.47A3.5 3.5 0 008.5 2H4zm4.5 5a1.5 1.5 0 100-3H5v3h3.5zM5 9v3h4.5a1.5 1.5 0 000-3H5z"></path>
                                                                            </svg>
                                                                        </md-bold>

                                                                        <md-italic tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1 js-modifier-label-key" aria-label="Add italic text <ctrl+i>" data-ga-click="Markdown Toolbar, click, italic" role="button" hotkey="i">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-italic">
                                                                                <path fill-rule="evenodd" d="M6 2.75A.75.75 0 016.75 2h6.5a.75.75 0 010 1.5h-2.505l-3.858 9H9.25a.75.75 0 010 1.5h-6.5a.75.75 0 010-1.5h2.505l3.858-9H6.75A.75.75 0 016 2.75z"></path>
                                                                            </svg>
                                                                        </md-italic>

                                                                        <md-unordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Add a bulleted list" data-ga-click="Markdown Toolbar, click, unordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-unordered">
                                                                                <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                                            </svg>
                                                                        </md-unordered-list>

                                                                        <md-ordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Add a numbered list" data-ga-click="Markdown Toolbar, click, ordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-ordered">
                                                                                <path fill-rule="evenodd" d="M2.003 2.5a.5.5 0 00-.723-.447l-1.003.5a.5.5 0 00.446.895l.28-.14V6H.5a.5.5 0 000 1h2.006a.5.5 0 100-1h-.503V2.5zM5 3.25a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 3.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 8.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5a.75.75 0 01-.75-.75zM.924 10.32l.003-.004a.851.851 0 01.144-.153A.66.66 0 011.5 10c.195 0 .306.068.374.146a.57.57 0 01.128.376c0 .453-.269.682-.8 1.078l-.035.025C.692 11.98 0 12.495 0 13.5a.5.5 0 00.5.5h2.003a.5.5 0 000-1H1.146c.132-.197.351-.372.654-.597l.047-.035c.47-.35 1.156-.858 1.156-1.845 0-.365-.118-.744-.377-1.038-.268-.303-.658-.484-1.126-.484-.48 0-.84.202-1.068.392a1.858 1.858 0 00-.348.384l-.007.011-.002.004-.001.002-.001.001a.5.5 0 00.851.525zM.5 10.055l-.427-.26.427.26z"></path>
                                                                            </svg>
                                                                        </md-ordered-list>

                                                                        <md-task-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Add a task list" data-ga-click="Markdown Toolbar, click, task list" role="button" hotkey="L">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-tasklist">
                                                                                <path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path>
                                                                            </svg>
                                                                        </md-task-list>
                                                                    </div>
                                                                </markdown-toolbar>
                                                            </div>


                                                            <div class="clearfix"></div>

                                                            <p class="comment-form-error comment-show-stale">
                                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-alert">
                                                                    <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                                                </svg> The content you are editing has changed.
                                                                Please copy your edits and refresh the page.
                                                            </p>




                                                            <file-attachment class="js-upload-markdown-image is-default" input="fc-issue-930844214-body" data-upload-repository-id="380256079" data-upload-policy-url="/upload/policies/assets"><input type="hidden" value="dSc7sUfuaB2FTZaIM3bnECf0VGRLZOPfBEWGCdZqpPCAg+PTM9S1iZ8xXqtBS0HIfBLfur5eTHYgb+kllBdoVw==" data-csrf="true" class="js-data-upload-policy-url-csrf">
                                                                <div class="write-content js-write-bucket upload-enabled">
                                                                    <input type="hidden" name="context" value="">
                                                                    <input type="text" name="required_field_e6dd" hidden="hidden" class="form-control"><input type="hidden" name="timestamp" value="1624790789934" class="form-control"><input type="hidden" name="timestamp_secret" value="08785551c71d8db4dd8d4f8dd0a1539ad2bd2754adb869a77d0afb4f18cd6c4b" class="form-control">

                                                                    <input type="hidden" name="saved_reply_id" id="issue-930844214-body_saved_reply_id" class="js-resettable-field" value="" data-reset-value="">

                                                                    <input type="hidden" name="issue[id]" value="MDU6SXNzdWU5MzA4NDQyMTQ=">
                                                                    <input type="hidden" name="issue[bodyVersion]" class="js-body-version" value="e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855">

                                                                    <text-expander keys=": @ #" data-issue-url="/suggestions?issue_suggester=1&amp;repository=pips&amp;user_id=mlab817" data-mention-url="/suggestions?mention_suggester=1&amp;repository=pips&amp;user_id=mlab817" multiword="#" data-emoji-url="/autocomplete/emoji">

                                                                        <textarea name="issue[body]" id="issue-930844214-body" placeholder="Leave a comment" aria-label="Comment body" class="form-control input-contrast comment-form-textarea js-comment-field js-paste-markdown js-task-list-field js-quick-submit js-size-to-fit js-session-resumable js-saved-reply-shortcut-comment-field"></textarea>

                                                                    </text-expander>


                                                                    <label class="text-normal drag-and-drop hx_drag-and-drop position-relative d-flex flex-justify-between">
                                                                        <input accept=".gif,.jpeg,.jpg,.mov,.mp4,.png,.csv,.docx,.fodg,.fodp,.fods,.fodt,.gz,.log,.md,.odf,.odg,.odp,.ods,.odt,.pdf,.pptx,.txt,.xls,.xlsx,.zip" type="file" multiple="" class="manual-file-chooser manual-file-chooser-transparent top-0 right-0 bottom-0 left-0 width-full ml-0 form-control rounded-top-0" id="fc-issue-930844214-body">
                                                                        <span class="color-bg-secondary position-absolute top-0 left-0 rounded-bottom-2 width-full height-full" style="pointer-events: none;"></span>
                                                                        <span class="position-relative pr-2" style="pointer-events: none;">
      <span class="default">
        Attach files by dragging &amp; dropping, selecting or pasting them.
      </span>
      <span class="loading">
        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="16" height="16" class="v-align-text-bottom mr-1 anim-rotate">
  <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
  <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
</svg> Uploading your files…
      </span>
      <span class="error bad-file">
        We don’t support that file type.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a
          GIF, JPEG, JPG, MOV, MP4, PNG, CSV, DOCX, FODG, FODP, FODS, FODT, GZ, LOG, MD, ODF, ODG, ODP, ODS, ODT, PDF, PPTX, TXT, XLS, XLSX or ZIP.
        </span>
      </span>
      <span class="error bad-permissions">
        Attaching documents requires write permission to this repository.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a GIF, JPEG, JPG, MOV, MP4, PNG, CSV, DOCX, FODG, FODP, FODS, FODT, GZ, LOG, MD, ODF, ODG, ODP, ODS, ODT, PDF, PPTX, TXT, XLS, XLSX or ZIP.
        </span>
      </span>
      <span class="error repository-required">
        We don’t support that file type.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a GIF, JPEG, JPG, MOV, MP4, PNG, CSV, DOCX, FODG, FODP, FODS, FODT, GZ, LOG, MD, ODF, ODG, ODP, ODS, ODT, PDF, PPTX, TXT, XLS, XLSX or ZIP.
        </span>
      </span>
      <span class="error too-big js-upload-too-big">
      </span>
      <span class="error empty">
        This file is empty.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a file that’s not empty.
        </span>
      </span>
      <span class="error hidden-file">
        This file is hidden.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with another file.
        </span>
      </span>
      <span class="error failed-request">
        Something went really wrong, and we can’t process that file.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again.</span>
        </span>
      </span>
    </span>
                                                                        <span class="tooltipped tooltipped-nw" aria-label="Styling with Markdown is supported">
      <a class="Link--muted position-relative d-inline" href="https://guides.github.com/features/mastering-markdown/" target="_blank" data-ga-click="Markdown Toolbar, click, help" aria-label="Learn about styling with Markdown">
        <svg class="octicon octicon-markdown v-align-bottom" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z"></path></svg>
      </a>
    </span>
                                                                    </label>

                                                                </div>
                                                            </file-attachment>

                                                            <div class="preview-content">
                                                                <div class="comment js-suggested-changes-container" data-thread-side="">
                                                                    <div class="comment-body markdown-body js-preview-body">
                                                                        <p>Nothing to preview</p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="clearfix">

                                                                <input type="hidden" name="comment_id" value="" class="js-comment-id">
                                                                <div class="form-actions comment-form-actions">
                                                                    <button data-disable-with="" type="submit" class="btn-primary btn">

                                                                        Update comment


                                                                    </button>
                                                                    <button class="btn btn-danger js-comment-cancel-button" type="button" data-confirm-text="Are you sure you want to discard your unsaved changes?">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="comment-form-error mb-2 js-comment-update-error" hidden=""></div>
                                                        </div>

                                                    </form>        <template class="js-convert-to-issue-save-error-toast">

                                                        <div class="
  position-fixed bottom-0 left-0 ml-5 mb-5
  anim-fade-in fast Toast
   Toast--error" role="log" style="z-index: 101;">
  <span class="Toast-icon">
      <svg class="octicon octicon-stop" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4.47.22A.75.75 0 015 0h6a.75.75 0 01.53.22l4.25 4.25c.141.14.22.331.22.53v6a.75.75 0 01-.22.53l-4.25 4.25A.75.75 0 0111 16H5a.75.75 0 01-.53-.22L.22 11.53A.75.75 0 010 11V5a.75.75 0 01.22-.53L4.47.22zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5H5.31zM8 4a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 018 4zm0 8a1 1 0 100-2 1 1 0 000 2z"></path></svg>
  </span>
                                                            <span class="Toast-content">We are unable to convert the task to an issue at this time. Please try again.</span>
                                                            <button class="Toast-dismissButton" type="button" aria-label="Close">
                                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                    </template>
                                                    <template hidden="" class="js-convert-to-issue-update-error-toast">

                                                        <div class="
  position-fixed bottom-0 left-0 ml-5 mb-5
  anim-fade-in fast Toast
   Toast--warning" role="log" style="z-index: 101;">
  <span class="Toast-icon">
      <svg class="octicon octicon-alert" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path></svg>
  </span>
                                                            <span class="Toast-content"><span><span>The issue </span><a></a><span> was successfully created but we are unable to update the comment at this time.</span></span></span>
                                                            <button class="Toast-dismissButton" type="button" aria-label="Close">
                                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                    </template>
                                                </div>
                                            </div>

                                        </div>



                                        <div>


                                            <div id="js-timeline-progressive-loader" data-timeline-item-src="mlab817/pips/timeline?id=MDU6SXNzdWU5MzA4NDQyMTQ%3D&amp;variables%5Bfirst%5D=60"></div>







                                            <!-- Rendered timeline since 2021-06-26 21:10:36 -->
                                            <div class="js-timeline-marker js-socket-channel js-updatable-content" id="partial-timeline" data-channel="eyJjIjoiaXNzdWU6OTMwODQ0MjE0IiwidCI6MTYyNDc5MDc4OX0=--209748630f1fc0b5e474ce21385901b22fc8d80bf61ff18122380719487a3a65" data-url="/_render_node/MDU6SXNzdWU5MzA4NDQyMTQ=/issues/unread_timeline?variables%5BdeferCommitBadges%5D=false&amp;variables%5BdeferStatusCheckRollups%5D=false&amp;variables%5BdeferredCommentActions%5D=true&amp;variables%5BhasFocusedReviewComment%5D=false&amp;variables%5BhasFocusedReviewThread%5D=false&amp;variables%5BtimelinePageSize%5D=30&amp;variables%5BtimelineSince%5D=2021-06-27T04%3A10%3A36Z" data-last-modified="Sun, 27 Jun 2021 04:10:36 GMT" data-gid="MDU6SXNzdWU5MzA4NDQyMTQ=">
                                                <!-- '"` --><!-- </textarea></xmp> --><form class="d-none js-timeline-marker-form" action="/_graphql/MarkNotificationSubjectAsRead" accept-charset="UTF-8" data-remote="true" method="post"><input type="hidden" name="authenticity_token" value="SHflqlmnwe9ELClvJRw8cdHRTLz19tOmZ6gt/oJTosoicTQGPZeAeGNP954W088DsRPTdmeYiiw2uOpBZPePow==">
                                                    <input type="hidden" name="variables[subjectId]" value="MDU6SXNzdWU5MzA4NDQyMTQ=">
                                                </form>  </div>

                                        </div>


                                    </div>


                                    <span id="issue-comment-box"></span>
                                    <div class="discussion-timeline-actions">
                                        <div class="timeline-comment-wrapper timeline-new-comment js-comment-container js-targetable-element  ml-0 pl-0 ml-md-6 pl-md-3" id="issuecomment-new">
                                            <div class=" d-none d-md-block">
                                                <span class="timeline-comment-avatar "><a class="d-inline-block" data-hovercard-type="user" data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/mlab817"><img class="avatar avatar-user" src="https://avatars.githubusercontent.com/u/29625844?s=80&amp;v=4" width="40" height="40" alt="@mlab817"></a></span>
                                            </div>
                                            <div class="border-0 border-md timeline-comment timeline-comment--caret">
                                                <!-- '"` --><!-- </textarea></xmp> --><form class="js-new-comment-form js-needs-timeline-marker-header" action="/mlab817/pips/issue_comments" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="7MIYAuwXwRr8Uo7ZbnlJl8Qg2T/hYi0CbCnBTOJM22X7kAzjI1Vf1IU3b/B2yq/wt5p3FPSGzlj9BQn6dZEXZg==">
                                                    <input type="text" name="required_field_db7e" hidden="hidden" class="form-control"><input type="hidden" name="timestamp" value="1624790789940" class="form-control"><input type="hidden" name="timestamp_secret" value="f5046809e71d2d17f7453cc3ae33ffcc43fe19cb200698b741d9fc13fa85bf9b" class="form-control">
                                                    <input type="hidden" name="issue" value="7">
                                                    <fieldset class="min-width-0">
                                                        <tab-container class="js-previewable-comment-form previewable-comment-form write-selected" data-preview-url="/preview?markdown_unsupported=false&amp;repository=380256079&amp;subject=7&amp;subject_type=Issue">
                                                            <input type="hidden" value="rkKecjLH15krDs94e6wR9wtwagLvd+OX2HhLpNsiyuV0cO3QhxWS1haHNT0SzAWHtpU63XXHj0fTMxP10tPxnQ==" data-csrf="true" class="js-data-preview-url-csrf">
                                                            <div class="comment-form-head tabnav d-flex flex-justify-between mb-2 p-0 tabnav--responsive flex-column border-bottom-0 mb-0 mb-lg-2 flex-items-stretch border-lg-bottom color-border-primary flex-lg-items-center flex-lg-row">
                                                                <div class="tabnav-tabs mx-0 mx-md-2 mt-0 mt-md-2 no-wrap d-flex flex-auto d-md-block" role="tablist">
                                                                    <button type="button" class="btn-link tabnav-tab write-tab js-write-tab px-3 px-sm-6 px-md-3 flex-1 flex-md-auto" role="tab" aria-selected="true" tabindex="0">
                                                                        Write
                                                                    </button>
                                                                    <button type="button" class="btn-link tabnav-tab preview-tab js-preview-tab flex-1 flex-md-auto" role="tab" aria-selected="false" tabindex="-1">
                                                                        Preview
                                                                    </button>
                                                                </div>
                                                                <markdown-toolbar role="toolbar" aria-label="Composition" for="new_comment_field" class="js-details-container Details toolbar-commenting no-wrap border-md-top border-lg-top-0 d-flex px-2 pt-2 pt-lg-0 flex-items-start flex-wrap" tabindex="0">
                                                                    <div class="d-block d-md-none flex-auto">
                                                                        <button data-md-button="" tabindex="-1" type="button" aria-label="Toggle text tools" aria-expanded="false" class="js-details-target btn-link toolbar-item no-underline py-2 mr-1">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-typography">
                                                                                <path fill-rule="evenodd" d="M6.21 8.5L4.574 3.594 2.857 8.5H6.21zm.5 1.5l.829 2.487a.75.75 0 001.423-.474L5.735 2.332a1.216 1.216 0 00-2.302-.018l-3.39 9.688a.75.75 0 001.415.496L2.332 10H6.71zm3.13-4.358C10.53 4.374 11.87 4 13 4c1.5 0 3 .939 3 2.601v5.649a.75.75 0 01-1.448.275C13.995 12.82 13.3 13 12.5 13c-.77 0-1.514-.231-2.078-.709-.577-.488-.922-1.199-.922-2.041 0-.694.265-1.411.887-1.944C11 7.78 11.88 7.5 13 7.5h1.5v-.899c0-.54-.5-1.101-1.5-1.101-.869 0-1.528.282-1.84.858a.75.75 0 11-1.32-.716zM14.5 9H13c-.881 0-1.375.22-1.637.444-.253.217-.363.5-.363.806 0 .408.155.697.39.896.249.21.63.354 1.11.354.732 0 1.26-.209 1.588-.449.35-.257.412-.495.412-.551V9z"></path>
                                                                            </svg>
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-chevron-up Details-content--shown">
                                                                                <path fill-rule="evenodd" d="M3.22 9.78a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L8 6.06 4.28 9.78a.75.75 0 01-1.06 0z"></path>
                                                                            </svg>
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-chevron-down Details-content--hidden">
                                                                                <path fill-rule="evenodd" d="M12.78 6.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.22 7.28a.75.75 0 011.06-1.06L8 9.94l3.72-3.72a.75.75 0 011.06 0z"></path>
                                                                            </svg>
                                                                        </button>
                                                                    </div>


                                                                    <div class="flex-nowrap d-none d-md-inline-block mr-3">
                                                                        <md-header tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add header text" data-ga-click="Markdown Toolbar, click, header" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-heading">
                                                                                <path fill-rule="evenodd" d="M3.75 2a.75.75 0 01.75.75V7h7V2.75a.75.75 0 011.5 0v10.5a.75.75 0 01-1.5 0V8.5h-7v4.75a.75.75 0 01-1.5 0V2.75A.75.75 0 013.75 2z"></path>
                                                                            </svg>
                                                                        </md-header>

                                                                        <md-bold tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1 js-modifier-label-key" aria-label="Add bold text <ctrl+b>" data-ga-click="Markdown Toolbar, click, bold" role="button" hotkey="b">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-bold">
                                                                                <path fill-rule="evenodd" d="M4 2a1 1 0 00-1 1v10a1 1 0 001 1h5.5a3.5 3.5 0 001.852-6.47A3.5 3.5 0 008.5 2H4zm4.5 5a1.5 1.5 0 100-3H5v3h3.5zM5 9v3h4.5a1.5 1.5 0 000-3H5z"></path>
                                                                            </svg>
                                                                        </md-bold>

                                                                        <md-italic tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1 js-modifier-label-key" aria-label="Add italic text <ctrl+i>" data-ga-click="Markdown Toolbar, click, italic" role="button" hotkey="i">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-italic">
                                                                                <path fill-rule="evenodd" d="M6 2.75A.75.75 0 016.75 2h6.5a.75.75 0 010 1.5h-2.505l-3.858 9H9.25a.75.75 0 010 1.5h-6.5a.75.75 0 010-1.5h2.505l3.858-9H6.75A.75.75 0 016 2.75z"></path>
                                                                            </svg>
                                                                        </md-italic>
                                                                    </div>

                                                                    <div class="d-flex d-md-inline-block mr-0 mr-md-3">
                                                                        <md-quote tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 p-md-1 mx-1" aria-label="Insert a quote" data-ga-click="Markdown Toolbar, click, quote" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-quote">
                                                                                <path fill-rule="evenodd" d="M1.75 2.5a.75.75 0 000 1.5h10.5a.75.75 0 000-1.5H1.75zm4 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM2.5 7.75a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6z"></path>
                                                                            </svg>
                                                                        </md-quote>

                                                                        <md-code tabindex="-1" class="toolbar-item tooltipped tooltipped-sw js-modifier-label-key p-2 p-md-1 mx-1" aria-label="Insert code <ctrl+e>" data-ga-click="Markdown Toolbar, click, code" role="button" hotkey="e">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-code">
                                                                                <path fill-rule="evenodd" d="M4.72 3.22a.75.75 0 011.06 1.06L2.06 8l3.72 3.72a.75.75 0 11-1.06 1.06L.47 8.53a.75.75 0 010-1.06l4.25-4.25zm6.56 0a.75.75 0 10-1.06 1.06L13.94 8l-3.72 3.72a.75.75 0 101.06 1.06l4.25-4.25a.75.75 0 000-1.06l-4.25-4.25z"></path>
                                                                            </svg>
                                                                        </md-code>

                                                                        <button type="button" data-md-button="" tabindex="-1" class="toolbar-item text-center menu-target p-2 mx-1 d-md-none js-markdown-link-button" aria-label="Add a link" data-ga-click="Markdown Toolbar, click, saved reply">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-link">
                                                                                <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                                                                            </svg>
                                                                        </button>
                                                                        <template class="js-markdown-link-dialog">
                                                                            <div class="Box-header">
                                                                                <h3 class="Box-title">Insert Link</h3>
                                                                            </div>
                                                                            <div class="Box-body overflow-auto">
                                                                                <div>
                                                                                    <label class="d-block mb-1" for="js-dialog-link-text">Link Text</label>
                                                                                    <input type="text" class="mb-3 form-control input-block" id="js-dialog-link-text" autofocus="">
                                                                                </div>
                                                                                <div>
                                                                                    <label class="d-block mb-1" for="js-dialog-link-href">URL</label>
                                                                                    <input type="url" class="mb-3 form-control input-block" id="js-dialog-link-href">
                                                                                </div>
                                                                                <div class="pt-3 border-top">
                                                                                    <button type="button" class="btn btn-primary btn-block js-markdown-link-insert" data-close-dialog="" data-for-textarea="new_comment_field">
                                                                                        Add
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </template>

                                                                        <md-link tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 p-md-1 d-none d-md-block mx-1 js-modifier-label-key" aria-label="Add a link <ctrl+k>" data-ga-click="Markdown Toolbar, click, link" role="button" hotkey="k">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-link">
                                                                                <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                                                                            </svg>
                                                                        </md-link>
                                                                    </div>

                                                                    <div class="d-none d-md-inline-block mr-3">
                                                                        <md-unordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add a bulleted list" data-ga-click="Markdown Toolbar, click, unordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-unordered">
                                                                                <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                                            </svg>
                                                                        </md-unordered-list>

                                                                        <md-ordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add a numbered list" data-ga-click="Markdown Toolbar, click, ordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-ordered">
                                                                                <path fill-rule="evenodd" d="M2.003 2.5a.5.5 0 00-.723-.447l-1.003.5a.5.5 0 00.446.895l.28-.14V6H.5a.5.5 0 000 1h2.006a.5.5 0 100-1h-.503V2.5zM5 3.25a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 3.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 8.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5a.75.75 0 01-.75-.75zM.924 10.32l.003-.004a.851.851 0 01.144-.153A.66.66 0 011.5 10c.195 0 .306.068.374.146a.57.57 0 01.128.376c0 .453-.269.682-.8 1.078l-.035.025C.692 11.98 0 12.495 0 13.5a.5.5 0 00.5.5h2.003a.5.5 0 000-1H1.146c.132-.197.351-.372.654-.597l.047-.035c.47-.35 1.156-.858 1.156-1.845 0-.365-.118-.744-.377-1.038-.268-.303-.658-.484-1.126-.484-.48 0-.84.202-1.068.392a1.858 1.858 0 00-.348.384l-.007.011-.002.004-.001.002-.001.001a.5.5 0 00.851.525zM.5 10.055l-.427-.26.427.26z"></path>
                                                                            </svg>
                                                                        </md-ordered-list>

                                                                        <md-task-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw mx-1" aria-label="Add a task list" data-ga-click="Markdown Toolbar, click, task list" role="button" hotkey="L">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-tasklist">
                                                                                <path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path>
                                                                            </svg>
                                                                        </md-task-list>
                                                                    </div>

                                                                    <div class="d-flex d-xs-inline-block">
                                                                        <md-mention tabindex="-1" class="flex-auto text-center toolbar-item tooltipped tooltipped-sw p-2 p-md-1 mx-1" aria-label="Directly mention a user or team" data-ga-click="Markdown Toolbar, click, mention" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-mention">
                                                                                <path fill-rule="evenodd" d="M4.75 2.37a6.5 6.5 0 006.5 11.26.75.75 0 01.75 1.298 8 8 0 113.994-7.273.754.754 0 01.006.095v1.5a2.75 2.75 0 01-5.072 1.475A4 4 0 1112 8v1.25a1.25 1.25 0 002.5 0V7.867a6.5 6.5 0 00-9.75-5.496V2.37zM10.5 8a2.5 2.5 0 10-5 0 2.5 2.5 0 005 0z"></path>
                                                                            </svg>
                                                                        </md-mention>

                                                                        <label for="fc-new_comment_field" data-md-button="" tabindex="-1" class="d-block d-md-none btn-link flex-auto text-center toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Attach an image or video">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-image">
                                                                                <path fill-rule="evenodd" d="M1.75 2.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h.94a.76.76 0 01.03-.03l6.077-6.078a1.75 1.75 0 012.412-.06L14.5 10.31V2.75a.25.25 0 00-.25-.25H1.75zm12.5 11H4.81l5.048-5.047a.25.25 0 01.344-.009l4.298 3.889v.917a.25.25 0 01-.25.25zm1.75-.25V2.75A1.75 1.75 0 0014.25 1H1.75A1.75 1.75 0 000 2.75v10.5C0 14.216.784 15 1.75 15h12.5A1.75 1.75 0 0016 13.25zM5.5 6a.5.5 0 11-1 0 .5.5 0 011 0zM7 6a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                                            </svg>
                                                                        </label>

                                                                        <md-ref tabindex="-1" class="flex-auto text-center toolbar-item tooltipped tooltipped-sw p-2 p-md-1 mx-1" aria-label="Reference an issue, pull request, or discussion" data-ga-click="Markdown Toolbar, click, reference" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-cross-reference">
                                                                                <path fill-rule="evenodd" d="M16 1.25v4.146a.25.25 0 01-.427.177L14.03 4.03l-3.75 3.75a.75.75 0 11-1.06-1.06l3.75-3.75-1.543-1.543A.25.25 0 0111.604 1h4.146a.25.25 0 01.25.25zM2.75 3.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 01.75.75v2.19l2.72-2.72a.75.75 0 01.53-.22h4.5a.25.25 0 00.25-.25v-2.5a.75.75 0 111.5 0v2.5A1.75 1.75 0 0113.25 13H9.06l-2.573 2.573A1.457 1.457 0 014 14.543V13H2.75A1.75 1.75 0 011 11.25v-7.5C1 2.784 1.784 2 2.75 2h5.5a.75.75 0 010 1.5h-5.5z"></path>
                                                                            </svg>
                                                                        </md-ref>

                                                                        <details class="details-reset details-overlay flex-auto toolbar-item select-menu select-menu-modal-right js-saved-reply-container hx_rsm" tabindex="-1">
                                                                            <summary data-md-button="" tabindex="-1" class="text-center tooltipped tooltipped-sw menu-target py-2 p-md-1 hx_rsm-trigger ml-1" aria-label="Insert a reply" data-ga-click="Markdown Toolbar, click, saved reply" aria-haspopup="menu" role="button">
                                                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-reply">
                                                                                    <path fill-rule="evenodd" d="M6.78 1.97a.75.75 0 010 1.06L3.81 6h6.44A4.75 4.75 0 0115 10.75v2.5a.75.75 0 01-1.5 0v-2.5a3.25 3.25 0 00-3.25-3.25H3.81l2.97 2.97a.75.75 0 11-1.06 1.06L1.47 7.28a.75.75 0 010-1.06l4.25-4.25a.75.75 0 011.06 0z"></path>
                                                                                </svg>
                                                                                <span class="dropdown-caret hide-sm"></span>
                                                                            </summary>

                                                                            <details-menu style="z-index: 99;" class="select-menu-modal position-absolute right-0 js-saved-reply-menu hx_rsm-modal" data-menu-input="new_comment_field_saved_reply_id" src="/settings/replies?context=issue" preload="" role="menu">
                                                                                <div class="select-menu-header d-flex">
                                                                                    <span class="select-menu-title flex-auto">Select a reply</span>
                                                                                    <code><span class="border rounded p-1 mr-2">ctrl .</span></code>
                                                                                </div>

                                                                                <include-fragment role="menuitem" aria-label="Loading">
                                                                                    <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="my-6 mx-auto d-block anim-rotate">
                                                                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                                                    </svg>
                                                                                </include-fragment>

                                                                            </details-menu>
                                                                        </details>


                                                                    </div>


                                                                    <div class="Details-content--hidden d-block d-md-none width-full">
                                                                        <md-header tabindex="-1" class="toolbar-item tooltipped tooltipped-sw py-2 pr-2 pl-1 mr-1" aria-label="Add header text" data-ga-click="Markdown Toolbar, click, header" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-heading">
                                                                                <path fill-rule="evenodd" d="M3.75 2a.75.75 0 01.75.75V7h7V2.75a.75.75 0 011.5 0v10.5a.75.75 0 01-1.5 0V8.5h-7v4.75a.75.75 0 01-1.5 0V2.75A.75.75 0 013.75 2z"></path>
                                                                            </svg>
                                                                        </md-header>

                                                                        <md-bold tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1 js-modifier-label-key" aria-label="Add bold text <ctrl+b>" data-ga-click="Markdown Toolbar, click, bold" role="button" hotkey="b">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-bold">
                                                                                <path fill-rule="evenodd" d="M4 2a1 1 0 00-1 1v10a1 1 0 001 1h5.5a3.5 3.5 0 001.852-6.47A3.5 3.5 0 008.5 2H4zm4.5 5a1.5 1.5 0 100-3H5v3h3.5zM5 9v3h4.5a1.5 1.5 0 000-3H5z"></path>
                                                                            </svg>
                                                                        </md-bold>

                                                                        <md-italic tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1 js-modifier-label-key" aria-label="Add italic text <ctrl+i>" data-ga-click="Markdown Toolbar, click, italic" role="button" hotkey="i">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-italic">
                                                                                <path fill-rule="evenodd" d="M6 2.75A.75.75 0 016.75 2h6.5a.75.75 0 010 1.5h-2.505l-3.858 9H9.25a.75.75 0 010 1.5h-6.5a.75.75 0 010-1.5h2.505l3.858-9H6.75A.75.75 0 016 2.75z"></path>
                                                                            </svg>
                                                                        </md-italic>

                                                                        <md-unordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Add a bulleted list" data-ga-click="Markdown Toolbar, click, unordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-unordered">
                                                                                <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                                            </svg>
                                                                        </md-unordered-list>

                                                                        <md-ordered-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Add a numbered list" data-ga-click="Markdown Toolbar, click, ordered list" role="button">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-list-ordered">
                                                                                <path fill-rule="evenodd" d="M2.003 2.5a.5.5 0 00-.723-.447l-1.003.5a.5.5 0 00.446.895l.28-.14V6H.5a.5.5 0 000 1h2.006a.5.5 0 100-1h-.503V2.5zM5 3.25a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 3.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5A.75.75 0 015 8.25zm0 5a.75.75 0 01.75-.75h8.5a.75.75 0 010 1.5h-8.5a.75.75 0 01-.75-.75zM.924 10.32l.003-.004a.851.851 0 01.144-.153A.66.66 0 011.5 10c.195 0 .306.068.374.146a.57.57 0 01.128.376c0 .453-.269.682-.8 1.078l-.035.025C.692 11.98 0 12.495 0 13.5a.5.5 0 00.5.5h2.003a.5.5 0 000-1H1.146c.132-.197.351-.372.654-.597l.047-.035c.47-.35 1.156-.858 1.156-1.845 0-.365-.118-.744-.377-1.038-.268-.303-.658-.484-1.126-.484-.48 0-.84.202-1.068.392a1.858 1.858 0 00-.348.384l-.007.011-.002.004-.001.002-.001.001a.5.5 0 00.851.525zM.5 10.055l-.427-.26.427.26z"></path>
                                                                            </svg>
                                                                        </md-ordered-list>

                                                                        <md-task-list tabindex="-1" class="toolbar-item tooltipped tooltipped-sw p-2 mx-1" aria-label="Add a task list" data-ga-click="Markdown Toolbar, click, task list" role="button" hotkey="L">
                                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-tasklist">
                                                                                <path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path>
                                                                            </svg>
                                                                        </md-task-list>
                                                                    </div>
                                                                </markdown-toolbar>
                                                            </div>

                                                            <div class="comment-form-error js-comment-form-error" role="alert" hidden="">
                                                                There was an error creating your Issue.
                                                            </div>


                                                            <file-attachment class="js-upload-markdown-image is-default" input="fc-new_comment_field" role="tabpanel" data-tab-container-no-tabstop="true" data-upload-repository-id="380256079" data-upload-policy-url="/upload/policies/assets"><input type="hidden" value="UMyGS7+e2F7BhYcOROYjSyzNLD5uyRT2uqD9jJvVT/elaF4py6QFytv5Ty0224WTdyun4Jvzu1+eipKg2aiDUA==" data-csrf="true" class="js-data-upload-policy-url-csrf">
                                                                <div class="write-content js-write-bucket tooltipped tooltipped-ne tooltipped-no-delay tooltipped-align-left-1 hide-reaction-suggestion upload-enabled mx-0 mt-2 mb-2 mx-md-2 hx_sm-hide-drag-drop js-reaction-suggestion" data-reaction-markup="Would you like to leave a reaction instead?">
                                                                    <input type="hidden" name="saved_reply_id" id="new_comment_field_saved_reply_id" class="js-resettable-field" value="" data-reset-value="">

                                                                    <text-expander keys=": @ #" data-issue-url="/suggestions/issue/930844214?issue_suggester=1&amp;repository=pips&amp;user_id=mlab817" data-mention-url="/suggestions/issue/930844214?mention_suggester=1&amp;repository=pips&amp;user_id=mlab817" multiword="#" data-emoji-url="/autocomplete/emoji">

                                                                        <textarea name="comment[body]" id="new_comment_field" placeholder="Leave a comment" aria-label="Comment body" data-required-trimmed="Text field is empty" class="form-control input-contrast comment-form-textarea js-comment-field js-paste-markdown js-task-list-field js-quick-submit js-size-to-fit js-session-resumable js-saved-reply-shortcut-comment-field" required=""></textarea>

                                                                    </text-expander>

                                                                    <label class="text-normal drag-and-drop hx_drag-and-drop position-relative d-flex flex-justify-between">
                                                                        <input accept=".gif,.jpeg,.jpg,.mov,.mp4,.png,.csv,.docx,.fodg,.fodp,.fods,.fodt,.gz,.log,.md,.odf,.odg,.odp,.ods,.odt,.pdf,.pptx,.txt,.xls,.xlsx,.zip" type="file" multiple="" class="manual-file-chooser manual-file-chooser-transparent top-0 right-0 bottom-0 left-0 width-full ml-0 form-control rounded-top-0" id="fc-new_comment_field">
                                                                        <span class="color-bg-secondary position-absolute top-0 left-0 rounded-bottom-2 width-full height-full" style="pointer-events: none;"></span>
                                                                        <span class="position-relative pr-2" style="pointer-events: none;">
      <span class="default">
        Attach files by dragging &amp; dropping, selecting or pasting them.
      </span>
      <span class="loading">
        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="16" height="16" class="v-align-text-bottom mr-1 anim-rotate">
  <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
  <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
</svg> Uploading your files…
      </span>
      <span class="error bad-file">
        We don’t support that file type.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a
          GIF, JPEG, JPG, MOV, MP4, PNG, CSV, DOCX, FODG, FODP, FODS, FODT, GZ, LOG, MD, ODF, ODG, ODP, ODS, ODT, PDF, PPTX, TXT, XLS, XLSX or ZIP.
        </span>
      </span>
      <span class="error bad-permissions">
        Attaching documents requires write permission to this repository.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a GIF, JPEG, JPG, MOV, MP4, PNG, CSV, DOCX, FODG, FODP, FODS, FODT, GZ, LOG, MD, ODF, ODG, ODP, ODS, ODT, PDF, PPTX, TXT, XLS, XLSX or ZIP.
        </span>
      </span>
      <span class="error repository-required">
        We don’t support that file type.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a GIF, JPEG, JPG, MOV, MP4, PNG, CSV, DOCX, FODG, FODP, FODS, FODT, GZ, LOG, MD, ODF, ODG, ODP, ODS, ODT, PDF, PPTX, TXT, XLS, XLSX or ZIP.
        </span>
      </span>
      <span class="error too-big js-upload-too-big">
      </span>
      <span class="error empty">
        This file is empty.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with a file that’s not empty.
        </span>
      </span>
      <span class="error hidden-file">
        This file is hidden.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again</span> with another file.
        </span>
      </span>
      <span class="error failed-request">
        Something went really wrong, and we can’t process that file.
        <span class="drag-and-drop-error-info">
          <span class="btn-link">Try again.</span>
        </span>
      </span>
    </span>
                                                                        <span class="tooltipped tooltipped-nw" aria-label="Styling with Markdown is supported">
      <a class="Link--muted position-relative d-inline" href="https://guides.github.com/features/mastering-markdown/" target="_blank" data-ga-click="Markdown Toolbar, click, help" aria-label="Learn about styling with Markdown">
        <svg class="octicon octicon-markdown v-align-bottom" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z"></path></svg>
      </a>
    </span>
                                                                    </label>

                                                                </div>
                                                            </file-attachment>
                                                            <div role="tabpanel" class="js-preview-panel overflow-auto border-bottom mx-0 my-3 mx-md-2 mb-md-2" hidden="">
                                                                <input type="hidden" name="path" value="" class="js-path">
                                                                <input type="hidden" name="line" value="" class="js-line-number">
                                                                <input type="hidden" name="start_line" value="" class="js-start-line-number">
                                                                <input type="hidden" name="preview_side" value="" class="js-side">
                                                                <input type="hidden" name="preview_start_side" value="" class="js-start-side">
                                                                <input type="hidden" name="start_commit_oid" value="" class="js-start-commit-oid">
                                                                <input type="hidden" name="end_commit_oid" value="" class="js-end-commit-oid">
                                                                <input type="hidden" name="base_commit_oid" value="" class="js-base-commit-oid">
                                                                <input type="hidden" name="comment_id" value="" class="js-comment-id">
                                                                <div class="comment js-suggested-changes-container" data-thread-side="">
                                                                    <div class="comment-body markdown-body js-preview-body">
                                                                        <p>Nothing to preview</p>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="comment-form-error mb-2 js-comment-update-error" hidden=""></div>
                                                        </tab-container>

                                                    </fieldset>
                                                    <div class="form-actions m-0 mx-md-2 my-md-2 p-0">
                                                        <div id="partial-new-comment-form-actions" class="js-socket-channel js-updatable-content" data-channel="eyJjIjoiaXNzdWU6OTMwODQ0MjE0OnN0YXRlIiwidCI6MTYyNDc5MDc4OX0=--d5b82a5c4a23333ba30879d6bba7af57fccbb8456b0e9ead19260661ec6a4f15" data-url="/mlab817/pips/issues/7/show_partial?partial=issues%2Fform_actions">

                                                            <div class="d-flex flex-justify-end">
                                                                <div class="color-bg-secondary">
                                                                    <button type="submit" name="comment_and_close" value="1" class="btn js-comment-and-button js-quick-submit-alternative" data-comment-text="Close with comment" data-disable-with="" formnovalidate="">
                                                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-issue-closed color-text-danger">
                                                                            <path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path>
                                                                        </svg>
                                                                        <span class="js-form-action-text" data-default-action-text="Close issue">Close issue</span>
                                                                    </button>

                                                                </div>
                                                                <div class="color-bg-secondary ml-1">
                                                                    <button data-disable-with="" data-disable-invalid="" type="submit" class="btn-primary btn" disabled="">


                                                                        Comment



                                                                    </button>    </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>    </div>

                                            <div class="text-small color-text-secondary mx-md-2 mt-md-2 mb-2 mt-3">
                                                <svg class="octicon octicon-info mr-1" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>Remember, contributions to this repository should follow
                                                our
                                                <a href="https://docs.github.com/articles/github-community-guidelines" data-ga-click="Issue, click github_community_guidelines link in composer footer, repo:mlab817/pips">GitHub Community Guidelines</a>.
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="flex-shrink-0 col-12 col-md-3">
                                <div id="partial-discussion-sidebar" class="js-socket-channel js-updatable-content" data-channel="eyJjIjoiaXNzdWU6OTMwODQ0MjE0IiwidCI6MTYyNDc5MDc4OX0=--209748630f1fc0b5e474ce21385901b22fc8d80bf61ff18122380719487a3a65" data-gid="MDU6SXNzdWU5MzA4NDQyMTQ=" data-url="/mlab817/pips/issues/7/show_partial?partial=issues%2Fsidebar" data-project-hovercards-enabled="">



                                    <div class="discussion-sidebar-item sidebar-assignee js-discussion-sidebar-item">
                                        <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Select assignees" action="/mlab817/pips/issues/7/assignees" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="etJbw6GMjlZh+5CkF555j5BtIGs9anTaQlkJE7gPXhe4hG6gb+T4TE1hMaQWfltrQFwTY/mRk/dGOJNhni5qUw==">


                                            <details class="details-reset details-overlay select-menu hx_rsm " id="assignees-select-menu">

                                                <summary class="text-bold discussion-sidebar-heading discussion-sidebar-toggle hx_rsm-trigger" aria-haspopup="menu" data-hotkey="a" role="button">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-gear">
                                                        <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    Assignees
                                                </summary>

                                                <details-menu class="select-menu-modal position-absolute right-0 hx_rsm-modal js-discussion-sidebar-menu" style="z-index: 99; overflow: visible;" data-multiple="" data-menu-max-options="10">
                                                    <div class="select-menu-header rounded-top-2">
                                                        <span class="select-menu-title">Assign up to 10 people to this issue</span>
                                                        <button class="hx_rsm-close-button btn-link close-button" type="button" data-toggle-for="assignees-select-menu"><svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                            </svg></button>
                                                    </div>


                                                    <div class="hx_rsm-content" role="menu">
                                                        <!-- when content is passed via block (ex: reviwers/assignees loads content via substring-memory in the block) -->


                                                        <div class="select-menu-filters">
                                                            <div class="select-menu-text-filter hx_form-control-spinner-wrapper">
                                                                <input type="text" id="assignee-filter-field" class="form-control js-filterable-field" placeholder="Type or choose a user" aria-label="Type or choose a user" autofocus="" spellcheck="false" autocomplete="off">
                                                                <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="16" height="16" class="hx_form-control-spinner anim-rotate">
                                                                    <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div class="warning mb-0" hidden="" data-menu-max-options-warning="">
                                                            You can only select 10 assignees.
                                                        </div>

                                                        <div class="select-menu-list">
                                                            <div class="select-menu-no-results">Nothing to show</div>

                                                            <input type="hidden" value="" name="issue[user_assignee_ids][]">
                                                            <div data-filterable-for="assignee-filter-field" data-filterable-type="substring-memory" data-filterable-limit="30" data-filterable-src="/mlab817/pips/issues/7/show_partial?partial=issues%2Fsidebar%2Fassignees_menu_content" data-filterable-data-pre-rendered="" data-filterable-show-suggestion-header="">

                                                                <template>
                                                                    <label class="select-menu-item text-normal" role="menuitemcheckbox" aria-checked="false" tabindex="0">
                                                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-check select-menu-item-icon">
                                                                            <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                                                        </svg>

                                                                        <input style="display:none" type="checkbox" value="" name="issue[user_assignee_ids][]">

                                                                        <div class="select-menu-item-gravatar">
                                                                            <img src="" alt="" size="20" class="avatar-small mr-1 js-avatar">
                                                                        </div>

                                                                        <div class="select-menu-item-text lh-condensed">
          <span class="select-menu-item-heading">
            <span class="js-username"></span>
            <span class="description js-description"></span>
          </span>
                                                                        </div>
                                                                    </label>
                                                                </template>


                                                                <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="my-5 mx-auto d-block anim-rotate">
                                                                    <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                                </svg>
                                                                <div class="select-menu-divider js-divider-suggestions" hidden="">Suggestions</div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </details-menu>
                                            </details>



                                            <span class="css-truncate js-issue-assignees">
    No one—<button type="submit" class="btn-link Link--muted js-issue-assign-self" name="issue[user_assignee_ids][]" value="29625844">assign yourself</button>
</span>


                                        </form></div>


                                    <div class="discussion-sidebar-item js-discussion-sidebar-item">



                                        <details class="details-reset details-overlay select-menu hx_rsm label-select-menu" id="labels-select-menu">

                                            <summary class="text-bold discussion-sidebar-heading discussion-sidebar-toggle hx_rsm-trigger" aria-haspopup="menu" data-hotkey="l" role="button">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-gear">
                                                    <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                Labels
                                            </summary>

                                            <details-menu src="/mlab817/pips/issues/7/show_partial?partial=issues%2Fsidebar%2Flabels_menu_content" class="select-menu-modal position-absolute right-0 hx_rsm-modal js-discussion-sidebar-menu" style="z-index: 99; overflow: visible;" data-multiple="">
                                                <div class="select-menu-header rounded-top-2">
                                                    <span class="select-menu-title">Apply labels to this issue</span>
                                                    <button class="hx_rsm-close-button btn-link close-button" type="button" data-toggle-for="labels-select-menu"><svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                            <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                        </svg></button>
                                                </div>
                                                <div class="select-menu-filters">
                                                    <div class="select-menu-text-filter">
                                                        <input type="text" id="label-filter-field" class="form-control js-label-filter-field js-filterable-field" placeholder="Filter labels" aria-label="Filter labels" autocomplete="off" autofocus="">
                                                    </div>
                                                </div>


                                                <div class="hx_rsm-content" role="menu">
                                                    <!-- when data is loaded as HTML via details-menu[src] -->
                                                    <include-fragment>
                                                        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="my-6 mx-auto d-block anim-rotate">
                                                            <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                        </svg>

                                                    </include-fragment>
                                                </div>

                                            </details-menu>
                                        </details>

                                        <div class="js-issue-labels d-flex flex-wrap">
                                            None yet
                                        </div>

                                    </div>



                                    <div class="discussion-sidebar-item js-discussion-sidebar-item">
                                        <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Select projects" action="/mlab817/pips/projects/issues/7" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="NuOB/XcXiC8DAKMqY0y/3eZA0khvzsE6flSdgek0t7C9jQkfywC4FdYbIf9rpORs/v4Jhzys9z/7JsKTggqqYQ==">
                                            <details class="details-reset details-overlay select-menu hx_rsm " id="projects-select-menu">

                                                <summary class="text-bold discussion-sidebar-heading discussion-sidebar-toggle hx_rsm-trigger" aria-haspopup="menu" data-hotkey="p" role="button">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-gear">
                                                        <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    Projects
                                                </summary>

                                                <details-menu src="/mlab817/pips/issues/7/show_partial?partial=issues%2Fsidebar%2Fprojects_menu_content" class="select-menu-modal position-absolute right-0 hx_rsm-modal js-discussion-sidebar-menu" style="z-index: 99; overflow: visible;" data-multiple="">
                                                    <div class="select-menu-header rounded-top-2">
                                                        <span class="select-menu-title">Projects</span>
                                                        <button class="hx_rsm-close-button btn-link close-button" type="button" data-toggle-for="projects-select-menu"><svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                            </svg></button>
                                                    </div>


                                                    <div class="hx_rsm-content" role="menu">
                                                        <!-- when data is loaded as HTML via details-menu[src] -->
                                                        <include-fragment>
                                                            <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="my-6 mx-auto d-block anim-rotate">
                                                                <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                            </svg>

                                                        </include-fragment>
                                                    </div>

                                                </details-menu>
                                            </details>


                                            <span class="css-truncate sidebar-progress-bar">
    None yet

</span>

                                        </form></div>



                                    <div class="discussion-sidebar-item sidebar-progress-bar js-discussion-sidebar-item">
                                        <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Select milestones" action="/mlab817/pips/issues/7/set_milestone?partial=issues%2Fsidebar%2Fshow%2Fmilestone" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="JqWvzN20JnBLyKRFVtj7zu+u8y9OX5P8qYpGzGVSs9QwVWS4wx50Mp2u3cdmBLdsypl6KRcx2qWeNcJ3rkg5vw==">
                                            <details class="details-reset details-overlay select-menu hx_rsm " id="milestone-select-menu">

                                                <summary class="text-bold discussion-sidebar-heading discussion-sidebar-toggle hx_rsm-trigger" aria-haspopup="menu" data-hotkey="m" role="button">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-gear">
                                                        <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    Milestone
                                                </summary>

                                                <details-menu src="/mlab817/pips/issues/7/show_partial?partial=issues%2Fsidebar%2Fmilestone_menu_content" class="select-menu-modal position-absolute right-0 hx_rsm-modal js-discussion-sidebar-menu" style="z-index: 99; overflow: visible;">
                                                    <div class="select-menu-header rounded-top-2">
                                                        <span class="select-menu-title">Set milestone</span>
                                                        <button class="hx_rsm-close-button btn-link close-button" type="button" data-toggle-for="milestone-select-menu"><svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                            </svg></button>
                                                    </div>


                                                    <div class="hx_rsm-content" role="menu">
                                                        <!-- when data is loaded as HTML via details-menu[src] -->
                                                        <include-fragment>
                                                            <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="my-6 mx-auto d-block anim-rotate">
                                                                <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                            </svg>

                                                        </include-fragment>
                                                    </div>

                                                </details-menu>
                                            </details>

                                            No milestone

                                        </form></div>



                                    <div class="discussion-sidebar-item js-discussion-sidebar-item" data-issue-and-pr-hovercards-enabled="">
                                        <!-- '"` --><!-- </textarea></xmp> --><form class="js-issue-sidebar-form" aria-label="Link issues" action="/mlab817/pips/issues/closing_references?source_id=930844214&amp;source_type=ISSUE" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="OrVez0J2ePL8Nl6abnhHlyMXWCxTlucBJjEKchWwkcShoqdEQt6pKl5c2MiMJg0P+Fduj+ZR3gP07HVHhCQHoQ==">

                                            <details class="details-reset details-overlay select-menu hx_rsm " id="reference-select-menu">

                                                <summary class="text-bold discussion-sidebar-heading discussion-sidebar-toggle hx_rsm-trigger" aria-haspopup="menu" data-hotkey="x" role="button">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-gear">
                                                        <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    Linked pull requests
                                                </summary>

                                                <details-menu src="/mlab817/pips/issues/closing_references/930844214?source_type=ISSUE" class="select-menu-modal position-absolute right-0 hx_rsm-modal js-discussion-sidebar-menu" style="z-index: 99; overflow: visible;" data-multiple="" data-menu-max-options="10">
                                                    <div class="select-menu-header rounded-top-2">
                                                        <span class="select-menu-title">Link a pull request from this repository</span>
                                                        <button class="hx_rsm-close-button btn-link close-button" type="button" data-toggle-for="reference-select-menu"><svg aria-label="Close menu" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                            </svg></button>
                                                    </div>


                                                    <div class="hx_rsm-content" role="menu">
                                                        <!-- when data is loaded as HTML via details-menu[src] -->
                                                        <include-fragment>
                                                            <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="my-6 mx-auto d-block anim-rotate">
                                                                <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                            </svg>

                                                        </include-fragment>
                                                    </div>

                                                </details-menu>
                                            </details>



                                            <p>Successfully merging a pull request may close this issue.</p>

                                            None yet

                                        </form>
                                    </div>


                                    <div class="discussion-sidebar-item sidebar-notifications">
                                        <div class="thread-subscription-status js-socket-channel js-updatable-content" data-replace-remote-form-target="" data-channel="eyJjIjoibGlzdC1zdWJzY3JpcHRpb246cmVwb3NpdG9yeTozODAyNTYwNzk6Mjk2MjU4NDQiLCJ0IjoxNjI0NzkwNzg5fQ==--e29f3ecf78ee040bdf7477121ae247086d174e22f0c3d01e3018d0f0369e4d01 eyJjIjoidGhyZWFkLXN1YnNjcmlwdGlvbjo5MzA4NDQyMTQ6Mjk2MjU4NDQiLCJ0IjoxNjI0NzkwNzg5fQ==--387fa3cf747542c83c08e1b165618caf8c1f96ed21e61c96caf2af07b6713335" data-url="/notifications/thread_subscription?repository_id=380256079&amp;thread_class=Issue&amp;thread_id=930844214">
                                            <div>
                                                <div class="d-flex position-relative">
                                                    <details class="lh-default width-full details-overlay details-overlay-dark details-reset color-text-primary">
                                                        <summary aria-label="Customize notification settings" role="button" class="discussion-sidebar-heading discussion-sidebar-toggle">        <div class="d-flex flex-justify-between">
                                                                <div class="text-bold">Notifications</div>
                                                                <span>Customize</span>
                                                            </div>
                                                        </summary>
                                                        <details-dialog src="/notifications/thread_subscription_dialog?repository_id=380256079&amp;thread_class=Issue&amp;thread_id=930844214" aria-label="Notification settings" class="Box Box--overlay flex-column anim-fade-in fast overflow-auto d-flex f5" role="dialog" aria-modal="true">        <div class="Box-header">
                                                                <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog="">
                                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                                    </svg>
                                                                </button>
                                                                <h3 class="Box-title mb-0 mt-0">
                                                                    Notification settings
                                                                </h3>
                                                            </div>

                                                            <include-fragment aria-label="Loading">
                                                                <div class="d-flex flex-items-center flex-justify-center" style="min-height: 315px;">
                                                                    <img alt="Loading..." src="https://github.githubassets.com/images/spinners/octocat-spinner-64.gif" width="32" height="32">
                                                                </div>
                                                            </include-fragment>
                                                        </details-dialog>
                                                    </details>  </div>
                                            </div>

                                            <form data-replace-remote-form="true" class="thread-subscribe-form" action="/notifications/thread" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="WJKaJ1FfxN1cfh3oZ5IQAxkYh5fqxjhWjrdEg86cUVGL7H7UW8M9Es9tBH2HlHRX+TLqmKB4m29XDQH2RSc4IA==">      <input type="hidden" name="repository_id" value="380256079">
                                                <input type="hidden" name="thread_id" value="930844214">
                                                <input type="hidden" name="thread_class" value="Issue">
                                                <input type="hidden" name="id" value="unsubscribe">
                                                <button type="submit" class="btn btn-block btn-sm thread-subscribe-button" data-disable-with="">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-bell-slash">
                                                        <path fill-rule="evenodd" d="M8 1.5c-.997 0-1.895.416-2.534 1.086A.75.75 0 014.38 1.55 5 5 0 0113 5v2.373a.75.75 0 01-1.5 0V5A3.5 3.5 0 008 1.5zM4.182 4.31L1.19 2.143a.75.75 0 10-.88 1.214L3 5.305v2.642a.25.25 0 01-.042.139L1.255 10.64A1.518 1.518 0 002.518 13h11.108l1.184.857a.75.75 0 10.88-1.214l-1.375-.996a1.196 1.196 0 00-.013-.01L4.198 4.321a.733.733 0 00-.016-.011zm7.373 7.19L4.5 6.391v1.556c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01.015.015 0 00.005.012.017.017 0 00.006.004l.007.001h9.037zM8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path>
                                                    </svg> Unsubscribe
                                                </button>
                                            </form>    <p class="reason text-small color-text-secondary">You’re receiving notifications because you’re watching this repository.</p>
                                        </div>

                                    </div>


                                    <div id="partial-users-participants" class="discussion-sidebar-item">
                                        <div class="participation">
                                            <div class="discussion-sidebar-heading text-bold">
                                                1 participant
                                            </div>
                                            <div class="participation-avatars d-flex flex-wrap">
                                                <a class="participant-avatar" data-hovercard-type="user" data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/mlab817">
                                                    <img class="avatar avatar-user" src="https://avatars.githubusercontent.com/u/29625844?s=52&amp;v=4" width="26" height="26" alt="@mlab817">
                                                </a>    </div>
                                        </div>
                                    </div>



                                    <div class="discussion-sidebar-item">
                                        <details class="details-reset details-overlay details-overlay-dark">
                                            <summary class="btn-link no-underline text-bold Link--primary lock-toggle-link" role="button">
                                                <svg class="octicon octicon-lock" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 4v2h-.25A1.75 1.75 0 002 7.75v5.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-5.5A1.75 1.75 0 0012.25 6H12V4a4 4 0 10-8 0zm6.5 2V4a2.5 2.5 0 00-5 0v2h5zM12 7.5h.25a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-5.5a.25.25 0 01.25-.25H12z"></path></svg>
                                                <strong>Lock conversation</strong>
                                            </summary>
                                            <details-dialog class="anim-fade-in fast Box Box--overlay color-text-primary f5" aria-labelledby="lock-dialog-title" role="dialog" aria-modal="true">
                                                <!-- '"` --><!-- </textarea></xmp> --><form action="/mlab817/pips/issues/7/lock" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="FfBPFfMp/y58fzFj7k5j7RGNtSFfMk0A5uuvPqAuL8lQvsHkdxbdFCkrpPx2m4n1VS5o7zHjRLmpskLx5us0Nw==">
                                                    <div class="Box-header">
                                                        <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog="">
                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                            </svg>
                                                        </button>
                                                        <h3 id="lock-dialog-title" class="Box-title">
                                                            Lock conversation on this issue
                                                        </h3>
                                                    </div>
                                                    <div class="Box-body">
                                                        <ul class="ml-3">
                                                            <li>Other users <strong>can’t add new comments</strong> to this issue.</li>
                                                            <li>
                                                                You and other collaborators
                                                                <a href="https://docs.github.com/articles/what-are-the-different-access-permissions">with access</a>
                                                                to this repository <strong>can still leave comments</strong> that others can see.
                                                            </li>
                                                            <li>You can always unlock this issue again in the future.</li>
                                                        </ul>

                                                        <dl class="form-group mb-0">
                                                            <dt>
                                                                <label for="unlock-reason">Reason for locking</label>
                                                            </dt>
                                                            <dd>
                                                                <select name="reason" id="unlock-reason" aria-describedby="unlock-reason-note" class="form-select"><option value="">Choose a reason</option><option value="Off-topic">Off-topic</option>
                                                                    <option value="Too heated">Too heated</option>
                                                                    <option value="Resolved">Resolved</option>
                                                                    <option value="Spam">Spam</option></select>
                                                                <p class="note" id="unlock-reason-note">
                                                                    Optionally, choose a reason for locking that others can see. Learn more about when
                                                                    it’s appropriate to <a href="https://docs.github.com/articles/locking-conversations">lock conversations</a>.
                                                                </p>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="Box-footer">
                                                        <button type="submit" class="btn btn-block">


                                                            Lock conversation on this issue



                                                        </button>          </div>
                                                </form>      </details-dialog>
                                        </details>
                                    </div>


                                    <div class="discussion-sidebar-item border-top-0 mt-0">
                                        <!-- '"` --><!-- </textarea></xmp> --><form class="d-inline" action="/mlab817/pips/issues/7/pin" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="8k1kjX8fTro55vIMkeHrK+UHZVIcVjiMaSkM3njW35+60mALE5zbqmFY4NDAINnmGHHqmT2jo43Jy/ckwAeOEg==">
                                            <button type="submit" class="btn-link text-bold Link--primary no-underline " aria-label="Maximum 3 pinned issues">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-pin">
                                                    <path fill-rule="evenodd" d="M4.456.734a1.75 1.75 0 012.826.504l.613 1.327a3.081 3.081 0 002.084 1.707l2.454.584c1.332.317 1.8 1.972.832 2.94L11.06 10l3.72 3.72a.75.75 0 11-1.061 1.06L10 11.06l-2.204 2.205c-.968.968-2.623.5-2.94-.832l-.584-2.454a3.081 3.081 0 00-1.707-2.084l-1.327-.613a1.75 1.75 0 01-.504-2.826L4.456.734zM5.92 1.866a.25.25 0 00-.404-.072L1.794 5.516a.25.25 0 00.072.404l1.328.613A4.582 4.582 0 015.73 9.63l.584 2.454a.25.25 0 00.42.12l5.47-5.47a.25.25 0 00-.12-.42L9.63 5.73a4.581 4.581 0 01-3.098-2.537L5.92 1.866z"></path>
                                                </svg>
                                                <strong>Pin issue</strong>
                                            </button>
                                            <span class="tooltipped tooltipped-s tooltipped-multiline" aria-label="Up to 3 issues can be pinned and they will appear publicly at the top of the issues page"> <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-info">
    <path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path>
</svg> </span>
                                        </form>  </div>


                                    <!-- '"` --><!-- </textarea></xmp> --><form action="/mlab817/pips/issues/7/transfer" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="UYoR7edK3PLb0QwYzRSbxwudYfuztyeer6q89X20f+eg5El00TgX2iRL/8LbDEbJ0kYiFGRKWREDagEButfrYA==">
                                        <div class="discussion-sidebar-item border-top-0 mt-0">
                                            <details class="details-reset details-overlay details-overlay-dark">
                                                <summary class="btn-link no-underline text-bold Link--primary" role="button">
        <span class="text-bold Link--primary lock-toggle-link">
          <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-arrow-right">
    <path fill-rule="evenodd" d="M8.22 2.97a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06l2.97-2.97H3.75a.75.75 0 010-1.5h7.44L8.22 4.03a.75.75 0 010-1.06z"></path>
</svg> <strong>Transfer issue</strong>
        </span>
                                                </summary>
                                                <details-dialog class="anim-fade-in fast Box Box--overlay color-text-primary f5" aria-labelledby="transfer-dialog-title" role="dialog" aria-modal="true">


                                                    <input type="hidden" name="issue_id" value="MDU6SXNzdWU5MzA4NDQyMTQ=">
                                                    <div class="Box-header">
                                                        <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog="">
                                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                                <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                            </svg>
                                                        </button>
                                                        <h3 id="transfer-dialog-title" class="Box-title">
                                                            Transfer this issue
                                                            <span class="tooltipped tooltipped-n tooltipped-multiline" aria-label="Labels, milestones, and repository projects assigned to this issue will not transfer to the new location">
      <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-info">
    <path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm6.5-.25A.75.75 0 017.25 7h1a.75.75 0 01.75.75v2.75h.25a.75.75 0 010 1.5h-2a.75.75 0 010-1.5h.25v-2h-.25a.75.75 0 01-.75-.75zM8 6a1 1 0 100-2 1 1 0 000 2z"></path>
</svg>
    </span>
                                                        </h3>
                                                    </div>
                                                    <div class="Box-body p-3">
                                                        <details class="details-reset details-overlay select-menu">
                                                            <summary class="btn select-menu-button" data-menu-button="" aria-haspopup="menu" role="button">
                                                                <input type="hidden" name="issue[repository_id]" value="" checked="">
                                                                Choose a repository
                                                            </summary>
                                                            <details-menu class="select-menu-modal position-absolute" style="z-index: 99;" src="/_render_node/MDU6SXNzdWU5MzA4NDQyMTQ=/issues/transfer_form_possible_repositories" preload="" role="menu">
                                                                <div class="select-menu-header">
                                                                    <span class="select-menu-title">Repositories</span>
                                                                </div>
                                                                <div class="select-menu-filters">
                                                                    <div class="select-menu-text-filter">
                                                                        <remote-input param="variables[query]" src="/_render_node/MDU6SXNzdWU5MzA4NDQyMTQ=/issues/transfer_form_possible_repositories" aria-owns="transfer-possible-repositories-menu">
                                                                            <input type="text" class="form-control" aria-label="Type to filter" placeholder="Find a repository" autofocus="" autocomplete="off" spellcheck="false">
                                                                        </remote-input>
                                                                    </div>
                                                                </div>
                                                                <include-fragment>
                                                                    <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="64" height="64" class="my-6 mx-auto d-block anim-rotate">
                                                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                                    </svg>
                                                                    <input type="text" required="" class="d-none">
                                                                </include-fragment>
                                                            </details-menu>
                                                        </details>
                                                    </div>
                                                    <div class="p-3">
                                                        <button data-disable-with="Transferring issue…" data-disable-invalid="" disabled="" type="submit" class="btn btn-block">


                                                            Transfer issue



                                                        </button></div>

                                                </details-dialog>
                                            </details>
                                        </div>
                                    </form>


                                    <div class="discussion-sidebar-item border-top-0 mt-0">
                                        <details class="details-reset details-overlay details-overlay-dark">
                                            <summary role="button">
      <span class="text-bold Link--primary lock-toggle-link">
        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-trash">
    <path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
</svg> <strong>Delete issue</strong>
      </span>
                                            </summary>
                                            <details-dialog class="anim-fade-in fast Box Box--overlay color-text-primary f5" aria-labelledby="delete-issue-dialog-title" role="dialog" aria-modal="true">
                                                <div class="Box-body p-3 text-center">
                                                    <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog="">
                                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                            <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                        </svg>
                                                    </button>

                                                    <svg class="octicon octicon-circle-slash color-text-danger ml-1" height="40" width="40" viewBox="0 0 24 24" version="1.1" aria-hidden="true"><path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12A9.5 9.5 0 0112 2.5c2.353 0 4.507.856 6.166 2.273L4.773 18.166A9.462 9.462 0 012.5 12zm3.334 7.227A9.462 9.462 0 0012 21.5a9.5 9.5 0 009.5-9.5 9.462 9.462 0 00-2.273-6.166L5.834 19.227z"></path></svg>

                                                    <!-- '"` --><!-- </textarea></xmp> --><form class="edit_issue" id="edit_issue_930844214" action="/mlab817/pips/issues/7" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="delete"><input type="hidden" name="authenticity_token" value="o2sOtKrpTGJP52f76swaM0asueLiDzJc58mjLGXHUM9NvyHHxcQ/CM/rRzB+onXnaQb5bRkmTvRRgxHotH8JJw==">
                                                        <h4 class="mt-4">Are you sure you want to delete this issue?</h4>
                                                        <div class="col-9 mx-auto mt-1 mb-4">
                                                            <ul class="text-left">
                                                                <li>This cannot be undone</li>
                                                                <li>Only administrators can delete issues</li>
                                                                <li>Deletion will remove the issue from search and previous references will point to a placeholder</li>
                                                            </ul>
                                                        </div>

                                                        <button type="submit" name="verify_delete" value="1" class="btn btn-danger input-block float-none" data-disable-with="Deleting issue…">
                                                            Delete this issue
                                                        </button>
                                                    </form>      </div>
                                            </details-dialog>
                                        </details>
                                    </div>


                                </div>

                            </div>
                        </div>      </div>
                </div>


            </div>


        </div>
    </div>
@stop
