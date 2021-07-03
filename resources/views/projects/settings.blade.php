@extends('layouts.project')

@section('content')
    <div class="d-flex mb-3 px-3 px-md-4 px-lg-5">
        <div class="flex-shrink-0 col-12 col-lg-9 mb-4 mb-md-0">
            <div class="Subhead hx_Subhead--responsive Subhead--spacious border-bottom-0 mb-0">
                <h2 id="danger-zone" class="Subhead-heading">Danger Zone</h2>
            </div>

            <div class="Box color-border-danger">
                <ul>
                    <li  class="Box-row d-flex flex-items-center">
                        <!-- '"` --><!-- </textarea></xmp> -->
                        <form class="flex-md-order-1 flex-order-2" action="/mlab817/ipms-v2/settings/transfer"
                              accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token"
                                                                          value="kfWjcQuO3E/bTp58LhZ8zkPvmtxKsGgI3ZQO4KMC+cm8L0FgezRvVj2xRLaKDljWdwt43XO8h8ECIWoRMXDvFQ==">
                            <details class="details-reset details-overlay details-overlay-dark ">
                                <summary role="button"  class="btn-danger btn">
                                    Transfer
                                </summary>
                                <details-dialog class="Box d-flex flex-column anim-fade-in fast Box--overlay" aria-label="Transfer program/project" role="dialog" aria-modal="true">
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                                aria-label="Close dialog" data-close-dialog="">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                  height="16" width="16"
                                                 class="octicon octicon-x">
                                                <path fill-rule="evenodd"
                                                      d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                            </svg>
                                        </button>
                                        <h1 class="Box-title">Transfer program/project</h1>
                                    </div>
                                    <div class="Box-body overflow-auto">
                                        <p>Transferring may be delayed until the new owner approves the
                                            transfer.</p>
                                        <p><strong>New owner’s GitHub username or organization name</strong></p>
                                        <p>
                                            <input class="form-control input-block js-synced-repo-owner-input"
                                                   type="text" name="new_owner" autofocus="" required=""
                                                   aria-label="Type in the username of the new owner."
                                                   placeholder="Username or organization name" data-sync="name">
                                        </p>

                                    </div>
                                    <div class="Box-footer">
                                        <p>Type <strong>mlab817/ipms-v2</strong> to confirm.</p>
                                        <p>
                                            <input class="form-control input-block" type="text" autofocus=""
                                                   required="" pattern="[mM][lL][aA][bB]817/[iI][pP][mM][sS]-[vV]2"
                                                   aria-label="Type in the name of the program/project to confirm that you want to transfer this program/project."
                                                   autocomplete="off">
                                        </p>

                                        <button data-disable-invalid="true" type="submit"
                                                class="btn-danger btn btn-block" disabled="">


                                            I understand, transfer this program/project.


                                        </button>
                                    </div>
                                </details-dialog>
                            </details>
                        </form>
                        <div class="flex-auto">
                            <strong>Transfer ownership</strong>
                            <p class="mb-0">
                                Transfer this program/project to another user or to an organization where you
                                have the ability to create repositories.
                            </p>
                        </div>

                    </li>
                    <li  class="Box-row d-flex flex-items-center">
                        <details class="details-reset details-overlay details-overlay-dark flex-order-2">
                            <summary
                                class="btn btn-danger boxed-action float-md-right float-none ml-0 ml-md-3 mt-md-0 mt-2"
                                role="button">Archive this program/project
                            </summary>

                            <details-dialog class="Box d-flex flex-column anim-fade-in fast Box--overlay "
                                            aria-label="Archive program/project" role="dialog" aria-modal="true">
                                <div class="Box-header">
                                    <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                            aria-label="Close dialog" data-close-dialog="">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                              height="16" width="16"
                                             class="octicon octicon-x">
                                            <path fill-rule="evenodd"
                                                  d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                        </svg>
                                    </button>
                                    <h1 class="Box-title">Archive program/project</h1>
                                </div>
                                <div  class="flash flash-warn flash-full">
                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                          height="16" width="16"
                                         class="octicon octicon-alert">
                                        <path fill-rule="evenodd"
                                              d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                    </svg>

                                    <strong class="overflow-hidden">This program/project will become read-only.</strong>
                                    <p class="overflow-hidden mt-1 ml-5">You will still be able to fork the
                                        program/project and unarchive it at any time.</p>


                                </div>
                                <div class="Box-body overflow-auto">
                                    <div class="d-flex flex-nowrap mb-3">
                                        <div>
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                  height="16" width="16"
                                                 class="octicon octicon-workflow">
                                                <path fill-rule="evenodd"
                                                      d="M0 1.75C0 .784.784 0 1.75 0h3.5C6.216 0 7 .784 7 1.75v3.5A1.75 1.75 0 015.25 7H4v4a1 1 0 001 1h4v-1.25C9 9.784 9.784 9 10.75 9h3.5c.966 0 1.75.784 1.75 1.75v3.5A1.75 1.75 0 0114.25 16h-3.5A1.75 1.75 0 019 14.25v-.75H5A2.5 2.5 0 012.5 11V7h-.75A1.75 1.75 0 010 5.25v-3.5zm1.75-.25a.25.25 0 00-.25.25v3.5c0 .138.112.25.25.25h3.5a.25.25 0 00.25-.25v-3.5a.25.25 0 00-.25-.25h-3.5zm9 9a.25.25 0 00-.25.25v3.5c0 .138.112.25.25.25h3.5a.25.25 0 00.25-.25v-3.5a.25.25 0 00-.25-.25h-3.5z"></path>
                                            </svg>
                                        </div>
                                        <div class="pl-3 flex-1">
                                            <p class="overflow-hidden">All scheduled workflows will stop
                                                running.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap mb-3">
                                        <div>
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                  height="16" width="16"
                                                 class="octicon octicon-shield">
                                                <path fill-rule="evenodd"
                                                      d="M7.467.133a1.75 1.75 0 011.066 0l5.25 1.68A1.75 1.75 0 0115 3.48V7c0 1.566-.32 3.182-1.303 4.682-.983 1.498-2.585 2.813-5.032 3.855a1.7 1.7 0 01-1.33 0c-2.447-1.042-4.049-2.357-5.032-3.855C1.32 10.182 1 8.566 1 7V3.48a1.75 1.75 0 011.217-1.667l5.25-1.68zm.61 1.429a.25.25 0 00-.153 0l-5.25 1.68a.25.25 0 00-.174.238V7c0 1.358.275 2.666 1.057 3.86.784 1.194 2.121 2.34 4.366 3.297a.2.2 0 00.154 0c2.245-.956 3.582-2.104 4.366-3.298C13.225 9.666 13.5 8.36 13.5 7V3.48a.25.25 0 00-.174-.237l-5.25-1.68zM9 10.5a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.75a.75.75 0 10-1.5 0v3a.75.75 0 001.5 0v-3z"></path>
                                            </svg>
                                        </div>
                                        <div class="pl-3 flex-1">
                                            <p class="overflow-hidden mb-1">Security features will be
                                                unavailable:</p>
                                            <ul class="ml-3" style="column-count: 2">
                                                <li><span>Code scanning</span></li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div>
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                  height="16" width="16"
                                                 class="octicon octicon-checklist">
                                                <path fill-rule="evenodd"
                                                      d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
                                            </svg>
                                        </div>
                                        <div class="pl-3 flex-1">
                                            <p class="overflow-hidden mb-1">Before you archive, please consider:</p>
                                            <ul class="ml-3">
                                                <li>Updating any program/project settings</li>
                                                <li>Closing all open issues and pull requests</li>
                                                <li>Making a note in your README</li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                                <div class="Box-footer">
                                    <p>Please type <strong>mlab817/ipms-v2</strong> to confirm.</p>

                                    <!-- '"` --><!-- </textarea></xmp> -->
                                    <form action="/mlab817/ipms-v2/settings/archive" accept-charset="UTF-8"
                                          method="post"><input type="hidden" name="authenticity_token"
                                                               value="rItuN2ddQPTuODG0AvLPPS3yBtFViGxTaULwYc8RR+193nt/O+3Imub+IKtACQPN+y6lTLdyJFej7P0HzNOHKQ==">
                                        <p>
                                            <input type="text" class="form-control input-block" autofocus=""
                                                   required="" pattern="[mM][lL][aA][bB]817/[iI][pP][mM][sS]-[vV]2"
                                                   aria-label="Type in the name of the program/project to confirm that you want to archive this program/project."
                                                   name="verify" autocomplete="off">
                                        </p>
                                        <button data-disable-invalid="" type="submit"
                                                class="btn-danger btn btn-block" disabled="">


                                            <span class="d-md-inline-block d-none">I understand the consequences, archive this program/project</span>
                                            <span class="d-inline-block d-md-none">Archive this program/project</span>
    <div class="d-flex mb-3 px-3 px-md-4 px-lg-5">

                                        </button>
                                    </form>
                                </div>
                            </details-dialog>
                        </details>
                        <div class="flex-auto">
                            <strong>Archive this program/project</strong>
                            <p class="mb-0">Mark this program/project as archived and read-only.</p>
                        </div>

                    </li>
                    <li  class="Box-row d-flex flex-items-center">
                        <details
                            class="details-reset details-overlay details-overlay-dark flex-md-order-1 flex-order-2">
                            <summary
                                class="btn btn-danger boxed-action float-md-right float-none ml-0 ml-md-3 mt-md-0 mt-2"
                                role="button">
                                Delete this program/project
                            </summary>
                            <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast"
                                            aria-label="Delete program/project" role="dialog" aria-modal="true">
                                <div class="Box-header">
                                    <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                            aria-label="Close dialog" data-close-dialog="">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                              height="16" width="16"
                                             class="octicon octicon-x">
                                            <path fill-rule="evenodd"
                                                  d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                        </svg>
                                    </button>
                                    <div class="Box-title">Are you absolutely sure?</div>
                                </div>
                                <div  class="flash flash-warn flash-full">


                                    Unexpected bad things will happen if you don’t read this!


                                </div>
                                <div class="Box-body overflow-auto">
                                    <p>
                                        This action <strong>cannot</strong> be undone. This will permanently delete
                                        the <strong>mlab817/ipms-v2</strong>
                                        program/project, wiki, issues, comments, packages, secrets, workflow runs, and
                                        remove all collaborator associations.
                                    </p>


                                    <p>Please type <strong>mlab817/ipms-v2</strong> to confirm.</p>

                                    <!-- '"` --><!-- </textarea></xmp> -->
                                    <form action="/mlab817/ipms-v2/settings/delete" accept-charset="UTF-8"
                                          method="post"><input type="hidden" name="_method" value="delete"><input
                                            type="hidden" name="authenticity_token"
                                            value="0RuHd0pnyYpy3pMRf9KevyVT26j/UTJ+PyWBXbiXZ/OrAZBK0Llr5UqXXItOprEh3yblqsfXYyYoeouDPppPzA==">
                                        <p>
                                            <input type="text" class="form-control input-block" autofocus=""
                                                   required="" pattern="[mM][lL][aA][bB]817/[iI][pP][mM][sS]-[vV]2"
                                                   aria-label="Type in the name of the program/project to confirm that you want to delete this program/project."
                                                   name="verify" autocomplete="off">
                                        </p>
                                        <button data-disable-invalid="" type="submit"
                                                class="btn-danger btn btn-block" disabled="">


                                            <span class="d-md-inline-block d-none">I understand the consequences, delete this program/project</span>
                                            <span class="d-inline-block d-md-none">Delete this program/project</span>


                                        </button>
                                    </form>
                                </div>
                            </details-dialog>
                        </details>

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
