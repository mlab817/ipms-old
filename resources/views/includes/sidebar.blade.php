<div class="Layout-sidebar">
    <aside class="px-3 px-md-4 px-lg-5 overflow-auto" style="position: static;">

        <div class="border-bottom color-border-secondary py-3 mt-3 mb-4">
            <details id="details-3aa004" data-view-component="true" class="details-reset details-overlay d-inline-block">
                <summary class="no-underline btn-link color-text-primary text-bold width-full" title="Switch account context" data-ga-click="Dashboard, click, Opened account context switcher - context:user" aria-haspopup="menu" role="button">
                    <img src="{{ auth()->user()->avatar }}" alt="{{ '@' . auth()->user()->username }}" size="20" data-view-component="true" height="20" width="20" class="avatar-user avatar avatar-small">
                    <span class="css-truncate css-truncate-target ml-1">
                        {{ auth()->user()->username }}
                    </span>
                </summary>
            </details>
        </div>

        <div class="mb-3 Details" data-repository-hovercards-enabled="" id="dashboard-repos-container" data-pjax-container="" role="navigation" aria-label="Repositories">

            <div class="js-repos-container" id="repos-container" data-pjax-container="">
                <h2 class="f4 hide-sm hide-md mb-1 f5 d-flex flex-justify-between flex-items-center">
                    Programs and Projects
                    <a class="btn btn-sm btn-primary" href="{{ route('projects.create') }}">
                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-repo">
                            <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                        </svg> New
                    </a>
                </h2>

                <div class="mt-2 mb-3" role="search" aria-label="Repositories">
                    <input type="text" class="form-control input-contrast input-block mb-3" id="dashboard-repos-filter-left" placeholder="Find a PAP…" aria-label="Find a PAP…" value="" autocomplete="off">
                </div>

                <ul class="list-style-none" data-filterable-for="dashboard-repos-filter-left" data-filterable-type="substring">
                    <li class="public source no-description">
                        <div class="width-full text-bold">
                            <a href="/mlab817/pips" class="d-inline-flex flex-items-baseline flex-wrap f5 mb-2 dashboard-underlined-link width-fit" data-hydro-click="{&quot;event_type&quot;:&quot;dashboard.click&quot;,&quot;payload&quot;:{&quot;event_context&quot;:&quot;REPOSITORIES&quot;,&quot;target&quot;:&quot;REPOSITORY&quot;,&quot;record_id&quot;:380256079,&quot;dashboard_context&quot;:&quot;user&quot;,&quot;dashboard_version&quot;:2,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/dashboard/top_repositories?location=left&quot;}}" data-hydro-click-hmac="a3832ac80e6e118231c11bee3a72538539ac9f450e4ddbc286e4a1fb81bd8425" data-ga-click="Dashboard, click, Repo list item click - context:user visibility:public fork:false" data-hovercard-type="repository" data-hovercard-url="/mlab817/pips/hovercard">
                                <div class="color-text-tertiary mr-2">
                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon hide-sm">
                                        <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                    </svg>
{{--                                    <svg aria-label="Repository" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-repo flex-shrink-0">--}}
{{--                                        <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>--}}
{{--                                    </svg>--}}
                                </div>

                                <span class="flex-shrink-0 css-truncate css-truncate-target" title="mlab817">mlab817</span>/<span class="css-truncate css-truncate-target" style="max-width: 260px" title="pips">pips</span>

                            </a>
                        </div>
                    </li>
                </ul>

                <a href="{{ route('projects.own') }}" role="button" type="submit" class="width-full text-left btn-link f6 Link--muted text-left mt-2 border-md-0 border-top py-md-0 py-3 px-md-0 px-2">
                    Show more
                </a>
            </div>

        </div>

        <div class="border-top">
            <h2 class="f5 mt-md-3 mt-0">Recent activity</h2>

            <div class="mt-2 mb-4">
                <!-- TODO: create recent activity log -->
                <div data-issue-and-pr-hovercards-enabled="">
                    @forelse(auth()->user()->audit_logs->sortByDesc('created_at')->take(5) as $activity)
                        <div class="d-flex flex-items-baseline mt-2">
                            <a class="mr-2" href="#">
                                <svg aria-label="Open issue" role="img" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-issue-opened color-text-success">
                                    <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                </svg>
                            </a>
                            <div class="break-word">
                                <a class="color-text-primary lh-0 mb-2 markdown-title" data-hydro-click="{&quot;event_type&quot;:&quot;dashboard.click&quot;,&quot;payload&quot;:{&quot;event_context&quot;:&quot;RECENT_ACTIVITY&quot;,&quot;target&quot;:&quot;ISSUE&quot;,&quot;record_id&quot;:930223369,&quot;dashboard_context&quot;:&quot;user&quot;,&quot;dashboard_version&quot;:2,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/dashboard/recent-activity&quot;}}" data-hydro-click-hmac="64dbd76f658427e87bfe1100f12c2ead66b90988a7dc6142b2b38fd350c120d6" data-ga-click="Dashboard, click, Recent activity list item click - interaction:authored type:issue context:user" data-hovercard-type="issue" data-hovercard-url="/mlab817/pips/issues/3/hovercard" href="/mlab817/pips/issues/3">
                                    {{ $activity->description }} : {{ $activity->auditable_type . ' #' . $activity->auditable_id }}
                                </a>
                            </div>
                        </div>
                    @empty
                        No activity
                    @endforelse
                </div>

            </div>
        </div>

    </aside>
</div>

{{--<!-- Main Sidebar Container -->--}}
{{--<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">--}}

{{--    <div class="c-sidebar-brand d-lg-down-none">--}}
{{--        <img src="{{ asset('images/logo_with_da_dark.png') }}" class="c-sidebar-brand-full" height="36" alt="Logo">--}}
{{--        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 200 672 240" width="auto" height="40">--}}
{{--            <path fill="currentColor" aria-label="PIPS"  d="M295.25 236.87L237.65 236.82L237.55 362.82L273.19 362.85L273.21 329.91L295.17 329.93C329.55 329.96 351.17 312.16 351.19 283.54C351.22 254.74 329.63 236.9 295.25 236.87ZM293.04 301.85L273.24 301.83L273.27 264.93L293.07 264.95C307.83 264.96 315.2 271.81 315.19 283.51C315.18 295.03 307.8 301.86 293.04 301.85ZM368.41 362.93L404.05 362.96L404.15 236.96L368.51 236.93ZM487.13 237.03L429.53 236.98L429.43 362.98L465.07 363.01L465.09 330.07L487.05 330.09C521.43 330.12 543.05 312.32 543.07 283.7C543.1 254.9 521.51 237.06 487.13 237.03ZM484.92 302.01L465.12 301.99L465.15 265.09L484.95 265.11C499.71 265.12 507.08 271.97 507.07 283.67C507.06 295.19 499.68 302.02 484.92 302.01ZM606.36 365.65C643.8 365.68 662.18 346.98 662.2 325.02C662.24 278.58 590.77 292.92 590.78 273.66C590.79 267.36 596.19 262.32 611.13 262.34C622.11 262.35 633.99 265.6 646.04 272.09L657.05 245.64C644.63 238.43 627.72 234.63 611.34 234.62C573.9 234.59 555.52 252.93 555.5 275.43C555.46 322.23 627.11 307.71 627.1 327.69C627.09 333.81 621.33 337.95 606.57 337.93C591.99 337.92 576.15 332.87 565 325.48L553.28 351.75C565.15 360.04 585.66 365.64 606.36 365.65Z" />--}}
{{--            <path fill="currentColor" aria-label="Public Investment--}}
{{--Program System"  d="M243.3 375L235.7 375L235.7 396L237.24 396L237.24 389.13L243.3 389.13C248.63 389.13 251.85 386.49 251.85 382.08C251.85 377.64 248.63 375 243.3 375ZM243.3 387.75L237.24 387.75L237.24 376.38L243.3 376.38C247.85 376.38 250.27 378.45 250.27 382.08C250.27 385.68 247.85 387.75 243.3 387.75ZM269.21 380.34L269.21 388.68C269.21 392.4 267 394.77 263.42 394.77C260.12 394.77 258.21 392.91 258.21 389.37L258.21 380.34L256.69 380.34L256.69 389.49C256.69 393.87 259.27 396.12 263.3 396.12C266.09 396.12 268.24 394.83 269.27 392.64L269.27 396L270.72 396L270.72 380.34ZM285.09 380.22C282.3 380.22 279.93 381.57 278.66 383.91L278.66 373.74L277.15 373.74L277.15 396L278.6 396L278.6 392.31C279.84 394.71 282.24 396.12 285.09 396.12C289.54 396.12 292.9 392.85 292.9 388.17C292.9 383.46 289.54 380.22 285.09 380.22ZM284.99 394.77C281.36 394.77 278.63 392.1 278.63 388.17C278.63 384.24 281.36 381.57 284.99 381.57C288.63 381.57 291.39 384.24 291.39 388.17C291.39 392.1 288.63 394.77 284.99 394.77ZM297.6 396L299.11 396L299.11 373.74L297.6 373.74ZM306.27 376.53C306.96 376.53 307.51 375.99 307.51 375.3C307.51 374.64 306.96 374.1 306.27 374.1C305.57 374.1 305.02 374.67 305.02 375.33C305.02 375.99 305.57 376.53 306.27 376.53ZM305.51 396L307.02 396L307.02 380.34L305.51 380.34ZM319.69 396.12C322.2 396.12 324.38 395.13 325.69 393.24L324.57 392.43C323.42 394.02 321.66 394.77 319.69 394.77C315.96 394.77 313.23 392.13 313.23 388.17C313.23 384.21 315.96 381.57 319.69 381.57C321.66 381.57 323.42 382.32 324.57 383.91L325.69 383.1C324.38 381.18 322.2 380.22 319.69 380.22C315.05 380.22 311.69 383.49 311.69 388.17C311.69 392.82 315.05 396.12 319.69 396.12ZM338.5 396L340.05 396L340.05 375L338.5 375ZM354.68 380.22C351.69 380.22 349.47 381.54 348.41 383.73L348.41 380.34L346.96 380.34L346.96 396L348.47 396L348.47 387.66C348.47 383.94 350.75 381.57 354.47 381.57C357.68 381.57 359.59 383.43 359.59 386.97L359.59 396L361.11 396L361.11 386.85C361.11 382.47 358.53 380.22 354.68 380.22ZM378.2 380.34L371.83 394.35L365.53 380.34L363.93 380.34L371.05 396L372.59 396L379.74 380.34ZM395.98 388.11C395.98 383.46 392.77 380.22 388.44 380.22C384.11 380.22 380.86 383.52 380.86 388.17C380.86 392.82 384.23 396.12 389.01 396.12C391.41 396.12 393.59 395.25 394.98 393.57L394.11 392.58C392.89 394.05 391.04 394.77 389.04 394.77C385.26 394.77 382.5 392.25 382.35 388.53L395.95 388.53C395.95 388.38 395.98 388.23 395.98 388.11ZM388.44 381.54C391.8 381.54 394.29 383.97 394.5 387.36L382.38 387.36C382.62 383.94 385.08 381.54 388.44 381.54ZM404.68 396.12C408.71 396.12 410.92 394.38 410.92 391.83C410.92 385.86 400.44 389.19 400.44 384.48C400.44 382.8 401.8 381.54 404.89 381.54C406.59 381.54 408.32 381.99 409.65 382.95L410.35 381.75C409.1 380.82 406.92 380.22 404.92 380.22C400.92 380.22 398.92 382.14 398.92 384.51C398.92 390.66 409.41 387.3 409.41 391.86C409.41 393.63 408.07 394.8 404.74 394.8C402.41 394.8 400.26 393.93 399.04 392.91L398.35 394.11C399.59 395.25 402.07 396.12 404.68 396.12ZM422.37 393.96C421.74 394.53 420.86 394.83 419.92 394.83C417.98 394.83 416.98 393.72 416.98 391.71L416.98 381.63L422.01 381.63L422.01 380.34L416.98 380.34L416.98 376.92L415.47 376.92L415.47 380.34L412.56 380.34L412.56 381.63L415.47 381.63L415.47 391.86C415.47 394.5 416.98 396.12 419.77 396.12C420.95 396.12 422.22 395.76 423.01 395.01ZM446.92 380.22C443.86 380.22 441.55 381.72 440.52 384C439.68 381.51 437.59 380.22 434.74 380.22C431.86 380.22 429.71 381.51 428.68 383.7L428.68 380.34L427.22 380.34L427.22 396L428.74 396L428.74 387.66C428.74 383.94 430.95 381.57 434.53 381.57C437.62 381.57 439.46 383.43 439.46 386.97L439.46 396L440.98 396L440.98 387.66C440.98 383.94 443.19 381.57 446.77 381.57C449.86 381.57 451.71 383.43 451.71 386.97L451.71 396L453.22 396L453.22 386.85C453.22 382.47 450.74 380.22 446.92 380.22ZM472.88 388.11C472.88 383.46 469.67 380.22 465.34 380.22C461.01 380.22 457.77 383.52 457.77 388.17C457.77 392.82 461.13 396.12 465.92 396.12C468.31 396.12 470.49 395.25 471.89 393.57L471.01 392.58C469.79 394.05 467.95 394.77 465.95 394.77C462.16 394.77 459.4 392.25 459.25 388.53L472.85 388.53C472.85 388.38 472.88 388.23 472.88 388.11ZM465.34 381.54C468.7 381.54 471.19 383.97 471.4 387.36L459.28 387.36C459.52 383.94 461.98 381.54 465.34 381.54ZM485.31 380.22C482.31 380.22 480.1 381.54 479.04 383.73L479.04 380.34L477.58 380.34L477.58 396L479.1 396L479.1 387.66C479.1 383.94 481.37 381.57 485.1 381.57C488.31 381.57 490.22 383.43 490.22 386.97L490.22 396L491.73 396L491.73 386.85C491.73 382.47 489.16 380.22 485.31 380.22ZM505.18 393.96C504.55 394.53 503.67 394.83 502.73 394.83C500.79 394.83 499.79 393.72 499.79 391.71L499.79 381.63L504.82 381.63L504.82 380.34L499.79 380.34L499.79 376.92L498.28 376.92L498.28 380.34L495.37 380.34L495.37 381.63L498.28 381.63L498.28 391.86C498.28 394.5 499.79 396.12 502.58 396.12C503.76 396.12 505.03 395.76 505.82 395.01ZM243.3 411L235.7 411L235.7 432L237.24 432L237.24 425.13L243.3 425.13C248.63 425.13 251.85 422.49 251.85 418.08C251.85 413.64 248.63 411 243.3 411ZM243.3 423.75L237.24 423.75L237.24 412.38L243.3 412.38C247.85 412.38 250.27 414.45 250.27 418.08C250.27 421.68 247.85 423.75 243.3 423.75ZM257.54 419.76L257.54 416.34L256.09 416.34L256.09 432L257.6 432L257.6 423.84C257.6 419.97 259.69 417.66 263.21 417.66C263.33 417.66 263.45 417.69 263.57 417.69L263.57 416.22C260.6 416.22 258.51 417.48 257.54 419.76ZM273.78 432.12C278.33 432.12 281.69 428.82 281.69 424.17C281.69 419.52 278.33 416.22 273.78 416.22C269.24 416.22 265.88 419.52 265.88 424.17C265.88 428.82 269.24 432.12 273.78 432.12ZM273.78 430.77C270.15 430.77 267.42 428.1 267.42 424.17C267.42 420.24 270.15 417.57 273.78 417.57C277.42 417.57 280.15 420.24 280.15 424.17C280.15 428.1 277.42 430.77 273.78 430.77ZM299.18 416.34L299.18 419.88C297.9 417.54 295.45 416.22 292.54 416.22C288.06 416.22 284.66 419.34 284.66 423.81C284.66 428.28 288.06 431.43 292.54 431.43C295.39 431.43 297.81 430.14 299.11 427.86L299.11 430.5C299.11 434.67 297.14 436.59 292.93 436.59C290.39 436.59 288.12 435.75 286.54 434.31L285.72 435.45C287.33 437.04 290.09 437.94 292.96 437.94C298.05 437.94 300.63 435.57 300.63 430.32L300.63 416.34ZM292.66 430.08C288.93 430.08 286.21 427.5 286.21 423.81C286.21 420.12 288.93 417.57 292.66 417.57C296.42 417.57 299.14 420.12 299.14 423.81C299.14 427.5 296.42 430.08 292.66 430.08ZM308.51 419.76L308.51 416.34L307.05 416.34L307.05 432L308.57 432L308.57 423.84C308.57 419.97 310.66 417.66 314.17 417.66C314.29 417.66 314.42 417.69 314.54 417.69L314.54 416.22C311.57 416.22 309.48 417.48 308.51 419.76ZM324.05 416.22C321.6 416.22 319.29 417.06 317.72 418.44L318.48 419.52C319.78 418.35 321.75 417.54 323.93 417.54C327.02 417.54 328.63 419.1 328.63 422.01L328.63 423.27L323.2 423.27C318.81 423.27 317.29 425.28 317.29 427.65C317.29 430.32 319.45 432.12 322.99 432.12C325.75 432.12 327.69 431.01 328.69 429.21L328.69 432L330.14 432L330.14 422.07C330.14 418.2 327.96 416.22 324.05 416.22ZM323.2 430.89C320.42 430.89 318.81 429.63 318.81 427.59C318.81 425.79 319.96 424.44 323.23 424.44L328.63 424.44L328.63 427.38C327.72 429.63 325.87 430.89 323.2 430.89ZM356.08 416.22C353.02 416.22 350.72 417.72 349.69 420C348.84 417.51 346.75 416.22 343.9 416.22C341.02 416.22 338.87 417.51 337.84 419.7L337.84 416.34L336.38 416.34L336.38 432L337.9 432L337.9 423.66C337.9 419.94 340.11 417.57 343.69 417.57C346.78 417.57 348.62 419.43 348.62 422.97L348.62 432L350.14 432L350.14 423.66C350.14 419.94 352.35 417.57 355.93 417.57C359.02 417.57 360.87 419.43 360.87 422.97L360.87 432L362.38 432L362.38 422.85C362.38 418.47 359.9 416.22 356.08 416.22ZM382.47 432.15C387.71 432.15 390.11 429.57 390.11 426.6C390.11 418.98 376.86 422.7 376.86 416.4C376.86 414.09 378.71 412.2 382.83 412.2C384.74 412.2 386.89 412.77 388.65 413.97L389.23 412.74C387.59 411.57 385.17 410.85 382.83 410.85C377.62 410.85 375.32 413.46 375.32 416.43C375.32 424.17 388.56 420.39 388.56 426.69C388.56 428.97 386.68 430.8 382.44 430.8C379.59 430.8 376.89 429.66 375.44 428.16L374.74 429.3C376.29 430.98 379.32 432.15 382.47 432.15ZM405.71 416.34L399.38 430.35L393.04 416.34L391.44 416.34L398.56 431.94L397.71 433.83C396.74 435.96 395.68 436.62 394.23 436.62C393.04 436.62 392.11 436.23 391.29 435.39L390.53 436.53C391.44 437.46 392.77 437.94 394.2 437.94C396.29 437.94 397.86 437.01 399.13 434.13L407.26 416.34ZM414.38 432.12C418.41 432.12 420.62 430.38 420.62 427.83C420.62 421.86 410.13 425.19 410.13 420.48C410.13 418.8 411.5 417.54 414.59 417.54C416.28 417.54 418.01 417.99 419.34 418.95L420.04 417.75C418.8 416.82 416.62 416.22 414.62 416.22C410.62 416.22 408.62 418.14 408.62 420.51C408.62 426.66 419.1 423.3 419.1 427.86C419.1 429.63 417.77 430.8 414.44 430.8C412.1 430.8 409.95 429.93 408.74 428.91L408.04 430.11C409.29 431.25 411.77 432.12 414.38 432.12ZM432.07 429.96C431.43 430.53 430.56 430.83 429.62 430.83C427.68 430.83 426.68 429.72 426.68 427.71L426.68 417.63L431.71 417.63L431.71 416.34L426.68 416.34L426.68 412.92L425.16 412.92L425.16 416.34L422.25 416.34L422.25 417.63L425.16 417.63L425.16 427.86C425.16 430.5 426.68 432.12 429.47 432.12C430.65 432.12 431.92 431.76 432.71 431.01ZM449.74 424.11C449.74 419.46 446.52 416.22 442.19 416.22C437.86 416.22 434.62 419.52 434.62 424.17C434.62 428.82 437.98 432.12 442.77 432.12C445.16 432.12 447.34 431.25 448.74 429.57L447.86 428.58C446.65 430.05 444.8 430.77 442.8 430.77C439.01 430.77 436.25 428.25 436.1 424.53L449.71 424.53C449.71 424.38 449.74 424.23 449.74 424.11ZM442.19 417.54C445.55 417.54 448.04 419.97 448.25 423.36L436.13 423.36C436.37 419.94 438.83 417.54 442.19 417.54ZM474.13 416.22C471.07 416.22 468.76 417.72 467.73 420C466.89 417.51 464.79 416.22 461.95 416.22C459.07 416.22 456.92 417.51 455.89 419.7L455.89 416.34L454.43 416.34L454.43 432L455.95 432L455.95 423.66C455.95 419.94 458.16 417.57 461.73 417.57C464.83 417.57 466.67 419.43 466.67 422.97L466.67 432L468.19 432L468.19 423.66C468.19 419.94 470.4 417.57 473.98 417.57C477.07 417.57 478.91 419.43 478.91 422.97L478.91 432L480.43 432L480.43 422.85C480.43 418.47 477.95 416.22 474.13 416.22Z" />--}}
{{--            <path fill="#e6e9f5" d="M18 234L202 234C207.53 234 212 238.47 212 244L212 428C212 433.53 207.53 438 202 438L18 438C12.47 438 8 433.53 8 428L8 244C8 238.47 12.47 234 18 234Z" />--}}
{{--            <path fill="#4654A3" transform="matrix(0.33,0,0,0.33,15,252)" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/>--}}
{{--        </svg>--}}
{{--    </div>--}}

{{--    <!-- Brand Logo -->--}}
{{--    <a href="/" class="brand-link">--}}
{{--        <div class="brand-image img-circle">--}}
{{--            <img src="{{ asset('images/logo-dark.png') }}" class="text-info" alt="AdminLTE Logo" width="35px">--}}
{{--        </div>--}}
{{--        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>--}}
{{--    </a>--}}

{{--<!-- Sidebar -->--}}
{{--    <ul class="c-sidebar-nav">--}}

{{--        <li class="c-sidebar-nav-item">--}}
{{--            <div class="c-sidebar-nav-link">--}}
{{--                <div class="c-avatar mr-2">--}}
{{--                    <img src="{{ auth()->user()->avatar }}" class="c-avatar-img" alt="User Image">--}}
{{--                </div>--}}
{{--                {{ auth()->user()->full_name }}--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <!-- Project Menu -->--}}
{{--        <!-- Add icons to the links using the .nav-icon class--}}
{{--            with font-awesome or any other icon font library -->--}}

{{--        <li class="c-sidebar-nav-item">--}}
{{--            <a href="{{ route('dashboard') }}"--}}
{{--               class="c-sidebar-nav-link @if(Route::current()->getName() == 'dashboard') active @endif">--}}
{{--                <!-- Heroicon: document-report -->--}}
{{--                <i class="c-sidebar-nav-icon cil-speedometer"></i>--}}
{{--                Dashboard--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        @can('projects.create')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('projects.create') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.create') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-pen"></i>--}}
{{--                    Create New PAP--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @if(auth()->user()->can('projects.view_office') || auth()->user()->can('projects.view_own') || auth()->user()->can('projects.view_assigned'))--}}
{{--            --}}{{--                    <div class="dropdown-divider"></div>--}}

{{--            @can('projects.view_own')--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a href="{{ route('projects.own') }}"--}}
{{--                       class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.own') active @endif">--}}
{{--                        <i class="c-sidebar-nav-icon cil-list-numbered"></i>--}}
{{--                        View Own PAPs--}}
{{--                        <span--}}
{{--                            class="badge badge-info right">{{ \App\Models\Project::where('created_by', auth()->id())->count() }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('projects.view_office')--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a href="{{ route('projects.office') }}"--}}
{{--                       class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.office') active @endif">--}}
{{--                        <svg class="c-sidebar-nav-icon" viewBox="0 0 20 20"--}}
{{--                             fill="currentColor">--}}
{{--                            <path--}}
{{--                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>--}}
{{--                        </svg>--}}

{{--                        View My Office PAPs--}}
{{--                        <span--}}
{{--                            class="badge badge-info right">{{ \App\Models\Project::whereNotNull('office_id')->where('office_id', auth()->user()->office_id)->count() }}</span>--}}

{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('projects.view_assigned')--}}
{{--                <li class="c-sidebar-nav-item">--}}
{{--                    <a href="{{ route('projects.assigned') }}"--}}
{{--                       class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.assigned') active @endif">--}}
{{--                        <i class="c-sidebar-nav-icon cil-list-rich"></i>--}}
{{--                        View Assigned PAPs--}}
{{--                        <span class="badge badge-info right">{{ auth()->user()->assigned_projects->count() }}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}
{{--        @endcan--}}

{{--        @can('projects.manage')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('projects.deleted') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'projects.deleted') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-trash">--}}
{{--                    </i>--}}
{{--                    Deleted Projects--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\Project::onlyTrashed()->count()  }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('reviews.view_index')--}}
{{--            --}}{{--                    <div class="dropdown-divider"></div>--}}

{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('reviews.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'reviews.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-speech"></i>--}}
{{--                    Review PAPs--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\Project::count()  }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        <li class="c-sidebar-nav-item">--}}
{{--            <a href="{{ route('reports.index') }}"--}}
{{--               class="c-sidebar-nav-link {{ request()->routeIs('reports') ? 'active' : '' }}">--}}
{{--                <i class="c-sidebar-nav-icon cil-bar-chart"></i> Reports--}}
{{--                <span class="badge badge-danger right">New</span>--}}

{{--            </a>--}}
{{--        </li>--}}

{{--        @canany('projects.manage','users.view_index','teams.view_index','roles.view_index','permissions.view_index','libraries.view_index','audit_logs.view_index')--}}
{{--            <li class="c-sidebar-nav-title">Admin</li>--}}
{{--        @endcanany--}}

{{--        @can('projects.manage')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('admin.projects.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.projects.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-line-spacing"></i>--}}

{{--                    Manage Projects--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\Project::count()  }}</span>--}}

{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('projects.manage')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('pipols.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'pipols.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-walk"></i>--}}
{{--                    PIPOL Tracker--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\Pipol::count()  }}</span>--}}

{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('users.view_index')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('admin.users.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.users.index') active @endif">--}}
{{--                    <svg class="c-sidebar-nav-icon" viewBox="0 0 20 20"--}}
{{--                         fill="currentColor">--}}
{{--                        <path--}}
{{--                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>--}}
{{--                    </svg>--}}

{{--                    Manage Users--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\User::count()  }}</span>--}}

{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        --}}{{--        @can('teams.view_index')--}}
{{--        --}}{{--            <li class="c-sidebar-nav-item">--}}
{{--        --}}{{--                <a href="{{ route('admin.teams.index') }}"--}}
{{--        --}}{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.teams.index') active @endif">--}}
{{--        --}}{{--                    <svg  class="c-sidebar-nav-icon" viewBox="0 0 20 20"--}}
{{--        --}}{{--                         fill="currentColor">--}}
{{--        --}}{{--                        <path--}}
{{--        --}}{{--                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>--}}
{{--        --}}{{--                    </svg>--}}

{{--        --}}{{--                    Manage Teams--}}

{{--        --}}{{--                </a>--}}
{{--        --}}{{--            </li>--}}
{{--        --}}{{--        @endcan--}}

{{--        @can('roles.view_index')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('admin.roles.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.roles.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-group"></i>--}}
{{--                    Manage Roles--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\Role::count()  }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('permissions.view_index')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('admin.permissions.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.permissions.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-lock-locked">--}}
{{--                    </i>--}}
{{--                    Manage Permissions--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\Permission::count()  }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('libraries.view_index')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('admin.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'admin.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-playlist-add">--}}
{{--                    </i>--}}
{{--                    Manage Libraries--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @can('exports.view_index')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('exports.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'exports.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-cloud-download"></i>--}}
{{--                    Export Data--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        <li class="c-sidebar-nav-item">--}}
{{--            <a href="{{ route('links.index') }}"--}}
{{--               class="c-sidebar-nav-link @if(Route::current()->getName() == 'links.index') active @endif">--}}
{{--                <i class="c-sidebar-nav-icon cil-link">--}}
{{--                </i>--}}
{{--                Links--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        @can('audit_logs.view_index')--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('audit_logs.index') }}"--}}
{{--                   class="c-sidebar-nav-link @if(Route::current()->getName() == 'audit_logs.index') active @endif">--}}
{{--                    <i class="c-sidebar-nav-icon cil-history">--}}
{{--                    </i>--}}
{{--                    Audit Logs--}}
{{--                    <span class="badge badge-info right">{{ \App\Models\AuditLog::count()  }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endcan--}}

{{--        @auth--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a href="{{ route('settings') }}"--}}
{{--                   class="c-sidebar-nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">--}}
{{--                    <i class="c-sidebar-nav-icon cil-cog">--}}
{{--                    </i>--}}
{{--                    Settings--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <form id="logout" action="{{ route('logout') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                </form>--}}

{{--                <a href="#" class="c-sidebar-nav-link" role="button" onClick="confirmLogout()">--}}
{{--                    <!-- Heroicon: Logout icon -->--}}
{{--                    <i class="c-sidebar-nav-icon cil-account-logout">--}}
{{--                    </i>--}}
{{--                    Logout--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endauth--}}
{{--    </ul>--}}
{{--    <!-- /.sidebar-menu -->--}}
{{--    <!-- /.sidebar -->--}}
{{--</div>--}}

{{--@push('scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        /*--}}
{{--         * Function to confirm and handle logout--}}
{{--         */--}}

{{--        function confirmLogout() {--}}
{{--            let confirmLogout = confirm('Are you sure you want to logout?')--}}

{{--            if (confirmLogout) {--}}
{{--                let logoutForm = document.getElementById('logout')--}}
{{--                logoutForm.submit()--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}
