@extends('layouts.header-only')

@section('content')
    <div class="container-md mt-5">
        <form id="new_project" aria-label="Create a new repository" action="{{ route('projects.store') }}" accept-charset="UTF-8" method="post">
            @csrf

            <div  class="Subhead hx_Subhead--responsive mb-5">
                <h1  class="Subhead-heading">Create a new program/project</h1>

                <div  class="Subhead-description"> A repository will be created upon PAP creation which will contain all project files, including the revision history, issues, and so on.
                    Already have a project/program elsewhere? <a href="{{ route('projects.new_clone') }}">You can clone it, instead.</a>
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
                        <label maxlength="255" required="required"
                               aria-describedby="pap-title" for="summary">Summary</label></dt>
                    <dd>
                        <div class="position-relative">
                            <input autocapitalize="on"
                                maxlength="255"
                                class="form-control"
                                size="255"
                                type="text"
                                name="summary"
                                id="summary"
                                value="{{ old('summary') }}"
                                autocomplete="off"
                                spellcheck="false"
                                autofocus="autofocus"
                                placeholder="Summary for the project (maximum of 255 characters)">
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

            <button type="submit" class="btn-primary btn">
                Create program/project
            </button>
        </form>
    </div>
@stop
