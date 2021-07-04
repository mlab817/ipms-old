<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    @livewireStyles
    @yield('styles')
</head>
<body>

@include('includes.header')

<header class="pagehead orghead border-bottom-0 pt-0 mb-4">

    <div class="container-lg pt-4 pt-lg-0 p-responsive clearfix">

        <div class="d-flex flex-wrap flex-items-start flex-md-items-center my-3">
            <a href="/organizations/da-pms/settings/profile" aria-label="Change your organization’s avatar" class="d-block tooltipped tooltipped-s">
                <img itemprop="image" class="avatar flex-shrink-0 mb-3 mr-3 mb-md-0 mr-md-4" src="https://avatars.githubusercontent.com/u/86537749?s=200&amp;v=4" width="100" height="100" alt="@da-pms">
            </a>
            <div class="flex-1">
                <h1 class="h2 lh-condensed">
                    {{ $office->name }}
                </h1>

                <div class="color-text-tertiary"><div></div></div>

                <div class="d-md-flex flex-items-center mt-2">

                </div>
            </div>

            <div class="flex-self-start mt-3">

            </div>
        </div>
    </div>

    <div class="position-relative">
        <nav class="js-profile-tab-count-container UnderlineNav hx_UnderlineNav js-responsive-underlinenav overflow-visible" data-url="/users/da-pms/tab_counts" aria-label="Organization">
            <div class="width-full d-flex position-relative container-lg">
                <ul class="list-style-none UnderlineNav-body width-full p-responsive overflow-hidden">

                    <li data-tab-item="org-header-projects-tab" class="d-flex js-responsive-underlinenav-item">
                        <a class="UnderlineNav-item " href="/orgs/da-pms/projects" data-hotkey="g b">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-project UnderlineNav-octicon">
                                <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                            </svg>
                            Projects

                        </a>
                    </li>

                    <li data-tab-item="org-header-people-tab" class="d-flex js-responsive-underlinenav-item">
                        <a class="UnderlineNav-item " href="/orgs/da-pms/people">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-person UnderlineNav-octicon">
                                <path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                            </svg>
                            People
                            <span title="Not available" data-view-component="true" class="Counter js-profile-member-count">1</span>
                        </a>
                    </li>

                    <li data-tab-item="org-header-settings-tab" class="d-flex js-responsive-underlinenav-item">
                        <a class="UnderlineNav-item " href="/organizations/da-pms/settings/profile">
                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-gear UnderlineNav-octicon">
                                <path fill-rule="evenodd" d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                    </li>

                </ul>

                <div class="UnderlineNav-actions position-absolute pr-3 pr-md-4 pr-lg-5 right-0 js-responsive-underlinenav-overflow" style="visibility: hidden">
                    <details data-view-component="true" class="details-overlay details-reset position-relative">
                        <summary role="button" data-view-component="true" aria-haspopup="menu">            <div class="UnderlineNav-item mr-0 border-0">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-kebab-horizontal">
                                    <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                </svg>
                                <span class="sr-only">More</span>
                            </div>
                        </summary>
                        <details-menu role="menu" data-view-component="true" class="dropdown-menu dropdown-menu-sw">            <ul>
                                <li data-menu-item="org-header-repositories-tab" hidden="">
                                    <a role="menuitem" class="js-selected-navigation-item selected dropdown-item" aria-current="page" data-selected-links=" /da-pms" href="/da-pms">Repositories</a>
                                </li>
                                <li data-menu-item="org-header-packages-tab" hidden="">
                                    <a role="menuitem" class="js-selected-navigation-item dropdown-item" data-selected-links=" /orgs/da-pms/packages" href="/orgs/da-pms/packages">Packages</a>
                                </li>
                                <li data-menu-item="org-header-people-tab" hidden="">
                                    <a role="menuitem" class="js-selected-navigation-item dropdown-item" data-selected-links=" /orgs/da-pms/people" href="/orgs/da-pms/people">People</a>
                                </li>
                                <li data-menu-item="org-header-teams-tab" hidden="">
                                    <a role="menuitem" class="js-selected-navigation-item dropdown-item" data-selected-links=" /orgs/da-pms/teams" href="/orgs/da-pms/teams">Teams</a>
                                </li>
                                <li data-menu-item="org-header-projects-tab" hidden="">
                                    <a role="menuitem" class="js-selected-navigation-item dropdown-item" data-selected-links=" /orgs/da-pms/projects" href="/orgs/da-pms/projects">Projects</a>
                                </li>
                                <li data-menu-item="org-header-settings-tab" hidden="">
                                    <a role="menuitem" class="js-selected-navigation-item dropdown-item" data-selected-links=" /organizations/da-pms/settings/profile" href="/organizations/da-pms/settings/profile">Settings</a>
                                </li>
                            </ul>
                        </details-menu>
                    </details>      </div>
            </div>
        </nav>
    </div>

</header>

<div class="container-lg p-responsive js-pinned-items-reorder-container clearfix">



    <div id="org-repositories" data-pjax-container="">

        <div class="col-12 col-md-8 d-md-inline-block">

            <div class="org-repos repo-list">

                <div class="">
                    <div data-view-component="true" class="blankslate">
                        <svg aria-hidden="true" viewBox="0 0 24 24" version="1.1" data-view-component="true" height="24" width="24" class="octicon octicon-repo blankslate-icon">
                            <path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path><path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                        </svg>

                        <h3 data-view-component="true" class="mb-1">This organization has no repositories.</h3>




                        <a class="btn btn-primary my-3" href="/organizations/da-pms/repositories/new">Create a new repository</a>

                    </div>

                </div>

                <div class="paginate-container d-none d-md-flex flex-md-justify-center" data-pjax="">

                </div>

                <div class="paginate-container d-md-none mb-5" data-pjax="">

                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 pl-md-4 float-right js-profile-tab-count-container" data-url="/users/da-pms/tab_counts">



            <div class="Box mb-3">
                <div class="Box-body">
                    <a class="d-block color-text-primary" href="/orgs/da-pms/people" data-ga-click="Orgs, go to people, location:profile people module; text:People">
            <span class="float-right f5 color-text-secondary">
              <span class="js-profile-member-count">1</span>
              <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-chevron-right">
    <path fill-rule="evenodd" d="M6.22 3.22a.75.75 0 011.06 0l4.25 4.25a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06-1.06L9.94 8 6.22 4.28a.75.75 0 010-1.06z"></path>
</svg>
            </span>
                        <h4 class="f4 text-normal mb-3">People</h4>
                    </a>
                    <div class="clearfix d-flex flex-wrap" style="margin: -1px">
                        <a class="member-avatar" data-ga-click="Orgs, go to person, location:profile people module; text:username" data-hovercard-type="user" data-hovercard-url="/users/mlab817/hovercard" data-octo-click="hovercard-link-click" data-octo-dimensions="link_type:self" href="/orgs/da-pms/people/mlab817">
                            <img class="avatar avatar-user" src="https://avatars.githubusercontent.com/u/29625844?s=96&amp;v=4" width="48" height="48" alt="@mlab817">
                        </a>
                    </div>
                </div>
                <div class="Box-footer Box-row--gray">
                    <details class="details-reset details-overlay details-overlay-dark">
                        <summary class="btn btn-sm" data-hashchange-activated="invite-member" data-ga-click="Orgs, invite admin, location:repositories index; text:Invite someone" role="button">
                            Invite someone
                        </summary>

                        <details-dialog class="anim-fade-in fast Box p-6 Box-overlay--wide js-invite-member-dialog" role="dialog" aria-modal="true">
                            <button class="btn-octicon position-absolute right-0 top-0 p-4" type="button" aria-label="Close dialog" data-close-dialog="">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-x">
                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                </svg>
                            </button>

                            <div data-view-component="true" class="blankslate">
                                <svg aria-hidden="true" viewBox="0 0 24 24" version="1.1" data-view-component="true" height="24" width="24" class="octicon octicon-mail blankslate-icon">
                                    <path fill-rule="evenodd" d="M1.75 3A1.75 1.75 0 000 4.75v14c0 .966.784 1.75 1.75 1.75h20.5A1.75 1.75 0 0024 18.75v-14A1.75 1.75 0 0022.25 3H1.75zM1.5 4.75a.25.25 0 01.25-.25h20.5a.25.25 0 01.25.25v.852l-10.36 7a.25.25 0 01-.28 0l-10.36-7V4.75zm0 2.662V18.75c0 .138.112.25.25.25h20.5a.25.25 0 00.25-.25V7.412l-9.52 6.433c-.592.4-1.368.4-1.96 0L1.5 7.412z"></path>
                                </svg>

                                <h3 data-view-component="true" class="mb-1">Invite a member to DA-PMS</h3>
                            </div>

                            <!-- '"` --><!-- </textarea></xmp> --><form class="input-block" action="/orgs/da-pms/invitations/member_adder_add" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="8gOyeYnRlY53vMnRatOgIGI+gL6B5lAnHA/S1io5VaYFynE68I8RLWpoTHri8Rm0M7YJa3ZXpfpaiUcC8UcneQ==">
                                <div class="input-group mt-3">

                                    <auto-complete src="/orgs/da-pms/invitations/invitee_suggestions" for="org-invite-complete-results" data-view-component="true" class="auto-search-group d-block">
                                        <input id="org-invite-complete-input" name="identifier" aria-label="Search by username, full name or email address" autofocus="autofocus" required="required" placeholder="Search by username, full name, or email address" type="text" data-view-component="true" class="form-control form-control input-block input-contrast auto-search-input new-member-field" role="combobox" aria-controls="org-invite-complete-results" aria-expanded="false" aria-autocomplete="list" aria-haspopup="listbox" autocomplete="off" spellcheck="false">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-person">
                                            <path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                                        </svg>
                                        <ul id="org-invite-complete-results" data-view-component="true" class="autocomplete-results invite-member-results" hidden="" role="listbox"></ul>
                                    </auto-complete>      <div class="input-group-button">
                                        <button type="submit" data-view-component="true" class="js-auto-complete-button btn-primary btn" disabled="">

                                            Invite


                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3">
                                <a class="Link--primary" href="/organizations/da-pms/billing_managers/new">Invite a billing manager</a>
                            </div>
                        </details-dialog>

                    </details>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@livewireScripts
<script defer src="https://unpkg.com/alpinejs@3.1.1/dist/cdn.min.js"></script>
@stack('scripts')

</body>
</html>
