@extends('layouts.project')

@section('content')
    <div class="d-flex mb-3 px-3 px-md-4 px-lg-5">
        <div data-view-component="true" class="flex-shrink-0 col-12 col-lg-9 mb-4 mb-md-0">
            <div id="options_bucket">
                <div data-view-component="true" class="Subhead hx_Subhead--responsive">
                    <h2 data-view-component="true" class="Subhead-heading">Profile</h2>


                </div>      <!-- '"` --><!-- </textarea></xmp> -->


                <dl class="form-group d-inline-block my-0">
                    <dt class="input-label">
                        <label for="title">PAP Title</label>
                    </dt>
                    <dd>
                        {{ $project->title }}
                    </dd>
                </dl>

                <!-- '"` --><!-- </textarea></xmp> -->
                <form class="js-repo-features-form" data-autosubmit="true" action="/mlab817/ipms-v2/settings/update"
                      accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input
                        type="hidden" name="authenticity_token"
                        value="uHcMThx0EKTtIcCglTJ9arjZhHa1zEqvTC/0wHwUGkWQ1TZw+stxF+WlF9YKoiS7DkKimyBYHgEaIqUvY3gesg==">
                    <div class="form-checkbox js-repo-option">
                        <input type="hidden" name="template" value="0">
                        <input type="checkbox" name="template" value="1" id="template-feature">
                        <label for="template-feature">Template repository</label>
                        <span class="status-indicator ml-1 js-status-indicator">
          <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
               class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
          <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16"
               class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
        </span>
                        <p class="note">
                            Template repositories let users generate new repositories with the same directory structure
                            and files.
                            <a href="https://docs.github.com/articles/creating-a-repository-from-a-template/">Learn
                                more</a>.
                        </p>
                    </div>
                    <noscript>
                        <button type="submit" data-view-component="true" class="btn-primary btn">

                            Save changes


                        </button>
                    </noscript>
                </form>


                <!-- '"` --><!-- </textarea></xmp> -->
                <form data-remote="true" action="/mlab817/ipms-v2/settings/open-graph-image" accept-charset="UTF-8"
                      method="post"><input type="hidden" name="_method" value="put"><input type="hidden"
                                                                                           name="authenticity_token"
                                                                                           value="mg7tBdYwhnr6Kx/k6ESlYkGnWJ/5yGGb9aJu4kjVl/9tPaGrW8Ng8WjSyLyHnm46m0VqiARjzEhukwUi2DymaQ==">
                    <file-attachment input="repo-image-file-input" class="js-upload-repository-image is-default"
                                     data-upload-repository-id="323900739" novalidate="novalidate"
                                     data-upload-policy-url="/upload/policies/repository-images"><input type="hidden"
                                                                                                        value="mXNJPco+BgghxpxrLjwyKEO1WrrxkDsOUQT5f+zNmLNN5ICE31HS4Gm24d1FA8wr/DmlPztSDL7ioR5zPiPxsw=="
                                                                                                        data-csrf="true"
                                                                                                        class="js-data-upload-policy-url-csrf">
                        <input type="file" id="repo-image-file-input" style="display: none">
                        <dl class="form-group d-inline-block mb-0 mt-6">
                            <dt class="input-label">
                                <label>Social preview</label>
                            </dt>
                            <dd class="avatar-upload-container">
                                <p>
                                    Upload an image to customize your repository’s social media preview.
                                </p>
                                <p>
                                    Images should be at least 640×320px (1280×640px for best display).<br>
                                    <a href="/mlab817/ipms-v2/settings/og-template" class="text-bold">Download
                                        template</a>
                                </p>
                                <div class="avatar-upload position-relative">
                                    <div class="upload-state pt-0 loading position-absolute width-full text-center">
                                        <svg style="box-sizing: content-box; color: var(--color-icon-primary);"
                                             viewBox="0 0 16 16" fill="none" data-view-component="true" width="16"
                                             height="16" class="v-align-text-bottom anim-rotate">
                                            <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-opacity="0.25"
                                                    stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                        </svg>
                                        Uploading...
                                    </div>
                                    <div class="upload-state pt-0 color-text-danger file-empty">
                                        This file is empty.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger too-big">
                                        Please upload a picture smaller than 1 MB.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger bad-dimensions">
                                        Please upload a picture smaller than 10,000x10,000.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger bad-file">
                                        We only support PNG, GIF, or JPG pictures.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger failed-request">
                                        Something went really wrong and we can’t process that picture.
                                    </div>

                                    <div class="upload-state pt-0 color-text-danger bad-format">
                                        File contents don’t match the file extension.
                                    </div>
                                </div>
                            </dd>
                        </dl>
                    </file-attachment>
                </form>
                <div class="avatar-upload position-relative">
                    <details class="dropdown details-reset details-overlay">
                        <summary aria-haspopup="menu" role="button">
                            <div class="border rounded-2 repository-og-image js-repository-image-container"
                                 style="background-image: url('https://repository-images.githubusercontent.com/323900739/cc688500-d5b9-11eb-9160-46a50909a0c1')"></div>
                            <div
                                class="position-absolute color-bg-primary rounded-2 color-text-primary px-2 py-1 left-0 bottom-0 ml-2 mb-2 border">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                     height="16" width="16" class="octicon octicon-pencil">
                                    <path fill-rule="evenodd"
                                          d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path>
                                </svg>
                                Edit
                            </div>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-se" style="z-index: 99" role="menu">
                            <label for="repo-image-file-input" class="dropdown-item btn-link text-normal"
                                   role="menuitem" tabindex="0">
                                Upload an image…
                            </label>

                            <!-- '"` --><!-- </textarea></xmp> -->
                            <form action="/mlab817/ipms-v2/settings/open-graph-image" accept-charset="UTF-8"
                                  method="post"><input type="hidden" name="_method" value="delete"><input type="hidden"
                                                                                                          name="authenticity_token"
                                                                                                          value="YON+Dd06yvjwV4JDyOV47sw8uIZb42D+h5AvsNKo4aMCb2JHgNLu/s4LurUBpIxYdcDBEbZg6G+x85kUO4pCEQ==">
                                <input type="hidden" name="id" class="js-repository-image-id" value="596584">
                                <button class="dropdown-item btn-link js-remove-repository-image-button" role="menuitem"
                                        type="submit" data-disable-with=""
                                        data-confirm="Are you sure you want to remove mlab817/ipms-v2's promotional image?">
                                    Remove image
                                </button>
                            </form>
                        </details-menu>
                    </details>
                </div>


                <div data-view-component="true"
                     class="Subhead hx_Subhead--responsive Subhead--spacious border-bottom-0 mb-0">
                    <h2 id="features" data-view-component="true" class="Subhead-heading">Features</h2>


                </div>
                <div class="Box">
                    <!-- '"` --><!-- </textarea></xmp> -->
                    <form class="js-repo-features-form" data-autosubmit="true" action="/mlab817/ipms-v2/settings/update"
                          accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input
                            type="hidden" name="authenticity_token"
                            value="xl01v43Xz/XAoFwwUvmZlDY9xNanhYQmJUtDVJKM223u/w+Ba2iuRsgki0bNacBFgKbiOzIR0IhzRhK7jeDfmg==">
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="has_wiki" value="0">
                                <input type="checkbox" name="has_wiki" value="1" id="wiki-feature" checked="">
                                <label for="wiki-feature">Wikis</label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                            </div>
                        </div>

                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="wiki_access_to_pushers" value="0">
                                <input type="checkbox" name="wiki_access_to_pushers" value="1" id="wiki-pusher-access"
                                       checked="">
                                <label for="wiki-pusher-access">Restrict editing to collaborators only</label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">Public wikis will still be readable by everyone.</p>
                            </div>
                        </div>

                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="has_issues" value="0">
                                <input type="checkbox" name="has_issues" value="1" id="issue-feature" checked="">
                                <label for="issue-feature">Issues</label>
                                <span class="status-indicator ml-1 js-status-indicator">
              <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                   width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
              <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                   width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
            </span>
                                <p class="note">
                                    Issues integrate lightweight task tracking into your repository.
                                    Keep projects on track with issue labels and milestones, and reference them in
                                    commit messages.
                                </p>

                                <div class="flash my-3">
                                    <div class="d-flex flex-md-row flex-column flex-md-items-center flex-items-start">
                                        <div class="mb-md-0 mb-3">
                                            <strong class="mb-2">Get organized with issue templates</strong>
                                            <p class="pr-6 mb-0">Give contributors issue templates that help you cut
                                                through the noise and help them push your project forward.</p>
                                        </div>
                                        <div>
                                            <a href="/mlab817/ipms-v2/issues/templates/edit" class="btn btn-primary">
                                                Set up templates
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="enable_repository_funding_links" value="0">
                                <input type="checkbox" name="enable_repository_funding_links"
                                       id="repository-funding-links-feature" value="1">
                                <label for="repository-funding-links-feature">Sponsorships</label>
                                &nbsp;
                                <span class="status-indicator v-align-top ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">
                                    Sponsorships help your community know how to financially support this repository.
                                </p>
                                <div class="flash my-3">
                                    <div class="d-flex flex-md-row flex-column flex-md-items-center flex-items-start">
                                        <div class="mb-md-0 mb-3">
                                            <strong class="mb-2">
                                                Display a "Sponsor" button
                                            </strong>
                                            <p class="pr-6 mb-0">
                                                Add links to GitHub Sponsors or third-party methods your repository
                                                accepts for financial contributions to your project.
                                            </p>
                                        </div>

                                        <div>
                                            <a class="btn btn-primary"
                                               data-hydro-click="{&quot;event_type&quot;:&quot;sponsors.repo_funding_links_button_click&quot;,&quot;payload&quot;:{&quot;platforms&quot;:[],&quot;repo_id&quot;:323900739,&quot;owner_id&quot;:29625844,&quot;user_id&quot;:29625844,&quot;is_mobile&quot;:false,&quot;originating_url&quot;:&quot;https://github.com/mlab817/ipms-v2/settings&quot;}}"
                                               data-hydro-click-hmac="e17d9178081c89fd10c4d4de1539a227e7e02034dd298bf11c4a64ddcbda5f25"
                                               href="/mlab817/ipms-v2/new/main?repository_funding=1">Set up sponsor
                                                button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="projects_enabled" value="0">
                                <input type="checkbox" name="projects_enabled" id="projects-feature" value="1"
                                       checked="">
                                <label for="projects-feature">Projects</label>
                                <span class="status-indicator v-align-top ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">
                                    Project boards on GitHub help you organize and prioritize your work.
                                    You can create project boards for specific feature work,
                                    comprehensive roadmaps, or even release checklists.
                                </p>
                            </div>
                        </div>
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="archive_program_opt_out_enabled" value="1">
                                <input type="checkbox" name="archive_program_opt_out_enabled" value="0"
                                       id="archive-program-opt-out-feature" checked="">
                                <label for="archive-program-opt-out-feature">
                                    Preserve this repository
                                </label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note color-text-tertiary">
                                    Include this code in the <a href="https://archiveprogram.github.com/faq/">GitHub
                                        Archive Program</a>.
                                </p>
                            </div>
                        </div>

                        <noscript>
                            <button type="submit" data-view-component="true" class="btn-primary btn">

                                Save changes


                            </button>
                        </noscript>
                    </form>
                    <!-- '"` --><!-- </textarea></xmp> -->
                    <form class="border-top js-repo-features-form" data-autosubmit="true"
                          action="/mlab817/ipms-v2/settings/update_readme_toc_settings" accept-charset="UTF-8"
                          method="post"><input type="hidden" name="_method" value="put"><input type="hidden"
                                                                                               name="authenticity_token"
                                                                                               value="NBMeu+uTFY2FFhRsSOAsdizPP3LCslJO8JD1dn0C8EPS/WidCYya0cJQ10bIT+/P4UYTNxio+tUdBs66fsrSwQ==">
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="readme_toc_opt_out_enabled" value="1">
                                <input type="checkbox" name="readme_toc_opt_out_enabled" value="0"
                                       id="readme-toc-opt-out-feature" checked="">
                                <label for="readme-toc-opt-out-feature">
                                    Table of contents
                                </label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note color-text-tertiary">
                                    Autogenerate table of contents for Markdown files in this repository. The table of
                                    contents will be displayed near the top of the file.
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- '"` --><!-- </textarea></xmp> -->
                    <form class="border-top js-repo-features-form" data-autosubmit="true"
                          action="/mlab817/ipms-v2/settings/update_discussions_settings" accept-charset="UTF-8"
                          method="post"><input type="hidden" name="_method" value="put"><input type="hidden"
                                                                                               name="authenticity_token"
                                                                                               value="2HftU1jn2EPtPm8pcGGdLdiMKn1KiQ2wkUYKK9QqaDMerY8cvk1QIP72wXSsOgBE8MdoBMLDArv6cMc9YwQdsw==">
                        <div class="Box-row py-0">
                            <div class="form-checkbox js-repo-option">
                                <input type="hidden" name="has_discussions" value="0">
                                <input type="checkbox" name="has_discussions" value="1" id="discussions-feature"
                                       checked="">
                                <label for="discussions-feature">Discussions</label>
                                <span class="status-indicator ml-1 js-status-indicator">
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                     width="16" class="octicon octicon-x">
        <path fill-rule="evenodd"
              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
    </svg>
              </span>
                                <p class="note">
                                    Discussions is the space for your community to have conversations,
                                    ask questions and post answers without opening issues.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>


                <div data-view-component="true" class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 id="merge-button-settings" data-view-component="true" class="Subhead-heading">Merge button</h2>


                </div>
                <p id="merge-button-settings-desc">
                    When merging pull requests, you can allow any combination of merge commits, squashing, or rebasing.
                    At least one option must be enabled.
                    If you have linear history requirement enabled on any protected branch, you must enable squashing or
                    rebasing.
                </p>
                <!-- '"` --><!-- </textarea></xmp> -->
                <form class="repository-merge-features js-merge-features-form" data-autosubmit="true"
                      action="/mlab817/ipms-v2/settings/update_merge_settings" accept-charset="UTF-8" method="post">
                    <input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token"
                                                                           value="OvgoJNbzoR7TISK+7na5yUl15RBsR9O7QgypRyjL032kG1RnQWcyf7daFSZJeJ+tVbnpyMA4DUQPzyeSLDWDig==">
                    <div class="Box">
                        <div hidden="" class="flash flash-full flash-warn js-select-one-warning">
                            You must select at least one option
                        </div>
                        <div hidden="" class="flash flash-full flash-warn js-no-merge-commit-warning">
                            You must select squashing or rebasing option.
                            This is because linear history is required on at least one protected branch.
                        </div>

                        <ul aria-labelledby="merge-button-settings" aria-describedby="merge-button-settings-desc">
                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_merge_commit">Allow merge commits</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="merge_commit"
                                               id="merge_types_merge_commit" checked="">
                                        <p class="note">Add all commits from the head branch to the base branch with a
                                            merge commit.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_squash">Allow squash merging</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="squash_merge"
                                               id="merge_types_squash" checked="">
                                        <p class="note">Combine all commits from the head branch into a single commit in
                                            the base branch.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_rebase">Allow rebase merging</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="rebase_merge"
                                               id="merge_types_rebase" checked="">
                                        <p class="note">Add all commits from the head branch onto the base branch
                                            individually.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <p class="mt-3">
                        You can allow setting pull requests to merge automatically once all required reviews and status
                        checks have passed.
                    </p>
                    <div class="Box">
                        <ul>
                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_auto_merge">Allow auto-merge</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="auto_merge"
                                               id="merge_types_auto_merge">
                                        <p class="note">
                                            Waits for merge requirements to be met and then merges automatically.
                                            <a class="small" target="_blank" rel="noopener noreferrer"
                                               href="https://docs.github.com/github/collaborating-with-issues-and-pull-requests/automatically-merging-a-pull-request">Learn
                                                more</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <p class="mt-3">
                        After pull requests are merged, you can have head branches deleted automatically.
                    </p>
                    <div class="Box">
                        <ul>
                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="merge_types_delete_branch">Automatically delete head
                                            branches</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="merge_types[]" value="delete_branch"
                                               id="merge_types_delete_branch">
                                        <p class="note">Deleted branches will still be able to be restored.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <noscript>
                        <button type="submit" data-view-component="true" class="btn-primary btn">

                            Save changes


                        </button>
                    </noscript>
                </form>

                <div data-view-component="true" class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 id="archive-settings" data-view-component="true" class="Subhead-heading">Archives</h2>


                </div>
                <p id="archive-settings-desc">
                    When creating source code archives, you can choose to include files stored using Git LFS in the
                    archive.
                </p>
                <!-- '"` --><!-- </textarea></xmp> -->
                <form data-autosubmit="true" action="/mlab817/ipms-v2/settings/update_archive_settings"
                      accept-charset="UTF-8" method="post"><input type="hidden" name="_method" value="put"><input
                        type="hidden" name="authenticity_token"
                        value="yqZjNBznvSByM/eZcOkrd3peRpecDW2x+S6I/ka5YLLjUjKGLw0+jrfz49+Gi/O6HQt8R1eYWFy3j6uncestqg==">

                    <div class="Box">
                        <ul>
                            <li class="Box-row py-0">
                                <div class="form-group js-repo-option">
                                    <div class="form-checkbox">
                                        <label for="archive_include_lfs_objects">Include Git LFS objects in
                                            archives</label>
                                        <span class="status-indicator js-status-indicator">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16"
                         width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                  </span>
                                        <input type="checkbox" name="include_lfs_objects" value="1"
                                               id="archive_include_lfs_objects">
                                        <p class="note">Git LFS usage in archives is billed at the same rate as usage
                                            with the client.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <noscript>
                        <button type="submit" data-view-component="true" class="btn-primary btn">

                            Save changes


                        </button>
                    </noscript>
                </form>


                <div data-view-component="true" class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 data-view-component="true" class="Subhead-heading">GitHub Pages</h2>


                </div>
                <div class="Box">
                    <div class="Box-row flash flash-full flash-warn mt-0">
                        <p>Pages settings now has its own dedicated tab! <a href="/mlab817/ipms-v2/settings/pages">Check
                                it out here!</a></p>
                    </div>
                </div>

                <div data-view-component="true"
                     class="Subhead hx_Subhead--responsive Subhead--spacious border-bottom-0 mb-0">
                    <h2 id="danger-zone" data-view-component="true" class="Subhead-heading">Danger Zone</h2>


                </div>
                <div data-view-component="true" class="Box color-border-danger">


                    <ul>
                        <li data-view-component="true" class="Box-row d-flex flex-items-center">
                            <div class="flex-md-order-1 flex-order-2">
                                <form action="/mlab817/ipms-v2/settings/set_visibility" accept-charset="UTF-8"
                                      method="post"><input type="hidden" name="authenticity_token"
                                                           value="2X9BqJuraezLgvKCJ6bR9XuD5Bq2xn+FE16U2qai6vc9G4uIpfQtH85tQtBJDz0jaxJdVj1gg/zryIyDkvM6Zw==">
                                    <details class="details-reset details-overlay details-overlay-dark ">
                                        <summary
                                            class="btn btn-danger boxed-action float-md-right float-none ml-0 ml-md-3"
                                            role="button">
                                            Change visibility
                                        </summary>

                                        <details-dialog class="Box d-flex flex-column anim-fade-in fast Box--overlay "
                                                        aria-label="Change repository visibility" role="dialog"
                                                        aria-modal="true">
                                            <div class="Box-header">
                                                <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                                        aria-label="Close dialog" data-close-dialog="">
                                                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                         data-view-component="true" height="16" width="16"
                                                         class="octicon octicon-x">
                                                        <path fill-rule="evenodd"
                                                              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                    </svg>
                                                </button>
                                                <h1 class="Box-title">Change repository visibility</h1>
                                            </div>
                                            <div data-view-component="true" class="flash flash-warn flash-full">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                     data-view-component="true" height="16" width="16"
                                                     class="octicon octicon-alert">
                                                    <path fill-rule="evenodd"
                                                          d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                                </svg>

                                                Warning: this is a potentially destructive action.


                                            </div>
                                            <div class="Box-body overflow-auto">
                                                <div class="form-checkbox">
                                                    <label aria-live="polite">
                                                        <input class="form-checkbox-details-trigger" type="radio"
                                                               aria-describedby="help-text-for-public-checkbox"
                                                               name="visibility" value="public" checked="">
                                                        Make public
                                                        <p id="help-text-for-public-checkbox" class="text-normal">This
                                                            repository is currently public.</p>
                                                    </label>
                                                </div>

                                                <div class="form-checkbox">
                                                    <label aria-live="polite">
                                                        <input class="form-checkbox-details-trigger" type="radio"
                                                               aria-describedby="help-text-for-private-checkbox"
                                                               name="visibility" value="private">
                                                        Make private
                                                        <p id="help-text-for-private-checkbox" class="text-normal">Hide
                                                            this repository from the public.</p>
                                                        <span class="form-checkbox-details text-normal">
            <ul class="ml-3">
                <li class="mb-1">
                  You will <strong>permanently</strong> lose:
                </li>
                <li class="list-style-none">
                  <ul class="ml-3 mb-3">
                    <li class="mb-1">All <strong>stars and watchers</strong> of this repository.</li>
                      <li class="mb-1">
                        All <strong>pages</strong> published from this repository.
                      </li>
                  </ul>
                </li>
                  <li class="mb-1">
                    Dependency graph will remain enabled. Leaving them enabled grants us permission to perform read-only analysis on this repository.
                  </li>
                  <li class="my-3">
                    You can <a
                          data-hydro-click="{&quot;event_type&quot;:&quot;feature_gate_upsell.click&quot;,&quot;payload&quot;:{&quot;feature_name&quot;:null,&quot;user_id&quot;:29625844,&quot;originating_url&quot;:&quot;https://github.com/mlab817/ipms-v2/settings&quot;}}"
                          data-hydro-click-hmac="79ca91519791ec97682e757582c154f8e53a80c79005559d4deca4d084fdcf85"
                          href="/settings/billing">upgrade your plan</a> to also avoid losing access to:
                  </li>
                  <ul class="ml-3">
                    <li class="mb-1"><strong>Codeowners</strong> functionality.</li>
                    <li class="mb-1">Any existing <strong>wikis.</strong></li>
                    <li class="mb-1"><strong>Pulse, Contributors, Community, Traffic, Commits, Code Frequency</strong> and <strong>Network</strong> on the <strong>Insights page.</strong></li>
                    <li class="mb-1"><strong>Draft</strong> PRs</li>
                    <li class="mb-1"><strong>Multiple assignees</strong> for issues and PRs</li>
                    <li class="mb-1"><strong>Multiple reviewers</strong> for PRs</li>
                    <li>Branch protection rules.</li>
                  </ul>
                  <li class="mb-1">Code scanning will become unavailable.</li>
            </ul>
          </span>
                                                    </label>
                                                </div>


                                            </div>
                                            <div class="Box-footer">
                                                <p>Please type <strong>mlab817/ipms-v2</strong> to confirm.</p>
                                                <p>
                                                    <input class="form-control input-block" type="text"
                                                           aria-label="Type in the name of the repository to confirm that you want to change the visibility of this repository."
                                                           pattern="[mM][lL][aA][bB]817/[iI][pP][mM][sS]-[vV]2"
                                                           name="verify" autofocus="" required="" autocomplete="off">
                                                </p>
                                                <div class="full-button">
                                                    <button data-disable-invalid="" data-disable-with="" type="submit"
                                                            data-view-component="true" class="btn-danger btn btn-block"
                                                            disabled="">

                                                        I understand, change repository visibility.


                                                    </button>
                                                </div>

                                            </div>
                                        </details-dialog>
                                    </details>
                                </form>
                            </div>
                            <div class="flex-auto mb-md-0 mb-2">
                                <strong>Change repository visibility</strong>
                                <div class="mb-0">This repository is currently public.</div>
                            </div>

                        </li>
                        <li data-view-component="true" class="Box-row d-flex flex-items-center">
                            <!-- '"` --><!-- </textarea></xmp> -->
                            <form class="flex-md-order-1 flex-order-2" action="/mlab817/ipms-v2/settings/transfer"
                                  accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token"
                                                                              value="kfWjcQuO3E/bTp58LhZ8zkPvmtxKsGgI3ZQO4KMC+cm8L0FgezRvVj2xRLaKDljWdwt43XO8h8ECIWoRMXDvFQ==">
                                <details class="details-reset details-overlay details-overlay-dark ">
                                    <summary role="button" data-view-component="true" class="btn-danger btn">


                                        Transfer


                                    </summary>
                                    <details-dialog class="Box d-flex flex-column anim-fade-in fast Box--overlay "
                                                    aria-label="Transfer repository" role="dialog" aria-modal="true">
                                        <div class="Box-header">
                                            <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                                    aria-label="Close dialog" data-close-dialog="">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                     data-view-component="true" height="16" width="16"
                                                     class="octicon octicon-x">
                                                    <path fill-rule="evenodd"
                                                          d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                </svg>
                                            </button>
                                            <h1 class="Box-title">Transfer repository</h1>
                                        </div>
                                        <div data-view-component="true" class="flash flash-warn flash-full">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                 data-view-component="true" height="16" width="16"
                                                 class="octicon octicon-alert">
                                                <path fill-rule="evenodd"
                                                      d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                            </svg>

                                            To understand admin access, teams, issue assignments, and redirects after a
                                            repository is transferred,
                                            see <a href="https://docs.github.com/articles/transferring-a-repository/">Transferring
                                                a repository</a> in GitHub Help.


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
                                                       aria-label="Type in the name of the repository to confirm that you want to transfer this repository."
                                                       autocomplete="off">
                                            </p>

                                            <button data-disable-invalid="true" type="submit" data-view-component="true"
                                                    class="btn-danger btn btn-block" disabled="">


                                                I understand, transfer this repository.


                                            </button>
                                        </div>
                                    </details-dialog>
                                </details>
                            </form>
                            <div class="flex-auto">
                                <strong>Transfer ownership</strong>
                                <p class="mb-0">
                                    Transfer this repository to another user or to an organization where you
                                    have the ability to create repositories.
                                </p>
                            </div>

                        </li>
                        <li data-view-component="true" class="Box-row d-flex flex-items-center">
                            <details class="details-reset details-overlay details-overlay-dark flex-order-2">
                                <summary
                                    class="btn btn-danger boxed-action float-md-right float-none ml-0 ml-md-3 mt-md-0 mt-2"
                                    role="button">Archive this repository
                                </summary>

                                <details-dialog class="Box d-flex flex-column anim-fade-in fast Box--overlay "
                                                aria-label="Archive repository" role="dialog" aria-modal="true">
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                                aria-label="Close dialog" data-close-dialog="">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                 data-view-component="true" height="16" width="16"
                                                 class="octicon octicon-x">
                                                <path fill-rule="evenodd"
                                                      d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                            </svg>
                                        </button>
                                        <h1 class="Box-title">Archive repository</h1>
                                    </div>
                                    <div data-view-component="true" class="flash flash-warn flash-full">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             data-view-component="true" height="16" width="16"
                                             class="octicon octicon-alert">
                                            <path fill-rule="evenodd"
                                                  d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                        </svg>

                                        <strong class="overflow-hidden">This repository will become read-only.</strong>
                                        <p class="overflow-hidden mt-1 ml-5">You will still be able to fork the
                                            repository and unarchive it at any time.</p>


                                    </div>
                                    <div class="Box-body overflow-auto">
                                        <div class="d-flex flex-nowrap mb-3">
                                            <div>
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                     data-view-component="true" height="16" width="16"
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
                                                     data-view-component="true" height="16" width="16"
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
                                                     data-view-component="true" height="16" width="16"
                                                     class="octicon octicon-checklist">
                                                    <path fill-rule="evenodd"
                                                          d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
                                                </svg>
                                            </div>
                                            <div class="pl-3 flex-1">
                                                <p class="overflow-hidden mb-1">Before you archive, please consider:</p>
                                                <ul class="ml-3">
                                                    <li>Updating any repository settings</li>
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
                                                       aria-label="Type in the name of the repository to confirm that you want to archive this repository."
                                                       name="verify" autocomplete="off">
                                            </p>
                                            <button data-disable-invalid="" type="submit" data-view-component="true"
                                                    class="btn-danger btn btn-block" disabled="">


                                                <span class="d-md-inline-block d-none">I understand the consequences, archive this repository</span>
                                                <span class="d-inline-block d-md-none">Archive this repository</span>


                                            </button>
                                        </form>
                                    </div>
                                </details-dialog>
                            </details>
                            <div class="flex-auto">
                                <strong>Archive this repository</strong>
                                <p class="mb-0">Mark this repository as archived and read-only.</p>
                            </div>

                        </li>
                        <li data-view-component="true" class="Box-row d-flex flex-items-center">
                            <details
                                class="details-reset details-overlay details-overlay-dark flex-md-order-1 flex-order-2">
                                <summary
                                    class="btn btn-danger boxed-action float-md-right float-none ml-0 ml-md-3 mt-md-0 mt-2"
                                    role="button">
                                    Delete this repository
                                </summary>
                                <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast"
                                                aria-label="Delete repository" role="dialog" aria-modal="true">
                                    <div class="Box-header">
                                        <button class="Box-btn-octicon btn-octicon float-right" type="button"
                                                aria-label="Close dialog" data-close-dialog="">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                 data-view-component="true" height="16" width="16"
                                                 class="octicon octicon-x">
                                                <path fill-rule="evenodd"
                                                      d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                            </svg>
                                        </button>
                                        <div class="Box-title">Are you absolutely sure?</div>
                                    </div>
                                    <div data-view-component="true" class="flash flash-warn flash-full">


                                        Unexpected bad things will happen if you don’t read this!


                                    </div>
                                    <div class="Box-body overflow-auto">
                                        <p>
                                            This action <strong>cannot</strong> be undone. This will permanently delete
                                            the <strong>mlab817/ipms-v2</strong>
                                            repository, wiki, issues, comments, packages, secrets, workflow runs, and
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
                                                       aria-label="Type in the name of the repository to confirm that you want to delete this repository."
                                                       name="verify" autocomplete="off">
                                            </p>
                                            <button data-disable-invalid="" type="submit" data-view-component="true"
                                                    class="btn-danger btn btn-block" disabled="">


                                                <span class="d-md-inline-block d-none">I understand the consequences, delete this repository</span>
                                                <span class="d-inline-block d-md-none">Delete this repository</span>


                                            </button>
                                        </form>
                                    </div>
                                </details-dialog>
                            </details>

                            <div class="flex-auto">
                                <strong>Delete this repository</strong>

                                <p class="mb-0">
                                    Once you delete a repository, there is no going back. Please be certain.
                                </p>
                            </div>

                        </li>
                    </ul>

                </div>
            </div><!-- /#options_bucket -->
        </div>
    </div>

    <section class="content">
        <!-- Default box -->

        <div class="callout callout-info">
            <div class="row">
                <div class="col">
                    <p>Title: <strong>{{ $project->title  }}</strong></p>
                    <p>Office: <strong>{{ $project->office->name ?? '' }}</strong></p>
                </div>
                <div class="col">
                    <p>Created by: <img src="{{ $project->creator->avatar }}" width="20" height="20" class="img-circle">
                        <strong>{{ $project->creator->name ?? '' }}</strong> on
                        <strong>{{ $project->created_at->format('M d, Y') }}</strong></p>
                    <p>Last Updated: <strong>{{ $project->updated_at->format('M d, Y') }}</strong></p>
                </div>
            </div>
        </div>

        @include('projects.project-details', ['project' => $project , 'pdp_indicators' => \App\Models\PdpIndicator::with('children.children')->whereNull('parent_id')->get()])

        @includeWhen($project->has_infra, 'projects.trip-info', ['project' => $project])

        <div class="row">
            <div class="col-12 mb-3">
                @if(auth()->user()->can('update', $project))
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
                @endif
                <a href="{{ route('projects.own') }}" class="btn ml-1 float-right">Back to List</a>
            </div>
        </div>

        <!-- Include review result if it exists -->
        @includeWhen($project->review()->exists(), 'reviews.result', ['review' => $project->review])

        <a id="back-to-top" href="#" class="btn btn-info back-to-top" role="button" aria-label="Scroll to top">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </a>

    </section>
@endsection
