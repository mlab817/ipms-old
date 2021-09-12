@extends('layouts.project')

@section('content')
    <div class="d-flex mb-3 px-3 px-md-4 px-lg-5">
        <div class="flex-shrink-0 col-8 col-lg-6 mb-4 mb-md-0 mx-auto">
            <div class="Subhead hx_Subhead--responsive">
                <h2 class="Subhead-heading">Settings</h2>
            </div>

            <form action="{{ route('base-projects.update', $baseProject) }}" method="POST" accept-charset="UTF-8">
                @csrf
                @method('PUT')
                <dl class="form-group d-inline-block @error('title') errored @enderror">
                    <dt class="input-label">
                        <label for="title">Title</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="text" class="form-control input-block d-inline-block" name="title" id="title" value="{{ $baseProject->title }}" aria-describedby="title-validation">
                        <button type="submit" class="btn">Rename</button>
                        @error('title')
                            <p class="note error" id="title-validation">{{ $message }}</p>
                        @enderror
                    </dd>
                </dl>
            </form>


            <div class="clearfix mt-6">
                <div class="f2 mb-3 text-normal float-left">Manage access</div>
                <div class="float-right">
                    <details class="details-reset details-overlay details-overlay-dark text-left">
                        <summary class="btn btn-sm btn-primary" role="button">
                            Invite a collaborator
                        </summary>
                        <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast " aria-label="Invite a collaborator" role="dialog" aria-modal="true">
                            <button aria-label="Close dialog" type="button" class="right-0 Link--muted btn-link position-absolute p-4">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-x">
                                    <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                </svg>
                            </button>

                            <div class="d-flex flex-column p-4 min-height-0">
                                <div class="Box-body text-center border-bottom-0">
                                    <p><svg height="32" class="octicon octicon-repo color-text-tertiary" viewBox="0 0 24 24" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path><path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path></svg></p>
                                    <div class="f3">Invite a collaborator to this PAP</div>
                                </div>

                                <form class="d-flex flex-column min-height-0" action="{{ route('collaborators.store') }}" accept-charset="UTF-8" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" value="{{ $baseProject->id }}" name="base_project_id">
                                    <div class="d-flex flex-column min-height-0">
                                        <div class="d-block position-relative">
                                            <select name="collaborator_id" id="collaborator_id" class="form-select width-full" aria-required="" required>
                                                <option value="" selected disabled>Select Collaborator</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->full_name . ' (' . $user->username .')' }}</option>
                                                @endforeach
                                            </select>

                                            <button type="submit" class="btn-primary btn btn-block mt-4">
                                                Select a collaborator above
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </details-dialog>
                    </details>
                </div>
            </div>

            @if(! count($baseProject->collaborators))
                <div class="Box text-center px-4 py-6">
                    <img src="https://github.githubassets.com/images/icons/permissions.png" alt="user granting permissions" class="mb-3" style="width: 56px; height: 56px;">
                    <h3 class="mb-3">You haven't invited any collaborators yet</h3>
                    <div class="js-add-access-form">
                        <details class="details-reset details-overlay details-overlay-dark d-inline-block text-left">
                            <summary class="btn btn-primary mt-3" role="button">
                                Invite a collaborator
                            </summary>
                            <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast " aria-label="Invite a collaborator" role="dialog" aria-modal="true">
                                <button aria-label="Close dialog" type="button" class="right-0 Link--muted btn-link position-absolute p-4">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-x">
                                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                    </svg>
                                </button>    <div class="d-flex flex-column p-4 min-height-0">
                                    <div class="Box-body text-center border-bottom-0">
                                        <p><svg height="32" class="octicon octicon-repo color-text-tertiary" viewBox="0 0 24 24" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path><path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path></svg></p>
                                        <div class="f3">Invite a collaborator to this PAP</div>
                                    </div>

                                    <form class="d-flex flex-column min-height-0" action="{{ route('collaborators.store') }}" accept-charset="UTF-8" method="post">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $baseProject->id }}" name="project_id">
                                        <div class="d-flex flex-column min-height-0">
                                            <div class="d-block position-relative">
                                                <select name="collaborator_id" id="collaborator_id" class="form-select width-full" aria-required="" required>
                                                    <option value="" selected disabled>Select Collaborator</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->full_name . ' (' . $user->username .')' }}</option>
                                                    @endforeach
                                                </select>

                                                <button type="submit" class="btn-primary btn btn-block mt-4">
                                                    Select a collaborator above
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </details-dialog>
                        </details>
                    </div>
                </div>

            @else

                <div class="Box rounded-0 rounded-top-1 border-bottom-0">
                    <div class="Box-header d-flex flex-items-center">
                        <div class="Box-title">
                            Collaborators
                        </div>
                    </div>
                </div>

                <div id="repository-access-table">
                    <div class="Box rounded-0 rounded-bottom-1 border-top-0">
                        <div class="border-top">


                        </div>
                        @foreach($baseProject->collaborators as $collaborator)
                            <div class="Box-row clearfix d-flex flex-items-center js-repo-access-entry adminable">
                                <div class="mx-3">
                                    <a href="{{ route('users.show', $collaborator->user) }}">
                                        <img class="avatar avatar-user" src="{{ $collaborator->user->user_avatar() }}" width="32" height="32" alt="@mlabolotaolo">
                                    </a>
                                </div>

                                <div class="d-flex flex-column flex-auto col-6">
                                    <a href="{{ route('users.show', $collaborator->user) }}"><strong>{{ $collaborator->user->username }}</strong></a>
                                    <div class="f6 color-text-secondary">
                                        @if(! $collaborator->accepted_at)
                                            Awaiting {{ $collaborator->user->username }}’s response
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-items-center col-3">
                                    @if(! $collaborator->accepted_at)
                                        <span class="f6 color-text-secondary">Pending Invite</span>
                                    @endif
                                </div>

                                <div class="col-3 d-flex flex-justify-end pr-3">
                                </div>

                                <div class="d-flex flex-column flex-grow-0">
                                    @if(! $collaborator->accepted_at)
                                        <details class="details-reset details-overlay details-overlay-dark lh-default color-text-primary d-inline-block text-left">
                                            <summary class="close-button btn-octicon-danger" aria-label="cancel invitation for user to access this repository" role="button">
                                                <svg class="octicon octicon-trash" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
                                                </svg>
                                            </summary>
                                            <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast " role="dialog" aria-modal="true">
                                                <div class="Box-header">
                                                    <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog="">
                                                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-x">
                                                            <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                        </svg>
                                                    </button>
                                                    <h3 class="Box-title ">Confirm you want to remove this invitation</h3>
                                                </div>

                                                <form action="{{ route('collaborators.destroy', $collaborator) }}" accept-charset="UTF-8" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-flex flex-auto flex-column p-3">
                                                        <p>
                                                            Once canceled, this user will no longer be invited to edit this PAP.
                                                        </p>

                                                        <button type="submit" class="css-truncate css-truncate-overflow btn-danger btn btn-block">
                                                            Cancel invitation
                                                        </button>
                                                    </div>
                                                </form>
                                            </details-dialog>
                                        </details>
                                    @else
                                        <details class="details-reset details-overlay details-overlay-dark lh-default color-text-primary d-inline-block text-left">
                                            <summary class="close-button btn-octicon-danger" aria-label="cancel invitation for user to access this repository" role="button">
                                                <svg class="octicon octicon-trash" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
                                                </svg>
                                            </summary>
                                            <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast " role="dialog" aria-modal="true">
                                                <div class="Box-header">
                                                    <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog="">
                                                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-x">
                                                            <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                        </svg>
                                                    </button>
                                                    <h3 class="Box-title ">Confirm you want to remove this collaborator</h3>
                                                </div>

                                                <form action="{{ route('collaborators.destroy', $collaborator) }}" accept-charset="UTF-8" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-flex flex-auto flex-column p-3">
                                                        <p>
                                                            Once removed, this user will no longer be invited to edit this PAP.
                                                        </p>

                                                        <button type="submit" class="css-truncate css-truncate-overflow btn-danger btn btn-block">
                                                            Remove Collaborator
                                                        </button>
                                                    </div>
                                                </form>
                                            </details-dialog>
                                        </details>
                                    @endif
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>

            @endif

            <div class="Subhead hx_Subhead--responsive Subhead--spacious border-bottom-0 mb-0">
                <h2 id="danger-zone" class="Subhead-heading Subhead-heading--danger">Danger Zone</h2>
            </div>

            <div class="Box color-border-danger">
                <ul>
                    <li class="Box-row d-flex flex-items-center">
                        <div class="flex-md-order-1 flex-order-2">
                            <details class="details-reset details-overlay details-overlay-dark">
                                <summary role="button" class="btn btn-danger" aria-haspopup="dialog">Transfer</summary>
                                <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                            <!-- <%= octicon "x" %> -->
                                            <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                        </button>
                                        <h3 class="Box-title">Transfer PAP</h3>
                                    </div>
                                    <div class="flash flash-warn flash-full">
                                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-alert">
                                            <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                        </svg>
                                        Transferring may be delayed until the new owner approves the transfer.
                                    </div>
                                    <form action="{{ route('pending_transfers.store') }}" method="POST">
                                        @csrf
                                        <div class="Box-body overflow-auto">
                                            <input type="hidden" name="project_id" id="project_id" value="{{ $baseProject->id }}">

                                            <select name="to" id="to" class="form-select input-block">
                                                <option value="">Select user</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="Box-footer">
                                            <button type="submit" class="btn btn-block btn-primary">Transfer</button>
                                        </div>
                                    </form>
                                </details-dialog>

                            </details>
                        </div>
                        <div class="flex-auto">
                            <strong>Transfer ownership</strong>
                            <p class="mb-0">
                                Transfer this program/project to another user.
                            </p>
                        </div>
                    </li>

                    <li  class="Box-row d-flex flex-items-center">
                        <div class="flex-md-order-1 flex-order-2">
                            <details class="details-reset details-overlay details-overlay-dark">
                                <summary role="button" class="btn btn-danger" aria-haspopup="dialog">Archive</summary>
                                <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                            <!-- <%= octicon "x" %> -->
                                            <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                        </button>
                                        <h3 class="Box-title">Box title</h3>
                                    </div>
                                    <div class="overflow-auto">
                                        <div class="Box-body overflow-auto">
                                            <p>
                                                The quick brown fox jumps over the lazy dog and feels as if he were in the seventh heaven of typography together with Hermann Zapf, the most famous artist of the...
                                            </p>
                                        </div>
                                        <ul>
                                            <li class="Box-row">
                                                <img class="avatar v-align-middle mr-2" src="https://avatars.githubusercontent.com/broccolini?s=48" alt="broccolini" width="24" height="24">
                                                @broccolini
                                            </li>
                                            <li class="Box-row border-bottom">
                                                <img class="avatar v-align-middle mr-2" src="https://avatars.githubusercontent.com/jonrohan?s=48" alt="jonrohan" width="24" height="24">
                                                @jonrohan
                                            </li>
                                            <li class="Box-row border-bottom">
                                                <img class="avatar v-align-middle mr-2" src="https://avatars.githubusercontent.com/shawnbot?s=48" alt="shawnbot" width="24" height="24">
                                                @shawnbot
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="Box-footer">
                                        <button type="button" class="btn btn-block" data-close-dialog>Okidoki</button>
                                    </div>
                                </details-dialog>
                            </details>
                        </div>
                        <div class="flex-auto">
                            <strong>Archive this program/project</strong>
                            <p class="mb-0">Mark this program/project as archived and read-only.</p>
                        </div>
                    </li>

                    <li class="Box-row d-flex flex-items-center">
                        <div class="flex-md-order-1 flex-order-2">
                            <details class="details-reset details-overlay details-overlay-dark">
                                <summary role="button" class="btn btn-danger" aria-haspopup="dialog">Delete</summary>
                                <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast">
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                            <!-- <%= octicon "x" %> -->
                                            <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                        </button>
                                        <h3 class="Box-title">Are you really sure?</h3>
                                    </div>
                                    <div class="flash flash-warn flash-full">
                                        Unexpected bad things will happen if you don’t read this!
                                    </div>
                                    <div class="Box-body" x-data="{
                                                uuid: '',
                                                reason: ''
                                            }">
                                        <form action="{{ route('projects.destroy', $baseProject) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <p>
                                                This action <strong>cannot</strong> be undone. This will permanently delete the <strong>{{ $baseProject->title }}</strong>'s profile, trip, review, pipol, attachments, history, and issues.
                                            </p>
                                            <p>
                                                <textarea class="form-control width-full" name="reason" x-model="reason" style="resize: none;" placeholder="Reason for deleting"></textarea>
                                            </p>
                                            <p>
                                                Please type <strong>{{ $baseProject->uuid }}</strong> to confirm.
                                            </p>
                                            <p>
                                                <input type="text" class="form-control width-full" name="uuid" x-model="uuid">
                                            </p>
                                            <button type="submit" class="btn btn-danger btn-block" x-bind:disabled="uuid !== '{{ $baseProject->uuid }}' || !reason">
                                                I understand the consequences, delete this PAP
                                            </button>
                                        </form>
                                    </div>
                                </details-dialog>
                            </details>
                        </div>

                        <div class="flex-auto">
                            <strong>Delete this program/project</strong>
                            <p class="mb-0">
                                Once you delete a program/project, there is no going back. Please be certain.
                            </p>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
@stop
