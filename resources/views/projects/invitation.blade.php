@extends('layouts.project')

@section('content')
    <main id="js-pjax-container" data-pjax-container="">

        <div class="clearfix new-discussion-timeline container-xl px-3 px-md-4 px-lg-5">
            <div id="repo-content-pjax-container" class="repository-content ">


                <div class="container-sm px-3 mt-4">
                    <div class="pt-4 text-center">
                        <a class="d-inline-block" href="{{ route('users.show', $collaborator->project->creator) }}">
                            <img class="avatar avatar-user" src="{{ $collaborator->project->creator->user_avatar() }}" width="48" height="48" alt="{{ '@' . $collaborator->project->creator->username }}">
                        </a>

                        <svg class="octicon octicon-plus pl-3 pr-4 color-text-secondary" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"></path></svg>

                        <a class="d-inline-block" href="{{ route('users.show', $collaborator->user) }}">
                            <img class="avatar avatar-user" src="{{ $collaborator->user->user_avatar() }}" width="48" height="48" alt="{{ '@' . $collaborator->user->username }}">
                        </a>

                        <p></p><h3><a href="{{ route('users.show', $collaborator->project->creator) }}">{{ $collaborator->project->creator->username }}</a> invited you to collaborate</h3><p></p>


                        <div class="boxed-group mt-4">
                            <form class="inline-form js-navigation-open" action="{{ route('projects.accept_invite', ['project' => $project, 'token' => $token]) }}" accept-charset="UTF-8" method="post">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="btn btn-primary" name="accept" value="true">
                                    Accept invitation
                                </button>
                            </form>

                            <form class="inline-form js-navigation-open" action="{{ route('projects.accept_invite', ['project' => $project, 'token' => $token]) }}" accept-charset="UTF-8" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn" name="accept" value="false">
                                    Decline
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Information on this invitation -->
                    <div class="col-11 pt-6 col-sm-8 mx-auto pb-2 border-bottom color-text-secondary">
                        <p>
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-lock mr-2">
                                <path fill-rule="evenodd" d="M4 4v2h-.25A1.75 1.75 0 002 7.75v5.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-5.5A1.75 1.75 0 0012.25 6H12V4a4 4 0 10-8 0zm6.5 2V4a2.5 2.5 0 00-5 0v2h5zM12 7.5h.25a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-5.5a.25.25 0 01.25-.25H12z"></path>
                            </svg>
                            Upon acceptance, you will be able to:
                        </p>
                        <ul class="pl-3">
                            <li>View and update information on the PAP</li>
                        </ul>
                        <p></p>
                    </div>

                    <div class="col-11 pt-6 col-sm-8 mx-auto pb-2 border-bottom color-text-secondary">
                        <p>
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-lock mr-2">
                                <path fill-rule="evenodd" d="M4 4v2h-.25A1.75 1.75 0 002 7.75v5.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-5.5A1.75 1.75 0 0012.25 6H12V4a4 4 0 10-8 0zm6.5 2V4a2.5 2.5 0 00-5 0v2h5zM12 7.5h.25a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-5.5a.25.25 0 01.25-.25H12z"></path>
                            </svg>
                            However, you will not be able to:
                        </p>
                        <ul class="pl-3">
                            <li>Add other users into the PAP</li>
                            <li>Archive, transfer or delete the PAP</li>
                        </ul>
                        <p></p>
                    </div>


                </div>


            </div>
        </div>

    </main>
@stop
