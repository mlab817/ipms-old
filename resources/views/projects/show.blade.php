@extends('layouts.project')

@section('content')
    <div class="container-xl clearfix new-discussion-timeline px-3 px-md-4 px-lg-5">
        @if(session()->has('errors'))
            <div class="flash flash-error mb-3" id="flash">
                {{ $errors->first() }}
                <button class="flash-close js-flash-close" type="button" aria-label="Close" onclick="dismiss()">
                    <!-- <%= octicon "x" %> -->
                    <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path>
                    </svg>
                </button>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="flash flash-success mb-3" id="flash">
                {{ session('message') }}
                <button class="flash-close js-flash-close" type="button" aria-label="Close" onclick="dismiss()">
                    <!-- <%= octicon "x" %> -->
                    <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path>
                    </svg>
                </button>
            </div>
        @endif

        <div class="gutter-condensed"></div>

        <div id="repo-content-pjax-container" class="repository-content ">

            <div>
                <div class="d-none d-lg-block mt-6 mr-3 Popover top-0 right-0 color-shadow-medium col-3">

                </div>

                <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">

                    <div class="flex-shrink-0 col-12 col-md-9 mb-4 mb-md-0">

                        <div class="file-navigation mb-3 d-flex flex-items-start">

                        </div>

                        <div data-catalyst="">

                            <div id="repo-content-pjax-container" class="Box md js-code-block-container Box--responsive">
                                <!-- Navigator -->
                                <div class="d-flex js-sticky js-position-sticky top-0 border-top-0 border-bottom p-2 flex-items-center flex-justify-between color-bg-primary rounded-top-2 is-stuck" style="position: sticky; z-index: 90; top: 0px !important;" data-original-top="0px">
                                    <div class="d-flex flex-items-center">
                                        <details data-target="readme-toc.trigger" data-menu-hydro-click="{&quot;event_type&quot;:&quot;repository_toc_menu.click&quot;,&quot;payload&quot;:{&quot;target&quot;:&quot;trigger&quot;,&quot;repository_id&quot;:380256079,&quot;originating_url&quot;:&quot;https://github.com/mlab817/pips&quot;,&quot;user_id&quot;:29625844}}" data-menu-hydro-click-hmac="79a0e57bd49664e92c60fb8b8527e0c1dec1ba43b91c1fbcb86d82ce5ae55c50" class="dropdown details-reset details-overlay">
                                            <summary class="btn btn-octicon m-0 mr-2 p-2" aria-haspopup="menu" aria-label="Table of Contents" role="button">
                                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"  height="16" width="16" class="octicon octicon-list-unordered">
                                                    <path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path>
                                                </svg>
                                            </summary>

{{--                                            <details-menu class="SelectMenu" role="menu">--}}
{{--                                                <div class="SelectMenu-modal rounded-3 mt-1" style="max-height:340px;">--}}
{{--                                                    <div class="SelectMenu-list SelectMenu-list--borderless p-2" style="overscroll-behavior: contain;">--}}
{{--                                                        <a role="menuitem" class="filter-item py-1 " style="padding-left: 24px;" href="#office" aria-current="page">About IPMS</a>--}}
{{--                                                        <a role="menuitem" class="filter-item py-1 " style="padding-left: 24px;" href="#pap">Program or Project</a>--}}
{{--                                                        <a role="menuitem" class="filter-item py-1 " style="padding-left: 24px;" href="#bug-report">Bug Report</a>--}}
{{--                                                        <a role="menuitem" class="filter-item py-1 " style="padding-left: 24px;" href="#security-vulnerabilities">Security Vulnerabilities</a>--}}
{{--                                                        <a role="menuitem" class="filter-item py-1 " style="padding-left: 24px;" href="#license">License</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </details-menu>--}}
                                        </details>

                                        <h2 class="Box-title">
                                            @livewire('form.edit-text', [
                                            'project' => $project,
                                            'field' => 'title'
                                            ], key($project->id))
                                        </h2>
                                    </div>
                                </div>
                                <!--// Navigator -->
                                <div class="Box-body">
                                    <livewire:show-project :project="$project" />

{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="card card-primary card-outline">--}}
{{--                                            <div class="card-header">--}}
{{--                                                <h3 class="card-title">{{ __("Implementing Agencies") }}</h3>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="form-group row">--}}
{{--                                                    <label for="operating_units" class="col-form-label col-sm-3 required">Implementing--}}
{{--                                                        Agencies (including own office) </label>--}}
{{--                                                    <div class="col-sm-9">--}}
{{--                                                        @foreach($ou_types as $type)--}}
{{--                                                            <strong>{{ $type->name }}</strong>--}}
{{--                                                            @foreach($type->operating_units as $option)--}}
{{--                                                                <div class="form-check">--}}
{{--                                                                    <label class="form-check-label">--}}
{{--                                                                        <input--}}
{{--                                                                            class="form-check-input @error('operating_units') text-danger @enderror"--}}
{{--                                                                            type="checkbox" name="operating_units[]"--}}
{{--                                                                            value="{{ $option->id }}" {{ in_array($option->id, old('operating_units', $project->operating_units()->pluck('id')->toArray() ?? []) ?? []) ? 'checked' : '' }}>--}}
{{--                                                                        {{ $option->name }}--}}
{{--                                                                    </label>--}}
{{--                                                                </div>--}}
{{--                                                            @endforeach--}}
{{--                                                        @endforeach--}}
{{--                                                        @error('operating_units')<span--}}
{{--                                                            class="error invalid-feedback">{{ $message }}</span>@enderror--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <!-- Project Preparation Details -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Project Preparation Details") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="fs_status_id" class="col-form-label col-sm-3">Status of Feasibility
                                                        Study (Only if FS is required)</label>
                                                    <div class="col-sm-9">
                                                        <select name="feasibility_study[fs_status_id]" id="fs_status_id"
                                                                class="form-control">
                                                            <option value="" selected disabled>Select Status</option>
                                                            @foreach($fs_statuses as $option)
                                                                <option value="{{ $option->id }}"
                                                                        @if(old('feasibility_study.fs_status_id', $project->feasibility_study->fs_status_id ?? '') == $option->id) selected @endif>{{ $option->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('feasibility_study.fs_status_id')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="feasibility_study.needs_assistance" class="col-form-label col-sm-3">Does
                                                        the conduct of feasibility
                                                        study need assistance?</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="1"
                                                                       name="feasibility_study[needs_assistance]"
                                                                       @if(old('feasibility_study.need_assistance', $project->feasibility_study->need_assistance ?? '') == 1) checked @endif>
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="0"
                                                                       name="feasibility_study[needs_assistance]"
                                                                       @if(old('feasibility_study.need_assistance', $project->feasibility_study->need_assistance ?? '') == 0) checked @endif>
                                                                No
                                                            </label>
                                                        </div>
                                                        @error('feasibility_study.need_assistance')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fs_cost">Schedule of Feasibility Study Cost (in absolute PhP)</label>
                                                    <table class="col-sm-12" id="fs_cost">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-sm text-center">2017</th>
                                                            <th class="text-sm text-center">2018</th>
                                                            <th class="text-sm text-center">2019</th>
                                                            <th class="text-sm text-center">2020</th>
                                                            <th class="text-sm text-center">2021</th>
                                                            <th class="text-sm text-center">2022</th>
                                                            <th class="text-sm text-center">Total</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="money fs form-control text-right"
                                                                       name="feasibility_study[y2017]"
                                                                       value="{{ old('feasibility_study.y2017', $project->feasibility_study->y2017 ?? 0) }}">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="money fs form-control text-right"
                                                                       name="feasibility_study[y2018]"
                                                                       value="{{ old('feasibility_study.y2018', $project->feasibility_study->y2018 ?? 0) }}">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="money fs form-control text-right"
                                                                       name="feasibility_study[y2019]"
                                                                       value="{{ old('feasibility_study.y2019', $project->feasibility_study->y2019 ?? 0) }}">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="money fs form-control text-right"
                                                                       name="feasibility_study[y2020]"
                                                                       value="{{ old('feasibility_study.y2020', $project->feasibility_study->y2020 ?? 0) }}">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="money fs form-control text-right"
                                                                       name="feasibility_study[y2021]"
                                                                       value="{{ old('feasibility_study.y2021', $project->feasibility_study->y2021 ?? 0) }}">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="money fs form-control text-right"
                                                                       name="feasibility_study[y2022]"
                                                                       value="{{ old('feasibility_study.y2022', $project->feasibility_study->y2022 ?? 0) }}">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="money form-control text-right" id="fs_total"
                                                                       readonly>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="feasibility_study[completion_date]" class="col-form-label col-sm-3">Expected/Target
                                                        Date of Completion of FS</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control"
                                                               name="feasibility_study[completion_date]"
                                                               value="{{ old('feasibility_study.completion_date', $project->feasibility_study->completion_date ?? '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Project Preparation Details -->

                                    <!-- Employment Generation -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Employment Generation") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="employment_generated" class="col-form-label col-sm-3 required">No. of
                                                        persons to
                                                        be employed after completion of the project</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control @error('employment_generated') is-invalid @enderror"
                                                               type="number" name="employment_generated"
                                                               value="{{ old('employment_generated', $project->employment_generated) }}">
                                                        @error('employment_generated')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Employment Generation -->

                                    <!-- Philippine Development Plan Chapter -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Philippine Development Plan") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label for="pdp_chapter_id" class="col-form-label required">Main philippine
                                                            Development Chapter </label>
                                                        <p class="text-sm text-muted">Note: Selected PDP indicators will be cleared if
                                                            you select another PDP chapter.</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select id="pdp_chapter_id" name="pdp_chapter_id"
                                                                class="form-control @error('pdp_chapter_id') is-invalid @enderror">
                                                            <option value="" disabled selected>Select Main PDP Chapter</option>
                                                            @foreach($pdp_chapters as $option)
                                                                <option value="{{ $option->id }}"
                                                                        @if(old('pdp_chapter_id', $project->pdp_chapter_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label for="pdp_chapter_id" class="col-form-label required">Other PDP
                                                            Chapters </label>
                                                        <p class="text-sm text-muted">Note: Please re-select the main PDP chapter.</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        @foreach($pdp_chapters as $option)
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="pdp_chapter_{{ $option->id }}">
                                                                    <input id="pdp_chapter_{{ $option->id }}" type="checkbox"
                                                                           value="{{ $option->id }}" class="form-check-input"
                                                                           name="pdp_chapters[]"
                                                                           @if(in_array($option->id, old('pdp_chapters', $project->pdp_chapters->pluck('id')->toArray() ?? []))) checked @endif>
                                                                    {{ $option->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Philippine Development Plan Chapter -->

                                    <!-- Philippine Development Plan Indicators -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Philippine Development Results Matrices (PDP-RM) Indicators") }}</h3>
                                            </div>
                                            <!-- TODO: PDP Indicators as Vue component -->
                                            <div class="card-body">
                                                <div class="form-check">
                                                    <label for="no_pdp_indicator" class="form-check-label">
                                                        <input type="checkbox" value="1" id="no_pdp_indicator" name="no_pdp_indicator"
                                                               class="form-check-input">
                                                        No PDP Indicator applicable
                                                    </label>
                                                </div>

                                                <div id="pdp_indicators_group" class="form-group mt-2">
                                                    @foreach ($pdp_indicators as $pi1)
                                                        <div id="pdp_chapter_{{$pi1->id}}" class="pdp_chapters" style="display: none;">
                                                            <span class="font-weight-bold">{{ $pi1->name }}</span>
                                                            @foreach($pi1->children as $pi2)
                                                                <div class="ml-4">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label" for="pdp_outcome_{{$pi2->id}}">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input pdp_indicators"
                                                                                   value="{{$pi2->id}}"
                                                                                   name="pdp_indicators[]"
                                                                                   id="pdp_outcome_{{$pi2->id}}"
                                                                                   @if(in_array($pi2->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                                            {{ $pi2->name }}
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        @foreach($pi2->children as $pi3)
                                                                            <div class="ml-4">
                                                                                <div class="form-check">
                                                                                    <label class="form-check-label"
                                                                                           for="pdp_suboutcome_{{$pi3->id}}">
                                                                                        <input type="checkbox"
                                                                                               class="form-check-input pdp_indicators"
                                                                                               value="{{$pi3->id}}"
                                                                                               name="pdp_indicators[]"
                                                                                               id="pdp_suboutcome_{{$pi3->id}}"
                                                                                               @if(in_array($pi3->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                                                        {{ $pi3->name }}
                                                                                    </label>
                                                                                </div>
                                                                                @foreach($pi3->children as $pi4)
                                                                                    <div class="ml-4">
                                                                                        <div class="form-check">
                                                                                            <label class="form-check-label"
                                                                                                   for="pdp_output_{{$pi4->id}}">
                                                                                                <input type="checkbox"
                                                                                                       class="form-check-input pdp_indicators"
                                                                                                       value="{{$pi4->id}}"
                                                                                                       name="pdp_indicators[]"
                                                                                                       id="pdp_output_{{$pi4->id}}"
                                                                                                       @if(in_array($pi4->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                                                                {{ $pi4->name }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Philippine Development Plan Indicators -->

                                    <!-- Sustainable Development Goals -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Sustainable Development Goals") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <p class="text-sm text-muted">Select all that applies</p>
                                                </div>
                                                <div class="row">
                                                    @foreach($sdgs as $option)
                                                        <div class="col-sm-6">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="sdg_{{ $option->id }}">
                                                                    <input id="sdg_{{ $option->id }}" type="checkbox"
                                                                           value="{{ $option->id }}" class="form-check-input"
                                                                           name="sdgs[]"
                                                                           @if(in_array($option->id, old('sdgs', $project->sdgs->pluck('id')->toArray() ?? []))) checked @endif>
                                                                    {{ $option->name }}
                                                                    <p class="text-xs">{{ $option->description }}</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @error('sdgs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Sustainable Development Goals -->

                                    <!-- Ten Point Agenda -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Ten Point Agenda") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <p class="text-sm text-muted">Select all that applies</p>
                                                </div>
                                                <div class="row">
                                                    @foreach($ten_point_agendas as $option)
                                                        <div class="col-sm-6">
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="tpa_{{ $option->id }}">
                                                                    <input id="tpa_{{ $option->id }}" type="checkbox"
                                                                           value="{{ $option->id }}" class="form-check-input"
                                                                           name="ten_point_agendas[]"
                                                                           @if(in_array($option->id, old('ten_point_agendas', $project->ten_point_agendas->pluck('id')->toArray() ?? []))) checked @endif>
                                                                    {{ $option->name }}
                                                                    <p class="text-xs">{{ $option->description }}</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @error('ten_point_agendas')<span
                                                        class="error invalid-feedback">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Ten Point Agenda -->

                                    <!-- Financial Information -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Financial Information") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="funding_source_id" class="col-form-label col-sm-3 required">Main Funding Source </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control @error('funding_source_id') is-invalid @enderror"
                                                                name="funding_source_id">
                                                            <option value="" disabled selected>Select Funding Source</option>
                                                            @foreach($funding_sources as $option)
                                                                <option value="{{ $option->id }}"
                                                                        @if(old('funding_source_id', $project->funding_source_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('funding_source_id')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label for="funding_sources" class="col-form-label required">Other Funding
                                                            Sources</label>
                                                        <p class="text-sm text-muted">Note: Please re-select the main funding source
                                                            selected.</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        @foreach($funding_sources as $option)
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="fs_{{ $option->id }}">
                                                                    <input id="fs_{{ $option->id }}" type="checkbox"
                                                                           value="{{ $option->id }}" class="form-check-input"
                                                                           name="funding_sources[]"
                                                                           @if(in_array($option->id, old('funding_sources', $project->funding_sources->pluck('id')->toArray() ?? []))) checked @endif>
                                                                    {{ $option->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        @error('funding_sources')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                        <p class="text-sm text-muted">Include the main funding source selected.</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="other_fs" class="col-form-label col-sm-3">Other Funding Source
                                                        (specify)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="other_fs" id="other_fs"
                                                               placeholder="Other funding source (please specify)"
                                                               value="{{ old('other_fs', $project->other_fs) }}">
                                                        @error('other_fs')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="implementation_mode_id" class="col-form-label col-sm-3 required">Mode of
                                                        Implementation </label>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="form-control @error('implementation_mode_id') is-invalid @enderror"
                                                            name="implementation_mode_id">
                                                            <option value="" disabled selected>Select Implementation Mode</option>
                                                            @foreach($implementation_modes as $option)
                                                                <option value="{{ $option->id }}"
                                                                        @if(old('implementation_mode_id', $project->implementation_mode_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('implementation_mode_id')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="funding_institution_id" class="col-form-label col-sm-3">Funding
                                                        Institution</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="funding_institution_id">
                                                            <option value="" disabled selected>Select Funding Institution</option>
                                                            @foreach($funding_institutions as $option)
                                                                <option value="{{ $option->id }}"
                                                                        @if(old('funding_institution_id', $project->funding_institution_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('funding_institution_id')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tier_id" class="col-form-label col-sm-3 required">Budget Tier </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control @error('tier_id') is-invalid @enderror"
                                                                name="tier_id">
                                                            <option value="" disabled selected>Select Budget Tier</option>
                                                            @foreach($tiers as $option)
                                                                <option value="{{ $option->id }}"
                                                                        @if(old('tier_id', $project->tier_id) == $option->id) selected @enderror>{{ $option->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('tier_id')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="uacs_code" class="col-form-label col-sm-3">UACS Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control @error('uacs_code') is-invalid @enderror"
                                                               name="uacs_code" id="uacs_code" placeholder="UACS Code"
                                                               value="{{ old('uacs_code', $project->uacs_code) }}">
                                                        @error('uacs_code')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Financial Information -->

                                    <!-- Status & Updates -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Status & Updates") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="updates" class="col-form-label col-sm-3 required">Updates </label>
                                                    <div class="col-sm-9">
                                        <textarea rows="4" style="resize: none;"
                                                  class="form-control @error('updates') is-invalid @enderror"
                                                  id="updates"
                                                  name="updates"
                                                  placeholder="For proposed program/project, please indicate the physical status of the program/project in terms of project preparation, approval, funding, etc. If ongoing or completed, please provide information on the delivery of outputs, percentage of completion and financial status/ accomplishment in terms of utilization rate.">{{ old('updates', $project->project_update->updates) }}</textarea>
                                                        @error('updates')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="updates_date" class="col-form-label col-sm-3 required">As of </label>
                                                    <div class="col-sm-9">
                                                        <input type="date"
                                                               class="form-control @error('updates_date') is-invalid @enderror"
                                                               id="updates_date" name="updates_date"
                                                               value="{{ old('updates_date', $project->project_update->updates_date) }}">
                                                        @error('updates_date')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Status & Updates -->

                                    <!-- Funding Source Breakdown -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Investment Required by Funding Source") }} </h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-sm text-center">2016 &amp; Prior</th>
                                                        <th class="text-sm text-center">2017</th>
                                                        <th class="text-sm text-center">2018</th>
                                                        <th class="text-sm text-center">2019</th>
                                                        <th class="text-sm text-center">2020</th>
                                                        <th class="text-sm text-center">2021</th>
                                                        <th class="text-sm text-center">2022</th>
                                                        <th class="text-sm text-center">2023 &amp; Beyond</th>
                                                        <th class="text-sm text-center">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($project->fs_investments as $fs)
                                                        <tr>
                                                            <th class="text-sm">
                                                                <input type="hidden" name="fs_investments[{{ $fs->id }}][fs_id]"
                                                                       value="{{ old('fs_investments.{$fs->id}.fs_id', $fs->fs_id ?? 0) }}">
                                                                {{ $fs->funding_source->name }}
                                                            </th>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2016 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2016]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2016", $fs->y2016 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2017 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2017]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2017", $fs->y2017 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2018 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2018]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2018", $fs->y2018 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2019 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2019]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2019", $fs->y2019 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2020 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2020]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2020", $fs->y2020 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2021 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2021]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2021", $fs->y2021 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2022 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2022]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2022", $fs->y2022 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="fs_investments fs_investments_2023 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                                       name="fs_investments[{{$fs->id}}][y2023]"
                                                                       value="{{ old("fs_investments.{$fs->id}.y2023", $fs->y2023 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text" class="form-control text-right"
                                                                       id="fs_investments_{{$fs->fs_id}}_total" readonly></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Total</th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2016_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2017_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2018_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2019_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2020_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2021_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2022_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="fs_investments_2023_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control text-right" id="fs_investments_total"
                                                                   readonly>
                                                        </th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Funding Source Breakdown -->

                                    <!-- Regional Breakdown -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Investment Required by Region") }} </h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-sm text-center">2016 &amp; Prior</th>
                                                        <th class="text-sm text-center">2017</th>
                                                        <th class="text-sm text-center">2018</th>
                                                        <th class="text-sm text-center">2019</th>
                                                        <th class="text-sm text-center">2020</th>
                                                        <th class="text-sm text-center">2021</th>
                                                        <th class="text-sm text-center">2022</th>
                                                        <th class="text-sm text-center">2023 &amp; Beyond</th>
                                                        <th class="text-sm text-center">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($project->region_investments->sortBy('region.order') as $ri)
                                                        <tr>
                                                            <td class="text-sm text-nowrap">
                                                                <input type="hidden"
                                                                       name="region_investments[{{$ri->id}}][region_id]"
                                                                       value="{{ $ri->region_id }}">
                                                                {{ $ri->region->label }}
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2016 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2016]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2016", $ri->y2016 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2017 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2017]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2017", $ri->y2017 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2018 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2018]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2018", $ri->y2018 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2019 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2019]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2019", $ri->y2019 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2020 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2020]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2020", $ri->y2020 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2021 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2021]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2021", $ri->y2021 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2022 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2022]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2022", $ri->y2022 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text"
                                                                       class="region_investments money region_investments_2023 region_investments_{{$ri->region_id}} form-control money text-right"
                                                                       name="region_investments[{{$ri->id}}][y2023]"
                                                                       value="{{ old("region_investments.{$ri->id}.y2023", $ri->y2023 ?? 0) }}">
                                                            </td>
                                                            <td><input type="text" class="form-control money text-right"
                                                                       id="region_investments_{{$ri->region_id}}_total" readonly></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Total</th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2016_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2017_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2018_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2019_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2020_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2021_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2022_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_2023_total" readonly>
                                                        </th>
                                                        <th>
                                                            <input type="text" class="form-control money text-right"
                                                                   id="region_investments_total" readonly>
                                                        </th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Regional Breakdown -->

                                    <!-- Financial Status -->
                                    <div class="col-md-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __("Financial Status") }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-sm text-center">2016 &amp; Prior</th>
                                                        <th class="text-sm text-center">2017</th>
                                                        <th class="text-sm text-center">2018</th>
                                                        <th class="text-sm text-center">2019</th>
                                                        <th class="text-sm text-center">2020</th>
                                                        <th class="text-sm text-center">2021</th>
                                                        <th class="text-sm text-center">2022</th>
                                                        <th class="text-sm text-center">2023 &amp; Beyond</th>
                                                        <th class="text-sm text-center">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th class="text-sm">National Expenditure Program (NEP)</th>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2016]"
                                                                   value="{{ old("nep.y2016", $project->nep->y2016 ?? 0) }}"></td>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2017]"
                                                                   value="{{ old("nep.y2017", $project->nep->y2017 ?? 0) }}"></td>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2018]"
                                                                   value="{{ old("nep.y2018", $project->nep->y2018 ?? 0) }}"></td>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2019]"
                                                                   value="{{ old("nep.y2019", $project->nep->y2019 ?? 0) }}"></td>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2020]"
                                                                   value="{{ old("nep.y2020", $project->nep->y2020 ?? 0) }}"></td>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2021]"
                                                                   value="{{ old("nep.y2021", $project->nep->y2021 ?? 0) }}"></td>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2022]"
                                                                   value="{{ old("nep.y2022", $project->nep->y2022 ?? 0) }}"
                                                                   readonly></td>
                                                        <td><input type="text" class="nep money form-control text-right"
                                                                   name="nep[y2023]"
                                                                   value="{{ old("nep.y2023", $project->nep->y2023 ?? 0) }}"
                                                                   readonly></td>
                                                        <td><input type="text" class="form-control text-right" id="nep_total" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-sm">General Appropriations Act (GAA)</th>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2016]"
                                                                   value="{{ old("allocation.y2016", $project->allocation->y2016 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2017]"
                                                                   value="{{ old("allocation.y2017", $project->allocation->y2017 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2018]"
                                                                   value="{{ old("allocation.y2018", $project->allocation->y2018 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2019]"
                                                                   value="{{ old("allocation.y2019", $project->allocation->y2019 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2020]"
                                                                   value="{{ old("allocation.y2020", $project->allocation->y2020 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2021]"
                                                                   value="{{ old("allocation.y2021", $project->allocation->y2021 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2022]"
                                                                   value="{{ old("allocation.y2022", $project->allocation->y2022 ?? 0) }}"
                                                                   readonly>
                                                        </td>
                                                        <td><input type="text" class="allocation money form-control text-right"
                                                                   name="allocation[y2023]"
                                                                   value="{{ old("allocation.y2023", $project->allocation->y2023 ?? 0) }}"
                                                                   readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control text-right" id="allocation_total"
                                                                   readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-sm">Actual Disbursement</th>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2016]"
                                                                   value="{{ old("disbursement.y2016", $project->disbursement->y2016 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2017]"
                                                                   value="{{ old("disbursement.y2017", $project->disbursement->y2017 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2018]"
                                                                   value="{{ old("disbursement.y2018", $project->disbursement->y2018 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2019]"
                                                                   value="{{ old("disbursement.y2019", $project->disbursement->y2019 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2020]"
                                                                   value="{{ old("disbursement.y2020", $project->disbursement->y2020 ?? 0) }}">
                                                        </td>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2021]"
                                                                   value="{{ old("disbursement.y2021", $project->disbursement->y2021 ?? 0) }}"
                                                                   readonly>
                                                        </td>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2022]"
                                                                   value="{{ old("disbursement.y2022", $project->disbursement->y2022 ?? 0) }}"
                                                                   readonly>
                                                        </td>
                                                        <td><input type="text" class="disbursement money form-control text-right"
                                                                   name="disbursement[y2023]"
                                                                   value="{{ old("disbursement.y2023", $project->disbursement->y2023 ?? 0) }}"
                                                                   readonly>
                                                        </td>
                                                        <td><input type="text" class="money form-control text-right"
                                                                   id="disbursement_total" readonly></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/. Financial Status -->
                                </div>
                            </div>
                        </div>

                    </div>


                    </div>

                    <div class="flex-shrink-0 col-12 col-md-3">

                        <div class="BorderGrid BorderGrid--spacious" data-pjax="">
                            <div class="BorderGrid-row hide-sm hide-md">
                                <div class="BorderGrid-cell">
                                    <details class="details-reset details-overlay details-overlay-dark ">
                                        <summary class="float-right" role="button">
                                            <div class="Link--secondary pt-1 pl-2">
                                                <svg aria-label="Edit repository metadata" role="img"
                                                     viewBox="0 0 16 16" version="1.1" data-view-component="true"
                                                     height="16" width="16" class="octicon octicon-gear float-right">
                                                    <path fill-rule="evenodd"
                                                          d="M7.429 1.525a6.593 6.593 0 011.142 0c.036.003.108.036.137.146l.289 1.105c.147.56.55.967.997 1.189.174.086.341.183.501.29.417.278.97.423 1.53.27l1.102-.303c.11-.03.175.016.195.046.219.31.41.641.573.989.014.031.022.11-.059.19l-.815.806c-.411.406-.562.957-.53 1.456a4.588 4.588 0 010 .582c-.032.499.119 1.05.53 1.456l.815.806c.08.08.073.159.059.19a6.494 6.494 0 01-.573.99c-.02.029-.086.074-.195.045l-1.103-.303c-.559-.153-1.112-.008-1.529.27-.16.107-.327.204-.5.29-.449.222-.851.628-.998 1.189l-.289 1.105c-.029.11-.101.143-.137.146a6.613 6.613 0 01-1.142 0c-.036-.003-.108-.037-.137-.146l-.289-1.105c-.147-.56-.55-.967-.997-1.189a4.502 4.502 0 01-.501-.29c-.417-.278-.97-.423-1.53-.27l-1.102.303c-.11.03-.175-.016-.195-.046a6.492 6.492 0 01-.573-.989c-.014-.031-.022-.11.059-.19l.815-.806c.411-.406.562-.957.53-1.456a4.587 4.587 0 010-.582c.032-.499-.119-1.05-.53-1.456l-.815-.806c-.08-.08-.073-.159-.059-.19a6.44 6.44 0 01.573-.99c.02-.029.086-.075.195-.045l1.103.303c.559.153 1.112.008 1.529-.27.16-.107.327-.204.5-.29.449-.222.851-.628.998-1.189l.289-1.105c.029-.11.101-.143.137-.146zM8 0c-.236 0-.47.01-.701.03-.743.065-1.29.615-1.458 1.261l-.29 1.106c-.017.066-.078.158-.211.224a5.994 5.994 0 00-.668.386c-.123.082-.233.09-.3.071L3.27 2.776c-.644-.177-1.392.02-1.82.63a7.977 7.977 0 00-.704 1.217c-.315.675-.111 1.422.363 1.891l.815.806c.05.048.098.147.088.294a6.084 6.084 0 000 .772c.01.147-.038.246-.088.294l-.815.806c-.474.469-.678 1.216-.363 1.891.2.428.436.835.704 1.218.428.609 1.176.806 1.82.63l1.103-.303c.066-.019.176-.011.299.071.213.143.436.272.668.386.133.066.194.158.212.224l.289 1.106c.169.646.715 1.196 1.458 1.26a8.094 8.094 0 001.402 0c.743-.064 1.29-.614 1.458-1.26l.29-1.106c.017-.066.078-.158.211-.224a5.98 5.98 0 00.668-.386c.123-.082.233-.09.3-.071l1.102.302c.644.177 1.392-.02 1.82-.63.268-.382.505-.789.704-1.217.315-.675.111-1.422-.364-1.891l-.814-.806c-.05-.048-.098-.147-.088-.294a6.1 6.1 0 000-.772c-.01-.147.039-.246.088-.294l.814-.806c.475-.469.679-1.216.364-1.891a7.992 7.992 0 00-.704-1.218c-.428-.609-1.176-.806-1.82-.63l-1.103.303c-.066.019-.176.011-.299-.071a5.991 5.991 0 00-.668-.386c-.133-.066-.194-.158-.212-.224L10.16 1.29C9.99.645 9.444.095 8.701.031A8.094 8.094 0 008 0zm1.5 8a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM11 8a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                        </summary>

                                        <details-dialog class="Box d-flex flex-column anim-fade-in fast Box--overlay "
                                                        aria-label="Edit repository details" role="dialog"
                                                        aria-modal="true">
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
                                                <h1 class="Box-title">Edit repository details</h1>
                                            </div>
                                            <div class="Box-body overflow-auto">
                                                <div class="js-topic-form-area">
                                                    <!-- '"` --><!-- </textarea></xmp> -->
                                                    <form id="repo_metadata_form"
                                                          action="/mlab817/pips/settings/update_meta"
                                                          accept-charset="UTF-8" method="post"><input type="hidden"
                                                                                                      name="_method"
                                                                                                      value="put"><input
                                                            type="hidden" name="authenticity_token"
                                                            value="+oQLKPOp8nZnuvU6I9ZffVw6aj9WjROJyAH7sElQ1Dlp9PNnkrAugtGSSUQF7x+DQWMzG5Exy1HAj7F6zQ8zqw==">
                                                        <div class="form-group mt-0 mb-3">
                                                            <div class="mb-2">
                                                                <label for="repo_description">Description</label>
                                                            </div>
                                                            <textarea type="text" id="repo_description"
                                                                      style="min-height:4em;height:6em;"
                                                                      class="form-control input-contrast width-full"
                                                                      name="repo_description"
                                                                      placeholder="Short description of this repository"
                                                                      autofocus=""></textarea>
                                                        </div>
                                                        <div class="form-group my-3">
                                                            <div class="mb-2">
                                                                <label for="repo_homepage">Website</label>
                                                            </div>
                                                            <input type="url" id="repo_homepage"
                                                                   class="form-control input-contrast width-full"
                                                                   name="repo_homepage" value=""
                                                                   placeholder="https://mlab817.github.io/pips/">
                                                        </div>
                                                        <div
                                                            class="width-full tag-input-container topic-input-container d-inline-block js-tag-input-container">
                                                            <div class="js-tag-input-wrapper">
                                                                <div class="form-group my-0">
                                                                    <div class="mb-2">
                                                                        <label for="repo_topics" class="d-block">Topics
                                                                            <span
                                                                                class="text-normal color-text-tertiary">(separate with spaces)</span></label>
                                                                    </div>
                                                                    <div
                                                                        class="tag-input form-control d-inline-block color-bg-primary py-0 position-relative">
                                                                        <ul class="js-tag-input-selected-tags d-inline">
                                                                            <li class="d-none topic-tag-action my-1 mr-1 f6 float-left js-tag-input-tag js-template">
                                                                                <span
                                                                                    class="js-placeholder-tag-name"></span>
                                                                                <button type="button"
                                                                                        class="delete-topic-button f5 no-underline ml-1 js-remove"
                                                                                        tabindex="-1">
                                                                                    <svg aria-label="Remove topic"
                                                                                         role="img" viewBox="0 0 16 16"
                                                                                         version="1.1"
                                                                                         data-view-component="true"
                                                                                         height="16" width="16"
                                                                                         class="octicon octicon-x">
                                                                                        <path fill-rule="evenodd"
                                                                                              d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                                                                                    </svg>
                                                                                </button>
                                                                                <input type="hidden"
                                                                                       name="repo_topics[]"
                                                                                       class="js-topic-input" value="">
                                                                            </li>

                                                                        </ul>

                                                                        <auto-complete
                                                                            src="/mlab817/pips/topic_autocomplete"
                                                                            for="repo-topic-popup">
                                                                            <input type="text" id="repo_topics"
                                                                                   class="tag-input-inner form-control color-bg-primary shorter d-inline-block p-0 my-1 border-0"
                                                                                   autocomplete="off" autofocus=""
                                                                                   role="combobox"
                                                                                   aria-controls="repo-topic-popup"
                                                                                   aria-expanded="false"
                                                                                   aria-autocomplete="list"
                                                                                   aria-haspopup="listbox"
                                                                                   spellcheck="false">
                                                                            <ul class="suggester border width-full color-bg-primary left-0"
                                                                                id="repo-topic-popup" style="top: 100%;"
                                                                                hidden="" role="listbox"></ul>
                                                                        </auto-complete>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="js-topic-suggestions-container"
                                                             data-url="/mlab817/pips/topic_suggestions?async_topics=false">

                                                        </div>

                                                        <div class="form-group mt-3 mb-0" role="group"
                                                             aria-labelledby="hidden_sidebar_options">
                                                            <div class="text-bold mb-2" id="hidden_sidebar_options">
                                                                Include in the home page
                                                            </div>
                                                            <label class="d-block mb-2 text-normal">
                                                                <input name="repo_sections[releases]" type="hidden"
                                                                       value="0"><input class="mr-1" type="checkbox"
                                                                                        value="1" checked="checked"
                                                                                        name="repo_sections[releases]"
                                                                                        id="repo_sections_releases">
                                                                Releases
                                                            </label>
                                                            <label class="d-block mb-2 text-normal">
                                                                <input name="repo_sections[packages]" type="hidden"
                                                                       value="0"><input class="mr-1" type="checkbox"
                                                                                        value="1" checked="checked"
                                                                                        name="repo_sections[packages]"
                                                                                        id="repo_sections_packages">
                                                                Packages
                                                            </label>
                                                            <label class="d-block text-normal">
                                                                <input name="repo_sections[environments]" type="hidden"
                                                                       value="0"><input class="mr-1" type="checkbox"
                                                                                        value="1" checked="checked"
                                                                                        name="repo_sections[environments]"
                                                                                        id="repo_sections_environments">
                                                                Environments
                                                            </label>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                            <div class="Box-footer">
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary"
                                                            form="repo_metadata_form">Save changes
                                                    </button>
                                                    <button type="reset" class="btn" data-close-dialog=""
                                                            form="repo_metadata_form">Cancel
                                                    </button>
                                                </div>

                                            </div>
                                        </details-dialog>
                                    </details>
                                    <h2 class="mb-3 h4">About</h2>

                                    <div class="f4 mt-3 color-text-secondary text-italic">
                                        No description, website, or topics provided.
                                    </div>

                                    <h3 class="sr-only">Topics</h3>
                                    <div class="mt-3">

                                    </div>

                                    <h3 class="sr-only">Resources</h3>
                                    <div class="mt-3">
                                        <a class="Link--muted" href="#readme">
                                            <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                                 height="16" width="16"
                                                 class="octicon octicon-book mr-2">
                                                <path fill-rule="evenodd"
                                                      d="M0 1.75A.75.75 0 01.75 1h4.253c1.227 0 2.317.59 3 1.501A3.744 3.744 0 0111.006 1h4.245a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75h-4.507a2.25 2.25 0 00-1.591.659l-.622.621a.75.75 0 01-1.06 0l-.622-.621A2.25 2.25 0 005.258 13H.75a.75.75 0 01-.75-.75V1.75zm8.755 3a2.25 2.25 0 012.25-2.25H14.5v9h-3.757c-.71 0-1.4.201-1.992.572l.004-7.322zm-1.504 7.324l.004-5.073-.002-2.253A2.25 2.25 0 005.003 2.5H1.5v9h3.757a3.75 3.75 0 011.994.574z"></path>
                                            </svg>
                                            Readme
                                        </a></div>


                                </div>
                            </div>
                            <div class="BorderGrid-row">
                                <div class="BorderGrid-cell">
                                    <h2 class="h4 mb-3">
                                        <a href="/mlab817/pips/releases" data-view-component="true"
                                           class="Link--primary no-underline">
                                            Releases
                                            <span title="1" class="Counter">1</span>
                                        </a></h2>

                                    <a class="Link--primary d-flex no-underline"
                                       href="/mlab817/pips/releases/tag/1.0.0">
                                        <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1"
                                             height="16" width="16"
                                             class="octicon octicon-tag flex-shrink-0 mt-1 color-text-success">
                                            <path fill-rule="evenodd"
                                                  d="M2.5 7.775V2.75a.25.25 0 01.25-.25h5.025a.25.25 0 01.177.073l6.25 6.25a.25.25 0 010 .354l-5.025 5.025a.25.25 0 01-.354 0l-6.25-6.25a.25.25 0 01-.073-.177zm-1.5 0V2.75C1 1.784 1.784 1 2.75 1h5.025c.464 0 .91.184 1.238.513l6.25 6.25a1.75 1.75 0 010 2.474l-5.026 5.026a1.75 1.75 0 01-2.474 0l-6.25-6.25A1.75 1.75 0 011 7.775zM6 5a1 1 0 100 2 1 1 0 000-2z"></path>
                                        </svg>
                                        <div class="ml-2 min-width-0">
                                            <div class="d-flex">
                                                <span class="css-truncate css-truncate-target text-bold mr-2"
                                                      style="max-width: none;">1.0.0</span>
                                                <span title="Label: Latest" data-view-component="true"
                                                      class="Label Label--success flex-shrink-0">
          Latest
</span></div>
                                            <div class="text-small color-text-secondary">
                                                <relative-time datetime="2021-06-27T07:27:53Z" class="no-wrap"
                                                               title="Jun 27, 2021, 3:27 PM GMT+8">21 seconds ago
                                                </relative-time>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="BorderGrid-row">
                                <div class="BorderGrid-cell">
                                    <h2 class="h4 mb-3">
                                        <a href="/users/mlab817/packages?repo_name=pips" data-view-component="true"
                                           class="Link--primary no-underline">
                                            Packages <span title="0" hidden="hidden" data-view-component="true"
                                                           class="Counter">0</span>
                                        </a></h2>


                                    <div class="text-small color-text-secondary">
                                        No packages published <br>
                                        <a href="/mlab817/pips/packages">Publish your first package</a>
                                    </div>


                                </div>
                            </div>
                            <div class="BorderGrid-row">
                                <div class="BorderGrid-cell">
                                    <h2 class="h4 mb-3">Languages</h2>
                                    <div class="mb-2">
  <span class="Progress">
    <span itemprop="keywords" aria-label="HTML 46.2" style="background-color: #e34c26;width: 46.2%;"
          class="Progress-item"></span>
    <span itemprop="keywords" aria-label="PHP 34.7" style="background-color: #4F5D95;width: 34.7%;"
          class="Progress-item"></span>
    <span itemprop="keywords" aria-label="Blade 19.1" style="background-color: #f7523f;width: 19.1%;"
          class="Progress-item"></span>
</span></div>
                                    <ul class="list-style-none">
                                        <li class="d-inline">
                                            <a class="d-inline-flex flex-items-center flex-nowrap Link--secondary no-underline text-small mr-3"
                                               href="/mlab817/pips/search?l=html"
                                               data-ga-click="Repository, language stats search click, location:repo overview">
                                                <svg class="octicon octicon-dot-fill mr-2" style="color:#e34c26;"
                                                     viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8z"></path>
                                                </svg>
                                                <span class="color-text-primary text-bold mr-1">HTML</span>
                                                <span>46.2%</span>
                                            </a>
                                        </li>
                                        <li class="d-inline">
                                            <a class="d-inline-flex flex-items-center flex-nowrap Link--secondary no-underline text-small mr-3"
                                               href="/mlab817/pips/search?l=php"
                                               data-ga-click="Repository, language stats search click, location:repo overview">
                                                <svg class="octicon octicon-dot-fill mr-2" style="color:#4F5D95;"
                                                     viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8z"></path>
                                                </svg>
                                                <span class="color-text-primary text-bold mr-1">PHP</span>
                                                <span>34.7%</span>
                                            </a>
                                        </li>
                                        <li class="d-inline">
                                            <a class="d-inline-flex flex-items-center flex-nowrap Link--secondary no-underline text-small mr-3"
                                               href="/mlab817/pips/search?l=blade"
                                               data-ga-click="Repository, language stats search click, location:repo overview">
                                                <svg class="octicon octicon-dot-fill mr-2" style="color:#f7523f;"
                                                     viewBox="0 0 16 16" version="1.1" width="16" height="16"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8z"></path>
                                                </svg>
                                                <span class="color-text-primary text-bold mr-1">Blade</span>
                                                <span>19.1%</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ./ Github -->

    <div class="d-flex mb-3 px-3 px-md-4 px-lg-5">
        <div class="flex-shrink-0 col-12 col-lg-9 mb-4 mb-md-0">
            <div id="options_bucket">
                <div class="Subhead hx_Subhead--responsive">
                    <h2 class="Subhead-heading">Profile</h2>


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
          <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16"
               class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
          <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16" width="16"
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
                        <button type="submit" class="btn-primary btn">

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
                                             viewBox="0 0 16 16" fill="none" width="16"
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
                    <h2 id="features" class="Subhead-heading">Features</h2>


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
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
              <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                   width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
              <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                            <button type="submit" class="btn-primary btn">

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
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
                     width="16" class="octicon octicon-check">
        <path fill-rule="evenodd"
              d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
    </svg>
                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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


                <div class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 id="merge-button-settings" class="Subhead-heading">Merge button</h2>


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
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                </form>

                <div class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 id="archive-settings" class="Subhead-heading">Archives</h2>


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
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" height="16"
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
                        <button type="submit" class="btn-primary btn">

                            Save changes


                        </button>
                    </noscript>
                </form>


                <div class="Subhead hx_Subhead--responsive Subhead--spacious">
                    <h2 class="Subhead-heading">GitHub Pages</h2>


                </div>
                <div class="Box">
                    <div class="Box-row flash flash-full flash-warn mt-0">
                        <p>Pages settings now has its own dedicated tab! <a href="/mlab817/ipms-v2/settings/pages">Check
                                it out here!</a></p>
                    </div>
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
{{--        @includeWhen($project->review()->exists(), 'reviews.result', ['review' => $project->review])--}}

        <a id="back-to-top" href="#" class="btn btn-info back-to-top" role="button" aria-label="Scroll to top">
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
        </a>

    </section>
@endsection
