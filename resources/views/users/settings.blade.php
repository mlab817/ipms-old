@extends('layouts.users')

@section('content')
    <div class="m-4">
        <div class="Subhead hx_Subhead--responsive Subhead--spacious">
            <h2 class="Subhead-heading">Successor settings</h2>
        </div>
        @if(! $user->successor)
        <p class="text-small color-text-secondary mt-3">
            By clicking "Add Successor" below, I acknowledge that I am the owner of the @mlab817 account, and am
            authorizing GitHub to transfer content within that account to my GitHub Successor, <span class="js-designated-user" data-autocomplete-text="designated below">designated below</span>, in the event
            of my death. I understand that this appointment of a successor does not override legally binding next-of-kin rules
            or estate laws of any relevant jurisdiction, and does not create a binding will.
            <a href="https://docs.github.com/github/setting-up-and-managing-your-github-user-account/maintaining-ownership-continuity-of-your-user-accounts-repositories">
                Learn more about account successors.
            </a>
        </p>
        <div class="d-flex flex-column">
            <form action="" class="mt-4" accept-charset="UTF-8" method="post">
                @csrf
                @method('PUT')
                <label for="search-user">Search by username, full name, or email address</label>
                <div class="input-group mt-2">
                    <div class="position-relative">
                        <auto-complete for="users-popup" src="{{ route('users.index') }}">
                            <input class="form-control input-block" name="username" type="text" placeholder="Username" aria-label="Username" autofocus="" role="combobox" aria-haspopup="listbox" autocomplete="off" spellcheck="false" aria-controls="users-popup" aria-autocomplete="list">
                            <ul id="users-popup" class="autocomplete-results" hidden="" role="listbox"></ul>
                        </auto-complete>
                    </div>
                    <span class="input-group-button">
                        <button class="btn" type="button" aria-label="Add Successor">
                            Add Successor
                        </button>
                    </span>
                </div>
            </form>
        </div>

        <div class="Box mt-4">
            <div class="blankslate">
                <h3 class="mb-1">You have not designated a successor.</h3>
            </div>
        </div>
        @endif

        @if($user->successor)
        <div class="Box">
            <div>
                <div class="Box-row">
                    <a class="no-underline" href="/mlabolotaolo">
                        <img class="avatar v-align-middle avatar-user" src="https://avatars.githubusercontent.com/u/62732472?s=56&amp;v=4" width="28" height="28" alt="@mlabolotaolo">
                        mlabolotaolo
                    </a>

                    <form class="inline-form v-align-middle float-right" action="/succession/cancel?login=mlabolotaolo" accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put">
                        @csrf
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                    </form>

                </div>

            </div>
        </div>
        @endif

        <div class="Subhead hx_Subhead--responsive Subhead--spacious">
            <h2 class="Subhead-heading Subhead-heading--danger">Delete account</h2>
        </div>

        <p>
            Your account is currently an owner of <strong>{{ $user->projects()->own()->count() }}</strong> PAPs.
        </p>

        <p>
            To retain consistency within the system, your account will not be permanently deleted. However, the following information will be removed:
        </p>

        <ul class="pl-3">
            <li>Email address</li>
            <li>Name (first and last)</li>
            <li>Username</li>
            <li>Avatar</li>
        </ul>

        <p>
            However, ownership of all your PAPs will be transferred to the successor account you determined.
        </p>

        <p>
            <button disabled="disabled" type="button" class="btn-danger btn">
                Delete your account
            </button>
        </p>
    </div>
@stop
