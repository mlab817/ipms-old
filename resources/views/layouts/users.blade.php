<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

    @yield('styles')
</head>
<body>
@include('includes.header')

<main>
    <div class="mt-4 position-sticky top-0 d-none d-md-block color-bg-primary width-full border-bottom color-border-secondary">
        <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">
            <div class="flex-shrink-0 col-12 col-md-3 mb-4 mb-md-0">
                <div class="user-profile-sticky-bar">
                    <div class="user-profile-mini-vcard d-table">
              <span class="user-profile-mini-avatar d-table-cell v-align-middle lh-condensed-ultra pr-2">
                <img class="rounded-1 avatar-user" src="https://avatars.githubusercontent.com/u/6462826?s=64&amp;v=4" width="32" height="32" alt="@cpriego">
              </span>
                        <span class="d-table-cell v-align-middle lh-condensed">
                <strong>cpriego</strong>

  <span class="user-following-container js-form-toggle-container">
    <!-- '"` --><!-- </textarea></xmp> -->
  </span>

              </span>
                    </div>
                </div>
            </div>

            <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">
                <div class="UnderlineNav width-full box-shadow-none">
                    <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
                        <a class="UnderlineNav-item" href="/cpriego">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-book UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                            </svg>
                            Overview
                        </a>
                        <a aria-current="page" class="UnderlineNav-item selected" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;TAB_REPOSITORIES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="cb2b6203dc313f3087238f5a4a10687dcadf23b7c1381be0145f1249cf8f8d91" href="/cpriego?tab=repositories">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-repo UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                            </svg>
                            Repositories
                            <span title="3" class="Counter">3</span>
                        </a>
                        <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;TAB_PROJECTS&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="9d8a098709b92dca74aa7d933911beb09bcb5f9a91ba6eb87afd76c2b5b404d8" href="/cpriego?tab=projects">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                            </svg>
                            Projects
                            <span title="0" hidden="hidden" class="Counter">0</span>
                        </a>
                        <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="ab6b2111b0907cc739d6284fe6965bc6d9b9d2d6f48c88d2e6e6f29229e0e22a" href="/cpriego?tab=packages">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-package UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M8.878.392a1.75 1.75 0 00-1.756 0l-5.25 3.045A1.75 1.75 0 001 4.951v6.098c0 .624.332 1.2.872 1.514l5.25 3.045a1.75 1.75 0 001.756 0l5.25-3.045c.54-.313.872-.89.872-1.514V4.951c0-.624-.332-1.2-.872-1.514L8.878.392zM7.875 1.69a.25.25 0 01.25 0l4.63 2.685L8 7.133 3.245 4.375l4.63-2.685zM2.5 5.677v5.372c0 .09.047.171.125.216l4.625 2.683V8.432L2.5 5.677zm6.25 8.271l4.625-2.683a.25.25 0 00.125-.216V5.677L8.75 8.432v5.516z"></path>
                            </svg>
                            Packages
                        </a>
                    </nav>

                </div>
            </div>

        </div>
        <div class="container-xl px-3 px-md-4 px-lg-5">
            <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">
                <div class="flex-shrink-0 col-12 col-md-3 mb-4 mb-md-0">      <div class="h-card mt-md-n5" data-acv-badge-hovercards-enabled="" itemscope="" itemtype="http://schema.org/Person">
                        <div class="user-profile-sticky-bar js-user-profile-sticky-bar d-none d-md-block">
                            <div class="user-profile-mini-vcard d-table">
                                <span class="user-profile-mini-avatar d-table-cell v-align-middle lh-condensed-ultra pr-2">
                                  <img class="rounded-1 avatar-user" src="https://avatars.githubusercontent.com/u/29625844?s=64&amp;v=4" width="32" height="32" alt="@mlab817">
                                </span>
                                                    <span class="d-table-cell v-align-middle lh-condensed">
                                  <strong>mlab817</strong>


                                </span>
                            </div>
                        </div>

                        <div class="clearfix d-flex d-md-block flex-items-center mb-4 mb-md-0">
                            <div class="position-relative d-inline-block col-2 col-md-12 mr-3 mr-md-0 flex-shrink-0" style="z-index:4;">
                                <a class="tooltipped tooltipped-s d-block" aria-label="Change your avatar" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;EDIT_AVATAR&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="194ac5c41f036126ab7e752daba88de2493e61d02732c72e5b8cad6facecf2f0" href="https://github.com/account"><img style="height:auto;" alt="" width="260" height="260" class="avatar avatar-user width-full border color-bg-primary" src="https://avatars.githubusercontent.com/u/29625844?v=4"></a>

                                <div class="user-status-container position-relative hide-sm hide-md">


                                </div>

                            </div>

                            <div class="vcard-names-container float-left col-12 py-3 js-sticky js-user-profile-sticky-fields" data-original-top="0px" style="position: sticky;">
                                <h1 class="vcard-names ">
      <span class="p-name vcard-fullname d-block overflow-hidden" itemprop="name">
        Mark Lester Bolotaolo
      </span>
                                    <span class="p-nickname vcard-username d-block" itemprop="additionalName">
        mlab817
      </span>
                                </h1>
                            </div>
                        </div>

                        <div class="mb-2 user-status-container d-md-none">

                            <div class="js-user-status-container rounded-1 px-2 py-1 mt-2 user-status-busy border color-border-warning" data-team-hovercards-enabled="">
                                <details class="js-user-status-details details-reset details-overlay details-overlay-dark">
                                    <summary class="btn-link btn-block Link--secondary no-underline js-toggle-user-status-edit toggle-user-status-edit " role="menuitem" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;EDIT_USER_STATUS&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="7dfe513db3121ef9e5445ac2187c8adfc68c78310e45966b67b530405d4ddbb3">
                                        <div class="d-flex flex-items-center flex-items-stretch">
                                            <div class="f6 lh-condensed user-status-header d-inline-flex">
                                                <div class="user-status-emoji-container flex-shrink-0 mr-2 d-flex flex-items-center flex-justify-center ">
                                                    <g-emoji alias="thought_balloon" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f4ad.png"><img class="emoji" alt="thought_balloon" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f4ad.png"></g-emoji>
                                                </div>
                                            </div>
                                            <div class="

           user-status-message-wrapper f6 min-width-0" style="line-height: 20px;">
                                                <div class="css-truncate css-truncate-target width-fit color-text-primary text-left">
                                                    <div class="color-text-primary text-bold f6">
                                                    </div>
                                                    <span><div>I may be slow to respond.</div></span>
                                                </div>
                                            </div>
                                        </div>
                                    </summary>
                                    <details-dialog class="rounded-1 anim-fade-in fast Box Box--overlay" role="dialog" tabindex="-1" aria-modal="true">
                                        <!-- '"` --><!-- </textarea></xmp> --><form class="position-relative flex-auto js-user-status-form" action="/users/status?circle=0&amp;compact=1&amp;link_mentions=1&amp;truncate=0" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="6/qC4b90Q/gz3NIVd2XYdYshDaCLvgtJn20F3F318ayB6XVFgK7enMBWPNwLfH3cjwFGXKr3rAgbCvrKEgeMYg==">
                                            <div class="Box-header color-bg-tertiary border-bottom p-3">
                                                <button class="Box-btn-octicon js-toggle-user-status-edit btn-octicon float-right" type="reset" aria-label="Close dialog" data-close-dialog="">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-x">
                                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                                <h3 class="Box-title f5 text-bold color-text-primary">Edit status</h3>
                                            </div>
                                            <input type="hidden" name="emoji" class="js-user-status-emoji-field" value="">
                                            <input type="hidden" name="organization_id" class="js-user-status-org-id-field" value="">
                                            <div class="px-3 py-2 color-text-primary">
                                                <div class="js-characters-remaining-container position-relative mt-2">
                                                    <div class="input-group d-table form-group my-0 js-user-status-form-group">
              <span class="input-group-button d-table-cell v-align-middle" style="width: 1%">
                <button type="button" aria-label="Choose an emoji" class="btn-outline btn js-toggle-user-status-emoji-picker p-0">
                  <span class="js-user-status-original-emoji" hidden=""></span>
                  <span class="js-user-status-custom-emoji"></span>
                  <span class="js-user-status-no-emoji-icon">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-smiley">
    <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path>
</svg>
                  </span>
                </button>
              </span>
                                                        <text-expander keys=": @" data-mention-url="/autocomplete/user-suggestions" data-emoji-url="/autocomplete/emoji">
                                                            <input type="text" autocomplete="off" data-no-org-url="/autocomplete/user-suggestions" data-org-url="/suggestions?mention_suggester=1" data-maxlength="80" class="d-table-cell width-full form-control js-user-status-message-field js-characters-remaining-field" placeholder="What's happening?" name="message" value="I may be slow to respond." aria-label="What is your current status?">
                                                        </text-expander>
                                                        <div class="error">Could not update your status, please try again.</div>
                                                    </div>
                                                    <div style="margin-left: 53px" class="my-1 text-small label-characters-remaining js-characters-remaining" data-suffix="remaining" hidden="">
                                                        80 remaining
                                                    </div>
                                                </div>
                                                <include-fragment class="js-user-status-emoji-picker" data-url="/users/status/emoji"></include-fragment>
                                                <div class="overflow-auto ml-n3 mr-n3 px-3 border-bottom" style="max-height: 33vh">
                                                    <div class="user-status-suggestions js-user-status-suggestions collapsed overflow-hidden">
                                                        <h4 class="f6 text-normal my-3">Suggestions:</h4>
                                                        <div class="mx-3 mt-2 clearfix">
                                                            <div class="float-left col-6">
                                                                <button type="button" value=":palm_tree:" class="d-flex flex-items-baseline flex-items-stretch lh-condensed f6 btn-link Link--secondary no-underline js-predefined-user-status mb-1">
                                                                    <div class="emoji-status-width mr-2 v-align-middle js-predefined-user-status-emoji">
                                                                        <g-emoji alias="palm_tree" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f334.png"><img class="emoji" alt="palm_tree" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f334.png"></g-emoji>
                                                                    </div>
                                                                    <div class="d-flex flex-items-center no-underline js-predefined-user-status-message ws-normal text-left" style="border-left: 1px solid transparent">
                                                                        On vacation
                                                                    </div>
                                                                </button>
                                                                <button type="button" value=":face_with_thermometer:" class="d-flex flex-items-baseline flex-items-stretch lh-condensed f6 btn-link Link--secondary no-underline js-predefined-user-status mb-1">
                                                                    <div class="emoji-status-width mr-2 v-align-middle js-predefined-user-status-emoji">
                                                                        <g-emoji alias="face_with_thermometer" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f912.png"><img class="emoji" alt="face_with_thermometer" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f912.png"></g-emoji>
                                                                    </div>
                                                                    <div class="d-flex flex-items-center no-underline js-predefined-user-status-message ws-normal text-left" style="border-left: 1px solid transparent">
                                                                        Out sick
                                                                    </div>
                                                                </button>
                                                            </div>
                                                            <div class="float-left col-6">
                                                                <button type="button" value=":house:" class="d-flex flex-items-baseline flex-items-stretch lh-condensed f6 btn-link Link--secondary no-underline js-predefined-user-status mb-1">
                                                                    <div class="emoji-status-width mr-2 v-align-middle js-predefined-user-status-emoji">
                                                                        <g-emoji alias="house" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f3e0.png"><img class="emoji" alt="house" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f3e0.png"></g-emoji>
                                                                    </div>
                                                                    <div class="d-flex flex-items-center no-underline js-predefined-user-status-message ws-normal text-left" style="border-left: 1px solid transparent">
                                                                        Working from home
                                                                    </div>
                                                                </button>
                                                                <button type="button" value=":dart:" class="d-flex flex-items-baseline flex-items-stretch lh-condensed f6 btn-link Link--secondary no-underline js-predefined-user-status mb-1">
                                                                    <div class="emoji-status-width mr-2 v-align-middle js-predefined-user-status-emoji">
                                                                        <g-emoji alias="dart" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f3af.png"><img class="emoji" alt="dart" height="20" width="20" src="https://github.githubassets.com/images/icons/emoji/unicode/1f3af.png"></g-emoji>
                                                                    </div>
                                                                    <div class="d-flex flex-items-center no-underline js-predefined-user-status-message ws-normal text-left" style="border-left: 1px solid transparent">
                                                                        Focusing
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="user-status-limited-availability-container">
                                                        <div class="form-checkbox my-0">
                                                            <input type="checkbox" name="limited_availability" value="1" class="js-user-status-limited-availability-checkbox" data-default-message="I may be slow to respond." aria-describedby="limited-availability-help-text-truncate-false-compact-true" id="limited-availability-truncate-false-compact-true" checked="">
                                                            <label class="d-block f5 color-text-primary mb-1" for="limited-availability-truncate-false-compact-true">
                                                                Busy
                                                            </label>
                                                            <p class="note" id="limited-availability-help-text-truncate-false-compact-true">
                                                                When others mention you, assign you, or request your review,
                                                                GitHub will let them know that you have limited availability.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-inline-block f5 mr-2 pt-3 pb-2">
                                                    <div class="d-inline-block mr-1">
                                                        Clear status
                                                    </div>

                                                    <details class="js-user-status-expire-drop-down f6 dropdown details-reset details-overlay d-inline-block mr-2">
                                                        <summary class="btn btn-sm v-align-baseline" aria-haspopup="true">
                                                            <div class="js-user-status-expiration-interval-selected d-inline-block v-align-baseline">
                                                                Never
                                                            </div>
                                                            <div class="dropdown-caret"></div>
                                                        </summary>

                                                        <ul class="dropdown-menu dropdown-menu-se pl-0 overflow-auto" style="width: 220px; max-height: 15.5em">
                                                            <li>
                                                                <button type="button" class="btn-link dropdown-item js-user-status-expire-button ws-normal" title="Never">
                                                                    <span class="d-inline-block text-bold mb-1">Never</span>
                                                                    <div class="f6 lh-condensed">Keep this status until you clear your status or edit your status.</div>
                                                                </button>
                                                            </li>
                                                            <li class="dropdown-divider" role="none"></li>
                                                            <li>
                                                                <button type="button" class="btn-link dropdown-item ws-normal js-user-status-expire-button" title="in 30 minutes" value="2021-07-02T18:44:08+08:00">
                                                                    in 30 minutes
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="btn-link dropdown-item ws-normal js-user-status-expire-button" title="in 1 hour" value="2021-07-02T19:14:08+08:00">
                                                                    in 1 hour
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="btn-link dropdown-item ws-normal js-user-status-expire-button" title="in 4 hours" value="2021-07-02T22:14:08+08:00">
                                                                    in 4 hours
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="btn-link dropdown-item ws-normal js-user-status-expire-button" title="today" value="2021-07-02T23:59:59+08:00">
                                                                    today
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="btn-link dropdown-item ws-normal js-user-status-expire-button" title="this week" value="2021-07-04T23:59:59+08:00">
                                                                    this week
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </details>
                                                    <input class="js-user-status-expiration-date-input" type="hidden" name="expires_at" value="">
                                                </div>

                                                <include-fragment class="js-user-status-org-picker" data-url="/users/status/organizations"></include-fragment>
                                            </div>
                                            <div class="d-flex flex-items-center flex-justify-between p-3 border-top">
                                                <button type="submit" class="width-full btn btn-primary mr-2 js-user-status-submit">
                                                    Set status
                                                </button>
                                                <button type="button" class="width-full js-clear-user-status-button btn ml-2 js-user-status-exists">
                                                    Clear status
                                                </button>
                                            </div>
                                        </form>    </details-dialog>
                                </details>
                            </div>

                        </div>


                        <div class="d-flex flex-column">
                            <div class="flex-order-1 flex-md-order-none">
                                <div class="d-flex flex-lg-row flex-md-column">
                                </div>

                                <!-- '"` --><!-- </textarea></xmp> --><form hidden="hidden" class="position-relative flex-auto js-profile-editable-form" action="/users/mlab817" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="D597/zBIevy8RtEffOk9+Kdl3D2xQ6GemloZwuqIcs04G1zFzHn0wEpwuxabln8o/ZaWOvF2V4Z3IXOAdTvAhg==">

                                    <div class="js-length-limited-input-container">
                                        <textarea class="form-control js-length-limited-input mb-1 width-full js-user-profile-bio-edit" name="user[profile_bio]" placeholder="Add a bio" aria-label="Add a bio" rows="3" data-input-max-length="160" data-warning-text="remaining">Self-taught web developer with PHP, Laravel, Vue and React.</textarea>
                                        <div class="d-none js-length-limited-input-warning user-profile-bio-message text-right m-0"></div>
                                    </div>


                                    <div class="color-text-tertiary mt-2 d-flex flex-items-center">
                                        <svg style="width: 16px;" aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-organization">
                                            <path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path>
                                        </svg>
                                        <input class="ml-2 form-control flex-auto input-sm" placeholder="Company" aria-label="Company" name="user[profile_company]" value="">
                                    </div>

                                    <div class="color-text-tertiary mt-2 d-flex flex-items-center">
                                        <svg style="width: 16px;" aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-location">
                                            <path fill-rule="evenodd" d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                        <input class="ml-2 form-control flex-auto input-sm" placeholder="Location" aria-label="Location" name="user[profile_location]" value="">
                                    </div>

                                    <div class="color-text-tertiary mt-2 d-flex flex-items-center">
                                        <svg style="width: 16px;" aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-mail">
                                            <path fill-rule="evenodd" d="M1.75 2A1.75 1.75 0 000 3.75v.736a.75.75 0 000 .027v7.737C0 13.216.784 14 1.75 14h12.5A1.75 1.75 0 0016 12.25v-8.5A1.75 1.75 0 0014.25 2H1.75zM14.5 4.07v-.32a.25.25 0 00-.25-.25H1.75a.25.25 0 00-.25.25v.32L8 7.88l6.5-3.81zm-13 1.74v6.441c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V5.809L8.38 9.397a.75.75 0 01-.76 0L1.5 5.809z"></path>
                                        </svg>
                                        <select name="user[profile_email]" id="user_profile_email" class="form-select form-control ml-2 flex-auto select-sm"><option value=""></option>
                                            <option selected="selected" value="mlab817@gmail.com">mlab817@gmail.com</option></select>
                                    </div>

                                    <div class="color-text-tertiary mt-2 d-flex flex-items-center">
                                        <svg style="width: 16px;" aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-link">
                                            <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                                        </svg>
                                        <input class="ml-2 form-control flex-auto input-sm" placeholder="Website" aria-label="Website" name="user[profile_blog]" value="">
                                    </div>

                                    <div class="color-text-tertiary mt-2 d-flex flex-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 273.5 222.3" height="16" width="16"><path d="M273.5 26.3a109.77 109.77 0 0 1-32.2 8.8 56.07 56.07 0 0 0 24.7-31 113.39 113.39 0 0 1-35.7 13.6 56.1 56.1 0 0 0-97 38.4 54 54 0 0 0 1.5 12.8A159.68 159.68 0 0 1 19.1 10.3a56.12 56.12 0 0 0 17.4 74.9 56.06 56.06 0 0 1-25.4-7v.7a56.11 56.11 0 0 0 45 55 55.65 55.65 0 0 1-14.8 2 62.39 62.39 0 0 1-10.6-1 56.24 56.24 0 0 0 52.4 39 112.87 112.87 0 0 1-69.7 24 119 119 0 0 1-13.4-.8 158.83 158.83 0 0 0 86 25.2c103.2 0 159.6-85.5 159.6-159.6 0-2.4-.1-4.9-.2-7.3a114.25 114.25 0 0 0 28.1-29.1" fill="currentColor"></path></svg>

                                        <input class="ml-2 form-control flex-auto input-sm" placeholder="Twitter username" aria-label="Twitter username" name="user[profile_twitter_username]" value="">
                                    </div>

                                    <div class="my-3">
                                        <div class="js-profile-editable-error color-text-danger my-3"></div>
                                        <button type="submit" class="btn-primary btn-sm btn">

                                            Save


                                        </button>
                                        <button type="reset" class="btn btn-sm js-profile-editable-cancel">Cancel</button>
                                    </div>
                                </form>
                            </div>


                            <div class="js-profile-editable-area d-flex flex-column d-md-block">
                                <div class="p-note user-profile-bio mb-3 js-user-profile-bio f4"><div>Self-taught web developer with PHP, Laravel, Vue and React.</div></div>

                                <div class="mb-3">
                                    <button name="button" type="button" class="btn btn-block js-profile-editable-edit-button" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;INLINE_EDIT_BUTTON&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="db6fc4fe192c9d94c6a049daf18ccc1f5fa347dbf36bf04f85a7d011ecb473d8">Edit profile</button>

                                </div>

                                <div class="flex-order-1 flex-md-order-none mt-2 mt-md-0">
                                    <div class="mb-3">
                                        <a class="Link--secondary no-underline no-wrap" href="https://github.com/mlab817?tab=followers">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-people text-icon-tertiary">
                                                <path fill-rule="evenodd" d="M5.5 3.5a2 2 0 100 4 2 2 0 000-4zM2 5.5a3.5 3.5 0 115.898 2.549 5.507 5.507 0 013.034 4.084.75.75 0 11-1.482.235 4.001 4.001 0 00-7.9 0 .75.75 0 01-1.482-.236A5.507 5.507 0 013.102 8.05 3.49 3.49 0 012 5.5zM11 4a.75.75 0 100 1.5 1.5 1.5 0 01.666 2.844.75.75 0 00-.416.672v.352a.75.75 0 00.574.73c1.2.289 2.162 1.2 2.522 2.372a.75.75 0 101.434-.44 5.01 5.01 0 00-2.56-3.012A3 3 0 0011 4z"></path>
                                            </svg>
                                            <span class="text-bold color-text-primary">3</span>
                                            followers
                                        </a>        · <a class="Link--secondary no-underline no-wrap" href="https://github.com/mlab817?tab=following">
                                            <span class="text-bold color-text-primary">1</span>
                                            following
                                        </a>        · <a class="Link--secondary no-underline no-wrap" href="https://github.com/mlab817?tab=stars">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-star text-icon-tertiary">
                                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                            </svg>
                                            <span class="text-bold color-text-primary">43</span>
                                        </a>      </div>
                                </div>

                                <ul class="vcard-details">



                                    <li itemprop="email" aria-label="Email: mlab817@gmail.com" class="vcard-detail pt-1 css-truncate css-truncate-target "><svg class="octicon octicon-mail" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M1.75 2A1.75 1.75 0 000 3.75v.736a.75.75 0 000 .027v7.737C0 13.216.784 14 1.75 14h12.5A1.75 1.75 0 0016 12.25v-8.5A1.75 1.75 0 0014.25 2H1.75zM14.5 4.07v-.32a.25.25 0 00-.25-.25H1.75a.25.25 0 00-.25.25v.32L8 7.88l6.5-3.81zm-13 1.74v6.441c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V5.809L8.38 9.397a.75.75 0 01-.76 0L1.5 5.809z"></path></svg>
                                        <a class="u-email Link--primary " href="mailto:mlab817@gmail.com">mlab817@gmail.com</a>
                                    </li>


                                </ul>
                            </div>

                        </div>


                        <div class="border-top color-border-secondary pt-3 mt-3 d-none d-md-block"><h2 class="h4 mb-2">Achievements</h2><div class="d-flex"><div class="position-relative"><a href="https://archiveprogram.github.com/" class="d-inline-block" data-hovercard-type="acv_badge" data-hovercard-url="/users/mlab817/acv/hovercard">
                                        <img alt="Arctic Code Vault Contributor" width="64px" src="https://github.githubassets.com/images/modules/profile/badge--acv-64.png">
                                    </a>
                                </div></div></div><div class="border-top color-border-secondary pt-3 mt-3 d-md-none d-block"><h2 class="h4 mb-2">Achievements</h2><div class="d-flex"><div class="position-relative"><a href="https://archiveprogram.github.com/" class="d-inline-block">
                                        <img alt="Arctic Code Vault Contributor" width="64px" src="https://github.githubassets.com/images/modules/profile/badge--acv-64.png">
                                    </a>
                                </div></div></div>

                        <div class="border-top color-border-secondary pt-3 mt-3 clearfix hide-sm hide-md">
                            <h2 class="mb-2 h4">Organizations</h2>

                            <a aria-label="da-pms" itemprop="follows" class="avatar-group-item" data-hovercard-type="organization" data-hovercard-url="/orgs/da-pms/hovercard" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;MEMBER_ORGANIZATION_AVATAR&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="f52713df8f1ddfaa1028db860caf297812ba66b8cab3f1db30bef4d2e62ad125" href="/da-pms">
                                <img src="https://avatars.githubusercontent.com/u/86537749?s=60&amp;v=4" alt="@da-pms" size="32" height="32" width="32" class="avatar">
                            </a></div>



                    </div>
                </div>

                <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">      <div class="UnderlineNav user-profile-nav d-block d-md-none position-sticky top-0 pl-3 ml-n3
          mr-n3 pr-3 color-bg-primary" style="z-index:3;">
                        <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
                            <a aria-current="page" class="UnderlineNav-item selected" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_OVERVIEW&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="959844c3a75fd2f13efac672e162b683628209284258b3ceba6c3803ab4b3521" href="/mlab817">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-book UnderlineNav-octicon hide-sm">
                                    <path fill-rule="evenodd" d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                                </svg>
                                Overview
                            </a>
                            <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_REPOSITORIES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="f924ab4579c61cd05c898ad7e3183b7b85344244b6bdfa78ab496ae03889c3ea" href="/mlab817?tab=repositories">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-repo UnderlineNav-octicon hide-sm">
                                    <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                                </svg>
                                Repositories
                                <span title="93" class="Counter">93</span>
                            </a>
                            <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_PROJECTS&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="bbc9d8f193423d498386859c88af239662898b6bfceb0ba134c0fbf29f34a50b" href="/mlab817?tab=projects">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                </svg>
                                Projects
                                <span title="0" hidden="hidden" class="Counter">0</span>
                            </a>
                            <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="e833faa90508c3f719d379c705750a41656063ef985fff9f575786be012f2fe9" href="/mlab817?tab=packages">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-package UnderlineNav-octicon hide-sm">
                                    <path fill-rule="evenodd" d="M8.878.392a1.75 1.75 0 00-1.756 0l-5.25 3.045A1.75 1.75 0 001 4.951v6.098c0 .624.332 1.2.872 1.514l5.25 3.045a1.75 1.75 0 001.756 0l5.25-3.045c.54-.313.872-.89.872-1.514V4.951c0-.624-.332-1.2-.872-1.514L8.878.392zM7.875 1.69a.25.25 0 01.25 0l4.63 2.685L8 7.133 3.245 4.375l4.63-2.685zM2.5 5.677v5.372c0 .09.047.171.125.216l4.625 2.683V8.432L2.5 5.677zm6.25 8.271l4.625-2.683a.25.25 0 00.125-.216V5.677L8.75 8.432v5.516z"></path>
                                </svg>
                                Packages
                            </a>
                        </nav>

                    </div>
                    <div>

                        <div class="position-relative">



                            <div class="mt-4">
                                <div class="js-pinned-items-reorder-container">
                                    <details class="details-reset details-overlay details-overlay-dark" id="choose-pinned-repositories">
                                        <summary class="btn-link Link--muted float-right mt-1 pinned-items-setting-link" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;CUSTOMIZE_PINS_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="48daa982a8c577d52852a0d9321ea3b4ba04824cd4fed484eb9ac71050d69eaa" role="button">Customize your pins</summary>
                                        <details-dialog class="anim-fade-in fast Box Box--overlay d-flex flex-column" src="/users/mlab817/pinned_items_modal" preload="" role="dialog" aria-modal="true">
                                            <include-fragment class="py-5 text-center" tabindex="0" autofocus="">
                                                <div data-hide-on-error="">
                                                    <svg aria-label="Loading" style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="anim-rotate">
                                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                        <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                    </svg>
                                                </div>
                                                <div data-show-on-error="" hidden="">
                                                    Something went wrong.
                                                    <button data-retry-button="" type="submit" class="btn-link">

                                                        Retry.


                                                    </button>
                                                </div>
                                            </include-fragment>
                                        </details-dialog>
                                    </details>
                                    <h2 class="f4 mb-2 text-normal">
                                        Popular repositories
                                        <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="16" height="16" class="spinner pinned-items-spinner js-pinned-items-spinner v-align-text-bottom ml-1 anim-rotate">
                                            <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                        </svg>
                                        <span class="ml-2 color-text-secondary f6 js-pinned-items-reorder-message" role="status" aria-live="polite" data-error-text="Something went wrong." data-success-text="Order updated."></span>
                                    </h2>

                                    <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4">
                                        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                            <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                                <div class="pinned-item-list-item-content">
                                                    <div class="d-flex width-full flex-items-center position-relative">
                                                        <a href="/mlab817/lighthouse-graphql-permission" class="text-bold flex-auto min-width-0">
                                                            <span class="repo" title="lighthouse-graphql-permission">lighthouse-graphql-permission</span>
                                                        </a>
                                                        <span class="Label Label--secondary v-align-middle ">Archived</span>
                                                    </div>


                                                    <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">

                                                    </p>

                                                    <p class="mb-0 f6 color-text-secondary">
              <span class="d-inline-block mr-3">
  <span class="repo-language-color" style="background-color: #4F5D95"></span>
  <span itemprop="programmingLanguage">PHP</span>
</span>

                                                        <a href="/mlab817/lighthouse-graphql-permission/stargazers" class="pinned-item-meta Link--muted ">
                                                            <svg aria-label="stars" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-star">
                                                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                                            </svg>
                                                            2
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                            <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                                <div class="pinned-item-list-item-content">
                                                    <div class="d-flex width-full flex-items-center position-relative">
                                                        <a href="/mlab817/ipms-docs" class="text-bold flex-auto min-width-0">
                                                            <span class="repo" title="ipms-docs">ipms-docs</span>
                                                        </a>
                                                        <span class="Label Label--secondary v-align-middle ">Template</span>
                                                    </div>


                                                    <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">
                                                        Documentation for IPMS frontend
                                                    </p>

                                                    <p class="mb-0 f6 color-text-secondary">
              <span class="d-inline-block mr-3">
  <span class="repo-language-color" style="background-color: #f1e05a"></span>
  <span itemprop="programmingLanguage">JavaScript</span>
</span>

                                                        <a href="/mlab817/ipms-docs/stargazers" class="pinned-item-meta Link--muted ">
                                                            <svg aria-label="star" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-star">
                                                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                                            </svg>
                                                            1
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                            <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                                <div class="pinned-item-list-item-content">
                                                    <div class="d-flex width-full flex-items-center position-relative">
                                                        <a href="/mlab817/ta-alma" class="text-bold flex-auto min-width-0">
                                                            <span class="repo" title="ta-alma">ta-alma</span>
                                                        </a>
                                                        <span class="Label Label--secondary v-align-middle ">Archived</span>
                                                    </div>


                                                    <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">

                                                    </p>

                                                    <p class="mb-0 f6 color-text-secondary">
              <span class="d-inline-block mr-3">
  <span class="repo-language-color" style="background-color: #3572A5"></span>
  <span itemprop="programmingLanguage">Python</span>
</span>

                                                        <a href="/mlab817/ta-alma/stargazers" class="pinned-item-meta Link--muted ">
                                                            <svg aria-label="star" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-star">
                                                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                                            </svg>
                                                            1
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                            <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                                <div class="pinned-item-list-item-content">
                                                    <div class="d-flex width-full flex-items-center position-relative">
                                                        <a href="/mlab817/qpipol" class="text-bold flex-auto min-width-0">
                                                            <span class="repo" title="qpipol">qpipol</span>
                                                        </a>

                                                    </div>


                                                    <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">

                                                    </p>

                                                    <p class="mb-0 f6 color-text-secondary">
              <span class="d-inline-block mr-3">
  <span class="repo-language-color" style="background-color: #41b883"></span>
  <span itemprop="programmingLanguage">Vue</span>
</span>

                                                        <a href="/mlab817/qpipol/stargazers" class="pinned-item-meta Link--muted ">
                                                            <svg aria-label="star" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-star">
                                                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                                            </svg>
                                                            1
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                            <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                                <div class="pinned-item-list-item-content">
                                                    <div class="d-flex width-full flex-items-center position-relative">
                                                        <a href="/mlab817/lighthouse-graphql-laravel-permission" class="text-bold flex-auto min-width-0">
                                                            <span class="repo" title="lighthouse-graphql-laravel-permission">lighthouse-graphql-laravel-permission</span>
                                                        </a>

                                                    </div>


                                                    <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">

                                                    </p>

                                                    <p class="mb-0 f6 color-text-secondary">
              <span class="d-inline-block mr-3">
  <span class="repo-language-color" style="background-color: #4F5D95"></span>
  <span itemprop="programmingLanguage">PHP</span>
</span>

                                                        <a href="/mlab817/lighthouse-graphql-laravel-permission/stargazers" class="pinned-item-meta Link--muted ">
                                                            <svg aria-label="star" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-star">
                                                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                                            </svg>
                                                            1
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-6 col-lg-6">
                                            <div class="Box pinned-item-list-item d-flex p-3 width-full public source">
                                                <div class="pinned-item-list-item-content">
                                                    <div class="d-flex width-full flex-items-center position-relative">
                                                        <a href="/mlab817/ipms-v2" class="text-bold flex-auto min-width-0">
                                                            <span class="repo" title="ipms-v2">ipms-v2</span>
                                                        </a>

                                                    </div>


                                                    <p class="pinned-item-desc color-text-secondary text-small d-block mt-2 mb-3">

                                                    </p>

                                                    <p class="mb-0 f6 color-text-secondary">
              <span class="d-inline-block mr-3">
  <span class="repo-language-color" style="background-color: #e34c26"></span>
  <span itemprop="programmingLanguage">HTML</span>
</span>

                                                        <a href="/mlab817/ipms-v2/stargazers" class="pinned-item-meta Link--muted ">
                                                            <svg aria-label="star" role="img" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-star">
                                                                <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                                            </svg>
                                                            1
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>

                                </div>

                            </div>

                            <div class="mt-4 position-relative">

                                <div class="d-flex">
                                    <div class="col-12 col-lg-10">

                                        <div class="js-yearly-contributions">

                                            <div class="position-relative">




                                                <details class="details-reset details-overlay dropdown float-right mt-1">
                                                    <summary class="pinned-items-setting-link Link--muted " aria-haspopup="menu" role="button">
                                                        Contribution settings
                                                        <div class="dropdown-caret"></div>
                                                    </summary>

                                                    <details-menu class="dropdown-menu dropdown-menu-sw contributions-setting-menu" role="menu">
                                                        <!-- '"` --><!-- </textarea></xmp> --><form class="edit_user" action="/users/mlab817/set_private_contributions_preference" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="H2JNqUAxf3aUyGV73ezoNXhS12IYbyZ+GQMlh0ABa0SxWdWT7OvcGDOIl+yAV7QLbo1Gu2NDUC+01gwP1r9o5Q==">
                                                            <input type="hidden" name="return_to" id="return_to" value="profile" class="form-control">
                                                            <button name="user[show_private_contribution_count]" value="1" type="submit" class="dropdown-item ws-normal btn-link text-left pl-5 " role="menuitem">
                                                                <div class="text-bold">Private contributions</div>
                                                                <span class="f6 mt-1">
            Turning on private contributions will show anonymized
            private activity on your profile.
        </span>
                                                            </button>
                                                        </form>    <div role="none" class="dropdown-divider"></div>
                                                        <!-- '"` --><!-- </textarea></xmp> --><form class="edit_user" action="/users/mlab817/set_activity_overview_preference" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="qxzlS3i3AP+QzHxVbsrg2ye55cxC5X4dFpWiH3bggScOewTfevmF2MRkvgRrEP0K6roOYTfOa/J6Dit4nMDg8w==">
                                                            <button type="submit" name="user[activity_overview_enabled]" value="0" class="dropdown-item ws-normal btn-link text-left pl-5 " role="menuitem">
                                                                <svg class="octicon octicon-check select-menu-item-icon mt-1" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path></svg>
                                                                <div class="d-flex flex-items-center text-bold">
                                                                    Activity overview
                                                                </div>
                                                                <span class="f6 mt-1">
            Turning off the activity overview will hide the section on your profile.
        </span>
                                                            </button>
                                                        </form>  </details-menu>
                                                </details>


                                                <h2 class="f4 text-normal mb-2">
                                                    3,406
                                                    contributions
                                                    in the last year
                                                </h2>

                                                <div class="border py-2 graph-before-activity-overview">
                                                    <div class="js-calendar-graph mx-md-2 mx-3 d-flex flex-column flex-items-end flex-xl-items-center overflow-hidden pt-1 is-graph-loading graph-canvas ContributionCalendar height-full text-center" data-graph-url="/users/mlab817/contributions?to=2021-07-02" data-url="/mlab817" data-from="2020-06-28 00:00:00 +0800" data-to="2021-07-02 23:59:59 +0800" data-org="">

                                                        <svg width="722" height="112" class="js-calendar-graph-svg">
                                                            <g transform="translate(10, 20)" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;CONTRIBUTION_CALENDAR_SQUARE&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="0261f12d8bd967a316fc026b8d0a26a56a2ab4db61f545db10e748e2bcafb94f">
                                                                <g transform="translate(0, 0)">
                                                                    <rect width="10" height="10" x="14" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-06-28" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="14" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-06-29" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="14" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2020-06-30" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="14" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2020-07-01" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="14" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="11" data-date="2020-07-02" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="14" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2020-07-03" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="14" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2020-07-04" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(14, 0)">
                                                                    <rect width="10" height="10" x="13" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="19" data-date="2020-07-05" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="13" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="26" data-date="2020-07-06" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="13" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="13" data-date="2020-07-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="13" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="27" data-date="2020-07-08" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="13" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="17" data-date="2020-07-09" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="13" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-07-10" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="13" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="17" data-date="2020-07-11" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(28, 0)">
                                                                    <rect width="10" height="10" x="12" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2020-07-12" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="12" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="29" data-date="2020-07-13" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="12" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2020-07-14" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="12" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-07-15" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="12" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="17" data-date="2020-07-16" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="12" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-07-17" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="12" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-07-18" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(42, 0)">
                                                                    <rect width="10" height="10" x="11" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2020-07-19" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="11" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="58" data-date="2020-07-20" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="11" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2020-07-21" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="11" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2020-07-22" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="11" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2020-07-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="11" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-07-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="11" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-07-25" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(56, 0)">
                                                                    <rect width="10" height="10" x="10" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2020-07-26" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="10" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-07-27" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="10" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-07-28" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="10" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-07-29" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="10" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="16" data-date="2020-07-30" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="10" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-07-31" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="10" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-08-01" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(70, 0)">
                                                                    <rect width="10" height="10" x="9" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-08-02" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="9" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-08-03" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="9" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-08-04" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="9" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-08-05" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="9" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2020-08-06" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="9" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-08-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="9" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2020-08-08" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(84, 0)">
                                                                    <rect width="10" height="10" x="8" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2020-08-09" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="8" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-08-10" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="8" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2020-08-11" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="8" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-08-12" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="8" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-08-13" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="8" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-08-14" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="8" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="13" data-date="2020-08-15" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(98, 0)">
                                                                    <rect width="10" height="10" x="7" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2020-08-16" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="7" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="16" data-date="2020-08-17" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="7" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-08-18" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="7" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-08-19" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="7" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-08-20" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="7" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-08-21" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="7" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2020-08-22" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(112, 0)">
                                                                    <rect width="10" height="10" x="6" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-08-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="6" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-08-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="6" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2020-08-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="6" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-08-26" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="6" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-08-27" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="6" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-08-28" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="6" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-08-29" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(126, 0)">
                                                                    <rect width="10" height="10" x="5" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-08-30" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="5" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-08-31" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="5" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-09-01" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="5" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-02" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="5" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-09-03" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="5" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-04" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="5" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-09-05" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(140, 0)">
                                                                    <rect width="10" height="10" x="4" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-09-06" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="4" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-09-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="4" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-08" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="4" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-09-09" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="4" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-09-10" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="4" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="11" data-date="2020-09-11" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="4" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="18" data-date="2020-09-12" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(154, 0)">
                                                                    <rect width="10" height="10" x="3" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-09-13" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="3" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-09-14" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="3" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2020-09-15" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="3" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-09-16" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="3" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-09-17" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="3" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-18" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="3" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-19" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(168, 0)">
                                                                    <rect width="10" height="10" x="2" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2020-09-20" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="2" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-09-21" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="2" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="14" data-date="2020-09-22" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="2" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="25" data-date="2020-09-23" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="2" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2020-09-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="2" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-09-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="2" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-26" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(182, 0)">
                                                                    <rect width="10" height="10" x="1" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-09-27" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="1" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-28" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="1" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-29" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="1" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-09-30" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="1" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-01" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="1" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2020-10-02" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="1" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-03" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(196, 0)">
                                                                    <rect width="10" height="10" x="0" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-04" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="0" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-05" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="0" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-06" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="0" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-10-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="0" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-08" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="0" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-09" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="0" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-10" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(210, 0)">
                                                                    <rect width="10" height="10" x="-1" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2020-10-11" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-1" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-10-12" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-1" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-10-13" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-1" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-10-14" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-1" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-10-15" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-1" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-10-16" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-1" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="27" data-date="2020-10-17" data-level="2"></rect>
                                                                </g>
                                                                <g transform="translate(224, 0)">
                                                                    <rect width="10" height="10" x="-2" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="41" data-date="2020-10-18" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-2" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="70" data-date="2020-10-19" data-level="4"></rect>
                                                                    <rect width="10" height="10" x="-2" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="48" data-date="2020-10-20" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-2" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="42" data-date="2020-10-21" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-2" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="81" data-date="2020-10-22" data-level="4"></rect>
                                                                    <rect width="10" height="10" x="-2" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="13" data-date="2020-10-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-2" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="34" data-date="2020-10-24" data-level="2"></rect>
                                                                </g>
                                                                <g transform="translate(238, 0)">
                                                                    <rect width="10" height="10" x="-3" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="44" data-date="2020-10-25" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-3" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="22" data-date="2020-10-26" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-3" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="28" data-date="2020-10-27" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-3" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="104" data-date="2020-10-28" data-level="4"></rect>
                                                                    <rect width="10" height="10" x="-3" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="46" data-date="2020-10-29" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-3" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="30" data-date="2020-10-30" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-3" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="24" data-date="2020-10-31" data-level="2"></rect>
                                                                </g>
                                                                <g transform="translate(252, 0)">
                                                                    <rect width="10" height="10" x="-4" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="80" data-date="2020-11-01" data-level="4"></rect>
                                                                    <rect width="10" height="10" x="-4" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="53" data-date="2020-11-02" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-4" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="44" data-date="2020-11-03" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-4" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="35" data-date="2020-11-04" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-4" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="13" data-date="2020-11-05" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-4" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="14" data-date="2020-11-06" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-4" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2020-11-07" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(266, 0)">
                                                                    <rect width="10" height="10" x="-5" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="44" data-date="2020-11-08" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-5" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="34" data-date="2020-11-09" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-5" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="81" data-date="2020-11-10" data-level="4"></rect>
                                                                    <rect width="10" height="10" x="-5" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-11-11" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-5" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-11-12" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-5" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2020-11-13" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-5" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="26" data-date="2020-11-14" data-level="2"></rect>
                                                                </g>
                                                                <g transform="translate(280, 0)">
                                                                    <rect width="10" height="10" x="-6" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2020-11-15" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-6" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2020-11-16" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-6" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2020-11-17" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-6" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="25" data-date="2020-11-18" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-6" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="11" data-date="2020-11-19" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-6" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2020-11-20" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-6" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-11-21" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(294, 0)">
                                                                    <rect width="10" height="10" x="-7" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2020-11-22" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-7" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="20" data-date="2020-11-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-7" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="11" data-date="2020-11-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-7" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-11-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-7" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-11-26" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-7" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-11-27" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-7" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-11-28" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(308, 0)">
                                                                    <rect width="10" height="10" x="-8" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-11-29" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-8" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-11-30" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-8" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-01" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-8" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-12-02" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-8" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-03" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-8" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-04" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-8" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-05" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(322, 0)">
                                                                    <rect width="10" height="10" x="-9" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-06" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-9" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-12-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-9" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-08" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-9" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-09" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-9" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-10" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-9" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-11" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-9" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="13" data-date="2020-12-12" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(336, 0)">
                                                                    <rect width="10" height="10" x="-10" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="17" data-date="2020-12-13" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-10" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-12-14" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-10" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-15" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-10" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-16" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-10" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-17" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-10" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-18" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-10" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-19" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(350, 0)">
                                                                    <rect width="10" height="10" x="-11" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2020-12-20" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-11" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-21" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-11" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-22" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-11" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2020-12-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-11" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2020-12-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-11" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2020-12-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-11" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-26" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(364, 0)">
                                                                    <rect width="10" height="10" x="-12" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2020-12-27" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-12" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2020-12-28" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-12" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="69" data-date="2020-12-29" data-level="4"></rect>
                                                                    <rect width="10" height="10" x="-12" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="15" data-date="2020-12-30" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-12" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2020-12-31" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-12" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="16" data-date="2021-01-01" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-12" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="15" data-date="2021-01-02" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(378, 0)">
                                                                    <rect width="10" height="10" x="-13" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-01-03" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-13" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2021-01-04" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-13" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-01-05" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-13" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="18" data-date="2021-01-06" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-13" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="36" data-date="2021-01-07" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-13" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-01-08" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-13" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-01-09" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(392, 0)">
                                                                    <rect width="10" height="10" x="-14" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2021-01-10" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-14" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="15" data-date="2021-01-11" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-14" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="4" data-date="2021-01-12" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-14" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="21" data-date="2021-01-13" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-14" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2021-01-14" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-14" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2021-01-15" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-14" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-16" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(406, 0)">
                                                                    <rect width="10" height="10" x="-15" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-17" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-15" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-18" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-15" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-19" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-15" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-20" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-15" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-01-21" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-15" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-22" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-15" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-01-23" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(420, 0)">
                                                                    <rect width="10" height="10" x="-16" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2021-01-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-16" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-01-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-16" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-01-26" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-16" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="15" data-date="2021-01-27" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-16" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-01-28" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-16" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="13" data-date="2021-01-29" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-16" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-30" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(434, 0)">
                                                                    <rect width="10" height="10" x="-17" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-01-31" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-17" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-01" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-17" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-02" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-17" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-03" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-17" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-04" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-17" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-02-05" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-17" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-06" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(448, 0)">
                                                                    <rect width="10" height="10" x="-18" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-07" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-18" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-08" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-18" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-09" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-18" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-02-10" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-18" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-11" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-18" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-12" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-18" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-13" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(462, 0)">
                                                                    <rect width="10" height="10" x="-19" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-14" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-19" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-15" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-19" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-16" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-19" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-17" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-19" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-18" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-19" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-19" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-19" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2021-02-20" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(476, 0)">
                                                                    <rect width="10" height="10" x="-20" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2021-02-21" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-20" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-02-22" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-20" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2021-02-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-20" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-02-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-20" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-25" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-20" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2021-02-26" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-20" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-27" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(490, 0)">
                                                                    <rect width="10" height="10" x="-21" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-02-28" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-21" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-03-01" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-21" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2021-03-02" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-21" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-03" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-21" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-04" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-21" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-05" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-21" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2021-03-06" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(504, 0)">
                                                                    <rect width="10" height="10" x="-22" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-03-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-22" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-03-08" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-22" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-03-09" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-22" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-03-10" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-22" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2021-03-11" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-22" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="25" data-date="2021-03-12" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-22" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-13" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(518, 0)">
                                                                    <rect width="10" height="10" x="-23" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-03-14" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-23" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="11" data-date="2021-03-15" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-23" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="36" data-date="2021-03-16" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-23" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="18" data-date="2021-03-17" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-23" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="31" data-date="2021-03-18" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-23" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="39" data-date="2021-03-19" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-23" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-20" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(532, 0)">
                                                                    <rect width="10" height="10" x="-24" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-21" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-24" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2021-03-22" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-24" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-03-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-24" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-03-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-24" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-03-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-24" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-26" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-24" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-03-27" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(546, 0)">
                                                                    <rect width="10" height="10" x="-25" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-28" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-25" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-29" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-25" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-03-30" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-25" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2021-03-31" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-25" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2021-04-01" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-25" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-02" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-25" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-04-03" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(560, 0)">
                                                                    <rect width="10" height="10" x="-26" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-04-04" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-26" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="1" data-date="2021-04-05" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-26" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2021-04-06" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-26" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-07" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-26" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-08" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-26" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-09" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-26" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-10" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(574, 0)">
                                                                    <rect width="10" height="10" x="-27" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-11" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-27" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-12" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-27" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-13" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-27" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-14" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-27" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-15" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-27" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-16" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-27" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-17" data-level="0"></rect>
                                                                </g>
                                                                <g transform="translate(588, 0)">
                                                                    <rect width="10" height="10" x="-28" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-18" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-28" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-19" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-28" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-04-20" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-28" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="11" data-date="2021-04-21" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-28" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-04-22" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-28" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="8" data-date="2021-04-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-28" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-04-24" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(602, 0)">
                                                                    <rect width="10" height="10" x="-29" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-04-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-29" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-04-26" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-29" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-04-27" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-29" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-04-28" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-29" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-04-29" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-29" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-04-30" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-29" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-05-01" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(616, 0)">
                                                                    <rect width="10" height="10" x="-30" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="18" data-date="2021-05-02" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-30" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-05-03" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-30" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-05-04" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-30" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-05-05" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-30" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-05-06" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-30" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-05-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-30" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="15" data-date="2021-05-08" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(630, 0)">
                                                                    <rect width="10" height="10" x="-31" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="63" data-date="2021-05-09" data-level="4"></rect>
                                                                    <rect width="10" height="10" x="-31" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-05-10" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-31" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-05-11" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-31" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-05-12" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-31" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-05-13" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-31" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-05-14" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-31" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="30" data-date="2021-05-15" data-level="2"></rect>
                                                                </g>
                                                                <g transform="translate(644, 0)">
                                                                    <rect width="10" height="10" x="-32" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-05-16" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-32" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-05-17" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-32" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-05-18" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-32" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-05-19" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-32" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="19" data-date="2021-05-20" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-32" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="21" data-date="2021-05-21" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-32" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2021-05-22" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(658, 0)">
                                                                    <rect width="10" height="10" x="-33" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-05-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-33" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="42" data-date="2021-05-24" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-33" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="30" data-date="2021-05-25" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-33" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="12" data-date="2021-05-26" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-33" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-05-27" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-33" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-05-28" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-33" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="15" data-date="2021-05-29" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(672, 0)">
                                                                    <rect width="10" height="10" x="-34" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2021-05-30" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-34" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="9" data-date="2021-05-31" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-34" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-06-01" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-34" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="26" data-date="2021-06-02" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-34" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2021-06-03" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-34" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="33" data-date="2021-06-04" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-34" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-06-05" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(686, 0)">
                                                                    <rect width="10" height="10" x="-35" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-06-06" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-35" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-06-07" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-35" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="25" data-date="2021-06-08" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-35" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="15" data-date="2021-06-09" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-35" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="33" data-date="2021-06-10" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-35" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="37" data-date="2021-06-11" data-level="2"></rect>
                                                                    <rect width="10" height="10" x="-35" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="28" data-date="2021-06-12" data-level="2"></rect>
                                                                </g>
                                                                <g transform="translate(700, 0)">
                                                                    <rect width="10" height="10" x="-36" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="0" data-date="2021-06-13" data-level="0"></rect>
                                                                    <rect width="10" height="10" x="-36" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="45" data-date="2021-06-14" data-level="3"></rect>
                                                                    <rect width="10" height="10" x="-36" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2021-06-15" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-36" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="17" data-date="2021-06-16" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-36" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="13" data-date="2021-06-17" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-36" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-06-18" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-36" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-06-19" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(714, 0)">
                                                                    <rect width="10" height="10" x="-37" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2021-06-20" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-37" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2021-06-21" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-37" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-06-22" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-37" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2021-06-23" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-37" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2021-06-24" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-37" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2021-06-25" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-37" y="78" class="ContributionCalendar-day" rx="2" ry="2" data-count="10" data-date="2021-06-26" data-level="1"></rect>
                                                                </g>
                                                                <g transform="translate(728, 0)">
                                                                    <rect width="10" height="10" x="-38" y="0" class="ContributionCalendar-day" rx="2" ry="2" data-count="7" data-date="2021-06-27" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-38" y="13" class="ContributionCalendar-day" rx="2" ry="2" data-count="2" data-date="2021-06-28" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-38" y="26" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-06-29" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-38" y="39" class="ContributionCalendar-day" rx="2" ry="2" data-count="3" data-date="2021-06-30" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-38" y="52" class="ContributionCalendar-day" rx="2" ry="2" data-count="5" data-date="2021-07-01" data-level="1"></rect>
                                                                    <rect width="10" height="10" x="-38" y="65" class="ContributionCalendar-day" rx="2" ry="2" data-count="6" data-date="2021-07-02" data-level="1"></rect>
                                                                </g>
                                                                <text x="27" y="-7" class="ContributionCalendar-label">Jul</text>
                                                                <text x="79" y="-7" class="ContributionCalendar-label">Aug</text>
                                                                <text x="144" y="-7" class="ContributionCalendar-label">Sep</text>
                                                                <text x="196" y="-7" class="ContributionCalendar-label">Oct</text>
                                                                <text x="248" y="-7" class="ContributionCalendar-label">Nov</text>
                                                                <text x="313" y="-7" class="ContributionCalendar-label">Dec</text>
                                                                <text x="365" y="-7" class="ContributionCalendar-label">Jan</text>
                                                                <text x="430" y="-7" class="ContributionCalendar-label">Feb</text>
                                                                <text x="482" y="-7" class="ContributionCalendar-label">Mar</text>
                                                                <text x="534" y="-7" class="ContributionCalendar-label">Apr</text>
                                                                <text x="586" y="-7" class="ContributionCalendar-label">May</text>
                                                                <text x="651" y="-7" class="ContributionCalendar-label">Jun</text>
                                                                <text text-anchor="start" class="ContributionCalendar-label" dx="-10" dy="8" style="display: none;">Sun</text>
                                                                <text text-anchor="start" class="ContributionCalendar-label" dx="-10" dy="22">Mon</text>
                                                                <text text-anchor="start" class="ContributionCalendar-label" dx="-10" dy="32" style="display: none;">Tue</text>
                                                                <text text-anchor="start" class="ContributionCalendar-label" dx="-10" dy="48">Wed</text>
                                                                <text text-anchor="start" class="ContributionCalendar-label" dx="-10" dy="57" style="display: none;">Thu</text>
                                                                <text text-anchor="start" class="ContributionCalendar-label" dx="-10" dy="73">Fri</text>
                                                                <text text-anchor="start" class="ContributionCalendar-label" dx="-10" dy="81" style="display: none;">Sat</text>
                                                            </g></svg>

                                                        <div class="width-full f6 px-0 px-md-5 py-1">
                                                            <div class="float-left">


                                                                <a href="https://docs.github.com/articles/why-are-my-contributions-not-showing-up-on-my-profile" class="Link--muted">
                                                                    Learn how we count contributions</a>
                                                            </div>
                                                            <div class="float-right color-text-secondary" title="A summary of pull requests, issues opened, and commits to the default and gh-pages branches.">
                                                                Less
                                                                <svg width="10" height="10" class="d-inline-block">
                                                                    <rect width="10" height="10" class="ContributionCalendar-day" rx="2" ry="2" data-level="0"></rect>
                                                                </svg>
                                                                <svg width="10" height="10" class="d-inline-block">
                                                                    <rect width="10" height="10" class="ContributionCalendar-day" rx="2" ry="2" data-level="1"></rect>
                                                                </svg>
                                                                <svg width="10" height="10" class="d-inline-block">
                                                                    <rect width="10" height="10" class="ContributionCalendar-day" rx="2" ry="2" data-level="2"></rect>
                                                                </svg>
                                                                <svg width="10" height="10" class="d-inline-block">
                                                                    <rect width="10" height="10" class="ContributionCalendar-day" rx="2" ry="2" data-level="3"></rect>
                                                                </svg>
                                                                <svg width="10" height="10" class="d-inline-block">
                                                                    <rect width="10" height="10" class="ContributionCalendar-day" rx="2" ry="2" data-level="4"></rect>
                                                                </svg>
                                                                More
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="position-relative" id="user-activity-overview">


                                                <div class="Box mb-5 p-3 activity-overview-box border-top border-xl-top-0">

                                                    <div class="js-org-filter-links-container">
                                                        <nav class="subnav mb-2 d-flex flex-wrap">

                                                            <a style="max-width: 181px;" class="js-org-filter-link f6 py-1 pr-2 pl-1 rounded-1 mr-2 mb-2 subnav-item css-truncate css-truncate-target " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.highlights_click&quot;,&quot;payload&quot;:{&quot;scoped_org_id&quot;:null,&quot;target_type&quot;:&quot;ORGANIZATION&quot;,&quot;target_url&quot;:&quot;/mlab817?tab=overview&amp;org=cloudcake&quot;,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;,&quot;user_id&quot;:29625844}}" data-hydro-click-hmac="70c3d161e48def076e0bac0569e2317bb02d949cdffe8c19a13fab9b0559aa34" data-hovercard-type="organization" data-hovercard-url="/orgs/cloudcake/hovercard" href="/mlab817?tab=overview&amp;org=cloudcake">
                                                                <img class="avatar mr-1" alt="" height="20" width="20" src="https://avatars.githubusercontent.com/u/58486426?s=60&amp;v=4">
                                                                @cloudcake
                                                            </a>
                                                            <a style="max-width: 181px;" class="js-org-filter-link f6 py-1 pr-2 pl-1 rounded-1 mr-2 mb-2 subnav-item css-truncate css-truncate-target " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.highlights_click&quot;,&quot;payload&quot;:{&quot;scoped_org_id&quot;:null,&quot;target_type&quot;:&quot;ORGANIZATION&quot;,&quot;target_url&quot;:&quot;/mlab817?tab=overview&amp;org=alpinejs&quot;,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;,&quot;user_id&quot;:29625844}}" data-hydro-click-hmac="33cf4bbe43a8f41c830d758b221f3049afdf2ca12d1184f57f5c438e4270076f" data-hovercard-type="organization" data-hovercard-url="/orgs/alpinejs/hovercard" href="/mlab817?tab=overview&amp;org=alpinejs">
                                                                <img class="avatar mr-1" alt="" height="20" width="20" src="https://avatars.githubusercontent.com/u/59030169?s=60&amp;v=4">
                                                                @alpinejs
                                                            </a>
                                                        </nav>
                                                    </div>


                                                    <div class="d-flex flex-column flex-lg-row">
                                                        <div class="col-12 col-lg-6 d-flex flex-column pr-lg-5">
                                                            <h5 class="mb-3 text-normal">
                                                                Activity
                                                                overview
                                                            </h5>

                                                            <div class="d-flex mb-2">
                                                                <svg class="octicon octicon-repo color-text-secondary mt-1 mr-2 flex-shrink-0" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path></svg>
                                                                <div class="break-word" data-repository-hovercards-enabled="">
                                                                    Contributed to
                                                                    <a href="/mlab817/ipmsv3" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.highlights_click&quot;,&quot;payload&quot;:{&quot;scoped_org_id&quot;:null,&quot;target_type&quot;:&quot;REPOSITORY&quot;,&quot;target_url&quot;:&quot;/mlab817/ipmsv3&quot;,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;,&quot;user_id&quot;:29625844}}" data-hydro-click-hmac="4bfbd46bbc9db89a15f700498e6b23b0caf649e81547c685230a72830959f406" data-hovercard-type="repository" data-hovercard-url="/mlab817/ipmsv3/hovercard" class="text-bold css-truncate css-truncate-target " style="max-width: 228px;">mlab817/ipmsv3</a>,
                                                                    <a href="/mlab817/pips" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.highlights_click&quot;,&quot;payload&quot;:{&quot;scoped_org_id&quot;:null,&quot;target_type&quot;:&quot;REPOSITORY&quot;,&quot;target_url&quot;:&quot;/mlab817/pips&quot;,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;,&quot;user_id&quot;:29625844}}" data-hydro-click-hmac="e76a9c167d8bb7879964b9746a23c20c71f54517040ce8df6210ce16aa896db5" data-hovercard-type="repository" data-hovercard-url="/mlab817/pips/hovercard" class="text-bold css-truncate css-truncate-target " style="max-width: 228px;">mlab817/pips</a>,
                                                                    <a href="/mlab817/ipms-v2" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.highlights_click&quot;,&quot;payload&quot;:{&quot;scoped_org_id&quot;:null,&quot;target_type&quot;:&quot;REPOSITORY&quot;,&quot;target_url&quot;:&quot;/mlab817/ipms-v2&quot;,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;,&quot;user_id&quot;:29625844}}" data-hydro-click-hmac="d828b664eeedd3919623bee87aaa7ba30c4303e964236f3fc075f6831031778d" data-hovercard-type="repository" data-hovercard-url="/mlab817/ipms-v2/hovercard" class="text-bold css-truncate css-truncate-target " style="max-width: 228px;">mlab817/ipms-v2</a>
                                                                    <span class="no-wrap">
          and 5 other
          repositories
        </span>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="pl-lg-3 col-6 border-lg-left">

                                                            <div class="js-activity-overview-graph-container" data-percentages="{&quot;Commits&quot;:67,&quot;Issues&quot;:33,&quot;Pull requests&quot;:0,&quot;Code review&quot;:0}">
                                                                <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="32" height="32" class="js-activity-overview-graph-spinner mx-auto mt-4 anim-rotate d-none">
                                                                    <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                                </svg>
                                                                <svg class="js-activity-overview-graph mx-auto d-block" xmlns="http://www.w3.org/2000/svg" width="289" height="239">
                                                                    <g transform="translate(-20.03125, -46.375)">
                                                                        <path class="js-highlight-blob" stroke-linejoin="round" fill="#40c463" stroke="#40c463" stroke-width="7" d="M171.5,171.5 L212.875,171.5 L171.5,171.5 L83.375,171.5 z"></path>
                                                                        <line stroke-width="2" stroke-linecap="round" class="js-highlight-x-axis activity-overview-axis " x1="79.375" y1="171.5" x2="263.625" y2="171.5"></line>
                                                                        <line stroke-width="2" stroke-linecap="round" class="js-highlight-y-axis activity-overview-axis " x1="171.5" y1="79.375" x2="171.5" y2="263.625"></line>
                                                                        <ellipse class="activity-overview-point js-highlight-top-ellipse d-none" rx="3" ry="3" stroke-width="2" fill="white"></ellipse>
                                                                        <ellipse class="activity-overview-point js-highlight-right-ellipse " rx="3" ry="3" stroke-width="2" fill="white" cx="214.875" cy="171.5"></ellipse>
                                                                        <ellipse class="activity-overview-point js-highlight-bottom-ellipse d-none" rx="3" ry="3" stroke-width="2" fill="white"></ellipse>
                                                                        <ellipse class="activity-overview-point js-highlight-left-ellipse " rx="3" ry="3" stroke-width="2" fill="white" cx="81.375" cy="171.5"></ellipse>
                                                                        <text text-anchor="middle" class="activity-overview-percentage js-highlight-percent-top" dx="171.5" dy="55.375">&nbsp;</text>
                                                                        <text text-anchor="middle" class="text-small activity-overview-label js-highlight-label-top" dx="171.5" dy="69.375">Code review</text>
                                                                        <text text-anchor="start" class="activity-overview-percentage js-highlight-percent-right" dy="169" dx="280.90625">33%</text>
                                                                        <text text-anchor="start" class="text-small activity-overview-label js-highlight-label-right" dy="183" dx="273.625">Issues</text>
                                                                        <text text-anchor="middle" class="activity-overview-percentage js-highlight-percent-bottom" dx="171.5" dy="267.625">&nbsp;</text>
                                                                        <text text-anchor="middle" class="text-small activity-overview-label js-highlight-label-bottom" dx="171.5" dy="281.625">Pull requests</text>
                                                                        <text text-anchor="end" class="activity-overview-percentage js-highlight-percent-left" dy="169" dx="53.765625">67%</text>
                                                                        <text text-anchor="end" class="text-small activity-overview-label js-highlight-label-left" dy="183" dx="67.375">Commits</text>
                                                                    </g>
                                                                </svg>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div id="js-contribution-activity" class="activity-listing contribution-activity" data-pjax-container="">


                                            <h2 class="f4 text-normal mt-4 mb-3">
                                                Contribution activity
                                            </h2>


                                            <div class="contribution-activity-listing float-left col-12 ">
                                                <div class="width-full pb-4">
                                                    <h3 class="h6 pr-2 py-1 border-bottom mb-3" style="height: 14px;">
                                                        <span class="color-bg-canvas pl-2 pr-3">July <span class="color-text-secondary">2021</span></span>
                                                    </h3>


                                                    <div class="TimelineItem">

                                                        <div class="TimelineItem-badge"><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-repo-push">
                                                                <path fill-rule="evenodd" d="M1 2.5A2.5 2.5 0 013.5 0h8.75a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0V1.5h-8a1 1 0 00-1 1v6.708A2.492 2.492 0 013.5 9h3.25a.75.75 0 010 1.5H3.5a1 1 0 100 2h5.75a.75.75 0 010 1.5H3.5A2.5 2.5 0 011 11.5v-9zm13.23 7.79a.75.75 0 001.06-1.06l-2.505-2.505a.75.75 0 00-1.06 0L9.22 9.229a.75.75 0 001.06 1.061l1.225-1.224v6.184a.75.75 0 001.5 0V9.066l1.224 1.224z"></path>
                                                            </svg></div>
                                                        <div class="TimelineItem-body">      <details open="open" class="Details-element details-reset">
                                                                <summary role="button" class="btn-link f4 Link--muted no-underline lh-condensed width-full">          <span class="color-text-primary ws-normal text-left">
            Created 6
            commits in
            1
            repository
          </span>
                                                                    <span class="d-inline-block float-right color-icon-secondary">
            <span class="Details-content--open float-right" aria_label="Collapse" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_CATEGORY_ROLLUP_COLLAPSE&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="5694f93ed046ab681aee382df6bf11c1cfe807ae1702a655ec9c4c43652811f5"><svg class="octicon octicon-fold" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M10.896 2H8.75V.75a.75.75 0 00-1.5 0V2H5.104a.25.25 0 00-.177.427l2.896 2.896a.25.25 0 00.354 0l2.896-2.896A.25.25 0 0010.896 2zM8.75 15.25a.75.75 0 01-1.5 0V14H5.104a.25.25 0 01-.177-.427l2.896-2.896a.25.25 0 01.354 0l2.896 2.896a.25.25 0 01-.177.427H8.75v1.25zm-6.5-6.5a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM6 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 016 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM12 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 0112 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5z"></path></svg></span>
            <span class="Details-content--closed float-right" aria_label="Expand" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_CATEGORY_ROLLUP_EXPAND&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="8aea90f32403735f2916bdec944fe951d6b350ee58a557adc912a588f994990e"><svg class="octicon octicon-unfold" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8.177.677l2.896 2.896a.25.25 0 01-.177.427H8.75v1.25a.75.75 0 01-1.5 0V4H5.104a.25.25 0 01-.177-.427L7.823.677a.25.25 0 01.354 0zM7.25 10.75a.75.75 0 011.5 0V12h2.146a.25.25 0 01.177.427l-2.896 2.896a.25.25 0 01-.354 0l-2.896-2.896A.25.25 0 015.104 12H7.25v-1.25zm-5-2a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM6 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 016 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM12 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 0112 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5z"></path></svg></span>
          </span>
                                                                </summary>
                                                                <div data-view-component="true">          <ul class="list-style-none mt-1" data-repository-hovercards-enabled="">

                                                                        <li class="ml-0 py-1 d-flex">
                                                                            <div class="col-8 css-truncate css-truncate-target lh-condensed width-fit flex-auto min-width-0">
                                                                                <a data-hovercard-type="repository" data-hovercard-url="/mlab817/pips/hovercard" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_REPO_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="7966c67b91d481e3e769b42e3aaa5988c787baeb5b083355a80b61143f1fa1ca" href="/mlab817/pips">mlab817/pips</a>
                                                                                <a class="f6 Link--muted ml-lg-1 mt-1 mt-lg-0 d-block d-lg-inline " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_COMMIT_RANGE&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="8846e3313e7ca567b471d1824d1eefcf11197970c2d786ddf8fed31e8f14de3a" href="/mlab817/pips/commits?author=mlab817&amp;since=2021-06-30&amp;until=2021-07-02">
                                                                                    6 commits
                                                                                </a>    </div>

                                                                            <div class="col-3 flex-shrink-0">
                                                                                <div class="Progress mt-1 tooltipped tooltipped-n color-bg-primary" aria-label="100% of commits in July were made to mlab817/pips ">
                                                                                    <span class="Progress-item rounded-2" style="width: 100%;background-color: #216e39"></span>
                                                                                </div>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </details></div>
                                                    </div>














                                                    <div class="TimelineItem">

                                                        <div class="TimelineItem-badge"><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-flame">
                                                                <path fill-rule="evenodd" d="M7.998 14.5c2.832 0 5-1.98 5-4.5 0-1.463-.68-2.19-1.879-3.383l-.036-.037c-1.013-1.008-2.3-2.29-2.834-4.434-.322.256-.63.579-.864.953-.432.696-.621 1.58-.046 2.73.473.947.67 2.284-.278 3.232-.61.61-1.545.84-2.403.633a2.788 2.788 0 01-1.436-.874A3.21 3.21 0 003 10c0 2.53 2.164 4.5 4.998 4.5zM9.533.753C9.496.34 9.16.009 8.77.146 7.035.75 4.34 3.187 5.997 6.5c.344.689.285 1.218.003 1.5-.419.419-1.54.487-2.04-.832-.173-.454-.659-.762-1.035-.454C2.036 7.44 1.5 8.702 1.5 10c0 3.512 2.998 6 6.498 6s6.5-2.5 6.5-6c0-2.137-1.128-3.26-2.312-4.438-1.19-1.184-2.436-2.425-2.653-4.81z"></path>
                                                            </svg></div>
                                                        <div data-repository-hovercards-enabled="true" data-issue-and-pr-hovercards-enabled="true" class="TimelineItem-body">    <div class="d-flex flex-justify-between flex-items-baseline mb-3">
                                                                <h4 class="text-normal color-text-primary lh-condensed my-0 pr-3">
                                                                    Created an issue in
                                                                    <a class="Link--primary " data-hovercard-type="repository" data-hovercard-url="/Ionaru/easy-markdown-editor/hovercard" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_REPO_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="7966c67b91d481e3e769b42e3aaa5988c787baeb5b083355a80b61143f1fa1ca" href="/Ionaru/easy-markdown-editor">Ionaru/easy-markdown-editor</a>
                                                                    that received 1
                                                                    comment
                                                                </h4>
                                                                <a class="f6 color-text-tertiary Link--muted no-wrap" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_DATE_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="9db5da7f1ff1b76c33a0b1f595c632c7db0c47b8cadd76a0d1695703b795a078" href="/mlab817?tab=overview&amp;from=2021-07-01&amp;to=2021-07-31">
                                                                    <time class="no-wrap">Jul 1</time>
                                                                </a>    </div>

                                                            <div class="Box p-3">
                                                                <svg class="octicon octicon-issue-closed color-text-danger d-inline-block mt-1 float-left" title="Closed" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path></svg>
                                                                <div class="ml-4">
                                                                    <h3 class="lh-condensed my-0">
                                                                        <a class="color-text-primary markdown-title" data-hovercard-type="issue" data-hovercard-url="/Ionaru/easy-markdown-editor/issues/340/hovercard" href="/Ionaru/easy-markdown-editor/issues/340">How to remove EasyMDE that is programmatically added?</a>
                                                                    </h3>

                                                                    <div class="color-text-secondary mb-0 mt-2 ">
                                                                        <p>I am trying to make a feature where when a user clicks on a textarea, EasyMDE is added to that textarea. I am using the following code to do that:
                                                                            <code>l…</code></p>
                                                                    </div>
                                                                    <div class="f6 color-text-secondary d-inline-flex flex-row flex-items-center">
                                                                        1
                                                                        comment
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="TimelineItem">

                                                        <div class="TimelineItem-badge"><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-issue-opened">
                                                                <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                                            </svg></div>
                                                        <div class="TimelineItem-body">      <details open="open" class="Details-element details-reset">
                                                                <summary role="button" class="btn-link f4 Link--muted no-underline lh-condensed width-full">          <span class="float-left ws-normal text-left color-text-primary">
            Opened 2
            other
            issues
            in 1
            repository
          </span>
                                                                    <span class="d-inline-block float-right">
            <span class="Details-content--open float-right" aria_label="Collapse" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_CATEGORY_ROLLUP_COLLAPSE&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="5694f93ed046ab681aee382df6bf11c1cfe807ae1702a655ec9c4c43652811f5"><svg class="octicon octicon-fold" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M10.896 2H8.75V.75a.75.75 0 00-1.5 0V2H5.104a.25.25 0 00-.177.427l2.896 2.896a.25.25 0 00.354 0l2.896-2.896A.25.25 0 0010.896 2zM8.75 15.25a.75.75 0 01-1.5 0V14H5.104a.25.25 0 01-.177-.427l2.896-2.896a.25.25 0 01.354 0l2.896 2.896a.25.25 0 01-.177.427H8.75v1.25zm-6.5-6.5a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM6 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 016 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM12 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 0112 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5z"></path></svg></span>
            <span class="Details-content--closed float-right" aria_label="Expand" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_CATEGORY_ROLLUP_EXPAND&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="8aea90f32403735f2916bdec944fe951d6b350ee58a557adc912a588f994990e"><svg class="octicon octicon-unfold" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8.177.677l2.896 2.896a.25.25 0 01-.177.427H8.75v1.25a.75.75 0 01-1.5 0V4H5.104a.25.25 0 01-.177-.427L7.823.677a.25.25 0 01.354 0zM7.25 10.75a.75.75 0 011.5 0V12h2.146a.25.25 0 01.177.427l-2.896 2.896a.25.25 0 01-.354 0l-2.896-2.896A.25.25 0 015.104 12H7.25v-1.25zm-5-2a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM6 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 016 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM12 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 0112 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5z"></path></svg></span>
          </span>
                                                                </summary>
                                                                <div data-view-component="true">
                                                                    <details open="open" data-repository-hovercards-enabled="true" data-issue-and-pr-hovercards-enabled="true" class="Details-element details-reset my-2">
                                                                        <summary data-octo-click="profile_timeline_toggle_rollup_created_issues" role="button" class="flex-items-baseline btn-link no-underline lh-condensed d-flex text-left">      <div class="d-inline-block col-6">
                                                                                <span class="css-truncate css-truncate-target" data-hovercard-type="repository" data-hovercard-url="/mlab817/pips/hovercard">mlab817/pips</span>
                                                                            </div>
                                                                            <span class="col-6 d-inline-block f6 color-text-secondary Link--onHover no-underline float-right text-right">
          <span class="State--open State ml-2 px-1 py-0 lh-condensed-ultra f6">2</span>
          open
      </span>
                                                                        </summary>
                                                                        <div data-view-component="true">      <ul class="mt-1 list-style-none">
                                                                                <li class="py-1 ml-0 d-flex">
            <span class="flex-auto min-width-0">
              <span class="width-fit css-truncate css-truncate-target">
                  <svg class="octicon octicon-issue-opened color-text-success" title="Open" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                <a class="no-underline" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_ISSUE_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="a0dc6a883b713dea376697e73d1c4dbf386202f98e9533bbf8e6414fbf564d25" data-hovercard-type="issue" data-hovercard-url="/mlab817/pips/issues/17/hovercard" href="/mlab817/pips/issues/17">
                  <span class="Link--primary markdown-title ">Create a user layout to show users profile</span>
</a>              </span>
            </span>
                                                                                    <time title="This contribution was made on Jul 2" class="float-right f6 color-text-tertiary pt-1 no-wrap flex-shrink-0">
                                                                                        Jul 2
                                                                                    </time>
                                                                                </li>
                                                                                <li class="py-1 ml-0 d-flex">
            <span class="flex-auto min-width-0">
              <span class="width-fit css-truncate css-truncate-target">
                  <svg class="octicon octicon-issue-opened color-text-success" title="Open" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                <a class="no-underline" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_ISSUE_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="a0dc6a883b713dea376697e73d1c4dbf386202f98e9533bbf8e6414fbf564d25" data-hovercard-type="issue" data-hovercard-url="/mlab817/pips/issues/15/hovercard" href="/mlab817/pips/issues/15">
                  <span class="Link--primary markdown-title ">Implement History under Show Project</span>
</a>              </span>
            </span>
                                                                                    <time title="This contribution was made on Jul 1" class="float-right f6 color-text-tertiary pt-1 no-wrap flex-shrink-0">
                                                                                        Jul 1
                                                                                    </time>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </details>
                                                                </div>
                                                            </details></div>
                                                    </div>


                                                    <div class="TimelineItem">

                                                        <div class="TimelineItem-badge"><svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16" class="octicon octicon-comment-discussion">
                                                                <path fill-rule="evenodd" d="M1.5 2.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-3.5a.75.75 0 00-.53.22L3.5 11.44V9.25a.75.75 0 00-.75-.75h-1a.25.25 0 01-.25-.25v-5.5zM1.75 1A1.75 1.75 0 000 2.75v5.5C0 9.216.784 10 1.75 10H2v1.543a1.457 1.457 0 002.487 1.03L7.061 10h3.189A1.75 1.75 0 0012 8.25v-5.5A1.75 1.75 0 0010.25 1h-8.5zM14.5 4.75a.25.25 0 00-.25-.25h-.5a.75.75 0 110-1.5h.5c.966 0 1.75.784 1.75 1.75v5.5A1.75 1.75 0 0114.25 12H14v1.543a1.457 1.457 0 01-2.487 1.03L9.22 12.28a.75.75 0 111.06-1.06l2.22 2.22v-2.19a.75.75 0 01.75-.75h1a.25.25 0 00.25-.25v-5.5z"></path>
                                                            </svg></div>
                                                        <div class="TimelineItem-body">      <details open="open" class="Details-element details-reset">
                                                                <summary role="button" class="btn-link f4 Link--muted no-underline lh-condensed width-full">          <span class="float-left ws-normal text-left color-text-primary">
            Started 2
            discussions
            in 2
            repositories
          </span>
                                                                    <span class="d-inline-block float-right">
            <span class="Details-content--open float-right" aria_label="Collapse" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_CATEGORY_ROLLUP_COLLAPSE&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="5694f93ed046ab681aee382df6bf11c1cfe807ae1702a655ec9c4c43652811f5"><svg class="octicon octicon-fold" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M10.896 2H8.75V.75a.75.75 0 00-1.5 0V2H5.104a.25.25 0 00-.177.427l2.896 2.896a.25.25 0 00.354 0l2.896-2.896A.25.25 0 0010.896 2zM8.75 15.25a.75.75 0 01-1.5 0V14H5.104a.25.25 0 01-.177-.427l2.896-2.896a.25.25 0 01.354 0l2.896 2.896a.25.25 0 01-.177.427H8.75v1.25zm-6.5-6.5a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM6 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 016 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM12 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 0112 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5z"></path></svg></span>
            <span class="Details-content--closed float-right" aria_label="Expand" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_CATEGORY_ROLLUP_EXPAND&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="8aea90f32403735f2916bdec944fe951d6b350ee58a557adc912a588f994990e"><svg class="octicon octicon-unfold" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8.177.677l2.896 2.896a.25.25 0 01-.177.427H8.75v1.25a.75.75 0 01-1.5 0V4H5.104a.25.25 0 01-.177-.427L7.823.677a.25.25 0 01.354 0zM7.25 10.75a.75.75 0 011.5 0V12h2.146a.25.25 0 01.177.427l-2.896 2.896a.25.25 0 01-.354 0l-2.896-2.896A.25.25 0 015.104 12H7.25v-1.25zm-5-2a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM6 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 016 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5zM12 8a.75.75 0 01-.75.75h-.5a.75.75 0 010-1.5h.5A.75.75 0 0112 8zm2.25.75a.75.75 0 000-1.5h-.5a.75.75 0 000 1.5h.5z"></path></svg></span>
          </span>
                                                                </summary>
                                                                <div data-view-component="true">            <details data-repository-hovercards-enabled="true" data-discussion-hovercards-enabled="true" class="Details-element details-reset my-1">
                                                                        <summary role="button" class="flex-items-baseline btn-link no-underline lh-condensed d-flex text-left">
                                                                            <div class="d-flex flex-items-baseline">
                                                                                <div class="d-inline-block col-6">
                                                                                    <span class="css-truncate css-truncate-target" data-hovercard-type="repository" data-hovercard-url="/mlab817/pips/hovercard">mlab817/pips</span>
                                                                                </div>
                                                                            </div>
                                                                        </summary>
                                                                        <div data-view-component="true">      <ul class="mt-1 list-style-none">
                                                                                <li class="py-1 ml-0 d-flex">
            <span class="flex-auto min-width-0 width-fit css-truncate css-truncate-target">
              <svg class="octicon octicon-question color-text-tertiary" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8zm9 3a1 1 0 11-2 0 1 1 0 012 0zM6.92 6.085c.081-.16.19-.299.34-.398.145-.097.371-.187.74-.187.28 0 .553.087.738.225A.613.613 0 019 6.25c0 .177-.04.264-.077.318a.956.956 0 01-.277.245c-.076.051-.158.1-.258.161l-.007.004a7.728 7.728 0 00-.313.195 2.416 2.416 0 00-.692.661.75.75 0 001.248.832.956.956 0 01.276-.245 6.3 6.3 0 01.26-.16l.006-.004c.093-.057.204-.123.313-.195.222-.149.487-.355.692-.662.214-.32.329-.702.329-1.15 0-.76-.36-1.348-.863-1.725A2.76 2.76 0 008 4c-.631 0-1.155.16-1.572.438-.413.276-.68.638-.849.977a.75.75 0 101.342.67z"></path></svg>

              <a class="no-underline" data-hovercard-type="discussion" data-hovercard-url="/mlab817/pips/discussions/16/hovercard" href="/mlab817/pips/discussions/16">
                <span class="Link--primary ">
                  Welcome to pips Discussions!
                </span>
</a>            </span>
                                                                                    <time title="This contribution was made on Jul 2" class="float-right f6 color-text-tertiary pt-1 flex-shrink-0 no-wrap">
                                                                                        Jul 2
                                                                                    </time>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </details>  <details data-repository-hovercards-enabled="true" data-discussion-hovercards-enabled="true" class="Details-element details-reset my-1">
                                                                        <summary role="button" class="flex-items-baseline btn-link no-underline lh-condensed d-flex text-left">
                                                                            <div class="d-flex flex-items-baseline">
                                                                                <div class="d-inline-block col-6">
                                                                                    <span class="css-truncate css-truncate-target" data-hovercard-type="repository" data-hovercard-url="/alpinejs/alpine/hovercard">alpinejs/alpine</span>
                                                                                </div>
                                                                            </div>
                                                                        </summary>
                                                                        <div data-view-component="true">      <ul class="mt-1 list-style-none">
                                                                                <li class="py-1 ml-0 d-flex">
            <span class="flex-auto min-width-0 width-fit css-truncate css-truncate-target">
              <svg class="octicon icon-discussion-answered" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M2 1H14C14.55 1 15 1.45 15 2V10C15 10.55 14.55 11 14 11H7.5L4 14.5V11H2C1.45 11 1 10.55 1 10V2C1 1.45 1.45 1 2 1ZM7 10H14V2H2V10H5V12L7 10ZM7 8.5L11 4.28947L10.25 3.5L7 6.92105L5.75 5.60526L5 6.39474L7 8.5Z" fill="#1B1F23"></path>
</svg>

              <a class="no-underline" data-hovercard-type="discussion" data-hovercard-url="/alpinejs/alpine/discussions/1700/hovercard" href="/alpinejs/alpine/discussions/1700">
                <span class="Link--primary ">
                  x-cloak not working when alpinejs is deferred
                </span>
</a>            </span>
                                                                                    <time title="This contribution was made on Jul 1" class="float-right f6 color-text-tertiary pt-1 flex-shrink-0 no-wrap">
                                                                                        Jul 1
                                                                                    </time>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </details>
                                                                </div>
                                                            </details></div>
                                                    </div>











                                                </div>
                                            </div>


                                            <!-- '"` --><!-- </textarea></xmp> --><form class="ajax-pagination-form js-ajax-pagination js-show-more-timeline-form " data-title="mlab817 (Mark Lester Bolotaolo) / June 2021" data-year="2021" data-url="/mlab817?tab=overview&amp;from=2021-06-01&amp;to=2021-06-30" data-from="2021-07-01" data-to="2021-07-02" action="/mlab817?tab=overview&amp;from=2021-06-01&amp;to=2021-06-30&amp;include_header=no" accept-charset="UTF-8" method="get">

                                                <svg style="box-sizing: content-box; color: var(--color-icon-primary);" viewBox="0 0 16 16" fill="none" width="64" height="64" class="width-full contribution-activity-spinner my-5 anim-rotate">
                                                    <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                                </svg>

                                                <button name="button" type="submit" class="ajax-pagination-btn btn btn-outline width-full f6 mt-0 py-2 contribution-activity-show-more " data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;TIMELINE_SHOW_MORE&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="401361fa02dc3c7ada5ad59db77d2d34f33bc4450714af8938bcbc3493b3cc91" data-disable-with="Loading...">Show more activity</button>

                                                <p class="color-text-secondary f6 mt-4">
                                                    Seeing something unexpected? Take a look at the
                                                    <a href="https://docs.github.com/categories/setting-up-and-managing-your-github-profile">GitHub profile guide</a>.
                                                </p>
                                            </form>


                                        </div>
                                    </div>
                                    <div id="year-list-container" class="col-12 col-lg-2 pl-5 hide-sm hide-md hide-lg">

                                        <div class="d-none d-lg-block">
                                            <div class="js-profile-timeline-year-list color-bg-primary is-placeholder" style="visibility: hidden; display: none; height: 202px;"></div><div style="top: 74px; position: static;" class="js-profile-timeline-year-list color-bg-primary js-sticky " data-original-top="74px">
                                                <ul class="filter-list small">
                                                    <li>
                                                        <a id="year-link-2021" class="js-year-link filter-item px-3 mb-2 py-2 selected " aria-label="Contribution activity in 2021" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;CONTRIBUTION_YEAR_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="9a5721c9c53cbce508b5bffb078d9a2dd1bfe7bc320fc8d5ce83fc13d14b6f3d" href="/mlab817?tab=overview&amp;from=2021-07-01&amp;to=2021-07-02">2021</a>
                                                    </li>
                                                    <li>
                                                        <a id="year-link-2020" class="js-year-link filter-item px-3 mb-2 py-2 " aria-label="Contribution activity in 2020" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;CONTRIBUTION_YEAR_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="9a5721c9c53cbce508b5bffb078d9a2dd1bfe7bc320fc8d5ce83fc13d14b6f3d" href="/mlab817?tab=overview&amp;from=2020-12-01&amp;to=2020-12-31">2020</a>
                                                    </li>
                                                    <li>
                                                        <a id="year-link-2019" class="js-year-link filter-item px-3 mb-2 py-2 " aria-label="Contribution activity in 2019" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;CONTRIBUTION_YEAR_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="9a5721c9c53cbce508b5bffb078d9a2dd1bfe7bc320fc8d5ce83fc13d14b6f3d" href="/mlab817?tab=overview&amp;from=2019-12-01&amp;to=2019-12-31">2019</a>
                                                    </li>
                                                    <li>
                                                        <a id="year-link-2018" class="js-year-link filter-item px-3 mb-2 py-2 " aria-label="Contribution activity in 2018" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;CONTRIBUTION_YEAR_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="9a5721c9c53cbce508b5bffb078d9a2dd1bfe7bc320fc8d5ce83fc13d14b6f3d" href="/mlab817?tab=overview&amp;from=2018-12-01&amp;to=2018-12-31">2018</a>
                                                    </li>
                                                    <li>
                                                        <a id="year-link-2017" class="js-year-link filter-item px-3 mb-2 py-2 " aria-label="Contribution activity in 2017" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:29625844,&quot;target&quot;:&quot;CONTRIBUTION_YEAR_LINK&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817&quot;}}" data-hydro-click-hmac="9a5721c9c53cbce508b5bffb078d9a2dd1bfe7bc320fc8d5ce83fc13d14b6f3d" href="/mlab817?tab=overview&amp;from=2017-12-01&amp;to=2017-12-31">2017</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div id="pinned-items-modal-wrapper"></div>

                        </div>
                    </div>
                </div>

            </div></div>
        <div class="container-xl px-3 px-md-4 px-lg-5">
            @yield('content')
        </div>
    </div>
</main>

@stack('scripts')
</body>
</html>
