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
        <div data-view-component="true" class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">
            <div data-view-component="true" class="flex-shrink-0 col-12 col-md-3 mb-4 mb-md-0">          <div class="user-profile-sticky-bar">
                    <div class="user-profile-mini-vcard d-table">
              <span class="user-profile-mini-avatar d-table-cell v-align-middle lh-condensed-ultra pr-2">
                <img class="rounded-1 avatar-user" src="https://avatars.githubusercontent.com/u/6462826?s=64&amp;v=4" width="32" height="32" alt="@cpriego">
              </span>
                        <span class="d-table-cell v-align-middle lh-condensed">
                <strong>cpriego</strong>

  <span class="user-following-container js-form-toggle-container">
    <!-- '"` --><!-- </textarea></xmp> --><form class="js-form-toggle-target" action="/users/follow?target=cpriego" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="pAnpSoN3JhUnhsH0HBWXsJz/P06M1uFgXFdMj6rm5NiSbEP6T5fncEu5EWfP+Zx6zS5uJ7Xsw4fELFJTPiNe2A==">
      <input type="submit" name="commit" value="Follow" class="btn btn-sm mini-follow-button" title="Follow cpriego" aria-label="Follow this person" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;FOLLOW_BUTTON&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="b01cda5a5ce1b5356e21a016a5c551e18bc3022186b6664fbe45680eed6bcbec" data-disable-with="Follow">
</form>
      <!-- '"` --><!-- </textarea></xmp> --><form class="js-form-toggle-target" hidden="hidden" action="/users/unfollow?target=cpriego" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="BiA+PDIhoaLfKgbSCFbhGDMaNGhSJolXyjb3+1U6k9E+QQfs+8BklVRic/h2p0Q7cIT1eTmJRokABiDFRpIL7Q==">
      <input type="submit" name="commit" value="Unfollow" class="btn btn-sm mini-follow-button" title="Unfollow cpriego" aria-label="Unfollow this person" data-disable-with="Unfollow">
</form>  </span>

              </span>
                    </div>
                </div>
            </div>

            <div data-view-component="true" class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">          <div class="UnderlineNav width-full box-shadow-none">
                    <nav class="UnderlineNav-body" data-pjax="" aria-label="User profile">
                        <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;TAB_OVERVIEW&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="47932effe98d182e355a7b3157974e752c39e25d125df9c960b467a204752497" href="/cpriego">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-book UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                            </svg>
                            Overview
                        </a>
                        <a aria-current="page" class="UnderlineNav-item selected" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;TAB_REPOSITORIES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="cb2b6203dc313f3087238f5a4a10687dcadf23b7c1381be0145f1249cf8f8d91" href="/cpriego?tab=repositories">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-repo UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                            </svg>
                            Repositories
                            <span title="3" data-view-component="true" class="Counter">3</span>
                        </a>
                        <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;TAB_PROJECTS&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="9d8a098709b92dca74aa7d933911beb09bcb5f9a91ba6eb87afd76c2b5b404d8" href="/cpriego?tab=projects">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                            </svg>
                            Projects
                            <span title="0" hidden="hidden" data-view-component="true" class="Counter">0</span>
                        </a>
                        <a class="UnderlineNav-item" data-hydro-click="{&quot;event_type&quot;:&quot;user_profile.click&quot;,&quot;payload&quot;:{&quot;profile_user_id&quot;:6462826,&quot;target&quot;:&quot;TAB_PACKAGES&quot;,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/cpriego?tab=repositories&quot;}}" data-hydro-click-hmac="ab6b2111b0907cc739d6284fe6965bc6d9b9d2d6f48c88d2e6e6f29229e0e22a" href="/cpriego?tab=packages">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-package UnderlineNav-octicon hide-sm">
                                <path fill-rule="evenodd" d="M8.878.392a1.75 1.75 0 00-1.756 0l-5.25 3.045A1.75 1.75 0 001 4.951v6.098c0 .624.332 1.2.872 1.514l5.25 3.045a1.75 1.75 0 001.756 0l5.25-3.045c.54-.313.872-.89.872-1.514V4.951c0-.624-.332-1.2-.872-1.514L8.878.392zM7.875 1.69a.25.25 0 01.25 0l4.63 2.685L8 7.133 3.245 4.375l4.63-2.685zM2.5 5.677v5.372c0 .09.047.171.125.216l4.625 2.683V8.432L2.5 5.677zm6.25 8.271l4.625-2.683a.25.25 0 00.125-.216V5.677L8.75 8.432v5.516z"></path>
                            </svg>
                            Packages
                        </a>
                    </nav>

                </div>
            </div>

        </div>
        <div class="container-xl px-3 px-md-4 px-lg-5">
            @yield('content')
        </div>
    </div>
</main>

@stack('scripts')
</body>
</html>
