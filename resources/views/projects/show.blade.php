@extends('layouts.project')

@section('content')
    <div class="container clearfix px-3 px-md-4 px-lg-5">
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

{{--                                    <!-- Philippine Development Plan Indicators -->--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="card card-primary card-outline">--}}
{{--                                            <div class="card-header">--}}
{{--                                                <h3 class="card-title">{{ __("Philippine Development Results Matrices (PDP-RM) Indicators") }}</h3>--}}
{{--                                            </div>--}}
{{--                                            <!-- TODO: PDP Indicators as Vue component -->--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="form-check">--}}
{{--                                                    <label for="no_pdp_indicator" class="form-check-label">--}}
{{--                                                        <input type="checkbox" value="1" id="no_pdp_indicator" name="no_pdp_indicator"--}}
{{--                                                               class="form-check-input">--}}
{{--                                                        No PDP Indicator applicable--}}
{{--                                                    </label>--}}
{{--                                                </div>--}}

{{--                                                <div id="pdp_indicators_group" class="form-group mt-2">--}}
{{--                                                    @foreach ($pdp_indicators as $pi1)--}}
{{--                                                        <div id="pdp_chapter_{{$pi1->id}}" class="pdp_chapters" style="display: none;">--}}
{{--                                                            <span class="font-weight-bold">{{ $pi1->name }}</span>--}}
{{--                                                            @foreach($pi1->children as $pi2)--}}
{{--                                                                <div class="ml-4">--}}
{{--                                                                    <div class="form-check">--}}
{{--                                                                        <label class="form-check-label" for="pdp_outcome_{{$pi2->id}}">--}}
{{--                                                                            <input type="checkbox"--}}
{{--                                                                                   class="form-check-input pdp_indicators"--}}
{{--                                                                                   value="{{$pi2->id}}"--}}
{{--                                                                                   name="pdp_indicators[]"--}}
{{--                                                                                   id="pdp_outcome_{{$pi2->id}}"--}}
{{--                                                                                   @if(in_array($pi2->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>--}}
{{--                                                                            {{ $pi2->name }}--}}
{{--                                                                        </label>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div>--}}
{{--                                                                        @foreach($pi2->children as $pi3)--}}
{{--                                                                            <div class="ml-4">--}}
{{--                                                                                <div class="form-check">--}}
{{--                                                                                    <label class="form-check-label"--}}
{{--                                                                                           for="pdp_suboutcome_{{$pi3->id}}">--}}
{{--                                                                                        <input type="checkbox"--}}
{{--                                                                                               class="form-check-input pdp_indicators"--}}
{{--                                                                                               value="{{$pi3->id}}"--}}
{{--                                                                                               name="pdp_indicators[]"--}}
{{--                                                                                               id="pdp_suboutcome_{{$pi3->id}}"--}}
{{--                                                                                               @if(in_array($pi3->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>--}}
{{--                                                                                        {{ $pi3->name }}--}}
{{--                                                                                    </label>--}}
{{--                                                                                </div>--}}
{{--                                                                                @foreach($pi3->children as $pi4)--}}
{{--                                                                                    <div class="ml-4">--}}
{{--                                                                                        <div class="form-check">--}}
{{--                                                                                            <label class="form-check-label"--}}
{{--                                                                                                   for="pdp_output_{{$pi4->id}}">--}}
{{--                                                                                                <input type="checkbox"--}}
{{--                                                                                                       class="form-check-input pdp_indicators"--}}
{{--                                                                                                       value="{{$pi4->id}}"--}}
{{--                                                                                                       name="pdp_indicators[]"--}}
{{--                                                                                                       id="pdp_output_{{$pi4->id}}"--}}
{{--                                                                                                       @if(in_array($pi4->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>--}}
{{--                                                                                                {{ $pi4->name }}--}}
{{--                                                                                            </label>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                @endforeach--}}
{{--                                                                            </div>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            @endforeach--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--/. Philippine Development Plan Indicators -->--}}
                                </div>
                            </div>
                        </div>

                    </div>


                    </div>

            </div>
        </div>
    </div>

    <div class="my-3"></div>
@endsection
