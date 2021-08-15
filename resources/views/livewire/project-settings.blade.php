<div class="d-flex mb-3 px-3 px-md-4 px-lg-5">
    <div class="flex-shrink-0 col-12 col-lg-9 mb-4 mb-md-0">
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
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-alert">
                                        <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                    </svg>
                                    Transferring may be delayed until the new owner approves the transfer.
                                </div>
                                <form action="{{ route('pending_transfers.store') }}" method="POST">
                                    @csrf
                                    <div class="Box-body overflow-auto">
                                        <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">

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
                            Transfer this program/project to another user or to an organization where you
                            have the ability to create repositories.
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
