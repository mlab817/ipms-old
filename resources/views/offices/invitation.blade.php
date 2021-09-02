@extends('layouts.header-only')

@section('content')
    <div class="container-md">
        <div class="Box mx-auto my-6 p-4 col-11">
            <div class="text-center position-relative">
                <img class="avatar mb-4" src="https://avatars.githubusercontent.com/u/86537749?s=150&amp;v=4" width="75" height="75" alt="@da-pms">

                <p class="f3">
                    You’ve been invited to the
                    <a href="/da-pms"><strong>DA-PMS</strong></a>
                    organization!
                </p>

                <p class="color-text-tertiary text-small mb-4">
                    Invited by Mark Lester Bolotaolo
                </p>


                <div class="my-4">
                    <!-- '"` --><!-- </textarea></xmp> --><form class="inline-form" method="post" action="/orgs/da-pms/invitation"><input class="btn btn-primary" data-ga-click="Orgs, join, location:invitation landing; text:Join" type="submit" value="Join DA-PMS"><input type="hidden" name="authenticity_token" value="hZaDZkdeMo3+U5vw/CbcROE2t6978yLBDZghl3KxuJihzmISA9GpUL3uS0Z9lbfX7yKerMzDJQ2xnlMo+XuadQ=="></form>

                    <!-- '"` --><!-- </textarea></xmp> --><form class="inline-form" method="post" action="/orgs/da-pms/invitations/28205948"><input type="hidden" name="_method" value="delete"><input class="btn" type="submit" value="Decline"><input type="hidden" name="authenticity_token" value="NPx2ycnjuwRS8ioJPJwFXoLNFvkqP3wmv/VszuSXvQDZSjiJkiaLFABB1M2idmOA8ibKOPZyhJdqMQHtA4fiBg=="></form>
                </div>
            </div>
        </div>

        <div class="color-text-tertiary p-0 my-0 mx-auto col-sm-8 col-md-6 col-11">
            <p>
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-lock mr-2">
                    <path fill-rule="evenodd" d="M4 4v2h-.25A1.75 1.75 0 002 7.75v5.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-5.5A1.75 1.75 0 0012.25 6H12V4a4 4 0 10-8 0zm6.5 2V4a2.5 2.5 0 00-5 0v2h5zM12 7.5h.25a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-5.5a.25.25 0 01.25-.25H12z"></path>
                </svg>
                <a href="https://docs.github.com/articles/permission-levels-for-an-organization">Owners</a> of
                DA-PMS may be able to see:
            </p><ul class="pl-3">
                <li>If you have <a href="https://docs.github.com/articles/securing-your-account-with-two-factor-authentication-2fa">two-factor authentication</a> enabled or not</li>
                <li>Your public profile information</li>
                <li><a href="https://docs.github.com/articles/reviewing-the-audit-log-for-your-organization/#search-based-on-the-action-performed">Certain activity</a> within this organization</li>
                <li>Country of request origin</li>
                <li>Your access level to repositories within the organization</li>
                <li>Your IP address</li>
            </ul>
            <p></p>

            <p class="color-text-secondary mb-0">
                <a href="/orgs/da-pms/opt-out">Opt out</a> of future invitations from this organization.
            </p>
        </div>
    </div>
@stop
