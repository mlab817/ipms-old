@extends('layouts.header-only')

@section('content')
    <div class="container-md mt-5">
        <form id="new_project" aria-label="Create a new repository" action="{{ route('base-projects.store') }}" accept-charset="UTF-8" method="post">
            @csrf

            <div  class="Subhead hx_Subhead--responsive mb-5">
                <h1  class="Subhead-heading">Create a new program/project</h1>

                <div  class="Subhead-description">
                    A repository will be created upon PAP creation which will contain all project files, including the revision history, issues, and so on.
                </div>
            </div>

            <div class="clearfix">
                <dl class="form-group mt-1 float-left required" id="owner-form-group">
                    <dt class="input-label">
                        <label autocapitalize="off" maxlength="255" required="required"
                               aria-describedby="owner" for="repository_name">Owner</label></dt>
                    <dd>
                        <div class="position-relative">
                            <select name="owner" id="owner" class="form-select">
                                <option value="App\Models\User; {{ auth()->id() }}">{{ auth()->user()->username }}</option>
                                @foreach(auth()->user()->owned_offices as $office)
                                    <option value="App\Models\Office; {{ $office->id }}">{{ $office->acronym }}</option>
                                @endforeach
                                @foreach(auth()->user()->offices as $office)
                                    <option value="App\Models\Office; {{ $office->id }}">{{ $office->acronym }}</option>
                                @endforeach
                            </select>
                        </div>
                    </dd>

                </dl>
            </div>

            <div class="clearfix">
                <dl class="form-group mt-1 float-left required @error('title') errored @enderror" id="title-form-group">
                    <dt class="input-label">
                        <label autocapitalize="off" maxlength="255" required="required"
                               aria-describedby="pap-title" for="repository_name">Program/Project Title</label></dt>
                    <dd>
                        <div class="position-relative">
                            <input autocapitalize="off"
                                maxlength="255"
                                class="form-control"
                                size="255"
                                type="text"
                                name="title"
                                id="title"
                                autocomplete="off"
                                spellcheck="false"
                                autofocus="autofocus"
                                value="{{ old('title') }}">
                            @error('title')
                                <p class="note error">{{ $message }}</p>
                            @enderror
                        </div>
                    </dd>

                </dl>
            </div>

            <div class="clearfix">
                <dl class="form-group mt-1 float-left required @error('summary') errored @enderror" id="summary-form-group">
                    <dt class="input-label">
                        <label required="required"
                               aria-describedby="pap-title" for="summary">Summary</label></dt>
                    <dd>
                        <div class="position-relative">
                            <input autocapitalize="on"
                                maxlength="125"
                                class="form-control"
                                size="125"
                                type="text"
                                name="summary"
                                id="summary"
                                value="{{ old('summary') }}"
                                autocomplete="off"
                                spellcheck="false"
                                autofocus="autofocus"
                                placeholder="Summary for the project (maximum of 125 characters)">
                            @error('summary')
                            <p class="note error">{{ $message }}</p>
                            @enderror
                        </div>
                    </dd>

                </dl>
            </div>

            <hr aria-hidden="true">

            <div class="form-group required mb-6">
                <!-- privacy options -->
                @foreach($pap_types as $pap_type)
                    <div class="form-checkbox">
                        <label class="js-privacy-toggle-label-public">
                            <input class="mt-2" aria-describedby="public-description" type="radio" name="pap_type_id" value="{{ $pap_type->id }}" @if(old('pap_type_id') == $pap_type->id) checked @endif>
                            {{ $pap_type->name }}
                        </label>
                        <svg height="32" class="octicon octicon-repo float-left mt-1 mr-2" viewBox="0 0 24 24" version="1.1"
                             width="32" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path>
                            <path
                                d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                        </svg>
                        <span class="js-public-description note">
                            {{ $pap_type->description }}
                        </span>
                    </div>
            @endforeach
            <!-- upgrade upsell -->
            </div>

            <hr aria-hidden="true">

            <div class="form-group required mb-6">
                <div class="form-checkbox">
                    <label for="has_infra">
                        <input type="checkbox" value="1" id="has_infra" @if(old('has_infra')) checked @endif name="has_infra" aria-describedby="help-text-for-checkbox" />
                        <!-- octicon: container -->
                        <svg class="octicon octicon-container float-left mt-1 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="32" height="32"><path fill-rule="evenodd" d="M10.41.24l4.711 2.774A1.767 1.767 0 0116 4.54v5.01a1.77 1.77 0 01-.88 1.53l-7.753 4.521-.002.001a1.767 1.767 0 01-1.774 0H5.59L.873 12.85A1.762 1.762 0 010 11.327V6.292c0-.304.078-.598.22-.855l.004-.005.01-.019c.15-.262.369-.486.64-.643L8.641.239a1.75 1.75 0 011.765 0l.002.001zM9.397 1.534a.25.25 0 01.252 0l4.115 2.422-7.152 4.148a.267.267 0 01-.269 0L2.227 5.716l7.17-4.182zM7.365 9.402L8.73 8.61v4.46l-1.5.875V9.473a1.77 1.77 0 00.136-.071zm2.864 2.794V7.741l1.521-.882v4.45l-1.521.887zm3.021-1.762l1.115-.65h.002a.268.268 0 00.133-.232V5.264l-1.25.725v4.445zm-11.621 1.12l4.1 2.393V9.474a1.77 1.77 0 01-.138-.072L1.5 7.029v4.298c0 .095.05.181.129.227z"></path></svg>
                        Infrastructure PAP
                    </label>
                    <p class="note" id="help-text-for-checkbox">
                        The PAP will be tagged for TRIP inclusion. Note: This can no longer be removed once ticked.
                    </p>
                </div>
            </div>

            <hr aria-hidden="true">

            <button type="submit" class="btn-primary btn">
                Create program/project
            </button>
        </form>
    </div>
@stop
